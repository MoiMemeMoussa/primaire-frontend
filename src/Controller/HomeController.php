<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Unirest;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name = "home")
     */
    public function renderHomepage(Request $request)
    {
        $years = Unirest\Request::get("http://localhost:8080/annees")->body;
        $classes = Unirest\Request::get("http://localhost:8080/annees/1/classes")->body;
        $teacher = Unirest\Request::get("http://localhost:8080/classes/1/annees/1/enseignant")->body;

        return $this->render('index.html.twig', [
            'years' => $years,
            'classes' => $classes,
            'teacher' => $teacher
        ]);
    }
}
