<?php

class SendmailModel extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->library('PhpMailer_Lib');
    }
    public function send_mail2($sender_email, $username, $receiver_email, $subject, $msg) {
        $mail = $this->phpmailer_lib->load();
        $mail->SMTPDebug = 0;                                 
        $mail->isSMTP();
        $mail->SMTPAuth = false;
        $mail->SMTPSecure = "ssl";  
        $mail->Host = "mail.moogli.in";      
        $mail->Port = 465;                   
        $mail->Username = "marine@moogli.in";  
        $mail->Password = "Augurs@9848";
        $mail->SetFrom($sender_email, 'Mail for Contact Us');  
        $mail->AddReplyTo($sender_email, 'Mail for Contact Us');  
        $body = $msg;
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->IsHTML(true);
        $mail->AltBody = "Plain text message";
        $emails = explode(",", $receiver_email);
        foreach ($emails as $key => $value) {
            $mail->AddAddress(trim($value));
        }
        if (!$mail->Send()) {
            echo "Error: " . $mail->ErrorInfo;
            die;
        } else {
            return TRUE;
        }
    }
    public function send_mail_with_attachment($sender_email, $username, $receiver_email, $subject, $msg, $target_file, $full_name) {
        $mail = $this->phpmailer_lib->load();
        $mail->SMTPDebug = 0;                                 
        $mail->isSMTP();
        $mail->SMTPAuth = false;
        $mail->SMTPSecure = "ssl";  
        $mail->Host = "mail.moogli.in";      
        $mail->Port = 465;                   
        $mail->Username = "marine@moogli.in";  
        $mail->Password = "Augurs@9848";
        $mail->SetFrom($sender_email, $full_name);  
        $mail->AddReplyTo($sender_email, $full_name);  
        $body = $msg;
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->IsHTML(true);
        $mail->AltBody = "Plain text message";
        $mail->addStringAttachment(file_get_contents($target_file), 'resume.pdf');
        $emails = explode(",", $receiver_email);
        foreach ($emails as $key => $value) {
            $mail->AddAddress(trim($value));
        }
        if (!$mail->Send()) {
            echo "Error: " . $mail->ErrorInfo;
            die;
        } else {
            return TRUE;
        }
    }
    /* public function send_mail_with_attachment() {
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'mail.moogli.in',
            'smtp_port' => 465,
            'smtp_user' => 'marine@moogli.in', 
            'smtp_pass' => 'Augurs@9848', 
            'mailtype' => 'html',
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE
        );
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from('sarita@augurstech.com');
        $this->email->to('saritag9956@gmail.com');
        $this->email->subject('testing');
        $this->email->message('testing in sgcfsdcfdbcfhjhbjk');
            $this->email->attach('http://santtndas.moogli.in/upload/resume_file/5da410c0bf2ff_1571033280_pdfFile.pdf');
        if($this->email->send())
        {
        echo 'Email send.';
        }
        else
        {
        show_error($this->email->print_debugger());
        }
    } */
}