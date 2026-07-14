<?php
	// Start session.
	session_start();
	
	// Set a key, checked in mailer, prevents against spammers trying to hijack the mailer.
	$security_token = $_SESSION['security_token'] = uniqid(rand());
	
	if ( ! isset($_SESSION['formMessage'])) {
		$_SESSION['formMessage'] = 'Please feel free to contact me using the form below';	
	}
	
	if ( ! isset($_SESSION['formFooter'])) {
		$_SESSION['formFooter'] = '';
	}
	
	if ( ! isset($_SESSION['form'])) {
		$_SESSION['form'] = array();
	}
	
	function check($field, $type = '', $value = '') {
		$string = "";
		if (isset($_SESSION['form'][$field])) {
			switch($type) {
				case 'checkbox':
					$string = 'checked="checked"';
					break;
				case 'radio':
					if($_SESSION['form'][$field] === $value) {
						$string = 'checked="checked"';
					}
					break;
				case 'select':
					if($_SESSION['form'][$field] === $value) {
						$string = 'selected="selected"';
					}
					break;
				default:
					$string = $_SESSION['form'][$field];
			}
		}
		return $string;
	}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content=
"text/html; charset=utf-8" />
<meta name="robots" content="all" />
<link rel="icon" href="http://cesar-delgado.info/favicon.ico" type=
"image/x-icon" />
<link rel="shortcut icon" href=
"http://cesar-delgado.info/favicon.ico" type="image/x-icon" />
<title>Contact</title>
<link rel="stylesheet" type="text/css" media="screen" href=
"../rw_common/themes/aqualicious_cesar/styles.css" />
<link rel="stylesheet" type="text/css" media="print" href=
"../rw_common/themes/aqualicious_cesar/print.css" />
<link rel="stylesheet" type="text/css" media="handheld" href=
"../rw_common/themes/aqualicious_cesar/handheld.css" />
<link rel="stylesheet" type="text/css" media="screen" href=
"../rw_common/themes/aqualicious_cesar/css/styles/metal.css" />
<link rel="stylesheet" type="text/css" media="screen" href=
"../rw_common/themes/aqualicious_cesar/css/sidebar/sidebar_hide.css" />
<link rel="stylesheet" type="text/css" media="screen" href=
"../rw_common/themes/aqualicious_cesar/css/font/modern.css" />
<link rel="stylesheet" type="text/css" media="screen" href=
"../rw_common/themes/aqualicious_cesar/css/background/darkgradient.css" />
<link rel="stylesheet" type="text/css" media="screen" href=
"../rw_common/themes/aqualicious_cesar/css/width/variable.css" />
<link rel="stylesheet" type="text/css" media="screen" href=
"../rw_common/themes/aqualicious_cesar/accordion.css" />
<link rel="stylesheet" type="text/css" media="screen" href=
"../rw_common/themes/aqualicious_cesar/custom.css" />
<link rel="stylesheet" type="text/css" media="screen" href=
"../rw_common/themes/aqualicious_cesar/spacegallery.css" />
<script type="text/javascript" src=
"../rw_common/themes/aqualicious_cesar/javascript.js">
</script>
</head>
<body>
<div id="gradient"></div>
<div id="navcontainer"><!-- Start Navigation -->
<ul>
<li><a href="../index.html" rel="self">Home</a></li>
<li><a href="../works/examples.html" rel="self">Results</a></li>
<li><a href="../webdesign.html" rel="self">WordPress</a></li>
<li><a href="contact.php" rel="self" id="current" name=
"current">Contact</a></li>
<li><a href="../works/news.html" rel="self">News</a></li>
</ul>
</div>
<!-- End navigation -->
<div id="container"><!-- Start container -->
<div id="pageHeader"><!-- Start page header -->
<h1><a href="http://cesar-delgado.info">César Delgado</a></h1>
</div>
<!-- End page header -->
<div id="orangeLine">Welcome</div>
<div id="sidebarContainer"><!-- Start Sidebar wrapper -->
<div id="sidebar"><!-- Start sidebar content -->
<h1 class="sideHeader"></h1>
<!-- Sidebar header -->
<br />
<!-- sidebar content you enter in the page inspector -->
 <!-- sidebar content such as the blog archive links --></div>
<!-- End sidebar content --></div>
<!-- End sidebar wrapper -->
<div id="contentContainer"><!-- Start main content wrapper -->
<div id="content"><!-- Start content -->
<div class="contentSpacer"></div>
<!-- this makes sure the content is long enough for the design -->
<div class="message-text">
<?php echo $_SESSION['formMessage']; unset($_SESSION['formMessage']); ?></div>
<br />
<form action="./files/mailer.php" method="post" enctype=
"multipart/form-data">
<div><label>Your Name:</label><br />
<input class="form-input-field" type="text" value=
"<?php echo check('element0'); ?>" name="form[element0]" size=
"40" /><br />
<br />
<label>Your Email:</label> *<br />
<input class="form-input-field" type="text" value=
"<?php echo check('element1'); ?>" name="form[element1]" size=
"40" /><br />
<br />
<label>Subject:</label><br />
<input class="form-input-field" type="text" value=
"<?php echo check('element2'); ?>" name="form[element2]" size=
"40" /><br />
<br />
<label>Message:</label> *<br />
<textarea class="form-input-field" name="form[element3]" rows="8"
cols="38">
<?php echo check('element3'); ?>
</textarea>
<br />
<br />
<div style="display: none;"><label>Spam Protection: Please don't
fill this in:</label> 
<textarea name="comment" rows="1" cols="1">
</textarea></div>
<input type="hidden" name="form_token" value=
"<?php echo $security_token; ?>" /> <input class=
"form-input-button" type="reset" name="resetButton" value=
"Reset" /> <input class="form-input-button" type="submit" name=
"submitButton" value="Submit" /></div>
</form>
<br />
<div class="form-footer">
<?php echo $_SESSION['formFooter']; unset($_SESSION['formFooter']); ?></div>
<br />
<?php unset($_SESSION['form']); ?>
<div class="clear"></div>
<div class="clearer"></div>
</div>
<!-- End content --></div>
<!-- End main content wrapper -->
<div class="clearer"></div>
<div id="footer"><!-- Start Footer -->
<div id="breadcrumbcontainer">
<!-- Start the breadcrumb wrapper --></div>
<!-- End breadcrumb -->
<p><script type="text/javascript">
//<![CDATA[
var _rwObsfuscatedHref0 = "mai";var _rwObsfuscatedHref1 = "lto";var _rwObsfuscatedHref2 = ":ce";var _rwObsfuscatedHref3 = "sar";var _rwObsfuscatedHref4 = "130";var _rwObsfuscatedHref5 = "177";var _rwObsfuscatedHref6 = "@gm";var _rwObsfuscatedHref7 = "ail";var _rwObsfuscatedHref8 = ".co";var _rwObsfuscatedHref9 = "m";var _rwObsfuscatedHref = _rwObsfuscatedHref0+_rwObsfuscatedHref1+_rwObsfuscatedHref2+_rwObsfuscatedHref3+_rwObsfuscatedHref4+_rwObsfuscatedHref5+_rwObsfuscatedHref6+_rwObsfuscatedHref7+_rwObsfuscatedHref8+_rwObsfuscatedHref9; document.getElementById('rw_email_contact').href = _rwObsfuscatedHref;
//]]>
</script></p>
		 <p>
		 <a href="http://es.scribd.com/CesarElectronic/collections" title="Scribd - Collections" rel="nofollow" target="_blank"><img src="../assets/scribd_icon.png" height="75px" alt="Scribd" /></a>
		 <a href="http://www.mathworks.com/matlabcentral/fileexchange/authors/13983" title="Matlab Works" rel="nofollow" target="_blank"><img src="../assets/MATLAB.png" width="88px" alt="Matlab" /></a>
		 </p>
		<p>Browsers: IE7 won't render fine, due to IE image processing bug. Please use IE8, Opera 9+, Firefox 3+ or Chrome.</p>

</div>
<!-- End Footer --></div>
<!-- End container -->
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-20286011-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</body>
</html>