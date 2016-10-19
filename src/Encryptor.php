<?php

namespace Codecraft63\CertsignLogin;

class Encryptor
{

    use Util;

    /**
     * Encrypt text using certsign login private key.
     *
     * @param string $input
     * @param string $key
     * @throws \Exception
     * @return string
     */
    public static function encrypt(string $input, string $key): string
    {
        list($cipher, $iv_size) = self::getCipher();
        $iv = substr($key, 0, $iv_size);
        $key = substr($key, 0, $iv_size);

        mcrypt_generic_init($cipher, $key, $iv);

        $data = mcrypt_generic($cipher, $input);
        $data = str_replace("certplus", "\\+", str_replace("(\r\n|\n)", "", $data));

        self::finalizeCipher($cipher);

        return base64_encode($data);
    }
}
