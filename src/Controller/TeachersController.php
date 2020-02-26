<?php

namespace App\Controller;

use App\Entity\Enseignant;
use App\Form\TeacherType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Unirest;

class TeachersController extends AbstractController
{
    /**
     * @Route("/teachers", name = "teachers")
     */
    public function renderTeachers(Request $request)
    {
        $teachers = Unirest\Request::get("http://localhost:8080/enseignants")->body;
        $teacher = $this->createTeacher();

        $teacherForm = $this->createForm(TeacherType::class, $teacher);

        $teacherForm->handleRequest($request);

        if ($teacherForm->isSubmitted() && $teacherForm->isValid())
        {
            $teacher = $teacherForm->getData();

            return $this->redirectToRoute(substr($request->getRequestUri(), 1));
        }

        return $this->render('teachers.html.twig', [
            'teachers' => $teachers,
            'teacherForm' => $teacherForm->createView()
        ]);
    }

    private function createTeacher()
    {
        $response = Unirest\Request::get("http://localhost:8080/enseignants/2001-A001")->body;

        $teacher = new Enseignant();
        $teacher->setMatricule($response->matricule);
        $teacher->setFirstName($response->firstName);
        $teacher->setLastName($response->lastName);
        $teacher->setTitle($response->title);
        $teacher->setPhone($response->phone);

        return $teacher;
    }
}
