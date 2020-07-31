<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ChaussonRepository;

class ChaussonController extends AbstractController
{
    /**
    * @Route("/chausson/{id}", name="chausson_read")
    */
   public function chausson_read($id, ChaussonRepository $chaussonRepository)
   {
       $oneArticle = $chaussonRepository->find($id);
       return $this->render('chausson/read.html.twig', [
           'article' => $oneArticle
          
       ]);
   }
}
