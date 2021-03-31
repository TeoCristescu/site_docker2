<?php 
    use \PHPMailer\PHPMailer\PHPMailer;
    use \PHPMailer\PHPMailer\Exception;
   
        $err_lost="";
        if(isset($_POST['submit']))
        {
            require "PHPMailer/autoload.php";
            require "dbh.php";
            $email = $_POST['email-lost'];
            
            $sql = "SELECT * FROM nume WHERE Email='$email'";
            $result = mysqli_query($conn,$sql);
            $nr = mysqli_num_rows($result);
            if($nr != 1 )
                $err_lost="Invalid email!";
            else
            {
                $randstring=RandomString(10);
                $sql = "UPDATE nume SET Parola='$randstring' WHERE Email='$email'";
                $result = mysqli_query($conn,$sql);

                $mail = new PHPMailer(); // create a new object
                $mail->IsSMTP(); // enable SMTP
                //$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
                $mail->SMTPAuth = true; // authentication enabled
                $mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for Gmail
                $mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                    );
                $mail->Host = "smtp.gmail.com";
                $mail->Port = 587; // or 587
                $mail->IsHTML(true);
                $mail->Username = "mailpsop100@gmail.com";
                $mail->Password = "parolaweb123";
                $mail->SetFrom("mailpsop100@gmail.com");
                $mail->Subject = "Password reset";
                $mail->Body = "Hello. Your new password is:$randstring";
                $mail->AddAddress($email);
                
                if(!$mail->Send()) 
                    $err_lost= "Mailer Error: " . $mail->ErrorInfo;
                else
                    $err_lost= "Request sent to mailbox! Please check your inbox.";
            }
        }
    

    function RandomString($n) { 
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
        $randstring = ''; 
      
        for ($i = 0; $i < $n; $i++) { 
            $index = rand(0, strlen($characters) - 1); 
            $randstring .= $characters[$index]; 
        } 
      
        return $randstring; 
    } 
?>