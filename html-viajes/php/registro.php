<?php
	/*=====  incluyo la conexion  ======*/
	include 'conexion.php';

	/*=====  declaro las variables y los almaceno ======*/
	$nombre = $_POST['nombre'];
	$email = $_POST['email'];
	$telefono = $_POST['telefono'];
	$descripcion = $_POST['descripcion'];

	/*=====  consulta para inertar los valores  ======*/
	$insertar = "INSERT INTO pedido(nombre, email, telefono, descripcion) VALUES ('$nombre', '$email', '$telefono', '$descripcion')";

	/*=====  ejecutar consulta  ======*/
	$resultado = mysqli_query($conexion, $insertar);
		if(!$resultado) {
			echo '<Script>
					alert("Error al registrarse");
					window.history.go(-1);
				</Script>';
		}
		else {

			/*=====  se envia un correo con los datos anexados ======*/
			/*=====  estructura ======*/
			$header = 'From: ' . $email . " \r\n";
			$header .= "X-Mailer: PHP/" . phpversion() . " \r\n";
			$header .= "Mime-Version: 1.0 \r\n";
			$header .= "Conten-Type: text/plain";

			/*=====  conformacion del mensaje ======*/
			$messaje = "Este mensaje fue enviado por: " . $name . " \r\n";
			$messaje .= "Su E-mail es: " . $email . " \r\n";
			$messaje .= "Su numero de telefono es: " . $telefono . " \r\n";
			$messaje .= "Su descripcion/Mensaje fue: " . $_POST['descripcion'] . " \r\n";
			$messaje .= "Enviado el: " . date('d/m/Y', time());

			/*=====  envio al correo que se quiere enviar ======*/
			$para = 'evasquez0818@mor.conalep.edu.mx';
			$asunto = 'solicitud de servicio';

			/*=====  conformacion para el envio ======*/
			mail($para, $asunto, utf8_decode($messaje), $header);

			header("location:../formulario/formulario.html");
		}
	/*=====  se cierra la conecxion  ======*/
	mysqli_close($conexion);
?>
