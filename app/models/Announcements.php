<?php 

defined('_ADF') or exit('Restricted Access');

require_once("./app/core/db.php");
require_once("./app/classes/Xss.php");

class Announcements {
    public static function getLastest() : array
    {
        $db = DB::instance();
        $notice = $db->run("SELECT * FROM pcu_anuncios ORDER BY fecha DESC, id DESC LIMIT 1;", [])->fetch(PDO::FETCH_ASSOC);
        $notice["id"] = XSS::escape($notice["id"]);
        $notice["fecha"] = XSS::escape($notice["fecha"]);
        $notice["imagen"] = XSS::escapeUrl($notice["imagen"]);
        $notice["desc"] = XSS::escape2($notice["desc"]);
        $notice["titulo"] = XSS::escape2($notice["titulo"]);
        return $notice;
    }
}
?>