<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

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

    public function sendEntradas(Request $request)
    {
        $validatedData = $request->validate([
            'subject' => 'required|string',
            'message' => 'required|string',
            'to' => 'required|array',
            'to.*' => 'required|email',
            'movie' => 'required|array',
            'user' => 'nullable|array',
            'user.name' => 'nullable|string',
            'user.surname' => 'nullable|string',
        ]);

        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->isSMTP();
            $mail->CharSet = 'UTF-8';
            $mail->Host = env("MAIL_HOST");
            $mail->SMTPAuth = true;
            $mail->Username = env("MAIL_USERNAME");
            $mail->Password = env("MAIL_PASSWORD");
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;
            $mail->SMTPDebug = 2; // Enable verbose debug output for troubleshooting

            $mail->SMTPOptions = [
                'ssl' => [
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                ]
            ];

            $mail->setFrom('a21aivantjeh@inspedralbes.cat', 'TaquillaXpress');

            // Recipients - add each recipient directly instead of BCC
            foreach ($validatedData['to'] as $recipient) {
                $mail->addAddress($recipient);
            }

            // Copy for monitoring (optional)
            // $mail->addBCC('a21aivantjeh@inspedralbes.cat', 'Admin');

            // Content
            $htmlContent = View::make('tickets', [
                'movieData' => $validatedData['movie'],
                'subject' => $validatedData['subject'],
                'message' => $validatedData['message'],
                'ticketDetails' => $validatedData['movie']['asientos'],
                // Use proper user name extraction if available
                'user' => isset($validatedData['to'][0]) ? explode('@', $validatedData['to'][0])[0] : 'Cliente'
            ])->render();

            dd($htmlContent);

            $mail->isHTML(true);
            $mail->Subject = $validatedData['subject'];
            $mail->Body = $htmlContent;

            // Send the email
            $mail->send();

            if (!$mail->send()) {
                return response()->json([
                    'error' => "Error sending email: {$mail->ErrorInfo}"
                ], 500);
            }

            return true;
        } catch (\Exception $e) {
            return response()->json([
                'error' => "Error sending email: {$mail->ErrorInfo}"
            ], 500);
        }
    }
}
