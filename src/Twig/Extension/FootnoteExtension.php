<?php

namespace App\Twig\Extension;

use App\Twig\Runtime\FootnoteExtensionRuntime;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class FootnoteExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            new TwigFilter('footnote', [FootnoteExtensionRuntime::class, 'footnote'], ['is_safe' => ['html']]),
        ];
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('footnote_list', [FootnoteExtensionRuntime::class, 'footnote_list'], ['is_safe' => ['html']]),
        ];
    }
}
