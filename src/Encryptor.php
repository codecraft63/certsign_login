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
        $cipher = mcrypt_module_open(MCRYPT_RIJNDAEL_128, '', MCRYPT_MODE_CBC, '');
        $cipher_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
        $iv = substr($key, 0, $cipher_size);

        mcrypt_generic_init($cipher, $key, $iv);

        $encrypted_text = mcrypt_generic($cipher, $text);
        $encrypted_text = str_replace("certplus", "\\+", str_replace("(\r\n|\n)", "", $encrypted_text));
        $encrypted_text = self::pkcs5_pad($encrypted_text, $cipher_size);
        mcrypt_generic_deinit($cipher);
        mcrypt_module_close($cipher);

        return $encrypted_text;
    }
}
