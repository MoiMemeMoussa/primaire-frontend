<?php

namespace App\Controller;

use App\Form\StudentType;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StudentsController extends AbstractController
{
    /**
     * @Route("/students", name = "students")
     */
    public function renderHomepage()
    {
        $students = RestAPI::callGET("eleves");
        $student = RestAPI::callGET("eleves/1", "App\Entity\Eleve");

        $studentForm = $this->createForm(StudentType::class, $student);

        return $this->render('students.html.twig', [
            'students' => $students,
            'studentForm' => $studentForm->createView()
        ]);
    }
}
