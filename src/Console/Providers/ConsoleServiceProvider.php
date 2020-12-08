<?php

namespace Console\Providers;

use Console\Commands\AbstractCommand;
use Exception;
use League\Container\ServiceProvider\AbstractServiceProvider;
use Symfony\Component\Console\Application;

class ConsoleServiceProvider extends AbstractServiceProvider
{
    protected $provides = [ 'console' ];

    public function register()
    {
        $container = $this->getContainer();
        $config    = $container->get('config');

        $name     = $config->get('name', 'UNKNOWN');
        $version  = $config->get('version', 'UNKNOWN');
        $commands = $config->get('commands', []);

        $application = new Application($name, $version);

        foreach ($commands as $command) {
            $commandClass = new $command;

            if (! $commandClass instanceof AbstractCommand) {
                throw new Exception(
                    'Command must extend "Console\Commands\AbstractCommand" to access the container!'
                );
            }

            $commandClass->setContainer($container);
            $application->add($commandClass);
        }

        $container->add('console', $application);
    }
}
