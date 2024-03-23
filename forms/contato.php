<?php

  $receiving_email_address = 'thiagosante@gmail.com';

  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }

  $contato = new PHP_Email_Form;
  $contato->ajax = true;
  
  $contato->to = $receiving_email_address;
  $contato->from_name = $_POST['nome'];
  $contato->from_email = $_POST['email'];
  $contato->subject = $_POST['assunto'];


  $contato->smtp = array(
    'host' => 'smtp.gmail.com',
    'username' => 'thiagosante@gmail.com',
    'password' => '',
    'port' => '587'
  );


  $contato->add_message( $_POST['nome'], 'From');
  $contato->add_message( $_POST['email'], 'Email');
  $contato->add_message( $_POST['Mensagem'], 'Mensagem', 10);

  echo $contato->send();
?>
