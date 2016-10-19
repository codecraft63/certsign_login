<?php

namespace Codecraft63\CertsignLogin;

class Encryptor
{

    use Util;

    /**
     * Encrypt text using certsign login private key.
     *
     * @param string $text
     * @param string $key
     * @throws \Exception
     * @return string
     */
    public static function encrypt(string $text, string $key): string
    {
        list($cipher, $cipher_size) = self::getCipher();
        $iv = substr($key, 0, $cipher_size);

        mcrypt_generic_init($cipher, $key, $iv);

        $encrypted_text = mcrypt_generic($cipher, $text);
        $encrypted_text = str_replace("certplus", "\\+", str_replace("(\r\n|\n)", "", $encrypted_text));
        $encrypted_text = self::pkcs5Pad($encrypted_text, $cipher_size);
        self::finalizeCipher($cipher);

        return $encrypted_text;
    }
}
