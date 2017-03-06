<!DOCTYPE html>
<html lang="en-US" class="js"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<!--[if lt IE 9]>
	<script src="http://the102.sambwa.com/wp-content/themes/twentyfifteen/js/html5.js"></script>
	<![endif]-->
	<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>
	<link rel="dns-prefetch" href="http://fonts.googleapis.com/">
	<link rel="dns-prefetch" href="http://s.w.org/">
	<link rel="stylesheet" id="twentyfifteen-fonts-css" href="./assets/fonts.css" type="text/css" media="all">
	<link rel="stylesheet" id="twentyfifteen-style-css" href="./assets/style.css" type="text/css" media="all">
	<!--[if lt IE 9]>
	<link rel='stylesheet' id='twentyfifteen-ie-css'  href='http://the102.sambwa.com/wp-content/themes/twentyfifteen/css/ie.css?ver=20141010' type='text/css' media='all' />
	<![endif]-->
	<!--[if lt IE 8]>
	<link rel='stylesheet' id='twentyfifteen-ie7-css'  href='http://the102.sambwa.com/wp-content/themes/twentyfifteen/css/ie7.css?ver=20141010' type='text/css' media='all' />
	<![endif]-->
	<script type="text/javascript" src="./assets/jquery.js.download"></script>
	<script type="text/javascript" src="./assets/jquery-migrate.min.js.download"></script>
	<meta name="generator" content="Tiny Teach 0.1">
<?php
	include('config.php');
?>
<title><?php echo $tinyteach_title; ?></title>


</head>
<body class="home blog logged-in wp-custom-logo">

<div id="page" class="hfeed site">

	<div id="sidebar" class="sidebar" style="position: fixed;">
		<header id="masthead" class="site-header" role="banner">
			<div class="site-branding">
				<img width="248" height="248" src=<?php echo "\"".$tinyteach_logo."\""; ?> class="custom-logo" itemprop="logo" sizes="(max-width: 248px) 100vw, 248px">
			</div><!-- .site-branding -->
		</header><!-- .site-header -->
	</div><!-- .sidebar -->

	<div id="content" class="site-content">
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">			
				<article id="post-8" class="post-8 post type-post status-publish format-standard hentry category-uncategorized">
					
					<header class="entry-header"><h2 class="entry-title"></h2></header><!-- .entry-header -->

					<div class="entry-content">
						<p>
							<?php
								$files = glob("lessons/*xml");

								if (is_array($files)) {

								     foreach($files as $filename) {
								        $xml_file = file_get_contents($filename, FILE_TEXT);
								        $xml=simplexml_load_string($xml_file) or die("Error: Cannot create object");

								        if(isset($xml->title)) {
											echo "<a href='teach.php?lesson=".$filename."'>";
											echo $xml->title;
											echo "</a><br />";
										} else {
											echo "Invalid Lesson File -> ".$filename."<br />";
										}
								    }

								}

							?>
						</p>
					</div><!-- .entry-content -->

					<footer class="entry-footer"></footer><!-- .entry-footer -->

				</article><!-- #post-## -->
			</main><!-- .site-main -->
		</div><!-- .content-area -->
	</div><!-- .site-content -->

</div><!-- .site -->
</body>
<script type="text/javascript">
/* <![CDATA[ */
var screenReaderText = {"expand":"<span class=\"screen-reader-text\">expand child menu<\/span>","collapse":"<span class=\"screen-reader-text\">collapse child menu<\/span>"};
/* ]]> */
</script>
<script type="text/javascript" src="./assets/functions.js.download"></script>




</html>