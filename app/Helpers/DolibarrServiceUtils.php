<?php

namespace App\Helpers;

class DolibarrServiceUtils
{
    public static function encryptApiKey(string $value): string
    {
        $key = sodium_crypto_generichash(
            config('app.key'),
            '',
            SODIUM_CRYPTO_SECRETBOX_KEYBYTES
        );
        $nonce = random_bytes(SODIUM_CRYPTO_SECRETBOX_NONCEBYTES);
        return $nonce . sodium_crypto_secretbox($value, $nonce, $key);
    }

    public static function decryptApiKey(string $encrypted): string
    {
        $key = sodium_crypto_generichash(
            config('app.key'),
            '',
            SODIUM_CRYPTO_SECRETBOX_KEYBYTES
        );
        $nonce = substr($encrypted, 0, SODIUM_CRYPTO_SECRETBOX_NONCEBYTES);
        $ciphertext = substr($encrypted, SODIUM_CRYPTO_SECRETBOX_NONCEBYTES);
        return sodium_crypto_secretbox_open($ciphertext, $nonce, $key);
    }
}
