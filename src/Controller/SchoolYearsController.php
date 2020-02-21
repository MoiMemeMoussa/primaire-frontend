<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SchoolYearsController extends AbstractController
{
    /**
     * @Route("/schoolyears", name = "schoolyears")
     */
    public function renderHomepage()
    {
        $schoolYears = $this->callGET("annees");
        $schoolClasses = array("1");

        /*
        $task = new Task();
        $task->setTask('Write a blog post');
        $task->setDueDate(new \DateTime('tomorrow'));
        */
        /*
        $form = $this->createFormBuilder($task)
            ->add('task', TextType::class)
            ->add('dueDate', DateType::class)
            ->add('save', SubmitType::class, ['label' => 'Create Task'])
            ->getForm();
        */

        return $this->render('schoolyears.html.twig', [
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
