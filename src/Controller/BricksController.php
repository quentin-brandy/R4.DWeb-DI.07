<?php

namespace App\Controller;

use App\Entity\BrickCategory;
use App\Repository\BrickCategoryRepository;
use App\Repository\BricksRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;



class BricksController extends AbstractController
{
        public function __construct(private BricksRepository $legoRepository, private BrickCategoryRepository $bricksCollectionRepository) 
    {
      
        
    }
    #[Route('/bricks', name: 'app_bricks')]
           public function BricksAll(): Response
           {  
          return $this->render("bricks/index.html.twig", [
                   'bricks' => $this->legoRepository->findAll(),
                   'collections' => $this->bricksCollectionRepository->findAll(),
                       
               ]);
           }

           #[Route('/bricks/{name}', 'bricks_category')]
           public function category(BrickCategory $collection): Response
           {
               $bricks = $collection->getBricks();
               return $this->render('bricks/index.html.twig', ['bricks' => $bricks ,  'collections' => $this->bricksCollectionRepository->findAll(),]);
           }
}
