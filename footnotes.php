<?php
class Footnotes {
    
    public $fns = array(
        'work-lm' => array(
            'note' => 'Lockheed Martin (2006&mdash;2008)'
        ),
        'work-lebow' => array(
            'note' => '<a href="http://lebow.drexel.edu" title="drexel university\'s lebow college of business">Drexel LeBow</a> (2008&mdash;present)'
        ),
        'code-stuff' => array(
            'note' => '<a href="http://github.com/jklmnop" title="my public github repos">GitHub</a>'
        ),
        'code-lang' => array(
            'note' => 'HTML, CSS, JS, PHP, SQL'
        ),
        'code-fw' => array(
            'note' => 'jQuery, Zend, Bootstrap'
        ),
        'code-cms' => array(
            'note' => '<a href="http://drupal.org/user/779688" title="my drupal.org user page">Drupal</a>'
        ),
        'mind-ug' => array(
            'note' => 'AiPH (2002&mdash;2005)'
        ),
        'mind-gr' => array(
            'note' => '<a href="http://www.ischool.drexel.edu/" title="drexel university\'s college of science and technology">iSchool</a> (2008&mdash;2010: Completed 30 Credits toward an M.S. in Information Systems)'
        ),
        'play-sr' => array(
            'note' => '<a href="https://spaceyraygun.bandcamp.com" title="spaceyraygun on bandcamp">spaceyraygun</a>'
        ),
        'play-lockets' => array(
            'note' => '<a href="https://treasuresyoulost.tumblr.com/" title="lockets website">Lockets</a>'
        )
    );
    
    public $list_type = 'ol';
    
    public function __construct() { 
        
        $i = 1;
        foreach($this->fns as $k => $v) {
            $this->fns[$k]['num'] = $i++;
        }
        
    }
    
    public function fn($name) { 
        $i = $this->fns[$name]['num'];
        return '<sup id="fnref:'.$i.'"><a href="#fn:'.$i.'" rel="footnote">'.$i.'</a></sup>'; 
        
    }
    
    public function fn_list() {
        
        $list = '';
        foreach($this->fns as $fn) {        
            $list .= '<li id="fn:'.$fn['num'].'">';            
            $list .= $fn['note'];
            $list .= ' <a href="#fnref:'.$fn['num'].'" rel="footnote">&#8617;</a>';
            $list .= '</li>';            
        }
        
        $out .= '<'.$this->list_type.' class="footnotes">'.$list.'</'.$this->list_type.'>';
        
        return $out;
        
    }
        
    
    
}