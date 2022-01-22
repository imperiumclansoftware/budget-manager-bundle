<?php
namespace ICS\BudgetmanagerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BudgetmanagerController extends AbstractController
{

    /**
     * @author Name <email@email.com>
    * @Route("/",name="ics-budgetmanager-homepage")
    */
    public function index()
    {

        return $this->render('@Budgetmanager\index.html.twig',[]);
    }

}