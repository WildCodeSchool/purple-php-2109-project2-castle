<?php

namespace App\Controller;

class TutorialController extends AbstractController
{
        public function index(): string
    {
        return $this->twig->render('Annexes/tutorial.html.twig');
    }
}