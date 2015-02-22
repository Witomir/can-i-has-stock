<?php

    namespace StockInfoFetcher\Data\Strategy\Process;


    class GpwStrategy implements DataProcessStrategyInterface
    {

        /**
         * @var array
         */
        protected $config;

        /**
         * @param $config
         * @return $this
         */
        public function setConfig($config)
        {
            $this->config = $config;
            return $this;
        }

        /**
         * Nazwa elementu który przechowuje wiersze
         * Używana by odfiltrować niepotrzebne wiersze <th>
         * @var string
         */
        protected $rowNodeName = 'tr';

        /**
         * XPath do elementu, który zawiera wiersze tabeli z danymi
         * @var string
         */
        protected $tableContentXPath = '//response';

        /**
         * Ilość komórek, jakimi opisane są spółki. Używana by odfiltrować niepotrzebne wiersze - czyli
         * takie które nie są informacjami o spółkach
         * @var int
         */
        protected $correctRowCelllCount = 23;

        /**
         * Symbol który występuje w źródle danych i symbolizuje pustą komórkę
         * @var string
         */
        protected $emptyFieldValue = '---';

        /**
         * Przetwarzanie HTML na array który zawiera asocjacyjne arraye symbolizujące dane kolejnych spółek
         * @param $rawHtml
         * @return array
         */
        public function processData($rawHtml)
        {
            $tableRows = $this->getTableRows($rawHtml);
            if (!is_null($tableRows)) {
                return $this->convertRowsToArrays($tableRows);
            }
            return [];
        }

        /**
         * Pobiera tylko wiersze tabeli z danymi z całego przekazanego metodzie HTML'a
         * @param string $rawHtml
         * @return \DOMNodeList|null
         */
        protected function getTableRows($rawHtml)
        {
            $htmlDocument = new \DOMDocument();
            @$htmlDocument->loadHTML($rawHtml);
            $queryableDom = new \DOMXPath($htmlDocument);
            $tableContent = $queryableDom->query($this->tableContentXPath)->item(0);
            /** @var \DOMNodeList $tableRows */
            if (!is_null($tableContent)) {
                return $tableContent->childNodes;
            }
            return null;
        }

        /**
         * Przetwarza węzły HTML z danymi o spółkach na tablice asocjacyjne
         * @param \DOMNodeList $tableRows
         * @return array
         */
        protected function convertRowsToArrays($tableRows)
        {
            $stockCompanies = array();
            $i = 0;
            foreach ($tableRows as $trRow) {
                /** @var \DOMElement $trRow */
                if ($trRow->hasChildNodes()
                    && $trRow->nodeName === $this->rowNodeName
                    && $trRow->childNodes->length === $this->correctRowCelllCount
                ) {
                    foreach ($trRow->childNodes as $key => $tdCell) {
                        $cellContent = $tdCell->textContent;
                        if ($cellContent === $this->emptyFieldValue) {
                            $cellContent = '';
                        }
                        $stockCompanies[$i][] = $cellContent;
                    }
                    $i++;
                }
            }
            return $stockCompanies;
        }

    }