<?php

namespace App\Controller;

use App\Entity\Classe;
use App\Form\ClassType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
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
            $encoders = [new JsonEncoder()];
            $normalizers = [new ObjectNormalizer()];

            $serializer = new Serializer($normalizers, $encoders);

            $jsonClass = $serializer->serialize($class, 'json');

            Unirest\Request::post("http://localhost:8080/classes", ["Content-Type" => "application/json"], $jsonClass);

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
