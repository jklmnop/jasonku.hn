<?php

namespace App\Twig\Runtime;

use Twig\Extension\RuntimeExtensionInterface;

class FootnoteExtensionRuntime implements RuntimeExtensionInterface
{

    // @todo move this to another place
    private array $footnotes = [
        'work-lm' => [
            'note' => '[Redacted] (2005&mdash;2008)'
        ],
        'work-lebow' => [
            'note' => '<a href="https://lebow.drexel.edu" title="drexel university\'s lebow college of business">Drexel LeBow</a> (2008&mdash;present)'
        ],
        'code-stuff' => [
            'note' => '<a href="https://github.com/jklmnop" title="my public github repos">GitHub</a>'
        ],
        'code-lang' => [
            'note' => 'PHP, JS, CSS, SQL, HTML'
        ],
        'code-fw' => [
            'note' => 'Symfony, Zend'
        ],
        'code-cms' => [
            'note' => '<a href="https://drupal.org/user/779688" title="my drupal.org user page">Drupal</a>'
        ],
        'mind-ug' => [
            'note' => 'AiPH [Defunct, lol] (2002&mdash;2005)'
        ],
        'mind-gr' => [
            'note' => '<a href="https://www.ischool.drexel.edu/" title="drexel university\'s college of science and technology">iSchool</a> (2008&mdash;2010: Completed 30 Credits toward an M.S. in Information Systems)'
        ],
        'play-sr' => [
            'note' => '<a href="https://spaceyraygun.bandcamp.com" title="spaceyraygun on bandcamp">spaceyraygun</a>'
        ],
        'play-lockets' => [
            'note' => '<a href="https://treasuresyoulost.tumblr.com/" title="lockets website">Lockets</a>'
        ]
    ];

    public function footnote($value)
    {
        $footnoteNumber = array_search($value, array_keys($this->footnotes), true) + 1;
        return <<<HTML
            <sup id="fnref:{$footnoteNumber}">
                <a href="#fn:{$footnoteNumber}" rel="footnote">{$footnoteNumber}</a>
            </sup>
        HTML;
    }

    public function footnote_list()
    {
        $keys = array_keys($this->footnotes);
        $lis = [];
        foreach($keys as $index => $key) {
            $footnoteNumber = $index + 1;
            $lis[] = <<<HTML
                <li id="fn:{$footnoteNumber}">
                    {$this->footnotes[$key]['note']}
                    <a href="#fnref:{$footnoteNumber}" rel="footnote">&#8617;</a>
                </li>
            HTML;
        }

        $lis = implode('', $lis);

        return <<<HTML
            <ol>
                {$lis}
            </ol>
        HTML;
    }
}
