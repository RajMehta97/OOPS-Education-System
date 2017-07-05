
<?php
   class topic {
      /* Member variables */
      var $name;
      var $subject;
      var $validity = '0' ;
      var $uploader ;

      /* Member functions */
      function setName($par){
         $this->name = $par;
      }

      function getName(){
         echo $this->name;
      }

      function setSubject($par){
         $this->subject = $par;
      }

      function getSubject(){
         echo $this->subject;
      }
      function setUploader($par){
         $this->uploader = $par;
      }

      function getUploader(){
         echo $this->uploader;
      }
      function getValidtity(){
         echo $this->validity;
      }
   }
?>
