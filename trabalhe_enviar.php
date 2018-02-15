<?php
      $nome     = strip_tags(trim($_POST['nome']));
      $email    = strip_tags(trim($_POST['email']));
      $mensagem = strip_tags(trim($_POST['mensagem']));
      $arquivo  = $_FILES['arquivo'];
     
      $tamanho = 512000;
      $tipos   = array('image/jpeg', 'application/msword', 'application/pdf', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'); // MIME-TYPE
      
      if(empty($nome)){
     $msg = 'O Nome � Obrigat�rio';
      }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
     $msg = 'Digite um E-mail v�lido';
      }elseif(empty($mensagem)){
     $msg = 'A Mensagem � Obrigat�ria';
      }elseif(!is_uploaded_file($arquivo['tmp_name'])){
     $msg = 'O Arquivo � Obrigat�rio';
      }elseif($arquivo['size'] > $tamanho){
     $msg = 'O limite do tamanho do arquivo � de 500KB';
      }elseif(!in_array($arquivo['type'], $tipos)){
     $msg = 'Esse tipo de arquivo n�o � permitido';
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
       $mail->Subject = 'Envio de Curr�culo pelo Site';
       
       $body = "<strong>Nome: </strong>{$nome} <br />
            	<strong>E-mail: </strong>{$email} <br />
            	<strong>Mensagem: </strong>{$mensagem} <br />
            	<strong>Arquivo: </strong> ".$arquivo['name'];
       
       $mail->MsgHTML($body);
       $mail->AddAttachment($arquivo['tmp_name'], $arquivo['name']);
       
       if($mail->Send())
           $msg = 'Seu curr�culo foi enviado com Sucesso! Obrigado.';
        else
           $msg = 'Sua Mensagem n�o foi enviada, tente novamente';
       
      }
       
?>