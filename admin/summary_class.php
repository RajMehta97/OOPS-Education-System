<?php

class summary_class{
  var $no_of_profs;
  var $no_of_studs;
  var $no_of_topics;
  var $no_of_quizes;
  var $avg_score;
  function setno_of_profs($no){
     $this->no_of_profs = $no;
  }

  function getno_of_profs(){
     echo $this->no_of_profs ."<br/>";
  }

  function setno_of_studs($studs){
     $this->no_of_studs=$studs;
  }

  function getno_of_studs(){
     echo $this->no_of_studs ." <br/>";
  }
  function settopic($topic){
     $this->no_of_topics = $topic;
  }

  function gettopic(){
     echo $this->no_of_topics ."<br/>";
  }

  function setquiz($quiz){
     $this->no_of_quizes = $quiz;
  }

  function getquiz(){
     echo $this->no_of_quizes ."<br/>";
  }

  function setavg_score($score){
     $this->avg_score = $score;
  }

  function getavg_score(){
     echo $this->avg_score ."<br/>";
  }
}
?>
