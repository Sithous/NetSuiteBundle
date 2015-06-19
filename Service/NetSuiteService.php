<?php

namespace Sithous\NetSuiteBundle\Services;

use Symfony\Component\DependencyInjection\ContainerInterface;

class NetSuiteService
{
    /**
     * Set parameters and load the netsuite files
     *
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        global $nsendpoint, $nshost, $nsemail, $nspassword, $nsrole, $nsaccount;

        $nsendpoint = '2015_1';
        $nshost     = $container->getParameter('netsuite.host');
        $nsemail    = $container->getParameter('netsuite.email');
        $nspassword = $container->getParameter('netsuite.password');
        $nsrole     = $container->getParameter('netsuite.role');
        $nsaccount  = $container->getParameter('netsuite.account');

        // load the NetSuite php toolkit
        require_once dirname(__DIR__) . '/NetSuite/NetSuiteService.php';
    }
}
