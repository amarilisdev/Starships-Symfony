<?php

namespace App\Controller;

use App\Repository\StarshipRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class StarshipApiController extends AbstractController
{
    #[Route('/api/starships', methods: ['GET'])]
    public function getCollection(StarshipRepository $repository): Response
    {

       $starships = $repository->findAll();


        return $this->json($starships);
    }

    #[Route('/api/starships/{id<\d+>}', methods: ['GET'])]
    public function get(int $id, StarshipRepository $repository): Response 
    {
        $starship = $repository->find($id);

        if (!$starship) {
            throw $this->createNotFoundException('Starship not found');
        }

         // Return the starship as JSON

        return $this->json($starship);
    }


    
}