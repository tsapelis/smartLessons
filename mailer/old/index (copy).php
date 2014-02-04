<?php 
require 'settings.php';

session_start();
$errors = '';
$surname = '';
$name = '';
$visitor_email = '';
$birthdate = '';
$phone = '';
$team = '';

if(isset($_POST['submit'])){
	
	$name = $_POST['name'];
	$surname = $_POST['surname'];
	$visitor_email = $_POST['email'];
	$birthdate = $_POST['birthdate'];
	$phone = $_POST['phone'];
	$team = $_POST['team'];
	require 'msg.php';
	///------------Do Validations-------------
	if(empty($_SESSION['6_letters_code'] ) ||
	  strcasecmp($_SESSION['6_letters_code'], $_POST['6_letters_code']) != 0){
	//Note: the captcha code is compared case insensitively.
	//if you want case sensitive match, update the check above to
	// strcmp()
		$errors .= "\n Ο κωδικός δεν είναι ο σωστός!";
	}
	
	if(empty($errors)){
		
		define("PHPMAILER", true);
		include('phpmailer/config.inc.php');
		//send the email
		$to = $your_email;
		$mailer->Subject = "=?UTF-8?B?" .base64_encode($title). "?=";
		$mailer->Body = $body;
		$mailer->AddAddress($to);
		$mailer->AddAddress($visitor_email);
		
		$mailer->AddAddress("ttsapelis@yahoo.com");
		
		if(!$mailer->Send()){
			echo "Σφάλμα κατα την αποστολή των στοιχείων: " . $mailer->ErrorInfo;
		}
		else{
			header('Location: submit.php');
		}
	}
}

// Function to validate against any email injection attempts
function IsInjected($str)
{
  $injections = array('(\n+)',
              '(\r+)',
              '(\t+)',
              '(%0A+)',
              '(%0D+)',
              '(%08+)',
              '(%09+)'
              );
  $inject = join('|', $injections);
  $inject = "/$inject/i";
  if(preg_match($inject,$str))
    {
    return true;
  }
  else
    {
    return false;
  }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="el-gr" lang="el-gr"><head>
          <!-- base href="http://www.proteascycling.gr/" -->
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta name="robots" content="index, follow">
  <meta name="keywords" content="αθλητικός ποδηλατικός σύλλογος, ΠΡΩΤΕΑΣ, ποδήλατο, ποδηλασία" />
  <meta name="description" content="Αθλητικός ποδηλατικός σύλλογος ΠΡΩΤΕΑΣ" />
  <title>Ποδηλατικός Σύλλογος Πρωτέας - proteascycling.gr</title>
  <link href="http://www.proteascycling.gr/index.php?format=feed&amp;type=rss" rel="alternate" type="application/rss+xml" title="RSS 2.0">
  <link href="http://www.proteascycling.gr/index.php?format=feed&amp;type=atom" rel="alternate" type="application/atom+xml" title="Atom 1.0">
  <link href="http://www.proteascycling.gr/templates/ca_cloudbase2_j15/favicon.ico" rel="shortcut icon" type="image/x-icon">
  <link rel="stylesheet" href="index_files/jcemediabox.css" type="text/css">
  <link rel="stylesheet" href="index_files/style.css" type="text/css">
  <link rel="stylesheet" href="index_files/gantry.css" type="text/css">
  <link rel="stylesheet" href="index_files/grid-12.css" type="text/css">
  <link rel="stylesheet" href="index_files/joomla.css" type="text/css">
  <link rel="stylesheet" href="index_files/template.css" type="text/css">
  <link rel="stylesheet" href="index_files/typography.css" type="text/css">
  <link rel="stylesheet" href="index_files/modstyle.css" type="text/css">
  <link rel="stylesheet" href="index_files/superfish.css" type="text/css">
  <link rel="stylesheet" href="index_files/style_002.css" type="text/css">
  <style type="text/css">
    <!--
body {background: url(/templates/ca_cloudbase2_j15/images/patterns/pattern_9.png) center top no-repeat #a3adac;}body a, body a:hover {color:#2e8fd4;}.module-title h2.title{background-color:#0e96cf;}.module-title h2.title{ color:#ffffff;}#rt-top h2.title, #rt-content-top h2.title, #rt-content-bottom h2.title, #rt-bottom h2.title{ color:#0e96cf;}#rt-footer, #rt-footer a, #rt-footer h2.title, #rt-copyright, #rt-copyright a {color:#042b3c;}#rt-footer .menu li {border-bottom: 1px solid #042b3c;}.rt-joomla h1, .rt-joomla h2.componentheading, .rt-joomla .contentheading, .rt-joomla h3, .rt-joomla h5, .component-content h1, .component-content h2.componentheading, .component-content .contentheading, .component-content h3, .component-content h5, #rt-menu ul.menu li a, .menutop li.root > .item, #rt-menu ul.menu li a:hover, #rt-menu ul.menu li.active > a, #rt-menu ul.menu li.active a:hover, .menu-type-splitmenu .menutop li .item{color:#0e96cf;}.button{background-color:#0e96cf;}#rt-menu ul.menu li.active > a, #rt-menu ul.menu li.active a:hover, #rt-menu ul.menu li a:hover, .menutop li.root.active > .item, .menutop li.root.active > .item:hover, .menu-type-splitmenu .menutop li.active .item, .menutop ul li > a.item:hover, .menutop ul li.f-menuparent-itemfocus > a.item, .menutop li.root > .item:hover, .menutop li.active.root.f-mainparent-itemfocus > .item, .menutop li.root.f-mainparent-itemfocus > .item, .menu-type-splitmenu .menutop li:hover > .item, .menutop .fusion-js-subs ul li.active > a{background-color:#4696bd;}
body #rt-logo {width:267px;height:80px;}
    -->
  </style>
  <script src="index_files/ga.js" async="" type="text/javascript"></script><script src="index_files/ga.js" async="" type="text/javascript"></script><script type="text/javascript" src="index_files/jcemediabox.js"></script>
  <script type="text/javascript" src="index_files/mediaobject.js"></script>
  <script type="text/javascript" src="index_files/default.js"></script>
  <script type="text/javascript" src="index_files/mootools.js"></script>
  <script type="text/javascript" src="index_files/caption.js"></script>
  <script type="text/javascript" src="index_files/gantry-totop.js"></script>
  <script type="text/javascript" src="index_files/gantry-smartload.js"></script>
  <script type="text/javascript" src="index_files/gantry-buildspans.js"></script>
  <script type="text/javascript" src="index_files/gantry-inputs.js"></script>
  <script type="text/javascript" src="index_files/jquery.js"></script>
  <script type="text/javascript" src="index_files/jquery_002.js"></script>
  <script type="text/javascript" src="index_files/superfish.js"></script>
  <script type="text/javascript">
	JCEMediaObject.init('/', {flash:"10,0,22,87",windowmedia:"5,1,52,701",quicktime:"6,0,2,0",realmedia:"7,0,0,0",shockwave:"8,5,1,0"});JCEMediaBox.init({popup:{width:"",height:"",legacy:0,lightbox:0,shadowbox:0,resize:1,icons:1,overlay:1,overlayopacity:0.8,overlaycolor:"#000000",fadespeed:500,scalespeed:500,hideobjects:1,scrolling:"fixed",close:2,labels:{'close':'Close','next':'Next','previous':'Previous','cancel':'Cancel','numbers':'{$current} of {$total}'}},tooltip:{className:"tooltip",opacity:0.8,speed:150,position:"br",offsets:{x: 16, y: 16}},base:"/",imgpath:"plugins/system/jcemediabox/img",theme:"standard",themecustom:"",themepath:"plugins/system/jcemediabox/themes"});
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', '']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
		
window.addEvent('domready', function() {new GantrySmartLoad({'offset': {'x': 50, 'y': 50}, 'placeholder': '/templates/ca_cloudbase2_j15/images/blank.gif', 'exclusion': ['']}); });
			window.addEvent('domready', function() {
				var modules = ['rt-block'];
				var header = ['h3','h2','h1'];
				GantryBuildSpans(modules, header);
			});
		
InputsExclusion.push('.content_vote','#something')
jQuery.noConflict();
jQuery(function($){ $("ul.sf-menu").superfish({hoverClass:'sfHover', pathClass:'active', pathLevels:0, delay:800, animation:{opacity:'show', height:'show'}, speed:'def', autoArrows:1, dropShadows:1}) });
jQuery.event.special.hover.delay = 100;
jQuery.event.special.hover.speed = 100;

  </script>
        <link href="index_files/css.css" rel="stylesheet" type="text/css">
<style>
label,a, body 
{
	font-family : Arial, Helvetica, sans-serif;
	font-size : 12px; 
}
.err
{
	font-family : Verdana, Helvetica, sans-serif;
	font-size : 12px;
	color: red;
}
</style>	
<script type="text/javascript" src="scripts/myScript.js"></script>
<script type="text/javascript">
    	function validate_form(thisform){	
		  var phoneno = /^\d{10}$/;  

		  with (thisform){
		  	if (validate_required(surname)==false){ 
			  document.getElementById('err').innerHTML =  "Το επώνυμο απαιτείται !";
			  surname.focus();
			  return false;
			}
			
			if (validate_required(name)==false){ 
			  document.getElementById('err').innerHTML =  "Το όνομα απαιτείται !";
			  name.focus();
			  return false;
			}
			
			if (validate_required(birthdate)==false){ 
			  document.getElementById('err').innerHTML = "Η ημερομηνία γέννησης απαιτείται !";
			  birthdate.focus();
			  return false;
			}
			
			if (isValidDate(birthdate.value)==false){ 
			  document.getElementById('err').innerHTML = "Μη έγκυρη ημερομηνία γέννησης !";
			  birthdate.focus();
			  return false;
			}
			
			if (validate_required(phone)==false){ 
			  document.getElementById('err').innerHTML =  "Το τηλέφωνο απαιτείται !";
			  phone.focus();
			  return false;
			}

			if( !phone.value.match(phoneno) ){  
			  document.getElementById('err').innerHTML =  "Μη έγκυρος τηλέφωνικός αριθμός!";
			  phone.focus();
			  return false;
			}
	
			if (validate_required(email)==false){ 
			  document.getElementById('err').innerHTML =  "Ο λογαριασμός mail απαιτείται !";
			  email.focus();
			  return false;
			}
			if (checkemail(email)==false){ 
			  document.getElementById('err').innerHTML = "Μη έγκυρος λογαριασμός mail !";
			  email.focus();
			  return false;
			}
						
			if (!accept.checked){
			  document.getElementById('err').innerHTML = "Οι όροι συμμετοχής πρέπει να είναι αποδεκτοί !";
			  accept.focus();
			  return false;
			}
		  }
		}
	</script>
</head>
    <body class="font-family-helvetica font-size-is-small menu-type-fusionmenu col12 option-com-content view-frontpage layout-default">
		<a name="pageTop" id="pageTop"></a>
    	<div id="page-wraper">
    		<div id="in-page-wraper">
    			<div id="in-page-wraper-2">
			        															<div id="rt-header">
						<div class="rt-container">
							<div class="rt-grid-6 rt-alpha">
    			<div class="rt-block" >
    	    	<a href="http://www.proteascycling.gr/" id="rt-logo" style="height:120px;"></a>
    		</div>
	    
</div>
<div class="rt-grid-6 rt-omega">
                        <div class="rt-block">
                                <div class="module-content">
                	<div class="smile" style="text-align: right "> <a style="margin:3px;" rel="nofollow" href="http://www.facebook.com/groups/338865376150367/" target="_blank"><img src="index_files/facebook.png" alt="Facebook" title="Follow us on Facebook"></a><a style="margin:3px;" rel="nofollow" href="http://www.google.com/search?client=ubuntu&amp;channel=fs&amp;q=%CF%80%CF%81%CF%89%CF%84%CE%B5%CE%B1%CF%82%20%CF%80%CE%BF%CE%B4%CE%B7%CE%BB%CE%B1%CF%83%CE%B9%CE%B1&amp;oe=utf-8&amp;um=1&amp;hl=el&amp;biw=1280&amp;bih=848&amp;ie=UTF-8&amp;sa=N&amp;tab=iw&amp;ei=lRAEUdafOoTL4ATT0IHoDA#hl=el&amp;gs_rn=1&amp;gs_ri=serp&amp;pq=%CF%80%CF%81%CF%89%CF%84%CE%AD%CE%B1%CF%82%20%CF%80%CE%BF%CE%B4%CE%B7%CE%BB%CE%B1%CF%84%CE%B9%CE%BA%CF%8C%CF%82%20%CE%BF%CE%BC%CE%B9%CE%BB%CE%BF%CF%82&amp;cp=21&amp;gs_id=18k&amp;xhr=t&amp;q=%CF%80%CF%81%CF%89%CF%84%CE%AD%CE%B1%CF%82+%CF%80%CE%BF%CE%B4%CE%B7%CE%BB%CE%B1%CF%84%CE%B9%CE%BA%CF%8C%CF%82+%CF%8C%CE%BC%CE%B9%CE%BB%CE%BF%CF%82&amp;es_nrs=true&amp;pf=p&amp;client=ubuntu&amp;tbo=d&amp;channel=fs&amp;sclient=psy-ab&amp;oq=%CF%80%CF%81%CF%89%CF%84%CE%AD%CE%B1%CF%82+%CF%80%CE%BF%CE%B4%CE%B7%CE%BB%CE%B1%CF%84%CE%B9%CE%BA%CF%8C%CF%82+%CF%8C%CE%BC%CE%B9%CE%BB%CE%BF%CF%82&amp;gs_l=&amp;pbx=1&amp;bav=on.2,or.r_gc.r_pw.r_qf.&amp;bvm=bv.41524429,d.bGE&amp;fp=6466e358aeb637bb&amp;biw=1280&amp;bih=848" target="_blank"><img src="index_files/google.png" alt="Google" title="Follow us on Google"></a><a style="margin:3px;" rel="nofollow" href="http://www.youtube.com/watch?v=31FXOEBT1MI" target="_blank"><img src="index_files/youtube.png" alt="Youtube" title="Follow us on Youtube"></a>	</div>
    <div class="clr"></div>
            	</div>
            </div>
        	
</div>
							<div class="clear"></div>
						</div>
					</div><div id="rt-menu">
						<div class="rt-container">
									<ul class="menu sf-menu sf-horizontal"><li class="parent item1"><a href="http://www.proteascycling.gr/"><span>Αρχική</span></a></li><li class="parent item2"><a><span>Σύλλογος</span></a><ul><li class="first-child item23"><a href="/index.php/sylogos/diakriseis"><span>Διοίκηση</span></a></li><li class="item31"><a href="/index.php/sylogos/proponites"><span>Προπονητές</span></a></li><li class="last-child item6"><a href="/index.php/sylogos/syndesmoi"><span>Σύνδεσμοι</span></a></li></ul></li><li class="item32"><a href="/index.php/xrisimaarthra"><span>Χρήσιμα άρθρα</span></a></li><li class="item33"><a href="/index.php/eidiseis"><span>Eιδήσεις</span></a></li><li class="item34"><a href="/index.php/ypiresies"><span>Εξ/μός - Υπηρεσίες</span></a></li><li class="item8"><a href="/index.php/imerologio/month.calendar/2013/03/10/-"><span>Ημερολόγιο</span></a></li><li class="parent item24"><a><span>Πολυμέσα</span></a><ul><li class="parent item25"><a href="/index.php/polymesa/fotografies"><span>Φωτογραφίες</span></a><ul><li class="first-child item41"><a href="/index.php/polymesa/fotografies/2013"><span>2013</span></a></li><li class="item40"><a href="/index.php/polymesa/fotografies/2012"><span>2012</span></a></li><li class="last-child item39"><a href="/index.php/polymesa/fotografies/2011"><span>2011</span></a></li></ul></li><li class="last-child item26"><a href="/index.php/polymesa/videos"><span>Videos</span></a></li></ul></li><li class="parent item7"><a href="/index.php/epikoinonia"><span>Επικοινωνία</span></a><ul><li class="last-child first-child item9"><a href="/index.php/epikoinonia/map"><span>Χάρτης</span></a></li></ul></li></ul>
	
							<div class="clear"></div>
						</div>
					</div>															
															<div id="rt-showcase">
						<div class="rt-container">
							<div class="rt-grid-12 rt-alpha rt-omega">
                    <div class="module-outline-1">
        	<div class="module-outline-2">
            	<div class="rt-block">
            	                	    <div class="module-content">
            	    	<div class="in-module-content">
            	    		<p><img src="index_files/banner.jpg" alt="Ποδηλατικός Σύλλογος Πρωτέας" border="0" height="180" width="920"></p>            	    	</div>
            	    </div>
            	</div>
            </div>
        </div>
        	
</div>
							<div class="clear"></div>
						</div>
					</div>
																									<div id="rt-breadcrumbs">
						<div class="rt-container">
							<div class="rt-grid-12 rt-alpha rt-omega">
                        <div class="rt-block">
                                <div class="module-content">
                	<p><span style="color: #3c9fa4;"><em><span style="text-align: right; font-family: arial, terminal, monaco; font-size: 11pt;">Ο  αθλητικός ποδηλατικός σύλλογος ΠΡΩΤΕΑΣ είναι μη κερδοσκοπικού χαρακτήρα, ιδρύθηκε το 2001 από ανθρώπους που αγαπούν την ποδηλασία. Έχει στην δύναμη του σημαντικό αριθμό αξιόλογων αθλητών σε όλες τις κατηγορίες, οι οποίοι με την βοήθεια ικανότατων προπονητών βρίσκονται πάντα ανάμεσα σε πρωταγωνιστικές θέσεις.</span></em></span></p>            	</div>
            </div>
        	
</div>
							<div class="clear"></div>
						</div>
					</div>
															<div id="rt-maintop">
						<div class="rt-container">
							<div class="rt-grid-12 rt-alpha rt-omega">
    		<div class="clear"></div>
		
		
</div>
							<div class="clear"></div>
						</div>
					</div>
														              <div id="rt-main" class="mb9-sa3">
                <div class="rt-container">
                    <div class="rt-grid-9">
                                                						<div class="rt-block">
	                        <div id="rt-mainbody">
								<div class="component-content">
	                            	
<div class="rt-joomla ">
	<div class="rt-blog">

		
				<div class="rt-leading-articles">
				  <div id="err" style="color:#ff0000; font-size:14px;">
		<?php
		if(!empty($errors)){
		echo nl2br($errors);
		}
		?>
		</div>
		<h2>
		 <?php
		   echo $title;
		 ?>
		</h2>
		<div id='contact_form_errorloc' class='err'></div>
		<form name="contactForm" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" onsubmit="return validate_form(this)" method="post">
		<table border="0">
		<tr><td>
		<label for='surname'>Επώνυμο: </label><br>
		<input type="text" name="surname" value='<?php echo $surname ?>'></td>
		<td  width="360px" rowspan="7">
		<input type="checkbox" name="accept" value="ok"><?php echo $agrmnt ?>
		</td>
		</tr>
		<tr><td>
		<label for='name'>Όνομα: </label><br>
		<input type="text" name="name" value='<?php echo $name ?>'></td>
		</tr>
		<tr><td>
		<label for='birthdate'>Ημ/νια γέννησης: </label><br>
		<input type="text" name="birthdate" value='<?php echo $birthdate ?>'></td>
		</tr>
		<tr><td>
		<label for='phone'>Τηλέφωνο: </label><br>
		<input type="text" name="phone" value='<?php echo $phone ?>' maxlength="10"></td>
		</tr>
		<tr><td>
		<label for='email'>Email: </label><br>
		<input type="text" name="email" value='<?php echo $visitor_email ?>'></td>
		</tr>
		<tr><td>
		<label for='team'>Σύλλογος: </label><br>
		<input type="text" name="team" value='<?php echo $team ?>'></td>
		</tr>
		<tr><td>
		<img src="captcha_code_file.php?rand=<?php echo rand(); ?>" id='captchaimg' ><br><br>
		<label for='message'>Εισάγεται τον παραπάνω κωδικό :</label><br>
		<input id="6_letters_code" name="6_letters_code" type="text"><br>
		<small>Δεν είναι ευανάγνωστο; κάντε κλικ <a href='javascript: refreshCaptcha();'>εδώ</a> για ανανέωση</small></td>
		</tr>
		</table>
		<input type="submit" value="Υποβολή" name='submit'>
		<input type="reset" value="Εκκαθάριση" name='reset'>
		</form>

		<script language='JavaScript' type='text/javascript'>
		function refreshCaptcha(){
			var img = document.images['captchaimg'];
			img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
		}
		</script>

			    </div>
				
				
				
				
			</div>
		</div>
								</div>
	                        </div>
						</div>
                                                                        
                                            </div>
                                <div class="rt-grid-3">
                <div id="rt-sidebar-a">
                                    
        	                <div class="module-outline-1">
        	<div class="module-outline-2">
            	<div class="rt-block">         	    	
            	    	<div class="in-module-content">
            	    		<p style="text-align: center;"><img smartload="5" src="index_files/cube.jpg" alt="Cube Bikes" style="border: 0px none;" border="0" height="60" width="200"></p>
<p style="text-align: center;"><img src="index_files/powerade.jpg" alt="Powerade" style="border: 0px none;" border="0" height="102" width="200"></p>
<p style="text-align: center;"><img smartload="6" src="index_files/vikos.jpg" alt="Νερά Βίκος" style="border: 0px none;" border="0" height="104" width="200"></p>
<p style="text-align: center;"><img src="index_files/chiquita.png" alt="Μπανάνες Chiquita" style="border: 0px none;" border="0" height="100" width="85"></p>            	    	</div>
            	    
            	</div>
            </div>
        </div>      	
                </div>
            </div>

                    <div class="clear"></div>
                </div>
            </div>
																			</div>
			</div>
		</div>
												<div id="rt-copyright">
					<div class="rt-container">
						<div class="rt-grid-12 rt-alpha rt-omega">
    		<div class="clear"></div>
		<div class="rt-block">
			Copyright © Proteas Cycling		</div>
		
</div>
						<div class="clear"></div>
					</div>
				</div>
												
								<div id="totop">
				<div class="rt-grid-12 rt-alpha rt-omega">
    		<div class="clear"></div>
		<div class="rt-block">
			<a style="visibility: hidden; opacity: 0; display: block;" href="#pageTop" id="gototop" class="no-click no-print">Scroll To Top</a>
		</div>
		
		
</div>
				</div>
								
				
   				<script type="text/javascript">

				  var _gaq = _gaq || [];
				  _gaq.push(['_setAccount', 'UA-4119022-19']);
				  _gaq.push(['_trackPageview']);

				  (function() {
				    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
				    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
				    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
				  })();

				</script>
		
				<script language="JavaScript">
					var frmvalidator  = new Validator("contact_form");
					//remove the following two lines if you like error message box popups
					frmvalidator.EnableOnPageErrorDisplaySingleBox();
					frmvalidator.EnableMsgsTogether();

					if (isValidDate(contact_form.birthdate.value)==true){
						alert("hELllo");
					}
					else{
						alert("kokokokk");
					}
					
					frmvalidator.addValidation("surname","req","Συμπληρώστε το επώνυμο."); 
					frmvalidator.addValidation("name","req","Συμπληρώστε το όνομα."); 
					frmvalidator.addValidation("email","req","Συμπληρώστε το mail."); 
					frmvalidator.addValidation("email","email","Συμπληρώστε το κανονικό mail."); 	
				</script>
				<script language='JavaScript' type='text/javascript'>
					function refreshCaptcha(){
						var img = document.images['captchaimg'];
						img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
					}
				</script>

</body></html>
