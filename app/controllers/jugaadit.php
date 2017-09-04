<?php

class jugaadit extends controller
{
    public function index(){
        $this->view("jugaadit");
    }

    public function submit($get, $post){
        $formData = $post;
//        echo "This is under Testing";
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

    public function Success(){
        $this->view("payuSuccess");
    }

    public function Failiure(){
        $this->view("payuFailiure");
    }

    public function Cancelled(){
        $this->view("payuCancelled");
    }

    protected function prepareEmail( $formData ) {

        // email fields: to, from, subject, and so on
        $to = "soorajpradeep97@gmail.com, ashwinkjoseph@gmail.com";
        $from = "jugaadit@takshak.in";
        $subject ="New Registration for Jugaad IT";
        $message = "Uploaded File\n";
        $message .= "College Name :". $formData['form-college-name']."\n";
        $message .= "Semester :". $formData['form-college-semester']."\n";
        $message .= "Branch :". $formData['form-branch']."\n";
        for($i = 1; $i<6; $i++){
            if(isset($formData['form-member-1-name'])){
                $message .= "Student".$i." \n";
                $message .= "Name :". $formData['form-member-'.$i.'-name']."\n";
                $message .= "Email :". $formData['form-member-'.$i.'-email']."\n";
                $message .= "Contact Number :". $formData['form-member-'.$i.'-number']."\n";
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