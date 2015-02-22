<?php
	$delim = ';';
    if(!empty($stocks)){
        foreach ($stocks as $stock) {
            /** @var stock \Gpw\Model\Stock */
            echo implode($delim, $stock->getCsvData()) . PHP_EOL;
        }
    } else {
        echo "Wybrana(e) spółki nie zostały odnalezione";
    }
