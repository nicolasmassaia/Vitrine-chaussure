<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ChaussureRepository;
use App\Repository\ChaussonRepository;
use App\Repository\MarqueRepository;
use App\Entity\Chausson;
use App\Entity\Chaussure;
use App\Entity\Marque;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function home( ChaussonRepository $chaussonRepository,ChaussureRepository $chaussureRepository, MarqueRepository $marqueRepository )
    {
        $topfivechausson = $chaussonRepository->findtopfivechausson();
        $topfivechaussure = $chaussureRepository->findtopfivechaussure();

        return $this->render('home/index.html.twig', [
            'topfivechausson' => $topfivechausson,
            'topfivechaussure' => $topfivechaussure,
        ]);
        
    }
}
