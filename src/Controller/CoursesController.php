<?php

namespace App\Controller;

use App\Entity\Matiere;
use App\Form\CourseType;
use App\Utils\RestAPI;
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
        $courses = RestAPI::getAll("/matieres", "Matiere");

        $course = new Matiere();

        $courseForm = $this->createForm(CourseType::class, $course);

        $courseForm->handleRequest($request);

        if ($courseForm->isSubmitted() && $courseForm->isValid())
        {
            RestAPI::post("/matieres", $course);

            return $this->redirectToRoute(substr($request->getRequestUri(), 1));
        }

        return $this->render('courses.html.twig', [
            'courses' => $courses,
            'courseForm' => $courseForm->createView()
        ]);
    }
}
