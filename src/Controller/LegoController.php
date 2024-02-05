<?php


/* indique où "vit" ce fichier */
namespace App\Controller;


/* indique l'utilisation du bon bundle pour gérer nos routes */


use stdClass;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Lego;
use Symfony\Component\HttpFoundation\Response;
use App\Service\CreditsGenerator;
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

   #[Route('/', )]
   public function home()
   {
    return $this->render('lego.html.twig', [
        "legos" => $this->legos,
    ]);
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
   


   }
   
   #[Route('/me', )]
   public function me()
   {
       die("Quentin Brandy");
   }

   

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
   

