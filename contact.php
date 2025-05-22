 <?php 
 session_start();
 ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>How to send mail in php using php mailer</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
  </head>
  <body>

       <div class="container mt-5">
           <div class="card">
               <div class="card-header  bg-success">
                   <h4 class="text-center">How to send mail in php using PHPMailer</h4>
               </div>
               <div class="card-body">

                    <form action="send-mail.php" method="POST">
                    <div class="mb-3">
                        <label for="fullname">Full Name</label>
                        <input type="text" name="full_name" id="fullname" class="form-control" required>
                    </div>   
                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="subject">Subject</label>
                        <input type="text" name="subject" id="subject" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="message">Message</label>
                        <textarea name="message" id="message" class="form-control" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-success" name="submit">Send message</button>
                    </form>
               </div>
           </div>
       </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>

          var messageText = "<?= $_SESSION['status'] ?? ''; ?>";
          if(messageText != ''){

               Swal.fire({
                title: "Thank You",
                text: messageText,
                icon: "Success"
           });
           <?php unset ($_SESSION['status']); ?>
          }
           
    </script>
  </body>
</html>