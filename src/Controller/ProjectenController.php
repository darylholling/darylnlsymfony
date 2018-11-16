<?php

namespace App\Controller;

use App\Entity\Projecten;
use App\Form\ProjectenType;
use App\Repository\ProjectenRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/projecten")
 */
class ProjectenController extends AbstractController
{
    /**
     * @Route("/", name="projecten_index", methods="GET")
     */
    public function index(ProjectenRepository $projectenRepository): Response
    {
        return $this->render('projecten/index.html.twig', ['projectens' => $projectenRepository->findAll()]);
    }

    /**
     * @Route("/new", name="projecten_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $projecten = new Projecten();
        $form = $this->createForm(ProjectenType::class, $projecten);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($projecten);
            $em->flush();

            return $this->redirectToRoute('projecten_index');
        }

        return $this->render('projecten/new.html.twig', [
            'projecten' => $projecten,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="projecten_show", methods="GET")
     */
    public function show(Projecten $projecten): Response
    {
        return $this->render('projecten/show.html.twig', ['projecten' => $projecten]);
    }

    /**
     * @Route("/{id}/edit", name="projecten_edit", methods="GET|POST")
     */
    public function edit(Request $request, Projecten $projecten): Response
    {
        $form = $this->createForm(ProjectenType::class, $projecten);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('projecten_index', ['id' => $projecten->getId()]);
        }

        return $this->render('projecten/edit.html.twig', [
            'projecten' => $projecten,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="projecten_delete", methods="DELETE")
     */
    public function delete(Request $request, Projecten $projecten): Response
    {
        if ($this->isCsrfTokenValid('delete'.$projecten->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($projecten);
            $em->flush();
        }

        return $this->redirectToRoute('projecten_index');
    }
}
