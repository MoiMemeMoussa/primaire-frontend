<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name = "home")
     */
    public function renderHomepage(Request $request)
    {
        $years = RestAPI::callGET("annees");
        $classes = RestAPI::callGET("annees/1/classes");
        $teacher = RestAPI::callGET("classes/1/annees/1/enseignant");

        return $this->render('index.html.twig', [
            'years' => $years,
            'classes' => $classes,
            'teacher' => $teacher
        ]);
    }
}
