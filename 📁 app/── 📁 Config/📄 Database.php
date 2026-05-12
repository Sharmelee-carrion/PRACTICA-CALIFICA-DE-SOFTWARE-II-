<?php
namespace App\Config;

use PDO;
use PDOException;

class Database {
    private const DB_HOST = 'localhost';
    private const DB_NAME = 'proyecto_php_mejorado';
    private const DB_USER = 'root';
    private const DB_PASS = '';
    private const DB_CHARSET = 'utf8mb4';

    protected PDO $conexion;

    public function __construct() {
        $this->conectar();
    }

    private function conectar(): void {
        try {
            $dsn = "mysql:host=" . self::DB_HOST . ";dbname=" . self::DB_NAME . ";charset=" . self::DB_CHARSET;
            $opciones = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false
            ];

            $this->conexion = new PDO($dsn, self::DB_USER, self::DB_PASS, $opciones);
        } catch (PDOException $e) {
            die("❌ Error de conexión: " . $e->getMessage());
        }
    }
}
?>
