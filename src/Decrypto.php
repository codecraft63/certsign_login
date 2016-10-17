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
        $cipher = mcrypt_module_open(MCRYPT_RIJNDAEL_128, '', MCRYPT_MODE_CBC, '');
        $cipher_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
        $iv = substr($key, 0, $cipher_size);

        mcrypt_generic_init($cipher, $key, $iv);

        $text = base64_decode(str_replace("certplus", "\\+", $text));
        $text = self::pkcs5_pad($text, $cipher_size);

        $decrypted_text = mdecrypt_generic($cipher, $text);
        mcrypt_generic_deinit($cipher);
        mcrypt_module_close($cipher);

        return $decrypted_text;
    }
}
