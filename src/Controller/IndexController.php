<?php

namespace App\Controller;

use App\Form\ContactFormType;
use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    #[Route('/', name: 'app_index', methods: ['GET', 'POST'])]
    public function index(Request $request): Response
    {
        $form = $this->createForm(ContactFormType::class);

        if($request->isMethod('POST') === true) {
            $form->handleRequest($request);

            $isValid = $form->isValid() === true;

            if($isValid === true) {
                mail(
                    'spaceyraygun@gmail.com',
                    'Contact from website',
                    $request->getPayload()->all('contact_form')['message'],
                    'Reply-To: Anon<spaceyraygun+anon@gmail.com>'
                );
            }

            return $this->redirectToRoute('app_index', [
                '_fragment' => 'thanks'
            ]);
        }

        return $this->render('index.html.twig', [
            'form' => $form,
        ]);
    }
}
