<?php

namespace App\Utils;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Log;

class Whatsapp
{
    /**
     * Kirim pesan WhatsApp (opsional dengan media) ke API eksternal.
     *
     * @param  string      $phone
     * @param  string      $message
     * @param  string|null $mediaUrl
     * @return array|bool
     *
     * @throws \Illuminate\Http\Client\RequestException Jika request HTTP error
     */
    public static function send($phone, $message, $mediaUrl = null)
    {

        if ($mediaUrl === null) {
            $endpoint = 'https://wa.cleds.web.id/whatsapp/send-message';
            $payload = [
                'number'  => $phone,
                'message' => $message,
            ];
        } else {
            $endpoint = 'https://wa.cleds.web.id/whatsapp/send-media';
            $payload = [
                'number'   => $phone,
                'message'  => $message,
                'mediaUrl' => $mediaUrl,
            ];
        }

        try {
            $response = Http::timeout(10)
                             ->retry(2, 100)
                             ->post($endpoint, $payload);

            $response->throw();

            return $response->json();
        } catch (RequestException $e) {
            Log::error('Whatsapp::send gagal', [
                'endpoint'  => $endpoint,
                'payload'   => $payload,
                'status'    => optional($e->response)->status(),
                'response'  => optional($e->response)->body(),
                'exception' => $e->getMessage(),
            ]);

            return false;
        }
    }
}
