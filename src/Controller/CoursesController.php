<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CoursesController extends AbstractController
{
    /**
     * @Route("/courses", name = "courses")
     */
    public function renderHomepage()
    {
        $courses = $this->callGET("matieres");

        return $this->render('courses.html.twig', [
            'courses' => $courses
        ]);
    }

    private function createSchoolYearOptions()
    {
        $schoolYears = callGET("annees");

        foreach ($schoolYears as $schoolYear)
        {
            echo '<option value="' . $schoolYear->idAnnee . '">' . $schoolYear->value . '</option>';
        }
    }

    private function callGET($url)
    {
        $client = curl_init("localhost:8080/" . $url);

        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($client);

        return json_decode($response);
    }
}
