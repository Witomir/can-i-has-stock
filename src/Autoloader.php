<?php

/**
 * Bardzo uproszczony autoloader klas
 * Class Autoloader
 */
class Autoloader 
{
    /**
     * Zarejestrowane namespace'y w których będziemy szukać klas
     * @var array
     */
    protected $namespaces = [];

    /**
     * nazwa katalogu vendorów. To pole mogłoby mieć setter.
     * @var string
     */
    protected $vendorFolder = 'vendor';

    /**
     * Rozszerzenie plików
     * @var string
     */
    protected $fileExtension = '.php';

	/**
	 * rejestrujemy autoloader klas
	 */
	public function __construct()
	{
		spl_autoload_register(array($this, 'autload'));
	}

    public function registerNamespace($namespace){
        $this->namespaces[] = $namespace;
    }

	/**
	 * Autoloader klas. Na początek wystarczy
	 * @param string $class
	 */
	private function autload($class) {
		if(class_exists($class)) {
			return;
		}
        foreach ($this->namespaces as $namespace) {
            $class = str_replace($namespace . '\\', '', $class);
            $path = APP_PATH . $class . $this->fileExtension;
            $vendorPath = APP_PATH . $this->vendorFolder . DIRECTORY_SEPARATOR . $class . $this->fileExtension;
            if(file_exists($path)) {
                include_once $path;
            } elseif (file_exists($vendorPath)){
                include_once $vendorPath;
            }
        }

	}
}