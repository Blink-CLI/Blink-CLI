<?php

namespace Console\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SayHelloCommand extends AbstractCommand
{
    protected function configure()
    {
        $this->setName('say:hello')
             ->setDescription('Outputs a simple hello world message.')
             ->addArgument('name', InputArgument::OPTIONAL, 'The name of the person you would like to say hello to.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln("\n\n");

        if ($name = $input->getArgument('name')) {
            $output->writeln("<info>Hello, {$name}!</info>");
        } else {
            $output->writeln('<info>Hello world!</info>');
        }

        $output->writeln("\n\n");

        return Command::SUCCESS;
    }
}
