<?php
  session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Captura de E-mails</title>
    <link rel="stylesheet" href="./css/style.css">
  </head>

  <body>
    <header>
      <img src="imagens/logo.png" id="logo">
      <div id="titulo">
        Faça já o download de sua apostila de Banco de Dados!
      </div>
    </header>
    <img src="imagens/im.png" id="im">
    <form class="cadastro" action="" method="post">
      <div id="formtext">
        Receba no seu inbox um link para download da apostila
      </div>
      <input type="nome" name="nome" id="form1" required placeholder=" Nome">
      <input type="email" name="email" id="form2" required placeholder=" E-mail">
      <button type="submit" name="sign">Download Grátis</button>
    </form>

    <?php
      if(isset($_POST['sign'])){
        error_reporting(0);
        ini_set(“display_errors”, 0 );
        $nome = $_REQUEST['nome'];
        $email = $_REQUEST['email'];
        $arquivo = fopen('arquivo.txt','a+');
        fwrite($arquivo, "$nome, $email\n");
        fclose($arquivo);
        $from = "testemailraf@gmail.com";
        $destinatario = $email;
        $assunto = "Apostila Banco de Dados";
        $mensagem = "Olá $nome, faça o download de sua apostila aqui: https://drive.google.com/file/d/1mXSsW5SOSFClLrsT4_mYXI1SV2os7eA6/view?usp=sharing";
        $headers =  'MIME-Version: 1.0' . "\r\n";
        $headers .= "De: $from" . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $enviaremail = mail(base64_decode($destinatario), $assunto, $mensagem, $headers);
        if($enviaremail){
          echo "A mensagem de e-mail foi enviada.";
        }
      }
     ?>
  </body>
</html>
