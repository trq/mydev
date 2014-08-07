<?php

namespace MyDev\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class Vagrant extends Command
{
    protected function configure()
    {
        $this
            ->setName('vagrant')
            ->addArgument('cmd', InputArgument::OPTIONAL, 'Any arguments to pass to vagrant.')
            ->setDescription('Execute vagrant commands')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        chdir(__DIR__ . '/../../');

        if ($input->getArgument('cmd')) {
            passthru('vagrant ' . $input->getArgument('cmd'));
        } else {
            passthru('vagrant');
        }
    }
}
