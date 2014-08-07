<?php

namespace MyDev\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class Init extends Command
{
    protected function configure()
    {
        $this
            ->setName('init')
            ->setDescription('Create a mydev.yml config if one does not already exist.')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $cwd = getcwd();
        if (!file_exists($cwd . '/mydev.yml')) {
            copy(__DIR__ . '/../../mydev.yml.dist', $cwd . '/mydev.yml');
        }
    }
}
