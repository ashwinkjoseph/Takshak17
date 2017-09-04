<?php

class events extends controller{


    private $error = "";

    public function ComputerScience(){
        $data = $this->getData("COMPUTER");
        if($data){
            $html = $this->generateHTML($data);
            $this->deliverJSONResponse(200, "recordFound", $html);
        }
        else{
            $this->deliverJSONResponse(500, "Database Connection Error", $this->error);
        }
    }

    public function MECHANICAL(){
        $data = $this->getData("MECHANICAL");
        if($data){
            $html = $this->generateHTML($data);
            $this->deliverJSONResponse(200, "recordFound", $html);
        }
        else{
            $this->deliverJSONResponse(500, "Database Connection Error", $this->error);
        }
    }

    private function getData($dept){
        $handler = $this->database();
        if($handler){
            $result = $handler->prepare("select * from events where department=:dept");
            $result->bindParam(":dept", $dept);
            $result->execute();
            $data = $result->fetchAll(PDO::FETCH_ASSOC);
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
            $eventHandler = '';
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
                            <a href="'.$eventHandler.'"><button>REGISTER</button></a>
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