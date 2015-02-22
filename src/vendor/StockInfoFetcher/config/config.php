<?php

    $CONFIG = [
        'gpw.pl' => [
            'url' => 'http://www.gpw.pl/ajaxindex.php?action=GPWQuotations&start=showTable&tab=all&lang=PL&full=1',
            'extra_curl_options' => [],
            'strategies' => [
                'data_fetch_strategy' => '\StockInfoFetcher\Data\Strategy\Fetch\GpwStrategy',
                'data_process_strategy' => '\StockInfoFetcher\Data\Strategy\Process\GpwStrategy',
                'data_hydration_strategy' => '\StockInfoFetcher\Data\Strategy\Hydration\GpwStrategy',
            ],
            'data_hydration' => [
                'factory' => '\StockInfoFetcher\Model\Factory\GpwStockFactory',
                'model' => '\StockInfoFetcher\Model\Stock',
            ],
        ],
    ];
