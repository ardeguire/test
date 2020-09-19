<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DefaultController extends AbstractController
{
    public function index()
    {

        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        $user = $this->getUser();
        $roles = $user->getRoles();
        $number = random_int(0,99);
        return $this->render('index/index.html.twig',[
            'name' => $user->getFirstName(),
            'number' => $number,
            'roles' => implode(', ', $roles)]);
    }
}