<?php

namespace Codecraft63\CertsignLogin;

trait Util
{
    private static function pkcs5_pad(string $text, $blockSize):string
    {
        $pad = $blockSize - (strlen($text) % $blockSize);
        return $text . str_repeat(chr($pad), $pad);
    }

    private static function getCipher(): array
    {
        $cipher = mcrypt_module_open(MCRYPT_RIJNDAEL_128, '', MCRYPT_MODE_CBC, '');
        $cipher_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);

        return [$cipher, $cipher_size];
    }

    private static function finalizeCipher($cipher)
    {
        mcrypt_generic_deinit($cipher);
        mcrypt_module_close($cipher);
    }
}
