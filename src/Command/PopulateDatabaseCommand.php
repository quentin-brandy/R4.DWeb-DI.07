<?php

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use App\Entity\Lego;
use Doctrine\ORM\EntityManagerInterface;

#[AsCommand(
    name: 'app:populate-database',
    description: 'Add a short description for your command',
)]
class PopulateDatabaseCommand extends Command
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager) 
    {
        $this->entityManager = $entityManager;
        parent::__construct();
    }


    protected function configure(): void
    {
        $this->addArgument('jsonFile', InputArgument::REQUIRED, 'Path to the JSON file');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $jsonFilePath = $input->getArgument('jsonFile');

        if (!file_exists($jsonFilePath)) {
            $io->error('Ce JSON existe pas');
            return Command::FAILURE;
        }

        $jsonContents = file_get_contents($jsonFilePath);
        $legoData = json_decode($jsonContents , true);

        if (!$legoData) {
            $io->error('Error decoding json');
            return Command::FAILURE;

        }

        foreach ($legoData as $item) {
            $lego = new Lego($item['id']);
            $lego->setName($item['name']);
            $lego->setCollection($item['collection']);
            $lego->setDescription($item['description']);
            $lego->setPrice($item['price']);
            $lego->setPieces($item['pieces']);
            $lego->setBoxImage($item['images']['box']);
            $lego->setLegoImage($item['images']['bg']);
            // Utilisation du service pour insérer le Lego
            $this->entityManager->persist($lego);
        }
       
        
        $this->entityManager->flush();
        $io->success('you did it');

        return Command::SUCCESS;
    }
}
