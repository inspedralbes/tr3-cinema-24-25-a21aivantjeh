<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;


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

            $tempDir = storage_path('app/public/temp/' . uniqid());
            if (!file_exists($tempDir)) {
                mkdir($tempDir, 0755, true);
            }

            $posterUrl = $validatedData['movie']['poster'] ?? null;
            $localPosterPath = null;

            if ($posterUrl) {
                $extension = pathinfo(parse_url($posterUrl, PHP_URL_PATH), PATHINFO_EXTENSION) ?: 'jpg';
                $localPosterPath = $tempDir . '/poster.' . $extension;
                
                // Download the image
                $imageContent = file_get_contents($posterUrl);
                if ($imageContent !== false) {
                    file_put_contents($localPosterPath, $imageContent);
                    
                    // Update the movie data with the local path
                    $validatedData['movie']['local_poster'] = asset('storage/temp/' . basename($tempDir) . '/poster.' . $extension);
                }
            }

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
            $mail->addAddress('a21aivantjeh@inspedralbes.cat'); // Puede ser tu dirección de control

            foreach ($validatedData['to'] as $recipient) {
                $mail->addBCC($recipient);
            }

            Log::info('Datos de la película:', $validatedData['movie']);

            // Renderizar la vista del correo
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
                'usePosterLocal' => true,
            ])->render();

            // Generar el PDF del ticket
            $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadHTML($pdfContent);
            $pdfContentView = $pdf->output();

            // Adjuntar el PDF al correo
            $mail->addStringAttachment($pdfContentView, 'ticket.pdf', 'base64', 'application/pdf');

            // Enviar el correo
            $mail->isHTML(true);
            $mail->Subject = $validatedData['subject'];
            $mail->Body = $htmlContent;

            $mail->send();

            if (file_exists($tempDir)) {
                array_map('unlink', glob("$tempDir/*.*"));
                rmdir($tempDir);
            }

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
