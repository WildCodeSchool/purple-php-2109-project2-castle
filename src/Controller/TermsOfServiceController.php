<?php

namespace App\Controller;

class TermsOfServiceController extends AbstractController
{
    public function index(): string
    {
        return $this->twig->render('Annexes/termsofservice.html.twig');
    }
}
