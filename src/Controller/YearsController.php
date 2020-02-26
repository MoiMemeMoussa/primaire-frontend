<?php

namespace App\Controller;

use App\Entity\Annee;
use App\Form\YearType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Unirest;

class YearsController extends AbstractController
{
    /**
     * @Route("/years", name = "years")
     */
    public function renderYears(Request $request)
    {
        $years = Unirest\Request::get("http://localhost:8080/annees")->body;

        $year = new Annee();

        $yearForm = $this->createForm(YearType::class, $year);

        $yearForm->handleRequest($request);

        if ($yearForm->isSubmitted() && $yearForm->isValid())
        {
            $encoders = [new JsonEncoder()];
            $normalizers = [new ObjectNormalizer()];

            $serializer = new Serializer($normalizers, $encoders);

            $jsonYear = $serializer->serialize($year, 'json');

            Unirest\Request::post("http://localhost:8080/annees", ["Content-Type" => "application/json"], $jsonYear);

            return $this->redirectToRoute(substr($request->getRequestUri(), 1));
        }

        return $this->render('years.html.twig', [
            'years' => $years,
            'yearForm' => $yearForm->createView()
        ]);
    }

    private function createYear()
    {
        $response = Unirest\Request::get("http://localhost:8080/annees/1")->body;

        $year = new Annee();
        $year->setIdAnnee($response->idAnnee);
        $year->setValue($response->value);

        return $year;
    }
}
