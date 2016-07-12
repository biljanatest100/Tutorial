<?php
 $res="";
 $greska="";
 $memorija="";
 $rezultati = array();
session_start();
if( !isset($_SESSION['memory']) ) { 
	$_SESSION['memory'] = '';
}

if(isset( $_REQUEST['calculate'] ))
{
$operator=$_REQUEST['operator'];
if($operator=="+")
{
$add1 = $_REQUEST['fvalue'];
$add2 = $_REQUEST['lvalue'];
$res= $add1+$add2;

}
if($operator=="-")
{
$add1 = $_REQUEST['fvalue'];
$add2 = $_REQUEST['lvalue'];
$res= $add1-$add2;
}
if($operator=="*")
{ 
$add1 = $_REQUEST['fvalue'];
$add2 = $_REQUEST['lvalue'];
$res =$add1*$add2;

}
if($operator=="/")
{
$add1 = $_REQUEST['fvalue'];
$add2 = $_REQUEST['lvalue']; 
    

 if ($_REQUEST['lvalue']==0 && $_REQUEST['operator'] =='/'){
	 $greska="Nije dozvoljeno djeljenje sa 0";
 }
 else $res= $add1/$add2;

}

 else if($_REQUEST['fvalue']==NULL)
 {
 $greska= "Unesite prvi broj";
   }
 else if($_REQUEST['lvalue']==NULL)
  {
 $greska= "Unesite drugi broj.";
  } 
 else if (!is_numeric($_REQUEST['fvalue'])) {
	  $greska= "Unesite broj";
 }
	 else if (!is_numeric($_REQUEST['lvalue'])){
  $greska= "Unesite broj";
  }
 if ($greska ==""){
$_SESSION['memory'] ="$add1"." "."$operator"."  "."$add2"." "."="." "."$res"."<br>".$_SESSION['memory'];
 }
if($_SESSION['memory'] !== "" && $add1 !=0 && $add2 !=0) {
	$memorija= $_SESSION['memory']."<br>";
}
if(isset( $_REQUEST['search'] )){
	
	$broj=$_REQUEST('broj');
	
}

}
?>
<style>
div {
    background-color: yellow;
    width: 400px;
	height: 400px;
    padding: 10px;
    border: 1px;
    margin: 40px;
	text-align:center;
}
</style>
<div>
<form  style="font-size:18px;">        
	Unesite prvi broj
	<input name="fvalue" type="text" />
	<br>
	<br>
	Izaberite operaciiju:              
	<select name="operator" style="width: 63px">
	<option>+</option>
    <option>-</option>
	<option>*</option>
    <option>/</option>
	</select>
	<br>
	<br>
    Unesite drugi broj 
    <input name="lvalue" type="text"/>
	<br>
	<br>
    <input type="submit" name="calculate" value="Izracunaj" style="color:wheat;background-color:rosybrown;font-size:18px;" />
	<input name="broj" type="text"/>
	 <input type="submit" class="btn btn-default" name="search" value="Pretrazi" style="color:wheat;background-color:rosybrown;font-size:18px;" />
	 <?php in_array('search', $memorija); ?>
     <br> 
    <p style="font-size:20px;">Rezultat = <?php echo $res;?></p>
	<p style="background-color:red; font-size:20px"><?php echo $greska ?></p>
	<br>
	<p><?php echo $memorija ?></p>
	
	
 </form>
</div>

 