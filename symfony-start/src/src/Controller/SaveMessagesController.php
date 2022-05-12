<?php

namespace App\Controller;

use App\Entity\SaveMessages;
use App\Form\SaveMessagesType;
use App\Repository\SaveMessagesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/save/messages')]
class SaveMessagesController extends AbstractController
{
    #[Route('/', name: 'app_save_messages_index', methods: ['GET'])]
    public function index(SaveMessagesRepository $saveMessagesRepository): Response
    {
        return $this->render('save_messages/index.html.twig', [
            'save_messages' => $saveMessagesRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_save_messages_new', methods: ['GET', 'POST'])]
    public function new(Request $request, SaveMessagesRepository $saveMessagesRepository): Response
    {
        $saveMessage = new SaveMessages();
        $form = $this->createForm(SaveMessagesType::class, $saveMessage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $saveMessagesRepository->add($saveMessage);
            return $this->redirectToRoute('app_save_messages_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('save_messages/new.html.twig', [
            'save_message' => $saveMessage,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_save_messages_show', methods: ['GET'])]
    public function show(SaveMessages $saveMessage): Response
    {
        return $this->render('save_messages/show.html.twig', [
            'save_message' => $saveMessage,
        ]);
    }

}
