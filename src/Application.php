<?php

    namespace Gpw;


    use Gpw\Helper\ArgumentsHelper;

    /**
     * Główna klasa aplikacji
     * Class Application
     * @package Gpw
     */
    class Application
    {

        /**
         * @var \Gpw\Config
         */
        protected $config;

        /**
         * Argumenty z linii komend
         * @var array
         */
        protected $arguments;

        /**
         * Pobiera dane o spółkach i wyświetla je w wybrany sposób
         */
        public function run()
        {
            $choosenStocks = $this->prepareArguments();
            $output = '';
            if (count($choosenStocks) < 1) {
                $output = $this->renderHelp();
            } else {
                $stocks = $this->getData($choosenStocks);
                $output = $this->renderResults($stocks);
            }
            $this->returnResponse($output);
        }

        /**
         * Przetwarza symbole spółek które należy wyświetlić
         * @return array
         */
        private function prepareArguments()
        {
            $argHelper = new ArgumentsHelper();
            $stocks = $argHelper->getUniqueArguments($this->arguments);
            foreach ($stocks as &$stock) {
                $stock = strtoupper($stock);
            }

            return $stocks;
        }

        /**
         * @param Config $config
         * @return $this
         */
        public function setConfig(Config $config)
        {
            $this->config = $config;
            return $this;
        }

        /**
         * @param $arguments
         * @return $this
         */
        public function setArguments($arguments)
        {
            $this->arguments = $arguments;
            return $this;
        }

        /**
         * Pobiera i filtruje dane o spółkach
         * @param $stocks array filtr spółek, z argumentów skryptu
         * @return \StockInfoFetcher\Model\Stock[]
         */
        protected function getData($stocks)
        {
            $api = new \StockInfoFetcher\Api();
            $api->setSource($api::SOURCE_GPW);
            return $api->getFilteredStocks('abbreviation', $stocks);
        }

        /**
         * Renderuje widok aplikacji
         * @param \StockInfoFetcher\Model\Stock[] $stocks
         * @return string
         */
        protected function renderResults($stocks)
        {
            $viewModel = new \Gpw\View\Model();
            $viewModel->setVariable('stocks', $stocks);
            $viewModel->setTemplateName($this->config->get('view')['stocks_template']);
            $viewRenderer = new \Gpw\View\Renderer();
            return $viewRenderer->render($viewModel);
        }

        /**
         * Renderuje widok pomocy aplikacji
         * @return string
         */
        protected function renderHelp()
        {
            $viewModel = new \Gpw\View\Model();
            $viewModel->setTemplateName($this->config->get('view')['help_template']);
            $viewRenderer = new \Gpw\View\Renderer();
            return $viewRenderer->render($viewModel);
        }

        /**
         * Wypluwa na wyjście efekt działania aplikacji
         * Można by coś tutaj kombinować z wyjściem, bo na konsoli windowsowe kodowanie UTF-8 powoduje "krzaki"
         * @param string $output
         */
        protected function returnResponse($output)
        {
            echo $output;
        }
    }