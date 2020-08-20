<?php

defined('_ADF') or exit('Restricted Access');

class Xss {
    public function __construct() {}
    public function __clone() {}

    public static function getPostValue($key, $default = '') {
        return (isset($_POST[$key])) ? self::escape($_POST[$key]) : self::escape($default);
    }

    public static function getGetValue($key, $default = '') {
        return (isset($_GET[$key])) ? self::escape($_GET[$key]) : self::escape($default);
    }

    public static function getRequestValue($key, $default = '') {
        return (isset($_REQUEST[$key])) ? self::escape($_REQUEST[$key]) : self::escape($default);
    }

    public static function getCookieValue($key, $default = '') {
        return (isset($_COOKIE[$key])) ? self::escape($_COOKIE[$key]) : self::escape($default);
    }

    public static function getServerValue($key, $default = '') {
        return (isset($_SERVER[$key])) ? self::escape($_SERVER[$key]) : self::escape($default);
    }

    public static function getArrayValue(array $array, $key, $default = '') {
        return (isset($array[$key])) ? self::escape($array[$key]) : self::escape($default);
    }

    public static function getObjectValue($object, $key, $default = '') {
        return (isset($object->$key)) ? self::escape($object->$key) : self::escape($default);
    }

    public static function escape($string) {
        return htmlspecialchars($string);
    }

    public static function escapeURL($url, $default = null) {
        if(filter_var($url, FILTER_VALIDATE_URL)) {
            return self::escape($url);
        } else {
            if ($default === null) {
                return 'http://'.self::escape($url);
            } else {
                return self::escape($default);
            }
        }
    }

    public static function unicode_urldecode($url)
    {
        preg_match_all('/%u([[:alnum:]]{4})/', $url, $a);
       
        foreach ($a[1] as $uniord)
        {
            $dec = hexdec($uniord);
            $utf = '';
           
            if ($dec < 128)
            {
                $utf = chr($dec);
            }
            else if ($dec < 2048)
            {
                $utf = chr(192 + (($dec - ($dec % 64)) / 64));
                $utf .= chr(128 + ($dec % 64));
            }
            else
            {
                $utf = chr(224 + (($dec - ($dec % 4096)) / 4096));
                $utf .= chr(128 + ((($dec % 4096) - ($dec % 64)) / 64));
                $utf .= chr(128 + ($dec % 64));
            }
           
            $url = str_replace('%u'.$uniord, $utf, $url);
        }
       
        return urldecode($url);
    }

    public static function escape2($str)
    {

        $strF = preg_replace('/0x[0-9a-fA-F]{6}/', '', $str);
        $strF = preg_replace('/u[0-9a-fA-F]{6}/', '', $strF);
        $strF = preg_replace('/[\x00-\x1F\x7F]/u', '', $strF);

        $strF = rawurldecode($strF);

        $strF = urldecode($strF);

        $strF = html_entity_decode($strF);

        $strF = self::unicode_urldecode($strF);

        $strF = rtrim($strF);

        $strF = strip_tags($strF, "<strong><em><span><table><br><p><h1><h2><h3><h4>");

        $strF = preg_replace('/(onabort|onactivate|onafterprint|onafterupdate|onbeforeactivate|onbeforecopy|onbeforecut|onbeforedeactivate|onbeforeeditfocus|onbeforepaste|onbeforeprint)=(["\']).*?(["\'])/im', '', $strF);
        $strF = preg_replace('/(onbeforeunload|onbeforeupdate|onblur|onbounce|oncellchange|onchange|onclick|oncontextmenu|oncontrolselect|oncopy|oncut|ondataavaible|ondatasetchanged)=(["\']).*?(["\'])/im', '', $strF);
        $strF = preg_replace('/(ondatasetcomplete|ondblclick|ondeactivate|ondrag|ondragdrop|ondragend|ondragenter|ondragleave|ondragover|ondragstart)=(["\']).*?(["\'])/im', '', $strF);
        $strF = preg_replace('/(ondrop|onerror|onerrorupdate|onfilterupdate|onfinish|onfocus|onfocusin|onfocusout|onhelp|onkeydown|onkeypress|onkeyup|onlayoutcomplete|onload)=(["\']).*?(["\'])/im', '', $strF);
        $strF = preg_replace('/(onlosecapture|onmousedown|onmouseenter|onmouseleave|onmousemove|onmoveout|onmouseover|onmouseup|onmousewheel|onpaste)=(["\']).*?(["\'])/im', '', $strF);
        $strF = preg_replace('/(style|onresize|onresizeend|onresizestart|onstart|onstop|onsubmit|onunload|background)=(["\']).*?(["\'])/im', '', $strF);
        return $strF;
    }
}
?>