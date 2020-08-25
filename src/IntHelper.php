<?php

namespace DoubleOh13\Support;

class IntHelper
{
    public static function toBase62($int)
    {
        $base = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $r = $int % 62;
        $result = $base[$r];
        $q = floor($int / 62);
        while($q) {
            $r = $q % 62;
            $q = floor($q/62);
            $result = $base[$r].$result;
        }
        return $result;
    }

    public static function fromBase62($num)
    {
        $base='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $limit = strlen($num);
        $res=strpos($base,$num[0]);
        for($i=1;$i<$limit;$i++) {
            $res = 62 * $res + strpos($base,$num[$i]);
        }
        return $res;
    }
}
