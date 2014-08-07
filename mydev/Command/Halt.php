<?php

namespace MyDev\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class Halt extends Command
{
    protected function configure()
    {
        $this
            ->setName('vm:halt')
            ->setDescription('vagrant halt the mydev vm')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        chdir(__DIR__ . '/../../');

        if (file_exists(__DIR__ . '/../../../../../mydev.yml')) {
            system('vagrant halt');
        } else {
            echo __DIR__ . "/../../../../../mydev.yml' does not exist";
        }
    }
}
