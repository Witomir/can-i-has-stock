<?php


namespace StockInfoFetcher;

use StockInfoFetcher\Data\Filter;

/**
 * API pobierające dane o spółkach
 * Class Api
 * @package StockInfoFetcher
 */
class Api {

    /**
     * źródło danych - strona gpw.pl
     */
    const SOURCE_GPW = 'gpw.pl';

    /**
     * Dostępne źródła danych
     * @var array
     */
    protected static $availibleDataSources = [
        self::SOURCE_GPW,
    ];

    /**
     * Aktualne źródło danych
     * @var string
     */
    protected $dataSource;

    /**
     * Ustawia źródło danych z którego będą zaciągane informacje o spółkach
     * @param $source
     */
    public function setSource($source)
    {
        if(in_array($source, self::$availibleDataSources)) {
            $this->dataSource = $source;
        } else {
            throw new \InvalidArgumentException('Próba ustawienia nieobsługiwanego źródła danych');
        }
    }

	/**
	 * Pobiera dane o wszystkich spółkach
	 * @return \StockInfoFetcher\Model\Stock[]
	 */
	protected function getData()
	{
        $this->validateConfiguration();
        $config = Config::getInstance()->get($this->dataSource);
		$strategies = $config['strategies'];

		$dataFetchStrategy = $strategies['data_fetch_strategy'];
		$dataProcessStrategy = $strategies['data_process_strategy'];
		$dataHydrationStrategy = $strategies['data_hydration_strategy'];

		$dataSource = new \StockInfoFetcher\Data\Source();
		$data = $dataSource->setConfig($config)
			->setFetchStrategy(new $dataFetchStrategy())
			->setProcessingStrategy(new $dataProcessStrategy())
			->setHydrationStrategy(new $dataHydrationStrategy())
			->fetchData();

		return $data;
    }

    /**
     * Pobiera i filtruje dane spółek
     * @param string $filterName po jakim polu należy filtrować
     * @param array $filterValues wartości filtrów
	 * @return \StockInfoFetcher\Model\Stock[]
     */
    public function getFilteredStocks($filterName, $filterValues)
    {
        $data = $this->getData();
        $dataFilter = new Filter();
		$dataFilter->setData($data);
		return $dataFilter->filterBy($filterName, $filterValues);

    }

    /**
     * Pobiera dane wszystkich spółek
	 * @return \StockInfoFetcher\Model\Stock[]
     */
    public function getAllStocks(){
        return $this->getData();
    }

    protected function validateConfiguration()
    {
        if(is_null($this->dataSource)) {
            throw new \Exception('Ustaw źródło danych przed wywołaniem pobierania danych');
        }
    }
}