<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<title>Contacto — ДКР</title>
	<!-- <link href="https://fonts.googleapis.com/css?family=Roboto+Mono:400,400i,500,500i,700&display=swap&subset=cyrillic" rel="stylesheet"> -->
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;500;700&display=swap" rel="stylesheet"> 
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="css/estilo.css">
	<link rel="stylesheet" href="slick/slick.css">
	<link rel="apple-touch-icon" sizes="57x57" href="img/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="img/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="img/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="img/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="img/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="img/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="img/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="img/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="img/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="img/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="img/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
	<link rel="manifest" href="img/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="img/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">
</head>
<body  class="mensajephp">
<header>
	<nav class="navfija">
		<li>
			<a href="diseno_grafico.html">Diseño</a>
		</li>
		<li>
			<a href="diseno_3d.html">Diseño <span style="text-transform: uppercase">3D</span></a>
		</li>
		<li>
			<a href="fotografia.html">Fotografía</a>
		</li>
		<li>
			<a href="multimedia.html">Multimedia</a>
		</li>
	</nav>
	<div class="encabezado">
		<a href="" class="toggle"></a>
		<ul class="about">
			<li>
				<a href="about.html">About</a>
			</li>
			<li>
				<a href="https://www.instagram.com/lafargue69/">
					<img src="img/insta_red.png" title="instagram">
				</a>
			</li>
			<li>
				<a href="https://www.linkedin.com/in/dani-costas/">
					<img src="img/linkedin_red.png" title="linkedin">
				</a>
			</li>
			<li>
				<a href="https://www.flickr.com/photos/134050047@N06/albums">
					<img src="img/flickr_red.png" title="flickr">
				</a>
			</li>
			<li>
				<a href="https://www.youtube.com/channel/UCPVUAg4BakU_-Rho7fLRANg">
					<img src="img/youtube_red.png" title="youtube">
				</a>
			</li>
			<li>
				<a href="https://open.spotify.com/user/danicostas?si=guP1qiA_Qx6vUkvcXE_Pzg">
					<img src="img/spotify_red.png" title="spotify">
				</a>
			</li>
		</ul>
	</div>
</header>
<?php
require("class.phpmailer.php");
require("class.smtp.php");
$destino = "contacto@danicostas.xyz";
$nombre = $_POST['nombre'];
$asunto = $_POST['asunto'];
$email = $_POST["email"];
$mensaje = $_POST['mensaje'];
$correo_e = $_POST["correo_e"];


// Datos de la cuenta de correo utilizada para enviar vía SMTP
$smtpHost = "mail.danicostas.xyz";  // Dominio alternativo brindado en el email de alta 
$smtpUsuario = "contacto@danicostas.xyz";  // Mi cuenta de correo
$smtpClave = "C0nt4ct0$Xyz";  // Mi contraseña

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->Port = 587; 
$mail->IsHTML(true); 
$mail->CharSet = "utf-8";

// VALORES A MODIFICAR //
$mail->Host = $smtpHost; 
$mail->Username = $smtpUsuario; 
$mail->Password = $smtpClave;

$mail->From = $email; // email desde donde envío el correo.
$mail->FromName = $nombre;
$mail->AddAddress($destino); // Esta es la dirección a donde enviamos los datos del formulario

$mail->Subject = $asunto; // Este es el titulo del email.
$mensajeHtml = nl2br($mensaje);
$mail->Body = "
<html> 

<body> 

<h1>Recibiste un nuevo mensaje desde el formulario de contacto</h1>

<p>Informacion enviada por el usuario de la web:</p>

<p>nombre: {$nombre}</p>

<p>email: {$email}</p>

<p>correo_e: {$correo_e}</p>

<p>asunto: {$asunto}</p>

<p>mensaje: {$mensaje}</p>

</body> 

</html>

<br />"; // Texto del email en formato HTML
$mail->AltBody = "{$mensaje} \n\n "; // Texto sin formato HTML
// FIN - VALORES A MODIFICAR //

$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);

if ( !isset($_POST["nombre"])  || !isset($_POST["asunto"])  || !isset($_POST["mensaje"]) ) {
    die ("Es necesario completar todos los datos del formulario");
}
	 ?>	
<section class="panel contacto">		
	<h1>
		<?php
			$estadoEnvio = $mail->Send(); 
			if($estadoEnvio){
				echo "Mensaje enviado!";
			}else{
				echo "Ups!";
			}
		 ?>
	</h1>
	<iframe <?php
			if($estadoEnvio){
				$src_1 = 'src="https://giphy.com/embed/KQoH6s6jBOoMw" width="960" height="516" frameBorder="0" class="giphy-embed" allowFullScreen';
				$src_2 = 'src="https://giphy.com/embed/11iZqybSZwQPeg" width="960" height="716" frameBorder="0" class="giphy-embed" allowFullScreen';
				$src_3 = 'src="https://giphy.com/embed/YgzebV1rnQExO" width="960" height="730" frameBorder="0" class="giphy-embed" allowFullScreen';
				$src_4 = 'src="https://giphy.com/embed/C0qsME2bwoX72" width="960" height="758" frameBorder="0" class="giphy-embed" allowFullScreen';
				$src_5 = 'src="https://giphy.com/embed/VVygFNFXikPq8" width="960" height="782" frameBorder="0" class="giphy-embed" allowFullScreen';
				$src = array($src_1 , $src_2, $src_3, $src_4, $src_5);
				shuffle($src);
				echo $src[0];
					}else{
						$src_6 = 'src="https://giphy.com/embed/lUC89LIQ2DmMw" width="960" height="720" frameBorder="0" class="giphy-embed" allowFullScreen';
						$src_7 = 'src="https://giphy.com/embed/m4H5RjvkgKz8Q" width="640" height="640" frameBorder="0" 		class="giphy-embed" allowFullScreen';
						$src_8 = 'src="https://giphy.com/embed/9ed4hezHPf6QU" width="960" height="432" frameBorder="0" 		class="giphy-embed" allowFullScreen';
						$src_9 = 'src="https://giphy.com/embed/j7YQl84uDP8w8" width="960" height="720" frameBorder="0" 		class="giphy-embed" allowFullScreen';
						$src_10 = 'src="https://giphy.com/embed/S3AywD8EANEWs" width="960" height="734" frameBorder="0" 		class="giphy-embed" allowFullScreen';
						$src = array($src_6 , $src_7, $src_8, $src_9, $src_10);
						shuffle($src);
						echo $src[0];
					}
		 		?>>
	</iframe>
	<p>
		<?php
			if($estadoEnvio){
				echo "Muchas gracias por tu mensaje, ".$nombre.". Me pondré en contacto contigo cuanto antes.";
			}else{
				echo "Ha habido un error al enviar el mensaje. Por favor, inténtalo de nuevo.";
			}
		 ?>
	</p>
	<a href="index.html"><p>Volver al inicio</p></a>
</section>
<footer>
	<a href="#"><h3>Dani Costas ®</h3></a>
</footer>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"
integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
crossorigin="anonymous"></script>
<script src="slick/slick.js"></script>
<script src=js/funciones_interno.js></script>
</body>
</html>
