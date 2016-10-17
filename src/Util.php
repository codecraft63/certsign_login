<?php

namespace Codecraft63\CertsignLogin;

trait Util
{
    private static function pkcs5_pad(string $text, integer $blockSize): string
    {
        $pad = $blockSize - (strlen($text) % $blockSize);
        return $text . str_repeat(chr($pad), $pad);
    }
}
