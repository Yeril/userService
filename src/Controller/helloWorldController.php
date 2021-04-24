<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class helloWorldController extends AbstractController{

    /**
     * @Route("/api/test")
     */
    public function saidHello():Response
    {
        $hello = array('said' => 'hello world');

        return new JsonResponse($hello);
    }
}