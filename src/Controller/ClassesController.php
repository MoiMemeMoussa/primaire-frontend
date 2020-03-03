<?php

namespace App\Controller;

use App\Entity\Classe;
use App\Form\ClassType;
use App\Utils\RestAPI;
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
        $classes = RestAPI::getAll("/classes", "Classe");

        $class = new Classe();

        $classForm = $this->createForm(ClassType::class, $class);

        $classForm->handleRequest($request);

        if ($classForm->isSubmitted() && $classForm->isValid())
        {
            RestAPI::post("/classes", $class);

            return $this->redirectToRoute(substr($request->getRequestUri(), 1));
        }

        return $this->render('classes.html.twig', [
            'classes' => $classes,
            'classForm' => $classForm->createView()
        ]);
    }
}
