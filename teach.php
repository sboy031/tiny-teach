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
	<link rel="icon" href="http://the102.sambwa.com/wp-content/uploads/2016/10/the102logo-1-150x150.png" sizes="32x32">
	<link rel="icon" href="http://the102.sambwa.com/wp-content/uploads/2016/10/the102logo-1-300x300.png" sizes="192x192">
	<link rel="apple-touch-icon-precomposed" href="http://the102.sambwa.com/wp-content/uploads/2016/10/the102logo-1-300x300.png">
	<meta name="msapplication-TileImage" content="http://the102.sambwa.com/wp-content/uploads/2016/10/the102logo-1-300x300.png">
	<script type="text/javascript" src="./assets/popcorn.js"></script>
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>


<?php
	include('config.php');

	$filename = $_GET["lesson"];
    $xml_file = file_get_contents($filename, FILE_TEXT);
    $xml=simplexml_load_string($xml_file) or die("Error: Invalid XML file");
    $page_title = "the 102";

    if(isset($xml->title)) {
		$page_title = $xml->title;
	}

	// Validate XML
	if(!isset($xml->audio)) { die("Audio file not specified."); }
	if(!isset($xml->audio)) { die("No Slides."); }
	$count = 1;
	foreach ($xml->slide as $theslide) {
		if(!isset($theslide->in)) { die("No 'In' attribute for slide ".$count."."); }
		if(!isset($theslide->out)) { die("No 'Out' attribute for slide ".$count."."); }
		$count++;
	}
	
?>	

<script type="text/javascript">
	function submitData() {
		var totalText = "";
		var submissionValue = "";

	<?php if(isset($xml->title)) { ?>
		totalText = "Title: " + <?php echo "\"".$xml->title."\""; ?> + " | ";
	<?php } ?>

	    $(function(){
		    $("textarea").each(function(){
		    	if (document.getElementById('question' + this.id)) {
			        totalText = totalText + this.id + ": " + this.value + " (" + document.getElementById('question' + this.id).innerHTML + ")\n";
			    } else {
			    	totalText = totalText + this.id + ": " + this.value + "\n";
			    }
		    });
		});
		
		<?php if($tinyteach_askforemail) {?>
			var email_value = document.getElementById("email_box").value;
			var atpos = email_value.indexOf("@");
		    var dotpos = email_value.lastIndexOf(".");
		    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=email_value.length) {
		        alert("Please enter a valid email and try again.");
		        return false;
		    } else {
		    	submissionValue = "E-mail address : " + email_value + " | " + totalText;
		    }		
		<?php } else { ?>
			submissionValue = totalText;
		<?php } ?>

		document.dataSubmitForm.totalData.value = submissionValue;
    	document.forms["dataSubmitForm"].submit();
	}

</script>

<style type="text/css">
	.slide {
	    display: none;
	    width: 100%;
	}
	.slide.selected {
	    display: table;
	}
	.slide-img {
		position: absolute;
    	top: 0px;
	}
	.audio_play {
		margin-top: 10px; 
		width: 248px;
	}
	.question {
		margin-left: 40px;
		width: 100%;
		font-style: italic;
	}
	.img{
	    width: 248px;
	    height: 248px;
	    background-size: cover;
	    border-radius: 50%;
	    background-position: center center;
	}
	.word:hover, .word.selected {
	    color: blue;
	    cursor: pointer;
	    font-weight: bold;
	}
	.button {
	    border: none;
	    color: white;
	    padding: 15px 32px;
	    text-align: center;
	    text-decoration: none;
	    display: inline-block;
	    font-size: 16px;
	}
	.time {
		color: grey;
	}
	textarea {
		width: 100%;
		height: 60px;
		font: normal 14px verdana;
		line-height: 25px;
		padding: 2px 10px;
		border: solid 1px #ddd;
		margin-left: 40px;
	}
</style>

<title><?php echo $page_title; ?></title>

</head>
<body class="home blog logged-in wp-custom-logo">

<div id="page" class="hfeed site">

	<div id="sidebar" class="sidebar" style="position: fixed;">
		<header id="masthead" class="site-header" role="banner">
			<div class="site-branding">

				<div id="s0" class="img" style="background-color: #f7f7f7;"></div>

				<?php
					$count = 1;
					foreach ($xml->slide as $theslide) {
						if(isset($theslide->image)) {
							echo "<div id=\"s".$count."\" class=\"img slide slide-img\" style=\"background-image:url('";
							echo "./lessons/".$theslide->image;
							echo "')\"></div>";
						}
						$count++;
					}
				?>


				<audio id="lesson_audio" class="audio_play" src="<?php echo "./lessons/".$xml->audio; ?>" controls></audio>
			</div><!-- .site-branding -->
		</header><!-- .site-header -->
	</div><!-- .sidebar -->

	<div id="content" class="site-content">
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">			
				<article id="post-8" class="post-8 post type-post status-publish format-standard hentry category-uncategorized">
					
					<header class="entry-header"><h2 class="entry-title"><?php echo $page_title; ?></h2></header><!-- .entry-header -->

					<div class="entry-content">

						<?php 
							$count = 1;
							foreach ($xml->slide as $theslide) {
								echo "<span id='s".$count."' class=\"slide\">";
								if(isset($theslide->notes)) {
									echo "<p>".$theslide->notes."</p>";
								}
								if(isset($theslide->question)) {
									echo "<p class='question' id='questions".$count."'>".$theslide->question." (<span class=\"time\">00</span>)</p><textarea id='s".$count."' maxlength='500'></textarea>";
								}
								echo "</span>";
								$count++;
							}
						?>
						<span id="sEnd" class="slide">
						<?php 
							$questionCount = 0;
							foreach ($xml->slide as $theslide) {
								if(isset($theslide->question)) {
									$questionCount++;
								}
							}

							if($questionCount > 0) {
								?>

									<form id="dataSubmitForm" name="dataSubmitForm" method="post" action="submit.php">
									<input type="hidden" name="totalData" id="totalData" value="">
									<p><?php echo $tinyteach_submission_msg; ?></p>
									<?php if($tinyteach_askforemail) {?>
										<input type="text" name="email" id="email_box" maxlength="128"><br/><br/>
									<?php } ?>
									<input type="button" class="button" value="Submit >" onclick="submitData();">
									</form>
								<?php
							} else {
								?>
									<p><?php echo $tinyteach_nonsubmission_msg; ?></p>
									<input type="button" class="button" value="Done >"  onclick="window.location.href = './'">
								<?php
							}
						?>
						</span>


						
					</div><!-- .entry-content -->

					<footer class="entry-footer"><?php 

						$count = 1;
						foreach ($xml->slide as $theslide) {
							if ($count == 1) {
								echo "<span id=\"s".$count."\" class=\"word\" data-start=\"".$theslide->in."\">";
						    	echo $count;
						    	echo "</span>";
						    } else {
						    	echo " | <span id=\"s".$count."\" class=\"word\" data-start=\"".$theslide->in."\">";
						    	echo $count;
						    	echo "</span>";
						    }
							$count++;
						}

					?></footer><!-- .entry-footer -->

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


<script>

$(window).load(function(){
	var pop = Popcorn("#lesson_audio");
	var slideEndTimes = [];

	var slideTimes = {
		<?php
			$slideEndTimesPHP = array();
			$count = 1;
			foreach ($xml->slide as $theslide) {
				if($count == 1) {
					echo "\"s".$count."\": { start: ". $theslide->in.", end: ".$theslide->out." }";
				} else {
					echo ", \"s".$count."\": { start: ". $theslide->in.", end: ".$theslide->out." }";
				}
				if (isset($theslide->out)) {
					$slideEndTimesPHP[] = floatval($theslide->out);
				}
				$count++;
			}
		?>
	};

	slideEndTimes = [<?php echo implode(',', $slideEndTimesPHP) ?>];

	$.each(slideTimes, function(id, time) {
	     pop.footnote({
	        start: time.start,
	        end: time.end,
	        text: '',
	        target: id,
	        effect: "applyclass",
	        applyclass: "selected"
	    });
	});

	pop.play();

	$('.word').click(function() {
	    var audio = $('#lesson_audio');
	    audio[0].currentTime = parseFloat($(this).data('start'), 10);
	    audio[0].play();
	});

	//Completion Event
	var theAudio = document.getElementById( "lesson_audio" );
	theAudio.addEventListener( "ended", function( e ) {

		var endSlide = document.getElementById( "sEnd" );
		endSlide.className += " selected";

		}, false );

	//Timer Event
	theAudio.addEventListener( "timeupdate", function( e ) {
		var audio = $('#lesson_audio');
		var currentSlideEndTime;
		var currentTime = audio[0].currentTime;

		var arrayLength = slideEndTimes.length;
		for (var i = 0; i < arrayLength; i++) {
			currentSlideEndTime = slideEndTimes[i];
		  	if (currentSlideEndTime - currentTime > 0) {
		  		break;
		  	}
		}
		
		var minutesLeft = Math.floor(Math.round(currentSlideEndTime - currentTime) / 60);
		var secondsLeft = Math.round(currentSlideEndTime - currentTime) % 60;
		secondsLeft = ("0" + secondsLeft).slice(-2);

		var display= document.getElementsByClassName("time");
	    for(var i=0;i<display.length;i++) {
	      display[i].innerHTML=minutesLeft + ":" + secondsLeft;
	    }
	    //console.log( "timeoutn fired!", Math.round(currentSlideEndTime - currentTime));
	}, false );
	
	//Completion Aborted Event
	theAudio.addEventListener( "seeking", function( e ) {
		document.getElementById("sEnd").className = document.getElementById("sEnd").className.replace(/\bselected\b/,'');
	}, false );
});



</script>


</html>