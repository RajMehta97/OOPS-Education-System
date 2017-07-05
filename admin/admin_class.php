<?php

class admin_class{
  var $username;
  var $password;
  var $name;
  function setname($nam){
     $this->name = $nam;
  }

  //$admin->setname($row['name']);
  //$admin->name;

  function getname(){
     echo $this->name ."<br/>";
  }

  function setusername($uname){
     $this->username = $uname;
  }

  function getusername(){
     echo $this->username ." <br/>";
  }
  function setpassword($pass){
     $this->password = $pass;
  }

  function getpassword(){
     echo $this->password ."<br/>";
  }
}
?>
