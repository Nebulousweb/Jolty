<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Laasti\Middleware;

use Symfony\Component\HttpKernel\HttpKernelInterface;
use Symfony\Component\HttpFoundation\Request;
use League\Container\ContainerInterface;

/**
 * Description of Environment
 *
 * @author Sonia
 */
class Environment implements HttpKernelInterface
{

    private $app;
    private $container;

    public function __construct(HttpKernelInterface $app, ContainerInterface $container = null)
    {
        $this->app = $app;
        $this->container = $container;
    }

    public function handle(Request $request, $type = HttpKernelInterface::MASTER_REQUEST, $catch = true)
    {
        $this->container->get('Whoops\Run');

        //TODO: Make a class per environment with properties for the configuration, use the request to resolve the environment
        return $this->app->handle($request, $type, $catch);
    }

}
