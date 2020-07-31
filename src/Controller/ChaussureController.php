<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ChaussureRepository;

class ChaussureController extends AbstractController
{
    /**
     * @Route("/chaussure/{id}", name="chaussure_read")
     */
    public function chaussure_read($id, ChaussureRepository $chaussureRepository)
    {
        $oneArticle = $chaussureRepository->find($id);
        return $this->render('chaussure/read.html.twig', [
            'article' => $oneArticle
           
        ]);
    }
}
