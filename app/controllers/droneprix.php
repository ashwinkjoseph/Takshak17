<?php
/**
 * Created by PhpStorm.
 * User: Ashwin Joseph
 * Date: 28-08-2017
 * Time: 23:55
 */

class droneprix extends controller
{
    public function index(){
        $this->view("drone");
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
        $from = "droneprix@takshak.in";
        $subject ="New Registration for Drone Prix";
        $message = "Uploaded File\n";
        $message .= "Name :". $formData['form-name']."\n";
        $message .= "E-Mail :". $formData['form-email']."\n";
        $message .= "Contact Number :". $formData['form-contact']."\n";
        $message .= "Place :". $formData['form-place']."\n";
        $message .= "College Name :". $formData['form-college-name']."\n";
        $message .= "Department :". $formData['form-class']."\n";
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