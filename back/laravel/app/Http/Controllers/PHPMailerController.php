<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;
use Barryvdh\DomPDF\Facade\Pdf;


class PHPMailerController extends Controller
{
    public function sendEmail(Request $request)
    {
        $validatedData = $request->validate([
            'subject' => 'required|string',
            'message' => 'required|string',
            'to' => 'required|array',
            'to.*' => 'required|email',
            'user' => 'nullable|array',
            'user.name' => 'nullable|string',
            'user.surname' => 'nullable|string',
        ]);

        $mail = new PHPMailer(true);

        try {

            $mail->isSMTP();
            $mail->CharSet = 'UTF-8';
            $mail->Host = env("MAIL_HOST");
            $mail->SMTPAuth = true;
            $mail->Username = env("MAIL_USERNAME");
            $mail->Password = env("MAIL_PASSWORD");
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->SMTPOptions = [
                'ssl' => [
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                ]
            ];

            // Remitente
            $mail->setFrom('a21aivantjeh@inspedralbes.cat', 'TaquillaXpress');

            // Agregar el destinatario principal (puede dejarse vacío si no hay principal)
            $mail->addAddress('a21aivantjeh@inspedralbes.cat'); // Puede ser tu dirección de control

            // Agregar cada destinatario como BCC (copia oculta)
            foreach ($validatedData['to'] as $recipient) {
                $mail->addBCC($recipient);
            }

            // Renderizar la vista del correo con los datos del usuario
            $htmlContent = View::make('email', [
                'subject' => $validatedData['subject'],
                'message' => $validatedData['message'],
                'user' => $validatedData['user'] ?? null, // Pasar los datos del usuario
            ])->render();

            // Contenido del correo
            $mail->isHTML(true);
            $mail->Subject = $validatedData['subject'];
            $mail->Body = $htmlContent;

            // Enviar el correo
            $mail->send();

            return response()->json([
                'message' => 'Email sent successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => "Error sending email: {$mail->ErrorInfo}"
            ], 500);
        }
    }

    public function sendEntrada(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'subject' => 'required|string',
                'message' => 'required|string',
                'to' => 'required|array',
                'to.*' => 'required|email',
                'user' => 'nullable|array',
                'user.name' => 'nullable|string',
                'user.surname' => 'nullable|string',
                'movie' => 'required|array',
            ]);

            $mail = new PHPMailer(true);

            $mail->isSMTP();
            $mail->CharSet = 'UTF-8';
            $mail->Host = env("MAIL_HOST");
            $mail->SMTPAuth = true;
            $mail->Username = env("MAIL_USERNAME");
            $mail->Password = env("MAIL_PASSWORD");
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->SMTPOptions = [
                'ssl' => [
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                ]
            ];

            $mail->setFrom('a21aivantjeh@inspedralbes.cat', 'TaquillaXpress');
            $mail->addAddress('a21aivantjeh@inspedralbes.cat');

            foreach ($validatedData['to'] as $recipient) {
                $mail->addBCC($recipient);
            }

            $htmlContent = View::make('ticket', [
                'subject' => $validatedData['subject'],
                'message' => $validatedData['message'],
                'user' => $validatedData['user'] ?? null,
                'movieData' => $validatedData['movie'],
                'ticketDetails' => $validatedData['movie']['asientos'],
                'usePosterLocal' => true,
            ])->render();

            $pdfContent = View::make('pdf.ticket', [
                'subject' => $validatedData['subject'],
                'message' => $validatedData['message'],
                'user' => $validatedData['user'] ?? null,
                'movieData' => $validatedData['movie'],
                'ticketDetails' => $validatedData['movie']['asientos'],
            ])->render();

            // Generar el PDF del ticket
            $pdf = Pdf::loadHTML($pdfContent);
            $pdfContentView = $pdf->output();

            // Adjuntar el PDF al correo
            $movieTitle = preg_replace('/[^A-Za-z0-9\-]/', '_', $validatedData['movie']['title']); // Limpiar el título
            $pdfFileName = "{$movieTitle}_ticket.pdf";
            $mail->addStringAttachment($pdfContentView, $pdfFileName, 'base64', 'application/pdf');

            // Enviar el correo
            $mail->isHTML(true);
            $mail->Subject = $validatedData['subject'];
            $mail->Body = $htmlContent;

            $mail->send();

            return response()->json([
                'message' => 'Email con ticket enviado exitosamente'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => "Error enviando email: {$mail->ErrorInfo}"
            ], 500);
        }
    }
}
