<?php

namespace App\Controller;

use App\Form\CourseType;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CoursesController extends AbstractController
{
    /**
     * @Route("/courses", name = "courses")
     */
    public function renderHomepage()
    {
        $courses = RestAPI::callGET("matieres");
        $course = RestAPI::callGET("matieres/4", "App\Entity\Matiere");

        $courseForm = $this->createForm(CourseType::class, $course);

        return $this->render('courses.html.twig', [
            'courses' => $courses,
            'courseForm' => $courseForm->createView()
        ]);
    }
}
