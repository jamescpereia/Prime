<?php
$address = "gustavohenriqueferreira110@gmail.com";
if (!defined("PHP_EOL")) define("PHP_EOL", "\r\n");

$error = false;
$fields = array( 'name', 'email', 'message' );

foreach ( $fields as $field ) {
	if ( empty($_POST[$field]) || trim($_POST[$field]) == '' )
		$error = true;
}

if ( !$error ) {

	$name = stripslashes($_POST['name']);
	$email = trim($_POST['email']);	
	$message = stripslashes($_POST['message']);

	$e_subject = 'You\'ve been contacted by ' . $name . '.';
	

		// Opção de configuração.
		// Você pode alterar isso se achar necessário.
		// Desenvolvedores, você pode querer adicionar mais campos ao formulário, nesse caso você deve ter certeza de adicioná-los aqui.


	$e_body = "You have been contacted by: $name" . PHP_EOL . PHP_EOL;
	$e_reply = "E-mail: $email" . PHP_EOL . PHP_EOL;
	$e_content = "Message:\r\n$message \r\n" . PHP_EOL;
	

	$msg = wordwrap( $e_body . $e_reply , 70 );

	$headers = "From: $email" . PHP_EOL;
	$headers .= "Reply-To: $email" . PHP_EOL;
	$headers .= "Content-type: text/plain; charset=utf-8" . PHP_EOL;
	$headers .= "Content-Transfer-Encoding: quoted-printable" . PHP_EOL;

	if(mail($address, $msg, $headers, $e_content  )) {

		// O email foi enviado com sucesso, echo uma página de sucesso.
	
		echo 'Success';

	} else {

		echo 'ERROR!';

	}

}

?>

<?php
//1 � Definimos Para quem vai ser enviado o email
$para = "contato@frioclickarcondicionado.com.br";
//2 - resgatar o nome digitado no formul�rio e  grava na variavel $nome
$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
// 3 - resgatar o assunto digitado no formul�rio e  grava na variavel 
//$assunto
$assunto = $_POST['assunto'];
 //4 � Agora definimos a  mensagem que vai ser enviado no e-mail
$mensagem = "<strong>Nome:  </strong>".$nome;
$mensagem .= "<br>  <strong>Mensagem: </strong>"
.$_POST['mensagem'];
 
//5 � agora inserimos as codifica��es corretas e  tudo mais.
$headers =  "Content-Type:text/html; charset=UTF-8\n";
$headers .= "From:  dominio.com.br<sistema@dominio.com.br>\n"; 
//Vai ser //mostrado que  o email partiu deste email e seguido do nome
$headers .= "X-Sender:  <sistema@dominio.com.br>\n"; 
//email do servidor //que enviou
$headers .= "X-Mailer: PHP  v".phpversion()."\n";
$headers .= "X-IP:  ".$_SERVER['REMOTE_ADDR']."\n";
$headers .= "Return-Path:  <sistema@dominio.com.br>\n"; 
//caso a msg //seja respondida vai para  este email.
$headers .= "MIME-Version: 1.0\n";
 
mail($para, $assunto, $mensagem, $headers);  //fun��o que faz o envio do email.
?>