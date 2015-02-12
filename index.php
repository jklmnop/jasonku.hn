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
  <meta charset="utf-8" />

  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

  <title>jason k&uuml;hn | web developer | philadelphia</title>
  <meta name="description" content="a simple life in binary. the online r&eacute;sum&eacute; and sandbox of web developer jason k&uuml;hn." />
  <meta name="author" content="jason k&uuml;hn" />

  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

  <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Josefin+Sans+Std+Light" />
  <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Crimson+Text" />
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/font-awesome.min.css" />
  <link rel="stylesheet" href="css/styles.css" />
</head>

<body>
    <h1>Hi</h1>
    <div class="header-wrap">
        <div class="container">
            <header class="row">
                <div class="col-sm-12">
                    <h1><abbr title="Jason Kuhn">JK</abbr></h1>
                    <p class="lead">is <small>short</small> for <em>just kidding</em> <abbr title="and per se and" class="amp">&amp;</abbr> <strong>Jason K&uuml;hn</strong>.</p>
                </div>
            </header>
        </div>
    </div>

    <div class="content-wrap">
        <div class="container">
            <section class="row">
                <article class="col-sm-3">
                    <h2>Work</h2>
                    <blockquote>
                        <p>I used to make things for a defense contractor <?= $fn->fn('work-lm'); ?> <abbr title="and per se and" class="amp">&amp;</abbr> now I make things for academia.  <?= $fn->fn('work-lebow'); ?></p>
                    </blockquote>
                </article>

                <article class="col-sm-3">
                    <h2>Code</h2>
                    <blockquote>
                        <p>I do web stuff  <?= $fn->fn('code-stuff'); ?> with languages, <?= $fn->fn('code-lang'); ?>
                            frameworks, <?= $fn->fn('code-fw'); ?>
                            <abbr title="and per se and" class="amp">&amp;</abbr>
                            content management systems. <?= $fn->fn('code-cms'); ?></p>
                    </blockquote>
                </article>

                <article class="col-sm-3">
                    <h2>Mind</h2>
                    <blockquote>
                        <p>I undergrad-ed at an art school, <?= $fn->fn('mind-ug'); ?> then I grad-ed at a technology school, <?= $fn->fn('mind-gr'); ?> <abbr title="and per se and" class="amp">&amp;</abbr> now I'm self-educating.</p>
                    </blockquote>
                </article>

                <article class="col-sm-3">
                    <h2>Play</h2>
                    <blockquote>
                        <p>I live in Philadelphia. I ride my bicycle, I make noise <?= $fn->fn('play-sr'); ?> <?= $fn->fn('play-lockets'); ?>, <abbr title="and per se and" class="amp">&amp;</abbr> I watch MacGyver.</p>
                    </blockquote>
                </article>
            </section>
        </div>
    </div>

    <div class="contact-wrap">
        <div class="container">
            <section id="contact" class="row">
                <div class="col-sm-6 col-sm-offset-3">
                <form action="" role="form" method="post">
                    <fieldset>
                        <legend><h2>What's on your mind?</h2></legend>

                        <div class="form-group">
                            <label for="message" class="control-label hide">Message</label>
                            <div class="controls">
                                <textarea id="message" name="message" cols="40" rows="5" class="form-control" placeholder="tell me a secret."></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="controls">
                                <button type="submit" class="submit btn btn-success" id="tweet" name="mode" value="tweet"><i class="icon-twitter"></i> @jklmnop</button>
                                <button type="submit" class="submit btn btn-default" id="email" name="mode" value="email"><i class="icon-envelope"></i> @gmail.com</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
                </div>
            </section>
        </div>
    </div>

    <div class="footer-wrap">
        <div class="container">
            <footer class="row">
                <div class="col-sm-9">
                <h2>Footnotes</h2>
                <?= $fn->fn_list(); ?>
                </div>
                <div class="col-sm-3">
                    <h2>Current Noise</h2>
                    <div class="current-noise"></div>
                </div>
            </footer>
        </div>
    </div>


  <script src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
  <script src="js/scripts.js"></script>
  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-4613872-1', 'jasonkuhn.net');
    ga('send', 'pageview');
  </script>

</body>
</html>
