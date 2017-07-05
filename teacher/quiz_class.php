<?php


    class quiz {

        var $topic;
        var $validity = '0';
        var $q1;
        var $q2;
        var $q3;
        var $q4;
        var $q5;
        var $a1;
        var $a2;
        var $a3;
        var $a4;
        var $a5;
        var $subject;
        var $uploader;
        function setName ( $par){
          $this->topic = $par;
        }
        function setSubject ( $par){
          $this->subject = $par;
        }
        function setUploader ( $par){
          $this->uploader = $par;
        }

        function setQuestions ( $q1 ,$q2,$q3,$q4,$q5){
          $this->q1=$q1;
          $this->q2=$q2;
          $this->q3=$q3;
          $this->q4=$q4;
          $this->q5=$q5;
        }
        function setAnswers ( $a1 ,$a2,$a3,$a4,$a5){
          $this->a1=$a1;
          $this->a2=$a2;
          $this->a3=$a3;
          $this->a4=$a4;
          $this->a5=$a5;
        }

    }

?>
