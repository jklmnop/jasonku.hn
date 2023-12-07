<?php

namespace App\Controller;

use App\Form\ContactFormType;
use App\Form\ContactType;
use App\SpamChecker;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
        return $this->render('index.html.twig', [
            'form' => $this->createForm(ContactFormType::class),
        ]);
    }

    #[Route('/', name: 'app_email', methods: ['POST'])]
    public function email(Request $request, SpamChecker $spamChecker) {
        $form = $this->createForm(ContactFormType::class);

        $form->handleRequest($request);

        $isValid = $form->isValid() === true;
        if($isValid === true) {
            $message = $form->get('message')->getData();
            $spamScore = $spamChecker->getSpamScore($message, $request);

            if($spamScore !== SpamChecker::SPAM) {

                if($spamScore === SpamChecker::SPAMAYBE) {
                    $message = <<<HTML
                        [POSSIBLE SPAM]
                        
                        {$message}
                    HTML;
                }

                mail(
                    'spaceyraygun@gmail.com',
                    'Contact from website',
                    $message,
                    'Reply-To: Anon<spaceyraygun+anon@gmail.com>'
                );
            }
        }

        $this->addFlash('success', '🤫Mum&rsquo;s the word!');

        return $this->redirectToRoute('app_index', [
            '_fragment' => 'thanks'
        ]);
    }
}
