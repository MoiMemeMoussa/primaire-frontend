<?php

namespace App\Controller;

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
        $schoolYears = $this->callGET("annees");
        $schoolClasses = array("1");

        return $this->render('teachers.html.twig', [
            'schoolYears' => $schoolYears,
            'schoolClasses' => $schoolClasses
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
