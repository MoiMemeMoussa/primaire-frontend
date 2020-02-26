<?php

namespace App\Controller;

use App\Entity\Matiere;
use App\Form\CourseType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Unirest;

class CoursesController extends AbstractController
{
    /**
     * @Route("/courses", name = "courses")
     */
    public function renderCourses(Request $request)
    {
        $courses = Unirest\Request::get("http://localhost:8080/matieres")->body;
        $course = $this->createCourse();

        $courseForm = $this->createForm(CourseType::class, $course);

        $courseForm->handleRequest($request);

        if ($courseForm->isSubmitted() && $courseForm->isValid())
        {
            $course = $courseForm->getData();

            return $this->redirectToRoute(substr($request->getRequestUri(), 1));
        }

        return $this->render('courses.html.twig', [
            'courses' => $courses,
            'courseForm' => $courseForm->createView()
        ]);
    }

    private function createCourse()
    {
        $response = Unirest\Request::get("http://localhost:8080/matieres/4")->body;

        $course = new Matiere();
        $course->setIdMatiere($response->idMatiere);
        $course->setName($response->name);

        return $course;
    }
}
