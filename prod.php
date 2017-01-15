<?php
require 'connect.php';
class Product
{

	public $id_Product = 0;
	public $name = "John";
	public $price = 00.01;
	public $description= "Empty text";

    // method declaration
    public function displayVar() {
        echo $this->name;
        echo $this->description;
    }

	// method declaration
    public function setProductBD() {
    	$name = $this->name;
    	$price = $this->price;
    	$description = $this->description;
    	$sql = "INSERT INTO produto(`nome`,`preco`,`descricao`) 
    	VALUES('$name',$price,'$description')";
    	$cons = mysqli_query($conexao ,$sql);

    }    
}
?>