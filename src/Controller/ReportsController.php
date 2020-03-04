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
        $this->post("annees", '{"idAnnee":1,"value":"2016-2017"}');
        $this->post("annees", '{"idAnnee":2,"value":"2017-2018"}');
        $this->post("annees", '{"idAnnee":3,"value":"2018-2019"}');

        $this->post("classes", '{"idClasse":4,"name":"CP"}');
        $this->post("classes", '{"idClasse":5,"name":"CE1"}');
        $this->post("classes", '{"idClasse":6,"name":"CE2"}');
        $this->post("classes", '{"idClasse":7,"name":"CM1"}');
        $this->post("classes", '{"idClasse":8,"name":"CM2"}');

        $this->post("matieres", '{"idMatiere":10,"name":"Comptabilité"}');
        $this->post("matieres", '{"idMatiere":11,"name":"Philosophie"}');
        $this->post("matieres", '{"idMatiere":12,"name":"Anglais"}');

        $this->post("enseignants", '{"matricule":"2020-A001","firstName":"Shogo","lastName":"MAKISHIMA","title":"M","phone":915161718}');

        $this->post("eleves", '{"idEleve":13,"firstName":"Light","lastName":"YAGAMI","gender":"MASCULIN","father":"Ulquiora","mother":"Rukia","birthDate":"2000-05-16","place":"Tokyo"}');

        $this->post("classeannee", '{"classeAnneeKey": {"idAnnee":1,"idClasse":4}}');
        $this->post("classeannee", '{"classeAnneeKey": {"idAnnee":1,"idClasse":5}}');
        $this->post("classeannee", '{"classeAnneeKey": {"idAnnee":1,"idClasse":6}}');
        $this->post("classeannee", '{"classeAnneeKey": {"idAnnee":2,"idClasse":7}}');
        $this->post("classeannee", '{"classeAnneeKey": {"idAnnee":3,"idClasse":8}}');

        dump("Données créées");
    }

    private function post($url, $data)
    {
        Unirest\Request::post("http://localhost:8080/" . $url, ["Content-Type" => "application/json"], $data);
    }
}
