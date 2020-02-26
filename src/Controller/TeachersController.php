<?php

namespace App\Controller;

use App\Form\TeacherType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class TeachersController extends AbstractController
{
    /**
     * @Route("/teachers", name = "teachers")
     */
    public function renderTeachers(Request $request)
    {
        $teachers = RestAPI::callGET("enseignants");
        $teacher = RestAPI::callGET("enseignants/2001-A001", "App\Entity\Enseignant");

        $teacherForm = $this->createForm(TeacherType::class, $teacher);

        $teacherForm->handleRequest($request);

        if ($teacherForm->isSubmitted() && $teacherForm->isValid())
        {
            $teacher = $teacherForm->getData();

            return $this->redirectToRoute('students');
        }

        return $this->render('teachers.html.twig', [
            'teachers' => $teachers,
            'teacherForm' => $teacherForm->createView()
        ]);
    }
}
