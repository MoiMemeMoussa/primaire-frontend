<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name = "home")
     */
    public function renderHomepage()
    {
        $schoolYears = RestAPI::callGET("annees");
        $schoolClasses = array("1");

        return $this->render('index.html.twig', [
            'schoolYears' => $schoolYears,
            'schoolClasses' => $schoolClasses
        ]);
    }
}
