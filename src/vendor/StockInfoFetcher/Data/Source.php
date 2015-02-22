<?php
    namespace StockInfoFetcher\Data;

    use StockInfoFetcher\Data\Strategy\Fetch\DataFetchingStrategyInterface;
    use StockInfoFetcher\Data\Strategy\Hydration\DataHydrationStrategyInterface;
    use StockInfoFetcher\Data\Strategy\Process\DataProcessStrategyInterface;

    /**
     * Klasa steu
     * Class Source
     * @package StockInfoFetcher\Data
     */
    class Source
    {

        /**
         * @var array
         */
        protected $config;

        /**
         * @var DataFetchningStrategyInterface
         */
        protected $fetchStrategy;

        /**
         * @var DataProcessStrategyInterface
         */
        protected $processStrategy;

        /**
         * @var DataHydrationStrategyInterface
         */
        protected $hydrationStrategy;

        /**
         * Pobiera dane i przetwarza je do użytecznej postaci - obiektów Stock
         * @return mixed
         */
        public function fetchData()
        {
            if (!is_null($this->config['url'])) {
                $rawData = $this->fetchStrategy->setConfig($this->config)->fetchData();
                return $this->processResult($rawData);
            }
        }

        /**
         * @param DataFetchingStrategyInterface $strategy
         * @return Source
         */
        public function setFetchStrategy(DataFetchingStrategyInterface $strategy)
        {
            $this->fetchStrategy = $strategy;
            return $this;
        }

        /**
         * @param DataHydrationStrategyInterface $hydrationStrategy
         * @return Source
         */
        public function setHydrationStrategy(DataHydrationStrategyInterface $hydrationStrategy)
        {
            $this->hydrationStrategy = $hydrationStrategy;
            return $this;
        }

        /**
         * @param DataProcessStrategyInterface $hydrationStrategy
         * @return Source
         */
        public function setProcessingStrategy(DataProcessStrategyInterface $hydrationStrategy)
        {
            $this->processStrategy = $hydrationStrategy;
            return $this;
        }

        /**
         * Przetwarza dane do postaci obiektów Stock
         * @param $rawData
         * @return mixed
         */
        protected function processResult($rawData)
        {
            $parsedData = $this->processStrategy->setConfig($this->config)->processData($rawData);
            return $this->hydrationStrategy->setConfig($this->config)->hydrate($parsedData);
        }

        /**
         * @param array $config
         * @return $this
         */
        public function setConfig($config)
        {
            $this->config = $config;
            return $this;
        }


    }