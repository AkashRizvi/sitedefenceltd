
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $contact = htmlspecialchars($_POST['contact']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    $mail = new PHPMailer(true);

    try {
        // SMTP Configuration
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';  // Use your SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'sitedefenceltd000@gmail.com'; // Replace with your email
        $mail->Password = 'qvnn nhfh ctab eqeq'; // Replace with your email password or app password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Email Details
        $mail->setFrom($email, $name);
        $mail->addAddress('sitedefenceltd000@gmail.com'); 
        $mail->Subject = "$subject";
        $mail->Body = "Name: $name\nEmail: $email\nPhone: $contact\nMessage: $message";

        // Send Email
        if ($mail->send()) {
            echo "<script>alert('Message sent successfully!');</script>";
        } else {
            echo "<script>alert('Message sending failed.');</script>";
        }
    } catch (Exception $e) {
        echo "<script>alert('Mailer Error: {$mail->ErrorInfo}');</script>";
    }
}

?>
<section class="contact_section layout_padding">
    <div class="contact_bg_box">
      <div class="img-box">
        <img src="images/contact-bg.jpg" alt="">
      </div>
    </div>
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Get In touch
        </h2>
      </div>
      <div class="">
        <div class="row">
          <div class="col-md-7 mx-auto">


            <form action="" method="post" name="fmContact">
              <div class="contact_form-container">
                <div>
                  <div>
                    <input type="text" name="name" placeholder="Full Name" require/>
                  </div>
                  <div>
                    <input type="email" name="email" placeholder="Email " require />
                  </div>
                  <div>
                    <input type="text" name="contact" placeholder="Phone Number"/>
                  </div>
                  <div>
                    <input type="text" name="subject" placeholder="subject" require/>
                  </div>
                  <div class="">
                    <input type="text" name="message" placeholder="Message" class="message_input" require/>
                  </div>
                  <div class="btn-box ">
                    <button type="submit" name="btnSubmit" class="rounded-pill">
                      Send
                    </button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>