<?php

namespace App\Controller;

use App\Entity\Ticket;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class TicketController extends AbstractController
{
    /**
     * @Route("/ticket", name="ticket")
     */
    public function index(): Response
    {
        return $this->render('ticket/index.html.twig', [
            'controller_name' => 'TicketController',
        ]);
    }

/**
* @Route("/ticket1", name="api_auteur", methods={"GET"})
*/
public function afficher( SerializerInterface $serializer)
{
    $auteurs = $this->getDoctrine()
        ->getRepository(Ticket::class)
        ->findAll();
    $result = $serializer->serialize($auteurs, 'json', []);

    return new JsonResponse($result, 200, [], true);


}
/**
 * @Route("/tickdec", name="tickdec", methods={"GET"})
 */
public function aff(){
    $url = "http://127.0.0.1:8000/ticket1";
    $json = file_get_contents($url);
    $json_data = json_decode($json, true);
    foreach ($json['1'] as $idTicket)
    {
        echo "idTicket:". $idTicket['un'] ."\n";
    };

}

}
