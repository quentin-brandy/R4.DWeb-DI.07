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

  
    public function filtercollection($collec){
       $collections = [];
   $collec = ucwords(str_replace('_',' ',$collec ));
        foreach($this->legos as $lego){
            if($lego->getCollection() == $collec){
                $collections[] = $lego;
             
            }
          
        }
        return ($collections);
       }

       public $coll;
       
  

    
       #[Route('/', )]
       public function homeAll(DatabaseInterface $lego): Response
       {  
   
           $this->coll = $lego->getAllCollection();
           // dump($this->coll);
           return $this->render("lego.html.twig", [
               'legos' => $lego->getAllLegos(),
               'collection' =>$lego->getAllCollection(),
           ]);
       }
   
   #[Route('/me', )]
   public function me()
   {
       die("Quentin Brandy");
   }

   

   #[Route('/{collection}', name: 'filter_by_collection' , requirements:['collection' => 'creator|starwars|expert|creator_expert|harry_potter'])]
public function filter(DatabaseInterface $database , $collection): Response
{
        $legos = $database->getLegosByCollection($collection = ucwords(str_replace('_',' ', $collection )));
        return $this->render('lego.html.twig', ['legos' => $legos]);
}

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
        $l->setCollection("Lego espace");
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
   
