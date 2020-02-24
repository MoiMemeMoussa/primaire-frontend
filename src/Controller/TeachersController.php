<?php

namespace App\Controller;

use App\Form\TeacherType;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TeachersController extends AbstractController
{
    /**
     * @Route("/teachers", name = "teachers")
     */
    public function renderHomepage()
    {
        $teachers = RestAPI::callGET("enseignants");
        $teacher = RestAPI::callGET("enseignants/2001-A001", "App\Entity\Enseignant");

        $teacherForm = $this->createForm(TeacherType::class, $teacher);

        return $this->render('teachers.html.twig', [
            'teachers' => $teachers,
            'teacherForm' => $teacherForm->createView()
        ]);
    }
}
