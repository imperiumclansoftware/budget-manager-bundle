<?php
namespace ICS\BudgetmanagerBundle;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class BudgetmanagerBundle extends Bundle
{

    public function build(ContainerBuilder $container)
    {

    }

    public function getPath(): string
    {

        return \dirname(__DIR__);
    }

}
