<?php

namespace App\Twig\Runtime;

use Twig\Extension\RuntimeExtensionInterface;

class FootnoteExtensionRuntime implements RuntimeExtensionInterface
{

    // @todo move this to another place
    private array $footnotes = [
        'work-lm' => [
            'note' => 'Lockheed Martin (2006&mdash;2008)'
        ],
        'work-lebow' => [
            'note' => '<a href="http://lebow.drexel.edu" title="drexel university\'s lebow college of business">Drexel LeBow</a> (2008&mdash;present)'
        ],
        'code-stuff' => [
            'note' => '<a href="http://github.com/jklmnop" title="my public github repos">GitHub</a>'
        ],
        'code-lang' => [
            'note' => 'HTML, CSS, JS, PHP, SQL'
        ],
        'code-fw' => [
            'note' => 'jQuery, Zend, Bootstrap'
        ],
        'code-cms' => [
            'note' => '<a href="http://drupal.org/user/779688" title="my drupal.org user page">Drupal</a>'
        ],
        'mind-ug' => [
            'note' => 'AiPH (2002&mdash;2005)'
        ],
        'mind-gr' => [
            'note' => '<a href="http://www.ischool.drexel.edu/" title="drexel university\'s college of science and technology">iSchool</a> (2008&mdash;2010: Completed 30 Credits toward an M.S. in Information Systems)'
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
            $lis[] = <<<HTML
                <li id="fn:{$index}">           
                    {$this->footnotes[$key]['note']}
                    <a href="#fnref:{$index}" rel="footnote">&#8617;</a>
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
