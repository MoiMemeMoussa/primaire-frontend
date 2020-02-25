<?php

namespace App\Controller;

use App\Form\YearType;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class YearsController extends AbstractController
{
    /**
     * @Route("/years", name = "years")
     */
    public function renderHomepage()
    {
        $years = RestAPI::callGET("annees");
        $year = RestAPI::callGET("annees/1", "App\Entity\Annee");

        $yearForm = $this->createForm(YearType::class, $year);

        return $this->render('years.html.twig', [
            'years' => $years,
            'yearForm' => $yearForm->createView()
        ]);
    }
}
