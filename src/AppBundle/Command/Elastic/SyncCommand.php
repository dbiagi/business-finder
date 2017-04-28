<?php

namespace AppBundle\Command\Elastic;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class SyncCommand extends ContainerAwareCommand
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName('app:elastic:sync')
            ->setDescription('Sync elastic mapping.');
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);
        $conn = $this->getContainer()->get('app.elastica.connection');

        try {
            $conn->createIndex();
            $conn->createMapping();
            $this->addBusinessDocuments();

            $io->success('Index and mapping created and documents added.');
        } catch(\Exception $e){
            $io->error($e->getMessage());
        }
    }

    private function addBusinessDocuments(){
        $entities = $this
            ->getContainer()
            ->get('doctrine.orm.default_entity_manager')
            ->getRepository('AppBundle:Business')
            ->findAll();

        $this->getContainer()->get('app.elastica.connection')->addDocuments('business', $entities);
    }
}
