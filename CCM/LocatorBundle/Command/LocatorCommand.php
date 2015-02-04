<?php

namespace CCM\LocatorBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class LocatorCommand extends ContainerAwareCommand
{
   protected function configure()
    {
        $this
            ->setDefinition(array(
                new InputArgument('query', InputArgument::REQUIRED, 'Any string you want.'),
            ))
            ->setName('ccm:locator')
            ->setDescription('locator')
            ->setHelp(<<<EOF
The <info>%command.name%</info> gets all adresses from any locator implemented.
EOF
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $result = $this->getContainer()->get('ccm_locator.chained_locator')->searchByKeyword($input->getArgument('query'));
        var_dump($result);
    }
}
