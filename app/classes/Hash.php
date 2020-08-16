<?php
class Hash
{
    public function eobf($string, $method = 1) // esta funcion lo que hace es obfuscar y deobfuscar las strings
    { // (va a ser util para la parte de los tokens)
        if ($method) {
            return base64_encode(str_rot13(gzdeflate($string, 9)));
        } else {
            return @gzinflate(str_rot13(base64_decode($string)));
        }
    }

     public function ehtml($strarr) { // para limpiar el string
        if(is_array($strarr)) {
            foreach($strarr as $key => $val) {
                $vars[$key] = htmlentities($val);
            }
            return $vars;
        } else {
            return htmlentities($strarr);
        }
     }
}
?>