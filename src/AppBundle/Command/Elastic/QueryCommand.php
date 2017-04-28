<?php

namespace AppBundle\Command\Elastic;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class QueryCommand extends ContainerAwareCommand
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName('app:elastic:query')
            ->addArgument('type', InputArgument::REQUIRED)
            ->addArgument('query', InputArgument::OPTIONAL)
            ->setDescription('Query elastic documents.');
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);
        $conn = $this->getContainer()->get('app.elastica.connection');

        try {
            $data = $conn->query($input->getArgument('type'), $input->getArgument('query'));

            dump($data);
        } catch(\Exception $e){
            $io->error($e->getMessage());
        }
    }
}
