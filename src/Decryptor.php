<?php

namespace Codecraft63\CertsignLogin;

class Decryptor
{
    use Util;

    /**
     * Decrypt text using certsign login private key.
     *
     * @param string $input
     * @param string $key
     * @throws \Exception
     * @return string
     */
    public static function decrypt(string $input, string $key): string
    {
        list($cipher, $iv_size, $key_size) = self::getCipher();
        $iv = substr($key, 0, $iv_size);
        $key = substr($key, 0, $iv_size);

        mcrypt_generic_init($cipher, $key, $iv);

        $data = base64_decode(str_replace("certplus", "\\+", $input));

        $data = mdecrypt_generic($cipher, $data);
        self::finalizeCipher($cipher);

        return trim($data);
    }
}
