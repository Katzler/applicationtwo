<?php

namespace App\Controller;

use App\Entity\Todolist;
use App\Form\TodoType;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/main', name: 'app_main')]
    public function index(): Response
    {
        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }

    /**
     * @Route("create", name="create")
     */
    public function create(Request $request) {
        $todolist = new Todolist();
        $form = $this->createForm(TodoType::class, $todolist);
        $form->handleRequest($request);

        return $this->render('main/create.html.twig', ['form' => $form->createView()
        ]);
    }

}
