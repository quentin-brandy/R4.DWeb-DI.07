<?php


/* indique où "vit" ce fichier */
namespace App\Controller;


/* indique l'utilisation du bon bundle pour gérer nos routes */


use stdClass;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Lego;
use Symfony\Component\HttpFoundation\Response;
use App\Service\CreditsGenerator;
use App\Service\DatabaseInterface;
use App\Repository\LegoRepository;
use App\Entity\LegoCollection;
use App\Repository\LegoCollectionRepository;



/* le nom de la classe doit être cohérent avec le nom du fichier */



class LegoController extends AbstractController
{
    private $legos = [];

    public function __construct()
    {
      
        $dataFilePath = __DIR__ . '/../data.json';
        $jsonContents = file_get_contents($dataFilePath);
        $legoData = json_decode($jsonContents);

        foreach ($legoData as $data) {
            $lego = new Lego(
                $data->id,
                $data->name,
                $data->collection
            );

            $lego->setDescription($data->description);
            $lego->setPrice($data->price);
            $lego->setPieces($data->pieces);
            $lego->setBoxImage($data->images->box);
            $lego->setLegoImage($data->images->bg);

            $this->legos[] = $lego;
        }
        
    }

      
       #[Route('/', name: 'home')]
           public function homeAll(LegoRepository $legoRepository): Response
           {  
               $legos = $legoRepository->findAll();
    
            // $collections = $legoRepository->findAllCollections();
               return $this->render("lego.html.twig", [
                   'legos' => $legos,
                //    'collections' => $collections
               ]);
           }
   
   #[Route('/me', )]
   public function me()
   {
       die("Quentin Brandy");
   }

   
// #[Route('/{collection}', name: 'filter_by_collection')]
// public function filterByCollection(string $collection, LegoRepository $legoRepository): Response
// {  
//     $legos = $legoRepository->findByCollection($collection = ucwords(str_replace('_',' ', $collection )));
//     $collections = $legoRepository->findAllCollections();
//     return $this->render("lego.html.twig", [
//         'legos' => $legos,
//         'collections' =>$collections
//     ]);
// }


    #[Route('/credits', 'credits')]
    public function credits(CreditsGenerator $credits): Response
    {
        return new Response($credits->getCredits());
    }


    #[Route('/legos')]
    public function lego(DatabaseInterface $database): Response
    {
        $legos = $database->getAllLegos();
        return $this->render('lego.html.twig', ['legos' => $legos]);
    }
    
    #[Route('/test' , name: 'create_lego')]
    public function test(EntityManagerInterface $entityManager): Response
    {
        $l = new Lego(1234);
        $l->setName("un beau Lego");
        $l->setDescription("eeeeeeeeeeeeeeeeeeeeeeeeeee");
        $l->setPrice("1220.02");
        $l->setPieces("200");
        $l->setBoxImage("Lego espace");
        $l->setLegoImage("Lego espace");
      

         $entityManager->persist($l);

   
         $entityManager->flush();
 
         return new Response('Saved new product with id '.$l->getId());
    }


}
   
