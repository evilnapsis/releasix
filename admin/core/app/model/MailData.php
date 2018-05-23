<?php
class MailData {
    public static $tablename = "";
    public $mail = null;

    public function open(){

    $this->mail = new PHPMailer();
//    $this->mail->setFrom("Usuario que envia", "Usuario que envia");
    // ---------- adjust these lines ---------------------------------------
    $this->mail->setFrom("evilnapsisl@gmail.com", "Agustin Ramos");
    $this->mail->Username = "evilnapsis@gmail.com"; // your GMail user name
    $this->mail->Password = ""; 
    //-----------------------------------------------------------------------

//  $this->mail->SMTPDebug = 0;
    $this->mail->SMTPSecure = 'ssl';

    $this->mail->Host = "smtp.gmail.com"; // GMail
    $this->mail->Port = 465;
    $this->mail->IsSMTP(); // use SMTP
    $this->mail->SMTPAuth = true; // turn on SMTP authentication
    $this->mail->From = $this->mail->Username;
    }


    public function send(){
        if(!$this->mail->Send())
            echo "";
        else
            echo "";        
    }



}

?>