<?php
  $result = ""; // Initialize variable to prevent undefined variable error

  if (isset($_POST["submit"])) {
      $f_name = htmlspecialchars($_POST['f_name']);
      $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
      $subject = htmlspecialchars($_POST['subject']);
      $message = nl2br(htmlspecialchars($_POST['message']));

      $to = "dhanush@gmail.com";
      $body = "From: $f_name <br><br> E-Mail: $email <br><br> Message:<br> $message";

      $header = "From: no-reply@inaratextiles.in\r\n"; // Use a valid domain email
      $header .= "Reply-To: $email\r\n";
      $header .= "MIME-Version: 1.0\r\n";
      $header .= "Content-type: text/html; charset=UTF-8\r\n";

      $retval = mail($to, $subject, $body, $header);

      if ($retval) {
          $result = "Thank You! Your request has been submitted successfully.";
      } else {
          $result = "Sorry, there was an error sending your message. Please try again later.";
      }
  }
?>

<!-- Classic Heading -->
<?php if (!empty($result)) { ?>
    <div class="alert alert-info"><?php echo $result; ?></div>
<?php } ?>

<!-- Start Contact Form -->
<form role="form" method="post" id="contactForm" action="" data-toggle="validator" class="shake">
    <div class="form-group">
        <div class="controls">
            <input type="text" name="f_name" id="name" placeholder="Name" required data-error="Please enter your name">
            <div class="help-block with-errors"></div>
        </div>
    </div>
    <div class="form-group">
        <div class="controls">
            <input type="email" class="email" name="email" id="email" placeholder="Email" required data-error="Please enter your email">
            <div class="help-block with-errors"></div>
        </div>
    </div>
    <div class="form-group">
        <div class="controls">
            <input type="text" id="msg_subject" name="subject" placeholder="Subject" required data-error="Please enter your message subject">
            <div class="help-block with-errors"></div>
        </div>
    </div>
    <div class="form-group">
        <div class="controls">
            <textarea id="message" rows="7" name="message" placeholder="Message" required data-error="Write your message"></textarea>
            <div class="help-block with-errors"></div>
        </div>  
    </div>
    <button name="submit" type="submit" class="btn-system btn-large">Send Message</button>  
    <div class="clearfix"></div>   
</form>           
<!-- End Contact Form -->
