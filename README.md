# tiny-teach
A simple audio annotation web application for presenting simple, short, straightforward topics (using popcorn.js). Live <a href="http://teach.sambwa.com" target="_blank">Demo Here</a>.

<img src="https://raw.githubusercontent.com/tinyteach/tiny-teach/master/assets/screenshot.jpg" alt="Tiny Teach Screenshot" />


## Installation
### Clone the Repository (or simply download and install in your web application directory)
    $ git clone https://github.com/tinyteach/tiny-teach.git

### Configure config.php file

Change the values in the config.php file to match your needs :

```php
$tinyteach_from_email = "example@example.com";  //mail uses this from address (must be valid domain on your host)
$tinyteach_to_email = 'example@example.com';    //address submitted data is sent to
$tinyteach_submission_msg = 'Submit your answers. Please enter a valid email.'; //Submission Prompt Text
$tinyteach_nonsubmission_msg = 'Return to the Tiny Teach online index.';        //Prompt Text when Submission disabled
$tinyteach_askforemail = true;                  //True if submissions are required, false to disable
$tinyteach_circular_slides = true;              //True to enable circular borders on slides
$tinyteach_logo = "./assets/ttlogo.png";        //Location of Index page Logo
$tinyteach_title = "Welcome to Tiny Teach";     //Site title
```

## Lesson Creation

To create a lesson, you will need audio, images and text.  We will use a standardized XML file (outlined below) to make this data readable to Tiny Teach.

