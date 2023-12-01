<?php 
    
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../phpmailer/Exception.php';
require_once('../../phpmailer/PHPMailer.php');
require_once('../../phpmailer/SMTP.php');

class resetClave
{
    public function claseResetClave($identificacion,$email)
	{
		$f = null;
		$objconexion = new conexion;
        $conexion = $objconexion -> get_conexion();
		$consultar = "SELECT * FROM usuarios WHERE id_usuario=:identificacion AND correo_usu=:email";
		$result = $conexion->prepare($consultar);
		$result->bindParam(":identificacion",$identificacion);
		$result->bindParam(":email",$email);
		$result->execute();
		$f = $result->fetch();

		if($f) 
		{
			// generamos la nueva clave a artir de un codigo aleatorio 
			$caracteres = "0123456788abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
			// le damos la longitud que queremos a la nueva clave
			$longitud = 8;
			// aqui hacemos el proceso para que se vuelva random la clave 
			$new_clave = substr(str_shuffle($caracteres),0,$longitud);
			$claveMd = md5($new_clave);
			$actualizarCla = "UPDATE usuarios SET contraseña_usu=:claveMd WHERE id_usuario=:identificacion"; 
			$result=$conexion->prepare($actualizarCla);
			$result->bindParam(":identificacion",$identificacion);
			$result->bindParam(":claveMd",$claveMd);
			$result->execute();
			// aqui iria la logica de reaginacion y actualizacion de contraseña
			$emailFor=$f['correo_usu'];
			//Create an instance; passing `true` enables exceptions
			$mail = new PHPMailer(true);

			try 
            {
				//Server settings
				// comfiguracion de acceso al servidor de gmail para enviar los mails
				$mail->SMTPDebug = 0;                      //Enable verbose debug output
				$mail->isSMTP();                                            //Send using SMTP
				$mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
				$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
				$mail->Username   = 'peluq.app@gmail.com';                     //SMTP username
				$mail->Password   = 'vrahxzspxxraoytl';                               //SMTP password
				$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
				$mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
				//Recipients
				// emisor:desde donde se envia el mensaje 
				$mail->setFrom('peluq.app@gmail.com', 'Soporte Peluq.App');
				// receptor: quien va a recibir el mensaje 
				$mail->addAddress($emailFor);
				// $mail->addAddress('ellen@example.com');               //Name is optional
				// $mail->addReplyTo('info@example.com', 'Information');
				// $mail->addCC('cc@example.com');
				// $mail->addBCC('bcc@example.com');
				// par adjuntar archivos dentro del correo
				// //Attachments
				// $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
				// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
				//Content
				$mail->isHTML(true);
				// para que dentro de los parametros lea el español con la ñ y tildes
				$mail->CharSet= "UTF-8";
				// ASUNTO DEL CORREO
				$mail->Subject = 'Peluqueria y spa Afordita - Restablecimiento de contraseña';
				// Cuerpo del mensaje 
				$mail->Body    = '
				<!DOCTYPE html
				PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
				<html xmlns="http://www.w3.org/1999/xhtml">
				<head>
					<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
					<title>NOTIFICACION LIVING SAFE</title>
					<meta name="viewport" content="width=device-width, initial-scale=1.0" />
				</head>
				<body style="margin: 0; padding: 0;">
					<table border="0" cellpadding="0" cellspacing="0" width="100%">
						<tr>
							<td style="padding: 10px 0 30px 0;">
								<table align="center" border="0" cellpadding="0" cellspacing="0" width="600"
									style="border: 1px solid #cccccc; border-collapse: collapse;">
									<tr>
										<td align="center" bgcolor="#6e5dcf"
											style="padding: 20px 0 20px 0; color: #eaebed; font-size: 28px; font-weight: bold; font-family: Arial, sans-serif;">
											<img src="https://i.imgur.com/VpLv28q.png" alt="" width="240"
												height="120" style="display: block;" />
										</td>
									</tr>
									<tr>
										<td bgcolor="#243b67" style="padding: 40px 30px 40px 30px;">
											<table border="0" cellpadding="0" cellspacing="0" width="100%">
												<tr>
													<td align="center"
														style="color:#FFFFFF; font-family: Arial, sans-serif; font-size: 24px;">
														<b>RECUPERACIÓN DE CONTRASEÑA</b>
													</td>
												</tr><tr>
													
												</tr>
												<tr>
													<td>
														<table border="0" cellpadding="0" cellspacing="0" width="100%">
															<tr>
																<td style="font-size: 0; line-height: 0;" width="100">
																	&nbsp;
																</td>
																<td width="400" valign="top">
																	<table border="0" cellpadding="0" cellspacing="0" width="100%">
																		<tr>
																			<td align="center">
																			<p style="color:#eaebed; font-size:22px; padding-top: 30px">Hola '.$f['nombres_usu'].'  tu nueva clave de acceso para nuestro sistema es: </p>
																			<p style="color:#eaebed; font-size:25px; padding-top: 30px">'.$new_clave.'</p>
																			</td>
																		</tr>
																		<tr>
																			<td align="center"
																				style="padding: 0; color: #eaebed; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
				
																			</td>
																		</tr>
																	</table>
																</td>
																<td style="font-size: 0; line-height: 0;" width="100">
																	&nbsp;
																</td>
				
															</tr>
														</table>
													</td>
												</tr>
											</table>
										</td>
									</tr>
									<tr>
										<td bgcolor="#6e5dcf" style="padding: 30px 30px 30px 30px;">
											<table border="0" cellpadding="0" cellspacing="0" width="100%">
												<tr>
													<td align="center"
														style="color: #eaebed; font-family: Arial, sans-serif; font-size: 14px;"
														width="75%; text-aling:center">
														&reg; Bleidis Chacon - 2023<br />
														&reg; Guillermo Nova - 2023<br />
														&reg; Brayan Briceño - 2023<br />
														<a href="https://www.youtube.com/@codingnow6059" target="_blank"
															style="color: #eaebed;">
															<font color="#eaebed">www.Peluq.App.com.co/</font>
														</a>
													</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</body>
				
				</html>
				';
    		    // cuerpo alternativo de
    		    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
		        $mail->send();
    		    echo '<script>alert("Se ha enviado una nueva contraseña a tu correo electronico");</script>';
			    echo "<script> location.href='../../Vista/login/ingresar.php'</script>"; 
		    } 

            catch (Exception $e) 
            {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                echo "<script> location.href='../../Vista/login/restablecimientoClave.php'</script>"; 
            }
        }
        else
        {
            echo '<script> alert("los datos registrados no concuerdan con la base de datos") </script>'; 
            // echo "<script> location.href='../../Vista/login/restablecimientoClave.php'</script>"; 
        }
    }
}
?>