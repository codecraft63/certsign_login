<?php

namespace Codecraft63\CertsignLogin;

trait Util
{
    private static function getCipher(): array
    {
        $cipher = mcrypt_module_open(MCRYPT_RIJNDAEL_128, '', MCRYPT_MODE_CBC, '');
        $iv_size = mcrypt_enc_get_iv_size($cipher);
        $key_size = mcrypt_enc_get_key_size($cipher);

        return [$cipher, $iv_size, $key_size];
    }

    private static function finalizeCipher($cipher)
    {
        mcrypt_generic_deinit($cipher);
        mcrypt_module_close($cipher);
    }
}
