<?php

class User {

   public $name;
   public $surname;
   protected $passportNumber;
   protected $phone;
   public $age;

   public function __construct($name, $surname, $passportNumber, $phone, $age){
      $this->name  = $name;
      $this->surname = $surname;
      $this->passportNumber = $passportNumber;
      $this->phone = $phone;
      $this->age = $age;
   }

   public function get_PassportNumber(){
      return $this->passportNumber;
   }

   public function get_Phone(){
      return $this->phone;
   }

}

class Student extends User {

   public $mog;
   public $faculty;
   public $course;

   public function __construct($name, $surname, $passportNumber, $phone, $age, $mog, $faculty, $course){

      parent::__construct($name, $surname, $passportNumber, $phone, $age);

      $this->mog = $mog;
      $this->faculty = $faculty;
      $this->course = $course;
   }
}

?>
