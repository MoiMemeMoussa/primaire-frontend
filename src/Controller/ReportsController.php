<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Unirest;

class ReportsController extends AbstractController
{
    /**
     * @Route("/reports", name = "reports")
     */
    public function renderReports()
    {
        $this->createSQLdata();

        return $this->render('reports.html.twig', []);
    }

    private function createSQLdata()
    {
        $this->post("annees", '{"id_annee":1,"value":"2016-2017"}');
        $this->post("annees", '{"id_annee":2,"value":"2017-2018"}');
        $this->post("annees", '{"id_annee":3,"value":"2018-2019"}');

        $this->post("classes", '{"id_classe":4,"name":"CP"}');
        $this->post("classes", '{"id_classe":5,"name":"CE1"}');
        $this->post("classes", '{"id_classe":6,"name":"CE2"}');
        $this->post("classes", '{"id_classe":7,"name":"CM1"}');
        $this->post("classes", '{"id_classe":8,"name":"CM2"}');
        $this->post("classes", '{"id_classe":9,"name":"6ème"}');

        $this->post("matieres", '{"id_matiere":10,"name":"Comptabilité"}');
        $this->post("matieres", '{"id_matiere":11,"name":"Philosophie"}');
        $this->post("matieres", '{"id_matiere":12,"name":"Anglais"}');

        $this->post("enseignants", '{"matricule":"2020-A001","first_name":"Shogo","last_name":"MAKISHIMA","title":"M","phone":915161718}');

        $this->post("eleves", '{"id_eleve":13,"first_name":"Light","last_name":"YAGAMI","gender":"MASCULIN","father":"Ulquiora","mother":"Rukia","birth_date":"2000-05-16","place":"Tokyo"}');

        dump("Données créées");
    }

    private function post($url, $data)
    {
        Unirest\Request::post("http://localhost:8080/" . $url, ["Content-Type" => "application/json"], $data);
    }
}
