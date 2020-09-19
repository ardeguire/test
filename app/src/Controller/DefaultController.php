<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DefaultController extends AbstractController
{
    public function index()
    {
        $name = 'Adam';
        $number = random_int(0,99);
        return $this->render('index/index.html.twig',[
            'name' => $name,
            'number' => $number]);
    }
}