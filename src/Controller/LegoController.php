<?php


/* indique où "vit" ce fichier */
namespace App\Controller;


/* indique l'utilisation du bon bundle pour gérer nos routes */

<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 9ef9968c2642081d49aea0fe0fd3fedcd1b81a44

use stdClass;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Lego;
<<<<<<< HEAD
use Symfony\Component\HttpFoundation\Response;
use App\Service\CreditsGenerator;
/* le nom de la classe doit être cohérent avec le nom du fichier */



class LegoController extends AbstractController
{
    private $legos = [];
=======
=======
use stdClass;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;

>>>>>>> f1611ec2388e6b7a8453045dc00ecaca5ca41d71
use Symfony\Component\HttpFoundation\Response;
/* le nom de la classe doit être cohérent avec le nom du fichier */


<<<<<<< HEAD

class LegoController extends AbstractController
{
    private  $legos = [];
>>>>>>> 9ef9968c2642081d49aea0fe0fd3fedcd1b81a44

    public function __construct()
    {
        $dataFilePath = __DIR__ . '/../data.json';
        $jsonContents = file_get_contents($dataFilePath);
        $legoData = json_decode($jsonContents);

        foreach ($legoData as $data) {
<<<<<<< HEAD
            $lego = new Lego(
                $data->id,
                $data->name,
                $data->collection
            );
=======
            $lego = new Lego(  $data->id,
            $data->name,
            $data->collection);
>>>>>>> 9ef9968c2642081d49aea0fe0fd3fedcd1b81a44

            $lego->setDescription($data->description);
            $lego->setPrice($data->price);
            $lego->setPieces($data->pieces);
            $lego->setBoxImage($data->images->box);
            $lego->setLegoImage($data->images->bg);

<<<<<<< HEAD
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
=======

            $this->legos[] = $lego;
        }
    }
=======
class LegoController extends AbstractController
{
   // L’attribute #[Route] indique ici que l'on associe la route
   // "/" à la méthode home pour que Symfony l'exécute chaque fois
   // que l'on accède à la racine de notre site.
>>>>>>> f1611ec2388e6b7a8453045dc00ecaca5ca41d71

>>>>>>> 9ef9968c2642081d49aea0fe0fd3fedcd1b81a44

   #[Route('/', )]
   public function home()
   {
<<<<<<< HEAD
    return $this->render('lego.html.twig', [
        "legos" => $this->legos,
    ]);
=======
>>>>>>> 9ef9968c2642081d49aea0fe0fd3fedcd1b81a44
    $response = new Response(
        'get Lost',
        Response::HTTP_OK,
        ['content-type' => 'text/html'] 
    );
    $cocci = new stdClass();

    $cocci->collection = "Creator Expert";
    $cocci->id = 10252;
    $cocci->name = "La coccinelle Volkwagen";
    $cocci->description = "Construis une réplique LEGO® Creator Expert de l'automobile la plus populaire au monde. Ce magnifique modèle LEGO est plein de détails authentiques qui capturent le charme et la personnalité de la voiture, notamment un coloris bleu ciel, des ailes arrondies, des jantes blanches avec des enjoliveurs caractéristiques, des phares ronds et des clignotants montés sur les ailes.";
    $cocci->price = 94.99;
    $cocci->pieces = 1167;
    $cocci->boxImage = "LEGO_10252_Box.png";
    $cocci->legoImage = "LEGO_10252_Main.jpg";
<<<<<<< HEAD
   

=======
    return $this->render('lego.html.twig', [
        "lego" => $cocci,
    ]);
>>>>>>> 9ef9968c2642081d49aea0fe0fd3fedcd1b81a44

   }
   
   #[Route('/me', )]
   public function me()
   {
       die("Quentin Brandy");
   }
<<<<<<< HEAD

   

   #[Route('/{collection}', name: 'filter_by_collection' , requirements:['collection' => 'creator|starwars|expert|creator_expert'])]
public function filter($collection): Response
{
    return $this->render('lego.html.twig', [
        "legos" => $this->filtercollection($collection),
    ]);
}
    #[Route('/credits', 'credits')]
    public function credits(CreditsGenerator $credits): Response
    {
        return new Response($credits->getCredits());
    }
}
   

=======
<<<<<<< HEAD
   
=======
>>>>>>> f1611ec2388e6b7a8453045dc00ecaca5ca41d71
}
>>>>>>> 9ef9968c2642081d49aea0fe0fd3fedcd1b81a44
