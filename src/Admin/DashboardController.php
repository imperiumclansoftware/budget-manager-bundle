<?php

namespace ICS\BudgetmanagerBundle\Controller\Admin;

use ICS\BudgetmanagerBundle\Entity\banque\AgenceBanque;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use ICS\SsiBundle\Entity\Account;
use ICS\SsiBundle\Entity\Log;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Alien');
            // you can include HTML contents too (e.g. to link to an image)
            // ->setTitle('<img src="..."> ACME <span class="text-small">Corp.</span>')

            // the path defined in this method is passed to the Twig asset() function
            // ->setFaviconPath('favicon.svg')

            // the domain used by default is 'messages'
            // ->setTranslationDomain('my-custom-domain')

            // there's no need to define the "text direction" explicitly because
            // its default value is inferred dynamically from the user locale
            // ->setTextDirection('ltr')

            // set this option if you prefer the page content to span the entire
            // browser width, instead of the default design which sets a max width
            // ->renderContentMaximized()

            // set this option if you prefer the sidebar (which contains the main menu)
            // to be displayed as a narrow column instead of the default expanded design
            // ->renderSidebarMinimized()

            // by default, all backend URLs include a signature hash. If a user changes any
            // query parameter (to "hack" the backend) the signature won't match and EasyAdmin
            // triggers an error. If this causes any issue in your backend, call this method
            // to disable this feature and remove all URL signature checks
            // ->disableUrlSignatures()

            // by default, all backend URLs are generated as absolute URLs. If you
            // need to generate relative URLs instead, call this method
            // ->generateRelativeUrls()
        ;
    }

    public function configureMenuItems(): iterable
    {
        return [
            MenuItem::linkToDashboard('Dashboard', 'fa fa-home'),

            MenuItem::section('Banque'),
           // MenuItem::linkToCrud('Soldes', 'fa fa-tags', Solde::class),
            // MenuItem::linkToCrud('xxxxx', 'fa fa-file-text', XXXXX::class),

            MenuItem::section('Users'),
            // MenuItem::linkToCrud('AgenceBanque', 'fa fa-comment', AgenceBanque::class),

            MenuItem::section('Security', 'fa fa-shield'),
            MenuItem::linkToCrud('Accounts', 'fa fa-user-circle', Account::class),
            MenuItem::linkToCrud('Logs', 'fa fa-newspaper', Log::class),
        ];
    }
}
