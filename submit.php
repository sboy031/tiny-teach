<html>
	<?php 
		include('config.php');
	?>
 	<head>
  		<title><?php echo $tinyteach_title; ?></title>
 	</head>
 	<body onload="goToIndex()">
		<?php 
		 	$submittedData = filter_var($_POST["totalData"], FILTER_SANITIZE_STRING);

			$to      = $tinyteach_to_email;
			$subject = 'the 102 - tiny teach submission';
			$message = $submittedData;
			$headers = 'From: '. $tinyteach_from_email . "\r\n" .
			    'Reply-To: '. $tinyteach_from_email . "\r\n" .
			    'X-Mailer: PHP/' . phpversion();

			if (mail($to, $subject, $message, $headers)) {
				echo '<p style="color: #f7f7f7">Submission: success</p>';
			} else {
				echo '<p style="color: #f7f7f7">Submission: failure</p>';
			}

		 	//echo '<p>'.$submittedData.'</p>'; 
		?> 


		<script>
			function goToIndex() {
			    //
			    this.document.location.href = './';
			}
		</script>
 	</body>
</html>