<?php 
session_start();
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;  

  require 'phpmailer/vendor/phpmailer/phpmailer/src/Exception.php';
  require 'phpmailer/vendor/phpmailer/phpmailer/src/PHPMailer.php';
  require 'phpmailer/vendor/phpmailer/phpmailer/src/SMTP.php';
  require 'phpmailer/vendor/autoload.php';
  

  $mail = new PHPMailer(true);
  
  if(isset($_POST['submit'])){
      $fullname = $_POST['full_name'];
      $email = $_POST['email']; 
      $subject = $_POST['subject'];
      $message = $_POST['message'];


        try {
        //  sever settings
          // $mail->SMTPDebug = SMTP::DEBUG_SERVER; // Enable verbose debug output
          $mail->isSMTP();                                                // Set mailer to use SMTP
          $mail->SMTPAuth = true;                                        // Enable SMTP authentication

          $mail->Host = 'smtp.gmail.com';                              // Specify main and backup SMTP servers
          $mail->Username = 'Onahmartins7@gmail.com';                  // SMTP username    
          $mail->Password = 'xjxegkkngwfsvxbj';                               // SMTP password

          $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //ENCRYPTION_SMTPS 465 Enable TLS encryption, `ssl` also accepted
          $mail->Port = 587;                                            // TCP port to connect to

          // Disable SSL certificate verification (for testing only)
          $mail->SMTPOptions = array(
              'ssl' => array(
                  'verify_peer' => false,
                  'verify_peer_name' => false,
                  'allow_self_signed' => true
              )
          );

          // Recipients
          $mail->setFrom('from@example.com', 'Mailer');
          $mail->addAddress($email, 'joe User');         // Add a recipient
          

          // Content
          $mail->isHTML(true); 
          $mail->Subject = 'New message from contact form';
          $mail->Body = '<h3> Hello, you got a new enquiry<h3>
          <h4>Fullname: '.$fullname.'</h4>
          <h4>Email:  '.$email.'</h4>
          <h4>Subject: '.$subject.'</h4>
          <h4>Message: '.$message.'</h4>
          '; 
          

          if($mail->send()){

             $_SESSION['status'] = "Thank you for contacting us. We will get back to you shortly.";
             header("Location: {$_SERVER['HTTP_REFERER']}");
             exit(0);
          }else{
             $_SESSION['status'] = "Message could not be sent. Mailer error: {$mail->ErrorInfo}";
             header("Location: {$_SERVER['HTTP_REFERER']}");
             exit(0);
          }
      }catch (Exception $e) {
          echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
      }

  }
  else{
    header('location: index.php');
    exit();
  }
 
     
     
?>