<?php

namespace App\Controller;

use App\Form\ClassType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ClassesController extends AbstractController
{
    /**
     * @Route("/classes", name = "classes")
     */
    public function renderClasses(Request $request)
    {
        $classes = RestAPI::callGET("classes");
        $class = RestAPI::callGET("classes/1", "App\Entity\Classe");

        $classForm = $this->createForm(ClassType::class, $class);

        $classForm->handleRequest($request);

        if ($classForm->isSubmitted() && $classForm->isValid())
        {
            $class = $classForm->getData();

            return $this->redirectToRoute(substr($request->getRequestUri(), 1));
        }

        return $this->render('classes.html.twig', [
            'classes' => $classes,
            'classForm' => $classForm->createView()
        ]);
    }
}
