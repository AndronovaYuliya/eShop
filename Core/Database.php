<?php

namespace Core;

use PDO;
use PDOException;
use CostumLogger\CostumLogger;

/**
 * Class Database
 * @package Core
 */
class Database
{
    use TSingletone;

    private static $_pdo;
    private static $_host;
    private static $_username;
    private static $_password;
    private static $_database;
    private static $_charset;
    private static $_dsn;
    private static $_options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];

    /**
     * Database constructor.
     */
    private function __construct()
    {
        $config = parse_ini_file(dirname(__FILE__, 2) . '/config/config.ini');

        self::$_host = $config['host'];
        self::$_username = $config['username'];
        self::$_password = $config['password'];
        self::$_database = $config['database'];
        self::$_charset = $config['charset'];
        self::$_dsn = "mysql:host=" . self::$_host . ";dbname=" . self::$_database . ";charset=" . self::$_charset;
        try {
            self::$_pdo = new PDO(self::$_dsn, self::$_username, self::$_password, self::$_options);
        } catch (PDOException $exception) {
            die('Подключение не удалось: ' . $exception->getTraceAsString());
        }
    }

    // Get mysqli connection

    /**
     * @return PDO
     */
    public static function getConnection(): PDO
    {
        self::getInstance();
        return self::$_pdo;
    }

    /**
     * @return void
     */
    public static function createTables(): void
    {
        /*
         *
         * $dbh->query("create database ".self::$_database);
         * $dbh->query("use ".self::$_database);
         *
        */
        self::createTable('attributes');
        self::createTable('attributes_values');
        self::createTable('categories');
        self::createTable('categories_attributes');
        self::createTable('clients');
        self::createTable('images');
        self::createTable('orders');
        self::createTable('key_words');
        self::createTable('products');
        self::createTable('products_key_words');
        self::createTable('comments');
        self::createTable('additionals');
        self::createTable('products_images');
        self::createTable('users');
        self::createTable('sessions');
    }

    /**
     * @param $filename
     */
    private static function createTable($filename): void
    {
        $sql = file_get_contents(dirname(__FILE__, 2) . '/database/' . $filename . '.sql');
        self::$_pdo->exec($sql);
    }

    /**
     * @param $fakerMethod
     * @param string $sql
     * @param int $count = 1
     * @return void
     */
    public static function addFakerData($fakerMethod, string $sql, int $count = 1): void
    {
        $faker = new FakerData();
        for ($i = 0; $i < $count; $i++) {
            $data = $faker->$fakerMethod();
            $stmt = self::$_pdo->prepare($sql);
            if ($stmt !== false) {
                $stmt->execute($data);
                $stmt->fetchAll();
            }
        }
    }

    /**
     * @param string $sql
     * @param array $data
     * @return void
     */
    public static function addData(string $sql, array $data): void
    {
        $stmt = self::getConnection()->prepare($sql);
        if ($stmt !== false) {
            $stmt->execute($data);
            $stmt->fetchAll();
        }
    }

    /**
     * @param string $sql
     * @return array
     */
    public static function query(string $sql): array
    {
        self::getInstance();
        $data = self::$_pdo->query($sql)->fetchAll();

        return $data;
    }

    /**
     * @param string $sql
     * @param array $data
     * @return array
     */
    public static function queryData(string $sql, array $data): array
    {
        $stmt = self::getConnection()->prepare($sql);
        if ($stmt !== false) {
            $stmt->execute($data);
            return $stmt->fetchAll();
        }
    }
}