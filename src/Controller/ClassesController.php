<?php

namespace App\Controller;

use App\Form\ClassType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ClassesController extends AbstractController
{
    /**
     * @Route("/classes", name = "classes")
     */
    public function renderHomepage()
    {
        $classes = RestAPI::callGET("classes");
        $class = RestAPI::callGET("classes/1", "App\Entity\Classe");

        $classForm = $this->createForm(ClassType::class, $class);

        return $this->render('classes.html.twig', [
            'classes' => $classes,
            'classForm' => $classForm->createView()
        ]);
    }
}
