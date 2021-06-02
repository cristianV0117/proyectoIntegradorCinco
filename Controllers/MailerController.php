<?php namespace Controllers;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
class MailerController
{
    private $mail;
    private $host;
    private $user;
    private $pass;
    private $port;
    private $secure;

    public function __construct()
    {
        $this->mail = new PHPMailer(true);
        $this->port = 587;
        $this->secure = 'tls';
        $this->config();
    }

    private function config()
    {
        try {
            //$this->mail->SMTPDebug = 2;
            $this->mail->isSMTP();
            $this->mail->Host       = $this->host;
            $this->mail->SMTPAuth   = true;
            $this->mail->Username   = $this->user;
            $this->mail->Password   = $this->pass;
            $this->mail->SMTPSecure = $this->secure;
            $this->mail->Port       = $this->port;
            $this->mail->setFrom('proyectoIntegrador@sanmateoprueba.com', 'PROYECTO INTEGRADOR');
        } catch (Exception $e) {
            throw new MailException($this->mail->ErrorInfo, 500);
        }
    }

    public function mailFromSystem(array $data)
    {
        try {
            $address = $data['Address'];
            $subject = $data['Subject'];
            $body    = $data['Body'];
            $this->mail->addAddress($address);
            $this->mail->isHTML(true);
            $this->mail->Subject = $subject;
            $this->mail->Body = $body;
            $this->mail->send();
        } catch (Exception $e) {
            return false;
        }
    }

    public function __destruct()
    {
        $this->mail = null;
    }
}