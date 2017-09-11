<?php

class hackathon extends controller{

    public function index(){
        $this->view("hackathon");
    }

    public function submit($get, $post){
        // var_dump($get);
        // var_dump($post);
        $formData = $post;
        if(isset($_FILES['form-model']['name'])){
            $name_of_uploaded_file =basename($_FILES['form-model']['name']);
            $this->getFile( $name_of_uploaded_file, $formData );
        }
        else{
            $this->sendMailAsAttachment("","", $formData);
        }
        // header("Locaton: http://takshak.in");
    }

    protected function getFile( $filename, $formData ) {
        
        $allowedExts = array("csv","pdf", "doc", "docx", "dot", "dotx", "docm", "dotm", "ppt", "pot", "pps", "ppa", "pptx", "potx", "ppsx", "ppam", "pptm", "potm", "ppsm");
        $temp = explode(".", $_FILES["form-model"]["name"]);
        $extension = end($temp);
        $mimes = array('application/vnd.ms-excel','text/plain','text/csv','text/tsv', 'application/pdf', "application/msword", "application/vnd.openxmlformats-officedocument.wordprocessingml.document", "application/vnd.openxmlformats-officedocument.wordprocessingml.template", "application/vnd.ms-word.document.macroEnabled.12", "application/vnd.ms-word.template.macroEnabled.12", "application/vnd.ms-powerpoint", "application/vnd.openxmlformats-officedocument.presentationml.presentation", "application/vnd.openxmlformats-officedocument.presentationml.template", "application/vnd.openxmlformats-officedocument.presentationml.slideshow", "application/vnd.ms-powerpoint.addin.macroEnabled.12", "application/vnd.ms-powerpoint.presentation.macroEnabled.12", "application/vnd.ms-powerpoint.template.macroEnabled.12", "application/vnd.ms-powerpoint.slideshow.macroEnabled.12");
     
        if ((in_array($_FILES['form-model']['type'],$mimes)
        && in_array($extension, $allowedExts)))
          {
            if ($_FILES["form-model"]["error"] > 0)
            {
                echo "Return Code: " . $_FILES["form-model"]["error"] . "<br>";
            }
            else
            {   
                $this->sendMailAsAttachment($_FILES["form-model"]["tmp_name"],$_FILES["form-model"]["name"], $formData);
            }
          }
        else
          {
            if($_FILES["form-model"]["size"]==0){
                $this->sendMailAsAttachment("","", $formData);
            }
            echo "Invalid file";
          }  
    }

    protected function sendMailAsAttachment( $filename, $fileorgname, $formData ) {
        
        $emailData = $this->prepareEmail( $formData );
        if($filename!=""){
            $attachContent = $this->pepareAttachment( $filename,$fileorgname );
            $message = $emailData['message'].$attachContent;
            $ok = @mail($emailData['to'], $emailData['subject'], $message, $emailData['headers']);
            if ($ok) { 
                    // echo "<p>mail sent to $to!</p>";
                    $this->view("Success");
            } else {
    
                    echo "<p>mail could not be sent!</p>"; 
            }
        }
        else{
            $ok = @mail($emailData['to'], $emailData['subject'], $emailData['message'], $emailData['headers']);
            if ($ok) { 
                    // echo "<p>mail sent to $to!</p>";
                    $this->view("Success");
            } else {
    
                    echo "<p>mail could not be sent!</p>"; 
            }
        }
    }

    protected function prepareEmail( $formData ) {
        
        // email fields: to, from, subject, and so on
        $to = "ashwinkjoseph@gmail.com";
        $from = "hackathon@takshak.in";
        $subject ="New Registration for Hackathon"; 
        $message = "Uploaded File\n";
        $message .= "Team Name :". $formData['form-project-name']."\n";
        // $message .= "School/College". $formData['form-college']."\n";
        $i = 0;
        for($i = 1; $i<7; $i++){
            if(isset($formData['form-member-'.$i.'-name'])){
                $message .= "Student".$i." \n";
                $message .= "Name :". $formData['form-member-'.$i.'-name']."\n";
                $message .= "Email :". $formData['form-member-'.$i.'-email']."\n";
                $message .= "School/College :". $formData['form-member-'.$i.'-school']."\n";
                $message .= "Semester :". $formData['form-member-'.$i.'-semester']."\n";
                $message .= "Contact Number :". $formData['form-member-'.$i.'-contact']."\n";
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

    protected function pepareAttachment( $filename ,$fileorgname) {
        $attachContent = '';
        $file = fopen($filename,"rb");
        $data = fread($file,filesize($filename));
        fclose($file);
        $cvData = chunk_split(base64_encode($data));
        $semi_rand = md5(time());
        $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";
        $attachContent .= "Content-Type: {\"application/octet-stream\"};\n" . " name=\"$fileorgname\"\n" . 
        "Content-Disposition: attachment;\n" . " filename=\"$fileorgname\"\n" . 
        "Content-Transfer-Encoding: base64\n\n" . $cvData . "\n\n";
        $attachContent .= "--{$mime_boundary}\n"; 
        
        return $attachContent;
        
    }

}