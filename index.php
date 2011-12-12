<!doctype html public "display of affection">
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!-- Consider adding an manifest.appcache: h5bp.com/d/Offline -->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">

  <!-- Use the .htaccess and remove these lines to avoid edge case issues.
       More info: h5bp.com/b/378 -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>jason k&uuml;hn | web developer | philadelphia</title>
  <meta name="description" content="a simple life in binary. the online r&eacute;sum&eacute; and sandbox of web developer jason k&uuml;hn.">
  <meta name="author" content="jason k&uuml;hn">

  <!-- Mobile viewport optimized: j.mp/bplateviewport -->
  <meta name="viewport" content="width=device-width,initial-scale=1">

  <!-- Place favicon.ico and apple-touch-icon.png in the root directory: mathiasbynens.be/notes/touch-icons -->

  <!-- CSS: implied media=all -->
  <!-- CSS concatenated and minified via ant build script-->
  <link href="http://fonts.googleapis.com/css?family=Josefin+Sans+Std+Light" rel="stylesheet" />
  <link href="http://fonts.googleapis.com/css?family=Crimson+Text" rel="stylesheet" />
  <link rel="stylesheet" href="css/style.css" />
  <!-- end CSS-->

  <!-- More ideas for your <head> here: h5bp.com/d/head-Tips -->

  <!-- All JavaScript at the bottom, except for Modernizr / Respond.
       Modernizr enables HTML5 elements & feature detects; Respond is a polyfill for min/max-width CSS3 Media Queries
       For optimal performance, use a custom Modernizr build: www.modernizr.com/download/ -->
  <script src="js/libs/modernizr-2.0.6.min.js"></script>
</head>

<body>

<div id="wrapper" class="container_16 clearfix">
    <div id="whatsmyname" class="grid_16">
        <h1 class="initials"><abbr title="Jason Kuhn">JK</abbr></h1>
        <h2 class="bio">is <small>short</small> for <em class="not_name">just kidding</em> <abbr title="and per se and" class="amp">&amp;</abbr> <em class="name">Jason K&uuml;hn</em>.</h2>
        <?php if(isset($_GET['!'])) : ?>
        <ul class="lolz"><li><a href="mahoney.jpg" title="lolz"><img src="mahoney.jpg" alt="lolz" /></a></li></ul>
        <?php endif; ?>
    </div>
    
    <ul id="whoami" class="grid_16 clearfix">
      <li class="employment grid_3 prefix_2 alpha">
            <h3>Work</h3>
            <p>I used to make things for a <a href="http://www.lockheedmartin.com/isgs/" title="lockheed martin information systems and global services">defense contractor</a> <abbr title="and per se and" class="amp">&amp;</abbr> now I make things for <a href="http://lebow.drexel.edu" title="drexel university's lebow college of business">academia</a>.<p>
        </li>
        
        <li class="skills grid_3">
            <h3>Make</h3>
            <p>I do <a href="https://github.com/jklmnop" title="my public github repos">web stuff</a> with <span class="_" title="html, css, js, php, sql">languages</span> <span class="hide">(HTML, CSS, JS, PHP, SQL)</span>, <span class="_" title="jquery, yui, zend, 960">frameworks</span> <span class="hide">(jQuery, YUI, Zend, 960)</span>, <abbr title="and per se and" class="amp">&amp;</abbr> <span class="_" title="wordpress, drupal">content management systems</span> <span class="hide">(Wordpress, Drupal)</span>.<p>
        </li>
        
        <li class="education grid_3">
            <h3>Think</h3>
            <p>I undergrad-ed at an <a href="http://www.artinstitutes.edu/philadelphia/" title="art institute of philadelphia">art school</a> <abbr title="and per se and" class="amp">&amp;</abbr> now I'm grad-ing at a <a href="http://www.ischool.drexel.edu/" title="drexel university's college of science and technology">technology school</a>.<p>
        </li>
        
        <li class="hobbies grid_3 suffix_2 omega">
            <h3>Play</h3>
            <p>I live in philadelphia. I ride <a href="http://i.imgur.com/KPb9c.jpg" title="my univega">my bicycle</a>, I make <a href="http://spaceyraygun.net" title="spaceyraygun on muxtape">noise</a>, <abbr title="and per se and" class="amp">&amp;</abbr> I watch <a href="http://www.youtube.com/show/macgyver" title="this attribute is unnecessary">MacGyver</a>.<p>
        </li>
    </ul>
        
    <div id="contact" class="grid_6 prefix_5 suffix_5">
        <form id="twitter" action="twitter.php" method="post">
        <fieldset><legend><span class="caps">Message me on Twitter</span> or <a href="#email" class="toggle">by E-mail</a></legend>
        <p class="hint">Please use up to 130 characters (140 minus @).</p>
        <ol>
            <li>
                <label for="status" class="hide">Message: </label>
              <div class="ta-wrap"><textarea id="status" name="status" cols="40" rows="5" maxlength="130"></textarea></div>
                
            </li>
            <li class="buttons">
                <input type="submit" class="submit" value="tweet @jklmnop" /> or <input type="reset" class="reset" value="don't." />
            </li>
        </ol>

        </fieldset>
        </form>
        
        <form id="email" action="email.php" method="post">
        <fieldset><legend><span class="caps">E-Mail me</span> or <a href="#twitter" class="toggle">send me a Tweet</a></legend>
        <p class="whatever">Put some contact info in your message or don't. It's entirely up to you.</p>
        <p class="hint"></p>
        <ol>
            <li>
                <label for="message" class="hide">Message: </label>
              <div class="ta-wrap"><textarea id="message" name="message" cols="40" rows="5"></textarea></div>
            </li>
            <li class="buttons">
                <input type="submit" class="submit" value="send e-mail" /> or <input type="reset" class="reset" value="don't." />
            </li>
        </ol>
        <p class="oldfashioned">or the old way &mdash; <a href="mailto:spaceyraygun@gmail.com">spaceyraygun@gmail.com</a></p>
        </fieldset>
    	</form>
        <p class="inspiration"><small>Inspired by <a href="http://cognition.happycog.com/article/is-this-thing-on" title="Happy Cog's Cognition" rel="external">Happy Cog's Cognition</a>.</small></p>
    </div>
</div>


  <!-- JavaScript at the bottom for fast page loading -->

  <!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if offline -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="js/libs/jquery-1.6.2.min.js"><\/script>')</script>


  <!-- scripts concatenated and minified via ant build script-->
  <script defer src="js/plugins.js"></script>
  <script defer src="js/script.js"></script>
  <!-- end scripts-->

	
  <!-- Change UA-XXXXX-X to be your site's ID -->
  <script>
    window._gaq = [['_setAccount','UA-4613872-1'],['_trackPageview'],['_trackPageLoadTime']];
    Modernizr.load({
      load: ('https:' == location.protocol ? '//ssl' : '//www') + '.google-analytics.com/ga.js'
    });
  </script>


  <!-- Prompt IE 6 users to install Chrome Frame. Remove this if you want to support IE 6.
       chromium.org/developers/how-tos/chrome-frame-getting-started -->
  <!--[if lt IE 7 ]>
    <script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
    <script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
  <![endif]-->
  
</body>
</html>
