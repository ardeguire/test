<?php

namespace App\Controller;

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Make;
use App\Entity\Model;
use App\Repository\MakeRepository;
use App\Repository\ModelRepository;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {

        //get count of makes
        $count_makes = count($this->getDoctrine()
            ->getRepository(Make::class)
            ->findAll());

        //get count of models
        $count_models = count($this->getDoctrine()
            ->getRepository(Model::class)
            ->findAll());

        //pass them to the dashboard index
        return $this->render('admin/dashboard.html.twig', [
            'count_makes' => $count_makes,
            'count_models' => $count_models]);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Defend Insurance - Test App - Admin Dashboard');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Make', 'fas fa-address-book', Make::class);
        yield MenuItem::linkToCrud('Model', 'fas fa-address-card', Model::class);
        yield MenuItem::linkToLogout('Logout', 'fa fa-sign-out-alt');
    }
}
