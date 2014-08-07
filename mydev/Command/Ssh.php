<?php

namespace MyDev\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class Ssh extends Command
{
    protected function configure()
    {
        $this
            ->setName('vm:ssh')
            ->setDescription('ssh into the mydev vm')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        chdir(__DIR__ . '/../../');

        passthru('vagrant ssh');
    }
}
