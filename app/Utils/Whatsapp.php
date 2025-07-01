<?php

namespace App\Utils;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class Whatsapp
{
    protected static function normalizePhone(string $phone): string
    {
        $digits = preg_replace('/\D+/', '', $phone);

        if (Str::startsWith($digits, '08')) {
            return '62' . substr($digits, 1);
        }

        if (Str::startsWith($digits, '628')) {
            return $digits;
        }

        if (Str::startsWith($digits, '62')) {
            return $digits;
        }

        return $digits;
    }

    public static function send($phone, $message, $mediaUrl = null)
    {
        $phone = self::normalizePhone($phone);
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
