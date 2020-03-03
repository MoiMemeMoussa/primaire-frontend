<?php

namespace App\Controller;

use App\Entity\Eleve;
use App\Form\StudentType;
use App\Utils\RestAPI;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class StudentsController extends AbstractController
{
    /**
     * @Route("/students", name = "students")
     */
    public function renderStudents(Request $request)
    {
        $students = RestAPI::getAll("/eleves", "Eleve");

        $student = new Eleve();

        $studentForm = $this->createForm(StudentType::class, $student);

        $studentForm->handleRequest($request);

        if ($studentForm->isSubmitted() && $studentForm->isValid())
        {
            RestAPI::post("/eleves", $student);

            return $this->redirectToRoute(substr($request->getRequestUri(), 1));
        }

        return $this->render('students.html.twig', [
            'students' => $students,
            'studentForm' => $studentForm->createView()
        ]);
    }
}
