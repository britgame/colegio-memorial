<?php
      $nome     = strip_tags(trim($_POST['nome']));
      $email    = strip_tags(trim($_POST['email']));
      $mensagem = strip_tags(trim($_POST['mensagem']));
      $arquivo  = $_FILES['arquivo'];
     
      $tamanho = 512000;
      $tipos   = array('image/jpeg', 'application/msword', 'application/pdf', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'); // MIME-TYPE
      
      if(empty($nome)){
     $msg = 'O Nome é Obrigatório';
      }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
     $msg = 'Digite um E-mail válido';
      }elseif(empty($mensagem)){
     $msg = 'A Mensagem é Obrigatória';
      }elseif(!is_uploaded_file($arquivo['tmp_name'])){
     $msg = 'O Arquivo é Obrigatório';
      }elseif($arquivo['size'] > $tamanho){
     $msg = 'O limite do tamanho do arquivo é de 500KB';
      }elseif(!in_array($arquivo['type'], $tipos)){
     $msg = 'Esse tipo de arquivo não é permitido';
      }else{
        require('PHPMailer/PHPMailerAutoload.php');
       
       $mail = new PHPMailer;
       $mail->IsSMTP();
       $mail->SMTPAuth = true;
       $mail->Port = 587;
       $mail->Host = 'smtp.colegiomemorial.com.br';
       $mail->Username = 'contato@colegiomemorial.com.br';
       $mail->Password = 'memo2322';
       $mail->SetFrom('colegiomemorial@colegiomemorial.com.br', $nome);
       $mail->AddAddress('colegiomemorial@colegiomemorial.com.br', 'Site Memorial');
       $mail->Subject = 'Envio de Currículo pelo Site';
       
       $body = "<strong>Nome: </strong>{$nome} <br />
            	<strong>E-mail: </strong>{$email} <br />
            	<strong>Mensagem: </strong>{$mensagem} <br />
            	<strong>Arquivo: </strong> ".$arquivo['name'];
       
       $mail->MsgHTML($body);
       $mail->AddAttachment($arquivo['tmp_name'], $arquivo['name']);
       
       if($mail->Send())
           $msg = 'Seu currículo foi enviado com Sucesso! Obrigado.';
        else
           $msg = 'Sua Mensagem não foi enviada, tente novamente';
       
      }
       
?>