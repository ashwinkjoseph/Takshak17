<?php

class game extends controller{

    public function index(){
        $this->view("game");
    }

    public function checkAnswer($get, $post){
        $user = $post['userID'];
        $userAnswer = $post['answer'];
        $data = $this->getUserData($user);
        if($data){
            if($data['round']==1){
                if($userAnswer == $round1Answer){
                    $toDeliver = array("correctAnswer"=>true);
                    $this->updateRound(2);
                }
                else{
                    $toDeliver = array("correctAnswer"=>false);
                }
            }
            if($data['round']==2){
                if($userAnswer == $round2Answer){
                    $toDeliver = array("correctAnswer"=>true);
                    $this->updateRound(3);
                }
                else{
                    $toDeliver = array("correctAnswer"=>false);
                }
            }
            if($data['round']==3){
                if($userAnswer == $round3Answer){
                    $toDeliver = array("correctAnswer"=>true);
                    $this->updateRound(4);
                }
                else{
                    $toDeliver = array("correctAnswer"=>false);
                }
            }
            $this->deliverJSONResponse(200, "Processed", $toDeliver);
        }
        else{
            $this->deliverJSONResponse(500, "Error", $data);
        }
    }

    public function getUserInfo($get, $post){
        $user = $post['userID'];
        $data = $this->getUserData($user);
        $errors = array_filter($data);
        if(empty($errors)){
            $this->addUser($user, 1);
        }
        $data = $this->getUserData($user);
        if($data){
            $this->deliverJSONResponse(200, "Processed", $data);
        }
        else{
            $this->deliverJSONResponse(500, "Error", $data);
        }
    }

    private function getUserData($user){
        $handler = $this->database();
        if($handler){
            $result = $handler->prepare("select * from gameUser where user=:user");
            $result->bindParam(":user", $user);
            $result->execute();
            $data = $result->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }
        else{
            return false;
        }
    }

    private function addUser($userID, $round){
        $handler = $this->database();
        if($handler){
            $result = $handler->prepare("insert into gameUser values(id, :user, :round)");
            $result->bindParam(":user", $userID);
            $result->bindParam(":round", $round, PDO::PARAM_INT);
            $result->execute();
            $data = $result->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }
        else{
            return false;
        }
    }

}