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

            $mail->setFrom('a21aivantjeh@inspedralbes.cat', 'TaquillaXpress');

            $mail->addAddress('a21aivantjeh@inspedralbes.cat');

            foreach ($validatedData['to'] as $recipient) {
                $mail->addBCC($recipient);
            }

            $htmlContent = View::make('email', [
                'subject' => $validatedData['subject'],
                'message' => $validatedData['message'],
                'user' => $validatedData['user'] ?? null,
            ])->render();

            $mail->isHTML(true);
            $mail->Subject = $validatedData['subject'];
            $mail->Body = $htmlContent;

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
                'to' => 'required|email', // Changed from array to single email
                'user' => 'nullable|array',
                'movie' => 'required|array',
            ]);

            $mail = new PHPMailer(true);

            $mail->isSMTP();
            $mail->CharSet = 'UTF-8';
            $mail->Host = env('MAIL_HOST');
            $mail->SMTPAuth = true;
            $mail->Username = env('MAIL_USERNAME');
            $mail->Password = env('MAIL_PASSWORD');
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom('a21aivantjeh@inspedralbes.cat', 'TaquillaXpress');
            $mail->addAddress($validatedData['to']); // Single recipient

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

            $pdf = Pdf::loadHTML($pdfContent);
            $pdfContentView = $pdf->output();

            $movieTitle = preg_replace('/[^A-Za-z0-9\-]/', '_', $validatedData['movie']['title']);
            $pdfFileName = "{$movieTitle}_ticket.pdf";
            $mail->addStringAttachment($pdfContentView, $pdfFileName, 'base64', 'application/pdf');

            $mail->isHTML(true);
            $mail->Subject = $validatedData['subject'];
            $mail->Body = $htmlContent;

            $mail->send();

            return response()->json([
                'message' => 'Email con ticket enviado exitosamente'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => "Error enviando email: " . $e->getMessage()
            ], 500);
        }
    }
}
