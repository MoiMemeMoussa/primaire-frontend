<?php

namespace App\Controller;

use App\Form\CourseType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CoursesController extends AbstractController
{
    /**
     * @Route("/courses", name = "courses")
     */
    public function renderCourses(Request $request)
    {
        $courses = RestAPI::callGET("matieres");
        $course = RestAPI::callGET("matieres/4", "App\Entity\Matiere");

        $courseForm = $this->createForm(CourseType::class, $course);

        $courseForm->handleRequest($request);

        if ($courseForm->isSubmitted() && $courseForm->isValid())
        {
            $course = $courseForm->getData();

            return $this->redirectToRoute('teachers');
        }

        return $this->render('courses.html.twig', [
            'courses' => $courses,
            'courseForm' => $courseForm->createView()
        ]);
    }
}
