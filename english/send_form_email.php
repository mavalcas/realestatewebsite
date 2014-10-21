
<?php
 
if(isset($_POST['email'])) {
 
     
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
 
    $email_to = "contacto@kingdompropiedades.cl";
 
    $email_subject = "Quiero informacion sobre sus propiedades";
 
     
 
     
 
    function died($error) {
 
        // your error code can go here
 
        echo "Lo sentimos, pero hubo un error(s) en el formulario que usted envió. ";
 
        echo "Esos errores aparecen abajo.<br /><br />";
 
        echo $error."<br /><br />";
 
        echo "Por favor vuelva y corrija esos errores.<br /><br />";
 
        die();
 
    }
 
     
 
    // validation expected data exists
 
    if(!isset($_POST['first_name']) ||
 
        !isset($_POST['last_name']) ||
 
        !isset($_POST['email']) ||
 
        !isset($_POST['telephone']) ||
 
        !isset($_POST['comments'])) {
 
        died('Lo sentimos, pero al parecer hay un problema con el formulario que usted completó.');      
 
    }
 
     
 
    $first_name = $_POST['first_name']; // required
 
    $last_name = $_POST['last_name']; // required
 
    $email_from = $_POST['email']; // required
 
    $telephone = $_POST['telephone']; // not required
 
    $comments = $_POST['comments']; // required
 
     
 
    $error_message = "";
 
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
 
    $error_message .= 'El email que usted ingreso al parecer no es valido.<br />';
 
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$first_name)) {
 
    $error_message .= 'El nombre que ingreso al parecer no es valido.<br />';
 
  }
 
  if(!preg_match($string_exp,$last_name)) {
 
    $error_message .= 'El apellido que ingreso al parecer no es valido.<br />';
 
  }
 
  if(strlen($comments) < 2) {
 
    $error_message .= 'Al parecer su mensaje es muy corto.<br />';
 
  }
 
  if(strlen($error_message) > 0) {
 
    died($error_message);
 
  }
 
    $email_message = "Detalles del formulario abajo.\n\n";
 
     
 
    function clean_string($string) {
 
      $bad = array("content-type","bcc:","to:","cc:","href");
 
      return str_replace($bad,"",$string);
 
    }
 
     
 
    $email_message .= "First Name: ".clean_string($first_name)."\n";
 
    $email_message .= "Last Name: ".clean_string($last_name)."\n";
 
    $email_message .= "Email: ".clean_string($email_from)."\n";
 
    $email_message .= "Telephone: ".clean_string($telephone)."\n";
 
    $email_message .= "Comments: ".clean_string($comments)."\n";
 
     
 
     
 
// create email headers
 
$headers = 'From: '.$email_from."\r\n".
 
'Reply-To: '.$email_from."\r\n" .
 
'X-Mailer: PHP/' . phpversion();
 
@mail($email_to, $email_subject, $email_message, $headers); 
 
?>
 
 
 
<!-- include your own success html here -->
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Kingdom Propiedades</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- LOAD CSS FILES -->
    <link href="css/main.css" rel="stylesheet" type="text/css">

    <!-- LOAD JS FILES -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/easing.js"></script>
    <script src="js/jquery.lazyload.js"></script>
    <script src="js/jquery.ui.totop.js"></script>
    <script src="js/selectnav.js"></script>
    <script src="js/ender.js"></script>
    <script src="js/jquery.flexslider-min.js"></script>
    <script src="js/custom.js"></script>
    

</head>

<body>
<!-- header begin -->
    <header>
        <div class="container">
        	
            <div class="row">
            	
                <div class="span3">
                	
                    <div id="logo">
                            <a href="index.html">
                                <img src="img/logobray.jpg" alt=""></a>
							
                    </div>
                </div>
			
                <div class="span9">
                	<p id="logotitle" style="color:#000;"><span id="klogo"><em>K</em></span>ingdom Propiedades</p>
                    <!-- mainmenu begin -->
                    <div id="mainmenu-container">
                        <ul id="mainmenu">
                        	
                            <li><a href="index.html">Inicio</a></li>
                            <li><a href="gallery.html">Propiedades</a>
                                <ul>
                                    <li><a href="forsale.html">A la venta</a>
                                    <li><a href="forrent.html">Arriendo</a>
                                    
                                </ul>
                            </li>
                            <li><a href="about.html">Acerca</a>
                                <ul>
                                    <li><a href="faqs.html">FAQs</a>
                                   
                                </ul>
                            </li>
                           
                            <li><a href="invierta.html">Invierta</a></li>
                           
                            <li><a href="contacto.html">Contacto</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header close -->
  
	<h3 style="text-align:center;margin:30px 0 30px 0;">Gracias por contactarnos, nos pondremos en contacto con usted lo antes posible.</h3>
 
   <!-- footer begin -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="span4">
                    <h3>Fotos de casas</h3>
                    <div id="flickr-photo-stream">
                        <script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=8&amp;display=latest&amp;size=s&amp;layout=x&amp;source=user&amp;user=52617155@N08"></script>
                        <div class="clearfix"></div>
                    </div>
                </div>
                
                <div class="span4">
                    <h3>Servicios</h3>
                    <p><a href="#">Arriendo</a></p>
                    <p><a href="#">Venta</a></p>
                    <p><a href="#">Consignacion</a></p>
                    <p><a href="#">Propiedades</a></p>
                    <p><a href="#">Inversiones</a></p>
                </div>
                <div class="span4">
                    <h3>Nuestra direccion</h3>
                    <address>
                        Santiago, Chile
                        <span>Telefono: +56-9-81566980</span><br>
                         <span>Telefono 2: +56-9-99366457</span><br>
                          <span>Telefono 3: +56-2-27283989</span><br>
                        <span><strong>Email:</strong><a href="mailto:contact@kingdompropiedades.cl"> contacto@kingdompropiedades.cl</a></span>
                        <span><strong>Web:</strong><a href="#test">http://www.kingdompropiedades.cl</a></span>
                    </address>

                    <div class="social-icons">
                        <a href="#">
                            <img src="img/social-icons/facebook.png" alt=""></a>
                        <a href="#">
                            <img src="img/social-icons/twitter.png" alt=""></a>
                        <a href="#">
                            <img src="img/social-icons/dribbble.png" alt=""></a>
                        <a href="#">
                            <img src="img/social-icons/blogger.png" alt=""></a>
                        <a href="#">
                            <img src="img/social-icons/youtube.png" alt=""></a>
                        <a href="#">
                            <img src="img/social-icons/vimeo.png" alt=""></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="subfooter">
            <div class="container">
                <div class="row">
                     <div class="span6">
                        &copy; Copyiright 2014 - by <a href="http://www.revolutiontheweb.com">Revolutiontheweb</a>
                    </div>
                    
                </div>
            </div>
        </div>

    </footer>
    <!-- footer close -->
 
 
<?php
 
}
 
?>