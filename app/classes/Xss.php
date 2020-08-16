<?php
class XSS {
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
}
?>