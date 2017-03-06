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

To create a lesson, you will need audio, images and text.  We will use a standardized XML file (outlined below) to make this data readable to Tiny Teach.  Each lesson needs to have an XML file created in the <i>lesson</i> directory.  An example of a valid XML file is below (<a href="https://raw.githubusercontent.com/tinyteach/tiny-teach/master/assets/lesson1.xml">lesson1.xml</a>).  Each lesson needs a <i>title</i> and an <i>audio</i> attribute.  Nested within the <i>lesson</i> tag are <i>slide</i> tags, if slides are present.

```xml
<lesson>
	<title>Welcome to Tiny Teach</title>  <!-- Title of lesson : REQUIRED -->
	<audio>./lesson1/lesson1.mp3</audio>  <!-- Location of audio file : REQUIRED -->
	<slide>
		<in>0.0</in>  <!-- When this slide begins in seconds : REQUIRED for slide -->
		<out>30.0</out>  <!-- When this slide ends in seconds : REQUIRED for slide  -->
		<notes><![CDATA[<b>Welcome to Tiny Teach</b><br/><br/>
		Tiny Teach is a NOOC (<i>Normal Open Online Course</i>).  Similar to a MOOC (<a href="https://en.wikipedia.org/wiki/Massive_open_online_course" target="_blank">Massive Open Online Course</a>), Tiny Teach is a simplified bare-bones web application that adds annotations and slides to audio recordings listed in a dynamic directory.  This application allows for the rapid development and deployment of medium sized (1-1000 seat) classroom lessons.]]></notes>
		<image>./lesson1/image1.jpg</image> <!-- Image for current slide -->
	</slide>
	<slide>
		<in>30.0</in>
		<out>66.0</out>
		<notes><![CDATA[<b>The goal of Tiny Teach</b> is to take audio recordings and add timed multimedia features via HTML in a structured and coherent fashion.  Tiny Teach uses the Popcorn.js library to sync slide events to audio.  XML is used to structure the slides for publication on the platform.<br/><br/>
		Lessons are read directly from the lesson directory, creating a dynamic list of available courses. <u>Tiny Teach is also responsive</u>, making it ideal for students who only have access to mobile technologies.]]> </notes>
		<question>What type of rich, engaging lessons would you create?</question>  <!-- Question for current slide -->
		<image>./lesson1/image2.jpg</image>
	</slide>
	<slide>
		<in>66.0</in>
		<out>90.0</out>
		<notes>It is hoped that in this manner, any educator can create short high-quality lessons (10-15 minutes) within 60-90 minutes.  These NOOCs become tiny reinforcements of classroom content or a powerful series of additional curriculum enhancements.  Enjoy Tiny Teach.  Use it to engage, upgrade and empower your classroom! </notes>
		<image>./lesson1/image3.jpg</image>
	</slide>
</lesson>
```
Slides require <i>in</i> and <i>out</i> tags.  <i>Notes</i>, <i>question</i> and <i>image</i> tag are optional within the <i>slide</i> tag. For <i>notes</i> tags with HTML data, use the <i><![CDATA[  ]]></i> wrapper. Check out the example lesson included with Tiny Teach (under the <i>lessons</i> directory) for more details.

### Audio file
Audio files can be in MP3 and OGG format.  OGG format does not play well on iOS devices.  If you expect iOS users to view your lessons, please use MP3.
