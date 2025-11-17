<?php

class Footnotes
{
    public $fns = [
        'work-lm' => [
            'note' => 'Lockheed Martin (2006&mdash;2008)',
        ],
        'work-lebow' => [
            'note' => '<a href="http://lebow.drexel.edu" title="drexel university\'s lebow college of business">Drexel LeBow</a> (2008&mdash;present)',
        ],
        'code-stuff' => [
            'note' => '<a href="http://github.com/jklmnop" title="my public github repos">GitHub</a>',
        ],
        'code-lang' => [
            'note' => 'HTML, CSS, JS, PHP, SQL',
        ],
        'code-fw' => [
            'note' => 'jQuery, Zend, Bootstrap',
        ],
        'code-cms' => [
            'note' => '<a href="http://drupal.org/user/779688" title="my drupal.org user page">Drupal</a>',
        ],
        'mind-ug' => [
            'note' => 'AiPH (2002&mdash;2005)',
        ],
        'mind-gr' => [
            'note' => '<a href="http://www.ischool.drexel.edu/" title="drexel university\'s college of science and technology">iSchool</a> (2008&mdash;2010: Completed 30 Credits toward an M.S. in Information Systems)',
        ],
        'play-sr' => [
            'note' => '<a href="https://spaceyraygun.bandcamp.com" title="spaceyraygun on bandcamp">spaceyraygun</a>',
        ],
        'play-lockets' => [
            'note' => '<a href="https://treasuresyoulost.tumblr.com/" title="lockets website">Lockets</a>',
        ],
    ];

    public $list_type = 'ol';

    public function __construct()
    {

        $i = 1;
        foreach ($this->fns as $k => $v) {
            $this->fns[$k]['num'] = $i++;
        }

    }

    public function fn($name)
    {
        $i = $this->fns[$name]['num'];
        return '<sup id="fnref:' . $i . '"><a href="#fn:' . $i . '" rel="footnote">' . $i . '</a></sup>';

    }

    public function fn_list()
    {

        $list = '';
        foreach ($this->fns as $fn) {
            $list .= '<li id="fn:' . $fn['num'] . '">';
            $list .= $fn['note'];
            $list .= ' <a href="#fnref:' . $fn['num'] . '" rel="footnote">&#8617;</a>';
            $list .= '</li>';
        }

        $out .= '<' . $this->list_type . ' class="footnotes">' . $list . '</' . $this->list_type . '>';

        return $out;

    }
}
