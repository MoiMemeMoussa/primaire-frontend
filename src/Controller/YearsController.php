<?php

namespace App\Controller;

use App\Entity\Annee;
use App\Form\YearType;
use App\Utils\RestAPI;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class YearsController extends AbstractController
{
    /**
     * @Route("/years", name = "years")
     */
    public function renderYears(Request $request)
    {
        $years = $this->computeYears();

        $year = $years[1];

        $yearForm = $this->createForm(YearType::class, $year);

        $yearForm->handleRequest($request);

        if ($yearForm->isSubmitted() && $yearForm->isValid())
        {
            RestAPI::post("/annees", $year);

            return $this->redirectToRoute(substr($request->getRequestUri(), 1));
        }

        return $this->render('years.html.twig', [
            'years' => $years,
            'yearForm' => $yearForm->createView()
        ]);
    }

    private function computeYears()
    {
        $years = RestAPI::getAll("/annees", "Annee");

        foreach ($years as $year)
        {
            //$classes = RestAPI::getAll("/classes", "Classe");
            $classes = RestAPI::getAll("/annees/" . $year->getIdAnnee() . "/classes", "Classe");

            $year->setClasses($classes);
        }

        dump($years);

        $newYear = new Annee();
        $newYear->setValue("Nouvelle année");

        array_unshift($years, $newYear);

        return $years;
    }
}
