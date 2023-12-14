<?php
$to = "victor.motta.dev@gmail.com";
$cc = ""; // Endereço de e-mail para cópia
$subject = "Site: ".$_REQUEST['assunto']; // Assunto do email
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=utf-8\r\n";
$headers .= "From: Contato do Site <contato@janainapereiraadvogada.com>\r\n"; // Remetente

// Adicione o cabeçalho Cc para enviar uma cópia
$headers .= "Cc: $cc\r\n";

$fields = array();
$fields["name"] = $_REQUEST['name'];
$fields["email"] = $_REQUEST['email'];
$fields["message"] = $_REQUEST['message'];

$body = "Aqui está o que foi enviado pelo site:<br><br><br>";
$body .= 'Nome: ' . $fields['name'] . '<br>';
$body .= 'Email: ' . $fields['email'] . '<br>';
$body .= 'Mensagem: ' . $fields['message'] . '<br>';

$sent = mail($to, $subject, $body, $headers);

if ($sent) {
    echo "true"; // O email foi enviado com sucesso
} else {
    echo "false"; // Houve um erro no envio do email
}
?>