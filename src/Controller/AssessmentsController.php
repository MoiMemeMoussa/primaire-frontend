<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AssessmentsController extends AbstractController
{
    /**
     * @Route("/assessments", name = "assessments")
     */
    public function renderHomepage()
    {
        return $this->render('assessments.html.twig', []);
    }
}
