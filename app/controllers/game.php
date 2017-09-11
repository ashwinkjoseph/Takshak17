<?php

class game extends controller{

    public function index(){
        $this->view("game");
    }

    public function getRoundQuestion($round){
        $round = intval($round);
        $question = "error";
        $question = $questions[$round];
        $this->deliverJSONResponse(200, "Processed", $question);
    }

    public function validate($get, $post){
        $userID = $post['userID'];
        $round = $post['round'];
        if($round==1){
            $file_content = file_get_contents(__DIR__."/../private/".$round.".jpg");
            $toDeliver = array("blob"=>base64_encode($file_content), "access"=>true, "round"=>$round);
        }
        else{
            $data = $this->getUserData($userID);
            $actualRound = $data[0]['round'];
            if($round == $actualRound){
                $file_content = file_get_contents(__DIR__."/../private/".$round.".jpg");
                $toDeliver = array("blob"=>base64_encode($file_content), "access"=>true, "round"=>$round);
            }else{
                $toDeliver = array("access"=>false);
            }
        }
        $this->deliverJSONResponse(200, "Proceed", $toDeliver);
    }

    public function checkAnswer($get, $post){
        $answers = array("pulimurugan", "legohouse", "mydearkuttichathan", "diamond", "spirit", "shakespearessonnets", "lakme", "nathalieemmanuel", "digitalfortress", "reginafalange", "neworleans", "mtvasudevannair", "gordonfeeeman", "malgudidays", "marymorstan", "raymondloewy", "gireeshputhenchery", "georgefriderichandel", "fordgt40", "harryhoudini");
        $user = $post['userID'];
        $userAnswer = strtolower($post['answer']);
        $userAnswer = str_replace("'", "", $userAnswer);
        $userAnswer = str_replace(" ", "", $userAnswer);
        $userAnswer = str_replace(".", "", $userAnswer);
        $userAnswer = str_replace(",", "", $userAnswer);
        $data = $this->getUserData($user);
        if(!empty($data)){
            $id = intval($data[0]['id']);
            $round = intval($data[0]['round'])-1;
            similar_text($answers[$round], $userAnswer, $percentage);
            // $toDeliver = array("id"=>$id, "round"=>$round, "user"=>$user, "percent"=>$percentage);
            // $this->deliverJSONResponse(200, "somethings wrong", $toDeliver);
            if($percentage>90){
                $round2 = $round + 2;
                if($this->updateRound($round2, $user, $id)){
                    $status = "Proceed";
                    $statusCode = 200;
                    $toDeliver = array("correctAnswer"=>true, "round"=>$round2);
                }
                else{
                    $status = "DatabaseError";
                    $statusCode = 200;
                    $toDeliver = array("correctAnswer"=>"error");
                }
            }
            else{
                $status = "Proceed";
                $statusCode = 200;
                $toDeliver = array("correctAnswer"=>false, "round"=>$round);
            }
            $this->deliverJSONResponse($statusCode, $status, $toDeliver);
        }
        else{
            $this->deliverJSONResponse(500, "Error", $data);
        }
    }

    private function updateRound($round, $user, $id){
        $handler = $this->database();
        if($handler){
            try{
                $result = $handler->prepare("update gameUser SET round=:round WHERE userID=:id");
                $result->bindParam(":round", $round, PDO::PARAM_INT);
                $result->bindParam(":id", $user);
                if($result->execute()){
                    // return true;
                    $result = $handler->prepare("select * from questionFirst where id=:round");
                    $result->bindParam(":round", $round, PDO::PARAM_INT);
                    if($result->execute()){
                        $data = $result->fetchAll(PDO::FETCH_ASSOC);
                        if(empty($data)){
                            try{
                                $result = $handler->prepare("insert into questionFirst values(:round, :userID, :userFBID)");
                                $result->bindParam(":round", $round, PDO::PARAM_INT);
                                $result->bindParam(":userID", $id, PDO::PARAM_INT);
                                $result->bindParam(":userFBID", $user);
                                if($result->execute()){
                                    return true;
                                }
                                else{
                                    return false;
                                }
                            }
                            catch(PDOException $e){
                                $result = $handler->prepare("update gameUser SET round=:round WHERE userID=:id");
                                $round = $round - 1;
                                $result->bindParam(":round", $round, PDO::PARAM_INT);
                                $result->bindParam(":id", $user);
                                $result->execute();
                                $this->deliverJSONResponse(500, "DError", $e->getMessage());
                                return false;
                            }
                        }else{
                            return true;
                        }
                    }
                }
            }
            catch(PDOException $e){
                $this->deliverJSONResponse(500, "Error", $e->getMessage());
            }
        }else{
            return false;
        }
    }

    public function getUserInfo($get, $post){
        $user = $post['userID'];
        $data = $this->getUserData($user);
        if(empty($data)){
            $this->addUser($post, 1);
            $data = $this->getUserData($user);
            if($data){
                $this->deliverJSONResponse(200, "Processed", $data);
            }
            else{
                $this->deliverJSONResponse(500, "Error", $data);
            }
        }
        else{
            $errors = array_filter($data);
            if(empty($errors)){
                $this->addUser($post, 1);
            }
            $data = $this->getUserData($user);
            if($data){
                $this->deliverJSONResponse(200, "Processed", $data);
            }
            else{
                $this->deliverJSONResponse(500, "Error", $data);
            }
        }
        // else{
        //     $this->deliverJSONResponse(500, "Error", "data not retrieved");
        // }
    }

    private function getUserData($user){
        $handler = $this->database();
        if($handler){
            try{
                $result = $handler->prepare("select * from gameUser where userID=:user");
                $result->bindParam(":user", $user);
                $result->execute();
                $data = $result->fetchAll(PDO::FETCH_ASSOC);
                return $data;
            }
            catch(PDOException $e){
                $this->deliverJSONResponse(500, "Error", $e->getMessage());
            }
        }
        else{
            return false;
        }
    }

    private function addUser($user, $round){
        $handler = $this->database();
        if($handler){
            try{
                $result = $handler->prepare("insert into gameUser values(id, :userID, :firstName, :lastName, :Name, :round)");
                $result->bindParam(":userID", $user['userID']);
                $result->bindParam(":firstName", $user['firstName']);
                $result->bindParam(":lastName", $user['lastName']);
                $result->bindParam(":Name", $user['Name']);
                $result->bindParam(":round", $round, PDO::PARAM_INT);
                $result->execute();
                return true;
            }
            catch(PDOException $e){
                $this->deliverJSONResponse(500, "Error", $e->getMessage());
            }
        }
        else{
            return false;
        }
    }

}