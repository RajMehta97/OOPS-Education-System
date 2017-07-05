<?php

class stu_class{
  var $topic;
    var $score;
      var $username;
        var $subject;

  function settopic($nam){
     $this->topic = $nam;
  }

  function setscore($nam){
     $this->score = $nam;
  }

  function setusername($nam){
     $this->username = $nam;
  }

  function setsubject($nam){
     $this->subject = $nam;
  }



  function gettopic(){
     echo $this->topic ."<br/>";
  }

  function getscore(){
     echo $this->score ."<br/>";
  }

  function getusername(){
     echo $this->username ."<br/>";
  }

  function getsubject(){
     echo $this->subject ."<br/>";
  }


}
?>
