<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    #[Route('/', name: 'app_index', methods: ['GET'])]
    public function index(): Response
    {
        return $this->render('index.html.twig');
    }

    #[Route('/email', name: 'app_email', methods: ['POST'])]
    public function email(Request $request, MailerInterface $mailer): RedirectResponse
    {
        $email = (new Email())
            ->from('Anon<spaceyraygun+anon@gmail.com>')
            ->to('spaceyraygun@gmail.com')
            ->subject('Contact from website')
            ->text($request->getPayload()->get('message'));

        $mailer->send($email);

        return $this->redirectToRoute('app_index', [
            '_fragment' => 'thanks'
        ]);
    }
}
