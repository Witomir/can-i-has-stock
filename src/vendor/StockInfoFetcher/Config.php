<?php
    namespace StockInfoFetcher;

    /**
     * Klasa wspomagająca pobieranie konfiguracji aplikacji
     * Class Config
     * @package StockInfoFetcher
     */
    class Config
    {
        /**
         * Przechowuje instancję klasy
         * @var Config
         */
        protected static $instance;

        /**
         * Przechowuje konfigurację aplikacji
         * @var array
         */
        protected static $config;

        /**
         * Wczytuje konfigurację aplikacji
         */
        protected function __construct()
        {
            require_once realpath(__DIR__) . '/config/config.php';
            self::$config = $CONFIG;
        }

        /**
         * Pobiera instancję tej klasy
         *
         * @return Config instancja klasy Config
         */
        public static function getInstance()
        {
            if (!self::$instance) {
                self::$instance = new Config();
            }
            return self::$instance;
        }

        /**
         * Zwraca wartość spod przekazanego klucza
         *
         * @param string $index
         * @return mixed zawartość configa pod kluczem $indeks
         */
        public function get($index)
        {
            return self::$config[$index];
        }
    }
