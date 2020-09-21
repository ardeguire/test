<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;


/**
 * @Route("/")
 */
class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="index")
     * @IsGranted("IS_AUTHENTICATED_FULLY")
     */
    public function index()
    {
        $user = $this->getUser();
        $roles = $user->getRoles();
        $number = random_int(0,99);
        return $this->render('index/index.html.twig',[
            'name' => $user->getFirstName(),
            'number' => $number,
            'roles' => implode(', ', $roles)]);
    }
}