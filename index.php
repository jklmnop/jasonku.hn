<?php
if(isset($_POST['mode'])) {
    require_once 'contact.php';
    $contact = new Contact($_POST);
    $contact->send();
}

require_once 'footnotes.php';
$fn = new Footnotes();
?>
<!doctype html public "display of affection">
<head lang="en">
  <meta charset="utf-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>jason k&uuml;hn | web developer | philadelphia</title>
  <meta name="description" content="a simple life in binary. the online r&eacute;sum&eacute; and sandbox of web developer jason k&uuml;hn.">
  <meta name="author" content="jason k&uuml;hn">

  <meta name="viewport" content="width=device-width,initial-scale=1">

  <link href="http://fonts.googleapis.com/css?family=Josefin+Sans+Std+Light" rel="stylesheet" />
  <link href="http://fonts.googleapis.com/css?family=Crimson+Text" rel="stylesheet" />
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
  <link rel="stylesheet" href="css/font-awesome.min.css" />
  <link rel="stylesheet" href="css/styles.css" />
</head>

<body>
    
    <div class="header-wrap">
        <div class="container">
            <header class="row-fluid">
                <h1 class=""><abbr title="Jason Kuhn">JK</abbr></h1>
                <h2 class=" lead">is <small>short</small> for <em>just kidding</em> <abbr title="and per se and" class="amp">&amp;</abbr> <strong>Jason K&uuml;hn</strong>.</h2>
            </header>
        </div>
    </div>
    
    <div class="content-wrap">
        <div class="container">
            <section class="row-fluid">
                <article class="span3">
                    <h3>Work</h3>
                    <blockquote>
                        <p>I used to make things for a defense contractor <?= $fn->fn('work-lm'); ?> <abbr title="and per se and" class="amp">&amp;</abbr> now I make things for academia.  <?= $fn->fn('work-lebow'); ?></p>
                    </blockquote>                    
                </article>

                <article class="span3">
                    <h3>Code</h3>
                    <blockquote>
                        <p>I do web stuff  <?= $fn->fn('code-stuff'); ?> with languages, <?= $fn->fn('code-lang'); ?> 
                            frameworks, <?= $fn->fn('code-fw'); ?> 
                            <abbr title="and per se and" class="amp">&amp;</abbr> 
                            content management systems. <?= $fn->fn('code-cms'); ?></p>
                    </blockquote>                    
                </article>

                <article class="span3">
                    <h3>Mind</h3>
                    <blockquote>
                        <p>I undergrad-ed at an art school, <?= $fn->fn('mind-ug'); ?> then I grad-ed at a technology school, <?= $fn->fn('mind-gr'); ?> <abbr title="and per se and" class="amp">&amp;</abbr> now I'm self-educating.</p>
                    </blockquote>
                </article>

                <article class="span3">
                    <h3>Play</h3>
                    <blockquote>
                        <p>I live in Philadelphia. I ride my bicycle, I make noise <?= $fn->fn('play-sr'); ?> <?= $fn->fn('play-lockets'); ?>, <abbr title="and per se and" class="amp">&amp;</abbr> I watch MacGyver.</p>
                    </blockquote>
                </article>
            </section>
        </div>
    </div>
    
    <div class="contact-wrap">
        <div class="container">
            <section id="contact" class="row-fluid">
                <form action="" method="post">
                    <fieldset>
                        <legend><h2>What's on your mind?</h2></legend>

                        <div class="control-group">
                            <label for="message" class="control-label hide">Message</label>
                            <div class="controls">
                                <textarea id="message" name="message" cols="40" rows="5" class="input-xxlarge"></textarea>
                            </div>
                        </div>

                        <div class="control-group">
                            <div class="controls">
                                <button type="submit" class="submit btn btn-success" id="tweet" name="mode" value="tweet"><i class="icon-twitter"></i> @jklmnop</button> 
                                <button type="submit" class="submit btn" id="email" name="mode" value="email"><i class="icon-envelope"></i> @gmail.com</button> 
                            </div>
                        </div>
                    </fieldset>
                </form>
            </section>
        </div>
    </div>
    
    <div class="footer-wrap">
        <div class="container">
            <footer class="row-fluid">
                <h2>Footnotes</h2>
                <?= $fn->fn_list(); ?>               
                
            </footer>
        </div>
    </div>


  <script src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
  <script src="js/scripts.js"></script>
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
