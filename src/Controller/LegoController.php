<?php


/* indique où "vit" ce fichier */
namespace App\Controller;


/* indique l'utilisation du bon bundle pour gérer nos routes */


use stdClass;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Lego;
use Symfony\Component\HttpFoundation\Response;
/* le nom de la classe doit être cohérent avec le nom du fichier */



class LegoController extends AbstractController
{
    private  $legos = [];

    public function __construct()
    {
        $dataFilePath = __DIR__ . '/../data.json';
        $jsonContents = file_get_contents($dataFilePath);
        $legoData = json_decode($jsonContents);

        foreach ($legoData as $data) {
            $lego = new Lego(  $data->id,
            $data->name,
            $data->collection);

            $lego->setDescription($data->description);
            $lego->setPrice($data->price);
            $lego->setPieces($data->pieces);
            $lego->setBoxImage($data->images->box);
            $lego->setLegoImage($data->images->bg);


            $this->legos[] = $lego;
        }
    }


   #[Route('/', )]
   public function home()
   {
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
    return $this->render('lego.html.twig', [
        "lego" => $cocci,
    ]);

   }
   
   #[Route('/me', )]
   public function me()
   {
       die("Quentin Brandy");
   }
   
}
