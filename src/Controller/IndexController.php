<?php

declare(strict_types=1);

namespace App\Controller;

use App\Form\ContactFormType;
use App\Service\SpamArtWriter;
use App\Service\SpamChecker;
use App\Service\SpamCheckerResultEnum;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class IndexController extends AbstractController
{
    public function __construct(
        private readonly SpamChecker $spamChecker,
        private readonly SpamArtWriter $spamArtWriter,
        #[Autowire(env: 'APP_SPAM_JSON_PATH')]
        private readonly string $spamJsonPath,
    ) {
    }

    #[Route('/', name: 'app_index', methods: ['GET'])]
    public function index(): Response
    {
        return $this->render('index.html.twig', [
            'form' => $this->createForm(ContactFormType::class),
        ]);
    }

    #[Route('/', name: 'app_email', methods: ['POST'])]
    public function email(Request $request): RedirectResponse
    {
        $form = $this->createForm(ContactFormType::class);

        $form->handleRequest($request);

        $isValid = $form->isValid();
        if ($isValid) {
            $message = $form->get('message')->getData();
            $spamScore = $this->spamChecker->getSpamScore($message, $request);

            if ($spamScore === SpamCheckerResultEnum::HAM) {
                mail(
                    'spaceyraygun@gmail.com',
                    'Contact from website',
                    (string) $message,
                    'Reply-To: Anon<spaceyraygun+anon@gmail.com>'
                );
            }

            $this->spamArtWriter->add($message, $spamScore);
        }

        $this->addFlash('success', '🤫Mum&rsquo;s the word!');

        return $this->redirectToRoute('app_index', [
            '_fragment' => 'thanks',
        ]);
    }

    #[Route('/spam', 'app_spam', methods: ['GET'])]
    public function spam(): Response
    {
        $binaryFileResponse = $this->file($this->spamJsonPath);
        $spams = json_decode($binaryFileResponse->getFile()->getContent());

        return $this->render('spam.html.twig', [
            'spams' => $spams,
        ]);
    }
}
