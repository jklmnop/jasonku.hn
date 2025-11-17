<?php

declare(strict_types=1);

namespace App\Controller;

use App\Form\ContactFormType;
use App\Service\SpamChecker;
use App\Service\SpamCheckerResultEnum;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
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
    public function email(Request $request, SpamChecker $spamChecker): RedirectResponse
    {
        $form = $this->createForm(ContactFormType::class);

        $form->handleRequest($request);

        $isValid = $form->isValid();
        if ($isValid) {
            $message = $form->get('message')->getData();
            $spamScore = $spamChecker->getSpamScore($message, $request);

            if ($spamScore !== SpamCheckerResultEnum::SPAM) {

                if ($spamScore === SpamCheckerResultEnum::SPAMAYBE) {
                    $message = <<<HTML
                        [POSSIBLE SPAM]

                        {$message}
                    HTML;
                }

                mail(
                    'spaceyraygun@gmail.com',
                    'Contact from website',
                    (string) $message,
                    'Reply-To: Anon<spaceyraygun+anon@gmail.com>'
                );
            }
        }

        $this->addFlash('success', '🤫Mum&rsquo;s the word!');

        return $this->redirectToRoute('app_index', [
            '_fragment' => 'thanks',
        ]);
    }
}
