<?php

namespace App\Controller;

use App\Form\StudentType;
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
        $students = RestAPI::callGET("eleves");
        $student = RestAPI::callGET("eleves/1", "App\Entity\Eleve");

        $studentForm = $this->createForm(StudentType::class, $student);

        $studentForm->handleRequest($request);

        if ($studentForm->isSubmitted() && $studentForm->isValid())
        {
            $student = $studentForm->getData();

            return $this->redirectToRoute('students');
        }

        return $this->render('students.html.twig', [
            'students' => $students,
            'studentForm' => $studentForm->createView()
        ]);
    }
}
