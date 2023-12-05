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
    public function email(Request $request): RedirectResponse
    {
        mail(
          'spaceyraygun@gmail.com',
          'Contact from website',
          $request->getPayload()->get('message'),
          'Reply-To: Anon<spaceyraygun+anon@gmail.com>'
        );

        return $this->redirectToRoute('app_index', [
            '_fragment' => 'thanks'
        ]);
    }
}
