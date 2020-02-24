<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SchoolClassesController extends AbstractController
{
    /**
     * @Route("/schoolclasses", name = "schoolclasses")
     */
    public function renderHomepage()
    {
        $classes = $this->callGET("classes");

        return $this->render('schoolclasses.html.twig', [
            'classes' => $classes
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
