<?php

namespace App\Controller;

use App\Form\YearType;
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
        $years = RestAPI::callGET("annees");
        $year = RestAPI::callGET("annees/1", "App\Entity\Annee");

        $yearForm = $this->createForm(YearType::class, $year);

        $yearForm->handleRequest($request);

        if ($yearForm->isSubmitted() && $yearForm->isValid())
        {
            // $yearForm->getData() holds the submitted values but the original `$year` variable has also been updated
            $annee = $yearForm->getData();

            // ... perform some action, such as saving the task to the database, for example, if Year is a Doctrine entity, save it!
            // $entityManager = $this->getDoctrine()->getManager();
            // $entityManager->persist($year);
            // $entityManager->flush();

            return $this->redirectToRoute(substr($request->getRequestUri(), 1));
        }

        return $this->render('years.html.twig', [
            'years' => $years,
            'yearForm' => $yearForm->createView()
        ]);
    }
}
