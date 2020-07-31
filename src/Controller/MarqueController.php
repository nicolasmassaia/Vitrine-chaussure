<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ChaussonRepository;
use App\Repository\ChaussureRepository;
use App\Repository\MarqueRepository;

class MarqueController extends AbstractController
{
    /**
     * @Route("/marque", name="marque-browse")
     */
    public function index(MarqueRepository $marqueRepository)
    {
        $allmarque = $marqueRepository->findAll();
        return $this->render('marque/browse.html.twig',  [
            'allmarque' => $allmarque
           
        ]);
    }


    /**
     * @Route("/marque/{id}", name="marque_read")
     */
    public function marque_read($id, MarqueRepository $marqueRepository, ChaussureRepository $chaussureRepository, ChaussonRepository $chaussonRepository)
    {
        $allProductChaussure = $chaussureRepository->findByMarque($id);
        $allProductChausson = $chaussonRepository->findByMarque($id);

        return $this->render('marque/read.html.twig', [
            'allProductChaussure' => $allProductChaussure,
            'allProductChausson' => $allProductChausson
           
        ]);

       
    }
}
