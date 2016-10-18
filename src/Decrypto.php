<?php

namespace Codecraft63\CertsignLogin;


class Decrypto
{
    use Util;

    /**
     * Decrypt text using certsign login private key.
     *
     * @param string $text
     * @param string $key
     * @throws \Exception
     * @return string
     */
    public static function decrypt(string $text, string $key): string
    {
        list($cipher, $cipher_size) = self::getCipher();
        $iv = substr($key, 0, $cipher_size);

        mcrypt_generic_init($cipher, $key, $iv);

        $text = base64_decode(str_replace("certplus", "\\+", $text));
        $text = self::pkcs5_pad($text, $cipher_size);

        $decrypted_text = mdecrypt_generic($cipher, $text);
        self::finalizeCipher($cipher);

        return $decrypted_text;
    }
}
