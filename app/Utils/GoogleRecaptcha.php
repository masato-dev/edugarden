<?php
namespace App\Utils;
class GoogleRecaptcha {
    public static function check($token, $secret): bool {
        if (empty($token) || empty($secret)) {
            return false;
        }

        $url = 'https://www.google.com/recaptcha/api/siteverify';

        $postData = http_build_query([
            'secret'   => $secret,
            'response' => $token,
            'remoteip' => $_SERVER['REMOTE_ADDR'] ?? null
        ]);

        $options = [
            'http' => [
                'method'  => 'POST',
                'header'  => "Content-Type: application/x-www-form-urlencoded\r\n",
                'content' => $postData,
                'timeout' => 5,
            ],
        ];

        $context = stream_context_create($options);
        $result = @file_get_contents($url, false, $context);

        if ($result === false) {
            return false;
        }

        $response = json_decode($result, true);
        return isset($response['success']) && $response['success'] === true;
    }

}