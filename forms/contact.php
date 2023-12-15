<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $to = "victor.motta.dev@gmail.com";
    $cc = ""; // Endereço de e-mail para cópia
    $subject = "Site: " . $_POST['assunto']; // Assunto do email
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=utf-8\r\n";
    $headers .= "From: Site:". $_POST['assunto'] . "<contato@janainapereiraadvogada.com>\r\n"; // Remetente

    // Adicione o cabeçalho Cc para enviar uma cópia
    $headers .= "Cc: $cc\r\n";

    $body = "Aqui está o que foi enviado pelo site:<br><br><br>";
    $body .= 'Nome: ' . $_POST['name'] . '<br>';
    $body .= 'Email: ' . $_POST['email'] . '<br>';
    $body .= 'Mensagem: ' . $_POST['message'] . '<br>';

    if (mail($to, $subject, $body, $headers)) {
        echo json_encode(array('success' => true, 'message' => 'Email enviado com sucesso.'));
    } else {
        echo json_encode(array('success' => false, 'message' => 'Erro ao enviar o email.'));
    }
} else {
    echo json_encode(array('success' => false, 'message' => 'Método de requisição inválido.'));
}
?>
