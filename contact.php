
<?php

// Set email variables
$email_to = 'info@rarebirdsoapshop.com';
$email_subject = 'Form submission';

// Set required fields
$required_fields = array('fullname','email','comment');

// set error messages
$error_messages = array(
	'fullname' => 'Please enter a Name to proceed.',
	'email' => 'Please enter a valid Email Address to continue.',
	'comment' => 'Please enter your Message to continue.'
);

// Set form status
$form_complete = FALSE;

// configure validation array
$validation = array();

// check form submittal
if(!empty($_POST)) {
	// Sanitise POST array
	foreach($_POST as $key => $value) $_POST[$key] = remove_email_injection(trim($value));
	
	// Loop into required fields and make sure they match our needs
	foreach($required_fields as $field) {		
		// the field has been submitted?
		if(!array_key_exists($field, $_POST)) array_push($validation, $field);
		
		// check there is information in the field?
		if($_POST[$field] == '') array_push($validation, $field);
		
		// validate the email address supplied
		if($field == 'email') if(!validate_email_address($_POST[$field])) array_push($validation, $field);
	}
	
	// basic validation result
	if(count($validation) == 0) {
		// Prepare our content string
		$email_content = 'New Website Comment: ' . "\n\n";
		
		// simple email content
		foreach($_POST as $key => $value) {
			if($key != 'submit') $email_content .= $key . ': ' . $value . "\n";
		}
		
		// if validation passed ok then send the email
		mail($email_to, $email_subject, $email_content);
		
		// Update form switch
		$form_complete = TRUE;
	}
}

function validate_email_address($email = FALSE) {
	return (preg_match('/^[^@\s]+@([-a-z0-9]+\.)+[a-z]{2,}$/i', $email))? TRUE : FALSE;
}

function remove_email_injection($field = FALSE) {
   return (str_ireplace(array("\r", "\n", "%0a", "%0d", "Content-Type:", "bcc:","to:","cc:"), '', $field));
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html class="no-js" lang="en" 
	xmlns="http://www.w3.org/1999/xhtml"
      xmlns:og="http://ogp.me/ns#"
      xmlns:fb="http://www.facebook.com/2008/fbml">

<head>
	<title>Leave us a Message!</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	
<link href="contact/css/contactform.css" rel="stylesheet" type="text/css" />
     <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
     <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:300,300italic,400italic,700,400,700italic' rel='stylesheet' type='text/css'>
     <link href='http://fonts.googleapis.com/css?family=Oswald:400,300' rel='stylesheet' type='text/css'>
     <link href='http://fonts.googleapis.com/css?family=Abel|Satisfy' rel='stylesheet' type='text/css'>
     <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
     <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:300,300italic,400italic,700,400,700italic' rel='stylesheet' type='text/css'>
     <link href='http://fonts.googleapis.com/css?family=Oswald:400,300' rel='stylesheet' type='text/css'>
     <link href='http://fonts.googleapis.com/css?family=Abel|Satisfy' rel='stylesheet' type='text/css'>
     <link href="css/styles.css" rel="stylesheet" type="text/css" media="screen">
	 <link href="css/print.css" rel="stylesheet" type="text/css" media="print">
	 <link rel="shortcut icon" type="image/png" href="images/icons/Bird-For-Logo_icon.jpg" >
     
     <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/mootools/1.3.0/mootools-yui-compressed.js"></script>
	 <script type="text/javascript">
	 
        var nameError = '<?php echo $error_messages['fullname']; ?>';
		var emailError = '<?php echo $error_messages['email']; ?>';
		var commentError = '<?php echo $error_messages['comment']; ?>';
		
		
            function MM_preloadImages() { //v3.0
        var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
        var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
        if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}
     </script>
     <script type="text/javascript" src="contact/validation/validation.js"></script>
   
   
    <style type="text/css">
body,td,th {
	font-family: "Roboto Condensed", Arial, Helvetica, sans-serif;
}
body 
{
	background-image: url(images/beadboard_color.jpg);
	background-repeat: repeat;
	background-color: #FFF;
}
     a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: underline;
}
a:active {
	text-decoration: none;
}
    </style>
     
</head>
<body onload="MM_preloadImages('contact/images/x.jpg','images/beadboard_color.jpg')">




     <div  align="center" id="outter-wrapper"> 
     
<div id="social-media-header">
     	<ul>
            <li><a href="https://www.etsy.com/shop/RareBirdSoapShop"><img src="images/icons/social-media/etsy-icon.png" align="absbottom"></a></li>
        </ul>
     </div>
     
	<div id="header-wrapper">
		<div id="header" class="container">
			<div id="logo">
				<!-- <h1>Rare Bird </h1>-->
                <img src="images/Round-Logo-homepage.jpg"  alt="Business Logo Rare Bird" />
			</div>
          
			<div id="menu">
				<ul>
					<li><a href="index.html">Welcome</a></li>
					<li><a href="about.html">About</a></li>
					<li><a href="products.html">Products</a></li>
					<li><a href="services.html">Services</a></li>
					<li><a href="events.html">Events</a></li>
					<li><a href="contact.php">Contact</a></li>
				</ul>
			</div>
		</div>

	<div id="page">
		<div id="content">
<div>
		   <h1>Contact Us</h1>
     <p>Thank you for taking the time to stop by here at RareBirdSoapShop online! We are hard at work and we want to hear your input, so leave us a message below!</p>
           
              <div>
                       
                      <div id="formWrap">
                      <div id="form">
                      <?php if($form_complete === FALSE): ?>
                      <form action="contact.php" method="post" id="comments_form">
                      <div class="row">
                              <div class="label">Your Name</div> <!-- end #label --> 
                         <div class="input">
                           <input type="text"  id="fullname" class="detail" name="fullname" value="<?php echo isset($_POST['fullname'])? $_POST['fullname'] : ''; ?>" /> <?php if(in_array('fullname', $validation)): ?><span class="error">                                               <?php echo $error_messages['fullname']; ?></span><?php endif; ?>
                
                         </div><!-- end #input -->  
                                          
                              <div class="context">e.g. John Smith or Jane Doe</div>    <!--end .context -->
                      
                        </div><!-- end #row --> 
                      
                      
                      <div class="row">
                               <div class="label">Your Email Address</div> <!-- end #label --> 
                      
                                <div class="input">
                                <input type="text"  id="email" class="detail" name="email" value="<?php echo isset($_POST['email'])? $_POST['email'] : ''; ?>"/> <?php if(in_array('email', $validation)): ?><span class="error">
								<?php echo $error_messages['email']; ?></span><?php endif; ?>
              
                        </div><!-- end #input -->  
                                           
                               <div class="context">Email is protected.</div><!--end .context -->
                      
                      </div><!-- end #row -->
                      
                      
                      <div class="row">
                               <div class="label">Your Message</div><!-- end .label --> 
                      
                           <div class="input">
                             <textarea   id="comment" name="comment" class="mess"><?php echo isset($_POST['comment'])? $_POST['comment'] : ''; ?></textarea>
							  <?php if(in_array('comment', $validation)): ?><span class="error"><?php echo $error_messages['comment']; ?></span><?php endif; ?>
            
                           </div><!-- end #input -->     
                        </div><!-- end #row -->      
                    
                      
                      <div class="submit">
                           <input type="submit" id="submit" name="submit" value="Send Message" />
                      </div><!--end  .sumbit-->
                      </form>
					  
					  <?php else: ?>
                       <p style="font-size:35px; font-family:Arial, Helvetica, sans-serif; color:#f58d4c">Thank you for your Message!</p>
                       
                       <script type="text/javascript">
						setTimeout('ourRedirect()', 5000)
						function ourRedirect () {
							location.href='index.html' }
                       </script>
                       
                        <?php endif; ?>
           
                      
                      </div><!-- end #form --> 
                      </div><!-- end #formWrap --> 
                   <br />
                         <p>Thank you for taking the time to contact us here at RareBirdSoapShop!</p>
                         
					        <!--<p class="links"><a href="sample.html" class="more">Read More</a></p>-->
                    
			</div>
	</div>
    
        </div>
		<!-- end #content -->
		<div id="sidebar">
        
                  <p>
                          <h2 align="center">Calendar of Events</h2>
                </p>
                 
                 <p>
                         <h3>Iowa City Farmer's Market</h3>
                            <ul>
                            <li>Every Saturday May- October  7.30am-12:00</li> 
                           </ul>
                </p>
                 
                  <p>          
                                  <h3> Downtown Cedar Rapids Farmer's Market</h3>
                            <ul>
                                 <li>June- September</li>
                            </ul> 
                  </p>
                  
                   <p>         
                               <h3>Mercy Auxiliary Mistletoe Market</h3>
                           701 10th Street SECedar Rapids, IA 52403
                          <ul>
                          <li> Thursday, November 12 from 9:00am-4:00pm</li> 
                          </ul>
                  </p>
                  
                   <p>
                             <h3>Old World Christmas Market at the Czech &amp; Slovak Museum &amp; Library</h3> 
                          <ul>
                             <li> Saturday, December 5 from 10:00am-5:00pm</li>
                         </ul>
                                Sunday, December 6 from 10:00am-3:00pm
                  </p>
                  
                  <p>
                        <h3>Holiday Farmer's Market </h3>
                       <ul>  
                        <li> Saturday, November 14 from 8am - 1pm</li>
						<li>Saturday, December 12 from 8am - 1pm</li>
                      </ul>
						 <br> Iowa City, Iowa
                  </p>
                  
                      <p>
                             <h3>Eastside Artist AnnualShow&amp;Sale</h3>
						<ul>
                            <li>Friday, December 4 from 10am -5pm</li>
						    <li>Saturday, December 5 from 10am-5pm</li>
						    <li>Sunday, December 6 from 10am -5pm</li>
                        </ul>
                       <br> Iowa City, Iowa
                      </p>
      </div>
		<!-- end #sidebar -->
		<div style="clear: both;">&nbsp;</div>
	</div>
	<!-- end #page --> 
</div>
<div id="footer-content-wrapper">
	<div id="footer-content">
		<div id="fbox1">
		<h2>About us!</h2>
			<ul class="style1">
				<li class="first"><!--<a href="#">-->Welcome to Rare Bird Soap Shop!<!--</a>--></li>
				<li><!--<a href="#">-->We specialize in all natural<!--</a>--></li>
				<li><!--<a href="#">-->handcrafted soaps; that have<!--</a>--></li>
				<li><!--<a href="#">-->a nice soapy lather <!--</a>--></li>
				<li><!--<a href="#">-->and are long lasting.<!--</a>--></li>
			</ul>
		</div>
		<div id="fbox2">
			<h2>product Review</h2>
			<ul class="style1">
				<li class="first"><!--<a href="#">-->Our products are handmade in<!--</a>--></li>
				<li><!--<a href="#">-->small batches using the cold process<!--</a>--></li>
				<li><!--<a href="#">-->method and made with all natural,<!--</a>--></li>
				<li><!--<a href="#">-->vegan ingredients including coconut,<!--</a>--></li>
				<li><!--<a href="#">-->palm, olive and sunflower oils.<!--</a>--></li>
			</ul>
		</div>
		<div id="fbox3">
			<h2>Events &amp; Markets</h2>
			<ul class="style1">
				<li class="first"><!--<a href="#">-->Farmer's Markets, our shop<!--</a>--></li>
				<li><!--<a href="#">-->at NewBo City Market, and<!--</a>--></li>
				<li><!--<a href="#">-->special events, you can<!--</a>--></li>
				<li><!--<a href="#">-->find us all year long!<!--</a>--></li>
				<li><!--<a href="#">-->And online too..<!--</a>--></li>
			</ul>
		</div>
	</div>
</div>

<div id="footer">
	  <div align="center" id="footer-text-jpg">
      <img src="contact/images/text-footer.png" align="middle">
</div>

 <div id="social-media">
   	  <ul>
           
          	<li><a href="https://www.facebook.com/pages/Rare-Bird-Soap-Shop/496839960405524"><img src="images/icons/social-media/facebook.png"></a></li>
          	<li><a href="https://instagram.com/rare_bird_soap_shop/"><img src="images/icons/social-media/Instagram_icon.png"></a></li>
          	<li><a href="https://www.etsy.com/shop/RareBirdSoapShop"><img src="images/icons/social-media/etsy-icon.png"> </a></li>     	
          
      </ul>
 </div>
     
     <p class="footer-text">©Copyright 2015 • All Rights Reserved • Rare Bird Soap Shop • </p>
     <p class="footer-text">NewBo City Market, Cedar Rapids, Iowa, 52401 &bull; info@rarebirdsoapshop.com• <a href="http://www.rarebirdsoapshop.com/contact.php">Contact Us</a></p>
     <p class="footer-text">Check out our Web Designer and Photographer for this site!</p>
     <p class="footer-text">
     <a href="http://www.tektechnologies.com" title="Web Designer">Web Design by TekTechnologies</a> 
     • <a href="http://www.destineylynn.com" title="Photographer">destiney lynn photography</a>
       • <a href="../sitemap.html">Sitemap</a>    
  </p>
       </div>
</div>
<!-- end #footer -->
</body>
</html>
