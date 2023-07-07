<?php
require _DIR . '/front/libs/vendor/autoload.php'; #load Ribary

$jsonReturn = null;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\OAuth;
use League\OAuth2\Client\Provider\Google;

$core_smtp_title = "สถาบันการพัฒนาทรัพยากรธรรมชาติและสิ่งแวดล้อมอย่างยั่งยืน (สพท.)";

$mail = new PHPMailer();
$mail->isSMTP();
// $mail->SMTPDebug = SMTP::DEBUG_SERVER;
$mail->Host = 'smtp.gmail.com';
$mail->CharSet = "utf-8";
$mail->Port = 587;
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->SMTPAuth = true;
$mail->AuthType = 'XOAUTH2';
$email = 'mailer.wewebplus@gmail.com'; //gmail ของผู้ส่ง
$clientId = '463245677825-95plfjg35nj7i664p2ltddl27hbk1sme.apps.googleusercontent.com'; //ClienId ที่ได้จาก Google console
$clientSecret = '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'; //ClienSecret ที่ได้จาก Google console
$refreshToken = '1//0gualio7qYNONCgYIARAAGBASNwF-L9Irykzu7et1u0CMWtr_KPvAOOC8e1abcqtYGM_AoUgE4O-J-wXYrSfbZNWjnXiP8m4sazs'; // refresgToken
$provider = new Google(
[
    'clientId' => $clientId,
    'clientSecret' => $clientSecret,
]
);
$mail->setOAuth(
new OAuth(
    [
    'provider' => $provider,
    'clientId' => $clientId,
    'clientSecret' => $clientSecret,
    'refreshToken' => $refreshToken,
    'userName' => $email,
    ]
)
);
$mail->setFrom($email, $core_smtp_title); //ชื่อผู้ส่ง กับ Email ผู้ส่ง
if (gettype($mailTo) == "string") {
    $mail->addAddress($mailTo); //ส่งถึงใคร
}else{
    foreach ($mailTo as $key => $to) {
        $mail->AddAddress($to);
    }
}

$mail->isHTML(true);
$mail->Subject = $subjectMail; // หัวข้อเรื่อง
$mail->Body    = $messageMail; // ตัว Body ของ Gmail
if ($mail->Send()) {
    $valSendMailStatus = 1;
} else {
    $valSendMailStatus = 0;
}
