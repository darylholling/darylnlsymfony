<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Projecten;
use App\Form\ProjectenType;
use App\Repository\ProjectenRepository;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(ProjectenRepository $projectenRepository)
    {

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'projectens' => $projectenRepository->findAll(),
        ]);
    }
}
