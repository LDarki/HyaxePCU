<?php
class NoCSRF
{
    public static function check($key, $origin, $timespan=null, $multiple=false)
    {
        if (!isset( $_SESSION['csrf_'. $key ]))return false;
        if (!isset( $origin[$key])) return false;
        $hash = $_SESSION['csrf_'. $key];
		if(!$multiple) $_SESSION['csrf_'. $key] = null;
        if ($origin[$key] != $hash )return false;
        if ($timespan != null && is_int($timespan) && intval(substr(base64_decode( $hash ), 0, 10)) + $timespan < time()) return false;
        return true;
    }

    public static function generate($key)
    {
        $token = base64_encode(time() . self::randomString(32));
        $_SESSION['csrf_'. $key ] = $token;
        return $token;
    }

    protected static function randomString($length)
    {
        $seed = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijqlmnopqrtsuvwxyz0123456789';
        $max = strlen($seed) - 1;

        $string = '';
        for ($i = 0; $i < $length; ++$i)
            $string .= $seed[intval(mt_rand(0.0, $max))];
        return $string;
    }

}
?>