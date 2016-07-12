<?php
 
class PrvaKlasa
{
  public $prop1 = "KLASA!";
 
  public function __construct()
  {
      echo 'Klasa "', __CLASS__, '" koja je pozvana!<br />';
  }
 
  public function __destruct()
  {
      echo 'Klasa  "', __CLASS__, '" je unistena.<br />';
  }
 
  public function __toString()
  {
      echo "Koristenje string metode: ";
      return $this->getProperty();
  }
 
  public function setProperty($newval)
  {
      $this->prop1 = $newval;
  }
 
  public function getProperty()
  {
      return $this->prop1 . "<br />";
  }
}
 
class DrugaKlasa extends PrvaKlasa
{
  public function newMethod()
  {
      echo "Nova klasa je  " . __CLASS__ . ".<br />";
  }
}
 
// kreira novi objekat 
$newobj = new DrugaKlasa;
 
// Output the object as a string
echo $newobj->newMethod();
 

//koristi metodu  od roditeljske klase 
echo $newobj->getProperty();
 
?>