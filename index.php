<!doctype html public "display of affection">
<head lang="en">
  <meta charset="utf-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>jason k&uuml;hn | web developer | philadelphia</title>
  <meta name="description" content="a simple life in binary. the online r&eacute;sum&eacute; and sandbox of web developer jason k&uuml;hn.">
  <meta name="author" content="jason k&uuml;hn">

  <meta name="viewport" content="width=device-width,initial-scale=1">

  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
</head>

<body>

<div id="wrapper" class="container">
    <div id="whatsmyname" class="">
        <h1 class="initials"><abbr title="Jason Kuhn">JK</abbr></h1>
        <h2 class="bio">is <small>short</small> for <em class="not_name">just kidding</em> <abbr title="and per se and" class="amp">&amp;</abbr> <em class="name">Jason K&uuml;hn</em>.</h2>
        <?php if(isset($_GET['!'])) : ?>
        <ul class="lolz"><li><a href="mahoney.jpg" title="lolz"><img src="mahoney.jpg" alt="lolz" /></a></li></ul>
        <?php endif; ?>
    </div>
    
    <ul id="whoami" class="row">
      <li class="employment span3">
            <h3>Work</h3>
            <p>I used to make things for a <a href="http://www.lockheedmartin.com/isgs/" title="lockheed martin information systems and global services">defense contractor</a> <abbr title="and per se and" class="amp">&amp;</abbr> now I make things for <a href="http://lebow.drexel.edu" title="drexel university's lebow college of business">academia</a>.<p>
        </li>
        
        <li class="skills span3">
            <h3>Make</h3>
            <p>I do <a href="https://github.com/jklmnop" title="my public github repos">web stuff</a> with <span class="_" title="html, css, js, php, sql">languages</span> <span class="hide">(HTML, CSS, JS, PHP, SQL)</span>, <span class="_" title="jquery, yui, zend, 960">frameworks</span> <span class="hide">(jQuery, YUI, Zend, 960)</span>, <abbr title="and per se and" class="amp">&amp;</abbr> <span class="_" title="wordpress, drupal">content management systems</span> <span class="hide">(Wordpress, Drupal)</span>.<p>
        </li>
        
        <li class="education span3">
            <h3>Think</h3>
            <p>I undergrad-ed at an <a href="http://www.artinstitutes.edu/philadelphia/" title="art institute of philadelphia">art school</a> <abbr title="and per se and" class="amp">&amp;</abbr> now I'm grad-ing at a <a href="http://www.ischool.drexel.edu/" title="drexel university's college of science and technology">technology school</a>.<p>
        </li>
        
        <li class="hobbies span3">
            <h3>Play</h3>
            <p>I live in philadelphia. I ride <a href="http://i.imgur.com/KPb9c.jpg" title="my univega">my bicycle</a>, I make <a href="http://spaceyraygun.net" title="spaceyraygun on muxtape">noise</a>, <abbr title="and per se and" class="amp">&amp;</abbr> I watch <a href="http://www.youtube.com/show/macgyver" title="this attribute is unnecessary">MacGyver</a>.<p>
        </li>
    </ul>    
</div>
	
  <script>
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-4613872-1']);
    _gaq.push(['_trackPageview']);

    (function() {
      var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
      ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
      var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
  </script>

</body>
</html>
