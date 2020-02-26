<?php

namespace App\Controller;

use App\Entity\Classe;
use App\Form\ClassType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Unirest;

class ClassesController extends AbstractController
{
    /**
     * @Route("/classes", name = "classes")
     */
    public function renderClasses(Request $request)
    {
        $classes = Unirest\Request::get("http://localhost:8080/classes")->body;

        $class = new Classe();

        $classForm = $this->createForm(ClassType::class, $class);

        $classForm->handleRequest($request);

        if ($classForm->isSubmitted() && $classForm->isValid())
        {
            $class = $classForm->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($class);
            $entityManager->flush();

            return $this->redirectToRoute(substr($request->getRequestUri(), 1));
        }

        return $this->render('classes.html.twig', [
            'classes' => $classes,
            'classForm' => $classForm->createView()
        ]);
    }

    private function createClass()
    {
        $response = Unirest\Request::get("http://localhost:8080/classes/1")->body;

        $class = new Classe();
        $class->setIdClasse($response->idClasse);
        $class->setName($response->name);

        return $class;
    }
}
