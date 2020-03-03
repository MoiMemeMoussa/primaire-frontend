<?php

namespace App\Controller;

use App\Entity\Enseignant;
use App\Form\TeacherType;
use App\Utils\RestAPI;
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
        $teachers = RestAPI::getAll("/enseignants", "Enseignant");

        $teacher = new Enseignant();

        $teacherForm = $this->createForm(TeacherType::class, $teacher);

        $teacherForm->handleRequest($request);

        if ($teacherForm->isSubmitted() && $teacherForm->isValid())
        {
            RestAPI::post("/enseignants", $teacher);

            return $this->redirectToRoute(substr($request->getRequestUri(), 1));
        }

        return $this->render('teachers.html.twig', [
            'teachers' => $teachers,
            'teacherForm' => $teacherForm->createView()
        ]);
    }
}
