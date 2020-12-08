<?php

namespace Console\Providers;

use Atomastic\Arrays\Arrays;
use Exception;
use League\Container\ServiceProvider\AbstractServiceProvider;

/**
 * Provides an easy-to-use configuration object.
 */
class ConfigurationServiceProvider extends AbstractServiceProvider
{
    protected $provides = [ 'config' ];

    public function register()
    {
        $configFile = __DIR__ . '/../../../config/console.php';

        if (! file_exists($configFile)) {
            throw new Exception('Configuration file does not exist!');
        }

        $this->getContainer()->add(
            'config',
            Arrays::create(require_once $configFile)
        );
    }
}
