<?php 
    include_once 'session.php';
    include_once "vendor/autoload.php";
    
    use PHPMailer\PHPMailer\PHPMailer; 
    use PHPMailer\PHPMailer\STMP;
    use PHPMailer\PHPMailer\Exception;
    
    function sendMail($email) {
        try {
            $mail = new PHPMailer(true);
            $mail ->isSMTP();
            $mail->SMTPAuth = true;
            $code = rand(100000, 999999);
            $_SESSION['code'] = $code;
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 465;
            $mail->Username = 'tuanlinh11a4@gmail.com';
            $mail->Password = 'fktjbiazgilyhzox';
            $mail->SMTPSecure = 'ssl';
    
            $mail->setFrom('tuanlinh11a4@gmail.com');
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject = 'Verify Code';
            $mail->Body = 'Your code is: '.$code;
            $mail->send();
            // if($mail->send()){
            //     return true;
            // }

    
           
        } catch (Exception $e) {
            echo $mail->ErrorInfo;;
        }
    }
    
    


?> 