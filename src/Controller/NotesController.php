<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class NotesController extends AbstractController
{
    /**
     * @Route("/notes", name = "notes")
     */
    public function renderNotes()
    {
        return $this->render('notes.html.twig', []);
    }
}
