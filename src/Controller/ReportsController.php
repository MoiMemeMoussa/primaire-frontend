<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ReportsController extends AbstractController
{
    /**
     * @Route("/reports", name = "reports")
     */
    public function renderReports()
    {
        return $this->render('reports.html.twig', []);
    }
}
