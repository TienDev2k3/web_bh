<?php

// Bao gồm các file cần thiết của PHPMailer
include "PHPMailer/src/PHPMailer.php";
include "PHPMailer/src/Exception.php";
include  "PHPMailer/src/OAuthTokenProvider.php";
 include  "PHPMailer/src/OAuth.php";
include  "PHPMailer/src/POP3.php";
include "PHPMailer/src/SMTP.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Mailer{
    public function datHangMail($tieude,$noidung,$maildathang){
        try {
            $mail =new PHPMailer(true);
            $mail->CharSet='UTF-8';
            // Cấu hình máy chủ SMTP
            $mail->SMTPDebug = 0; // Kích hoạt chế độ gỡ lỗi
            $mail->isSMTP(); // Sử dụng SMTP
            $mail->Host = 'smtp.gmail.com'; // Địa chỉ máy chủ SMTP
            $mail->SMTPAuth = true; // Kích hoạt xác thực SMTP
            $mail->Username = 'ductien2982003@gmail.com'; // Tên đăng nhập SMTP
            $mail->Password = 'cfxh jpev ikwg atls'; // Mật khẩu SMTP
            $mail->SMTPSecure = 'tls'; // Bảo mật TLS
            $mail->Port = 587; // Cổng SMTP
        
            // Đặt người gửi và người nhận
            $mail->setFrom('ductien2982003@gmail.com', 'Mailer');
            $mail->addAddress($maildathang, 'Tiến'); // Người nhận
            // $mail->addReplyTo('info@example.com', 'Information'); // Địa chỉ trả lời
            $mail->addCC('ductien2982003@gmail.com'); // CC
            // $mail->addBCC('bcc@example.com'); // BCC
        
            // Đính kèm tệp
            // $mail->addAttachment('/var/tmp/file.tar.gz'); // Đính kèm tệp không đổi tên
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg'); // Đính kèm và đổi tên tệp
        
            // Nội dung email
            $mail->isHTML(true); // Định dạng HTML
            $mail->Subject = $tieude;
            $mail->Body = $noidung; // Nội dung HTML
            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients'; // Nội dung văn bản thuần
        
            // Gửi email
            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
    }
    
    
}
