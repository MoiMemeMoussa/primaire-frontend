<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AssessmentsController extends AbstractController
{
    /**
     * @Route("/assessments", name = "assessments")
     */
    public function renderAssessments()
    {
        return $this->render('assessments.html.twig', []);
    }
}
