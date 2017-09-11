<?php
/**
 * Created by PhpStorm.
 * User: Ashwin Joseph
 * Date: 24-08-2017
 * Time: 00:25
 */

class electronicwizard extends controller
{
    public function index(){
        $this->view("electronicwizard");
    }

    public function submit($get, $post){
        $formData = $post;
        $this->sendMailAsAttachment($formData);
    }

    protected function sendMailAsAttachment( $formData ) {

        $emailData = $this->prepareEmail( $formData );
        $ok = @mail($emailData['to'], $emailData['subject'], $emailData['message'], $emailData['headers']);
        if ($ok) {
            // echo "<p>mail sent to $to!</p>";
            $this->view("Success");
        } else {
            echo "<p>mail could not be sent!</p>";
        }
    }

    protected function prepareEmail( $formData ) {

        // email fields: to, from, subject, and so on
        $to = "soorajpradeep97@gmail.com, ashwinkjoseph@gmail.com";
        $from = "electronicwizard@takshak.in";
        $subject ="New Registration for Electronic Wizard";
        $message = "Uploaded File\n";
        $i = 0;
        for($i = 1; $i<3; $i++){
            if(isset($formData['form-member-1-name'])){
                $message .= "Student".$i." \n";
                $message .= "Name :". $formData['form-member-'.$i.'-name']."\n";
                $message .= "Contact Number :". $formData['form-member-'.$i.'-contact']."\n";
                $message .= "E-Mail :".$formData['form-member-'.$i.'-email']."\n";
            }
        }
        $headers = "From: $from";

        // boundary
        $semi_rand = md5(time());
        $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";

        // headers for attachment
        $headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\"";

        // multipart boundary
        $message .= "This is a multi-part message in MIME format.\n\n" . "--{$mime_boundary}\n" . "Content-Type: text/plain; charset=\"iso-8859-1\"\n" . "Content-Transfer-Encoding: 7bit\n\n" . $message . "\n\n";
        $message .= "--{$mime_boundary}\n";

        $emailData = array (
            'to' => $to,
            'from' => $from,
            'subject' => $subject,
            'headers' => $headers,
            'message' => $message
        );

        return $emailData;

    }

}