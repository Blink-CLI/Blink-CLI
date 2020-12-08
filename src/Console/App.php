<?php

namespace Console;

use League\Container\Container;

class App extends Container
{
    public function __construct()
    {
        parent::__construct();

        $this->bootProviders();
    }

    /**
     * Starts the console application
     */
    public function run()
    {
        $this->get('console')->run();
    }

    /**
     * Sets up the service providers stored in this container
     */
    protected function bootProviders()
    {
        $this->addServiceProvider('Console\Providers\ConsoleServiceProvider');
        $this->addServiceProvider('Console\Providers\ConfigurationServiceProvider');
    }
}
