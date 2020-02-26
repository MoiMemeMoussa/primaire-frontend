<?php

namespace App\Controller;

use App\Entity\Matiere;
use App\Form\CourseType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Unirest;

class CoursesController extends AbstractController
{
    /**
     * @Route("/courses", name = "courses")
     */
    public function renderCourses(Request $request)
    {
        $courses = Unirest\Request::get("http://localhost:8080/matieres")->body;

        $course = new Matiere();

        $courseForm = $this->createForm(CourseType::class, $course);

        $courseForm->handleRequest($request);

        if ($courseForm->isSubmitted() && $courseForm->isValid())
        {
            $encoders = [new JsonEncoder()];
            $normalizers = [new ObjectNormalizer()];

            $serializer = new Serializer($normalizers, $encoders);

            $jsonCourse = $serializer->serialize($course, 'json');

            Unirest\Request::post("http://localhost:8080/matieres", ["Content-Type" => "application/json"], $jsonCourse);

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
