<?php

namespace App\Controller;

use App\Entity\Eleve;
use App\Form\StudentType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Unirest;

class StudentsController extends AbstractController
{
    /**
     * @Route("/students", name = "students")
     */
    public function renderStudents(Request $request)
    {
        $students = Unirest\Request::get("http://localhost:8080/eleves")->body;

        $student = new Eleve();

        $studentForm = $this->createForm(StudentType::class, $student);

        $studentForm->handleRequest($request);

        if ($studentForm->isSubmitted() && $studentForm->isValid())
        {
            $encoders = [new JsonEncoder()];
            $normalizers = [new ObjectNormalizer()];

            $serializer = new Serializer($normalizers, $encoders);

            $jsonStudent = $serializer->serialize($student, 'json');

            Unirest\Request::post("http://localhost:8080/eleves", ["Content-Type" => "application/json"], $jsonStudent);

            return $this->redirectToRoute(substr($request->getRequestUri(), 1));
        }

        return $this->render('students.html.twig', [
            'students' => $students,
            'studentForm' => $studentForm->createView()
        ]);
    }

    private function createStudent()
    {
        $response = Unirest\Request::get("http://localhost:8080/eleves/1")->body;

        $student = new Eleve();

        if ($response != null) // TODO remove condition when possible
        {
            $student->setIdEleve($response->idEleve);
            $student->setFirstName($response->firstName);
            $student->setLastName($response->lastName);
            $student->setBirthDate($response->birthDate);
            $student->setPlace($response->place);
            $student->setFather($response->father);
            $student->setMother($response->mother);
            $student->setGender($response->gender);
        }

        return $student;
    }
}
