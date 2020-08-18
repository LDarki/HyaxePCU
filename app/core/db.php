<?php 

defined('_ADF') or exit('Restricted Access');

define('DB_HOST', 'localhost');
define('DB_NAME', 'hyaxev');
define('DB_USER', 'root');
define('DB_PASS', '1');
define('DB_CHAR', 'utf8');

class DB
{
    protected static $instance;
    protected $pdo;

    public function __construct() {
        $opt  = array(
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            PDO::ATTR_EMULATE_PREPARES   => FALSE,
        );
        $dsn = 'mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset='.DB_CHAR;
        $this->pdo = new PDO($dsn, DB_USER, DB_PASS, $opt);

    }

    public static function instance()
    {
        if (self::$instance === null)
        {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function __call($method, $args)
    {
        return call_user_func_array(array($this->pdo, $method), $args);
    }

    public function run($sql, $args = [])
    {
        if (!$args)
        {
             return $this->query($sql);
        }
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($args);
        return $stmt;
    }
}
?>