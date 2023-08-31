<?php

namespace App\Controller\Admin;

use App\Entity\Booking;
use App\Entity\Meal;
/*use App\Entity\MealImage; */
use App\Entity\Product;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Restaurant-Administration');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Users', 'fa-solid fa-user', User::class);
        yield MenuItem::linkToCrud('Meal', 'fas fa-bowl-rice', Meal::class);
        yield MenuItem::linkToCrud('Product', 'fa-regular fa-tower-observation', Product::class);
        yield MenuItem::linkToCrud('Booking', 'fa-regular fa-tower-observation', Booking::class);
    }
}
