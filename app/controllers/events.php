<?php

class events extends controller{

    public function ComputerScience(){
        $data = $this->getData("COMPUTER");
        if($data){
            $html = $this->generateHTML($data);
            $this->deliverJSONResponse(200, "recordFound", $html);
        }
        else{
            $this->deliverJSONResponse(500, "Database Connection Errors", $this->error);
        }
    }

    public function Mechanical(){
        $data = $this->getData("MECHANICAL");
        if($data){
            $html = $this->generateHTML($data);
            $this->deliverJSONResponse(200, "recordFound", $html);
        }
        else{
            $this->deliverJSONResponse(500, "Database Connection Error", $this->error);
        }
    }

    public function Civil(){
        $data = $this->getData("CIVIL");
        if($data){
            $html = $this->generateHTML($data);
            $this->deliverJSONResponse(200, "recordFound", $html);
        }
        else{
            $this->deliverJSONResponse(500, "Database Connection Error", $this->error);
        }
    }

    public function Electrical(){
        $data = $this->getData("ELECTRICAL");
        if($data){
            $html = $this->generateHTML($data);
            $this->deliverJSONResponse(200, "recordFound", $html);
        }
        else{
            $this->deliverJSONResponse(500, "Database Connection Error", $this->error);
        }
    }

    public function ElectronicsandCommunication(){
        $data = $this->getData("ELECTRONICS");
        if($data){
            $html = $this->generateHTML($data);
            $this->deliverJSONResponse(200, "recordFound", $html);
        }
        else{
            $this->deliverJSONResponse(500, "Database Connection Error", $this->error);
        }
    }

    private function getData($dept){
        header('Access-Control-Allow-Origin: *'); 
        $handler = $this->database();
        if($handler){
            $result = $handler->prepare("select * from events where department=:dept");
            $result->bindParam(":dept", $dept);
            $result->execute();
            $data = $result->fetchAll(PDO::FETCH_ASSOC);
            $this->error = $data;
            return $data;
        }
        else{
            return false;
        }
    }

    private function generateHTML($data){
        $i = 0;
        $rowBeg = '<div class="row eventList" style="text-align: center;">';
        $rowEnd = '</div>';
        $html = '';
        foreach($data as $obj){
            $eventName = $obj['eventName'];
            $details = $obj['details'];
            $contact = $obj['eventHead'];
            $contact = str_replace(",", "<br>", $contact);
            $eventHandler = $obj['link'];
            if($eventHandler){
                $btn = '<a href="'.$eventHandler.'"><button>REGISTER</button></a>';
            }
            else{
                $btn = '';
            }
            if($i%3==0){
                $html .= $rowBeg;
            }
            $html .= '<div class="col-sm-4">
                        <span class="evnt">
                            <h4>'.$eventName.'</h4>
                            <p>
                                '.$details.'<br/>
                                - - - - - - - - - - - -<br/>
                                <span class="contact">CONTACT</span><br/>'.$contact.'

                            </p>
                            '.$btn.'
                        </span>
                    </div>';
            if($i%3==2){
                $html .= $rowEnd;
            }
            $i++;
        }
        return $html;
    }
    
}