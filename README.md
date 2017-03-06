# tiny-teach
A simple audio annotation web application for presenting simple, short, straightforward topics (using popcorn.js). Live <a href="http://teach.sambwa.com" target="_blank">Demo Here</a>.

<img src="https://raw.githubusercontent.com/tinyteach/tiny-teach/master/assets/screenshot.jpg" alt="Tiny Teach Screenshot" />


## Installation
### Clone the Repository (or simply download and install in your web application directory)
    $ git clone https://github.com/tinyteach/tiny-teach.git

### Configure config.php file

Change the values in the config.php file to match your needs :

```<?php
$tinyteach_from_email = "example@example.com"; //from domain at host
$tinyteach_to_email = 'example@example.com';
$tinyteach_submission_msg = 'Submit your answers. Please enter a valid email.';
$tinyteach_nonsubmission_msg = 'Return to the Tiny Teach online index.';
$tinyteach_askforemail = true;
$tinyteach_circular_slides = true;
$tinyteach_logo = "./assets/ttlogo.png";
$tinyteach_title = "Welcome to Tiny Teach";
?>
```
