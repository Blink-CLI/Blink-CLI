<?php

namespace Console\Commands;

use Console\App;
use Symfony\Component\Console\Command\Command;

abstract class AbstractCommand extends Command
{
    protected App $container;

    public function getContainer(): App
    {
        return $this->container;
    }

    public function setContainer(App $container)
    {
        $this->container = $container;
    }
}
