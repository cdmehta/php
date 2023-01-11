<?php 
$request_method=$_SERVER['REQUEST_METHOD'];
$response=array();
echo $request_method;
switch($request_method){
	case "GET":
		res(doGet());
		break;
	case "POST":
		res(doPost());
		break;
	case "PUT":
		res(doPut());
		break;
	case "DELETE":
		res(doDelete());
		break;
}
function doGet(){
	if(isset($_GET['id'])){
		$id=$_GET['id'];
		$where=" where stud_id=$id";
	}else{
		$id=0;
		$where="";
	}
	$con=mysqli_connect("localhost","root","admin@123","chiragdb");
	$query="select * from stud_mst".$where;
	
	$res=mysqli_query($con,$query);
	while($data=mysqli_fetch_assoc($res)){
		$response[]=array("stud_id"=>$data['stud_id'],"stud_name"=>$data['stud_name'],"stud_email"=>$data['stud_email'],"stud_address"=>$data['stud_address'],"stud_salary"=>$data['stud_salary']);
		
	}
	return $response;
}
function doPost(){
	if($_GET){
		$con=mysqli_connect("localhost","root","admin@123","chiragdb");
		$q="insert into stud_mst 
		(stud_name,stud_email,stud_address,stud_salary) values
		('".$_REQUEST['stud_name']."','".$_REQUEST['stud_email']."',
		'".$_REQUEST['stud_address']."','".$_REQUEST['stud_salary']."')";
		echo $q;
		$query=mysqli_query($con,$q);
		if($query==true){
			$response[]=array("message"=>"Insert Success");
		}
		else{
			$response[]=array("message"=>"Insert Failed");
		}
	}
		return $response;
}
function doDelete(){
	if($_GET['id']){
		$con=mysqli_connect("localhost","root","admin@123","chiragdb");
		$query=mysqli_query($con,"delete from stud_mst where stud_id=".$_GET['id'] );
		if($query==true)
			$response[]=array("message"=>"Delete Success");
		else
			$response[]=array("message"=>"Delete Failed");
	}
	return $response;
}
function doPut(){
	if($_POST){
		$con=mysqli_connect("localhost","root","admin@123","chiragdb");
		$query=mysqli_query($con,"update stud_mst set 
		stud_name ='".$_REQUEST['stud_name']."',
		stud_email='".$_REQUEST['stud_email']."',
		stud_address='".$_REQUEST['stud_address']."',
		stud_salary= '".$_REQUEST['stud_salary']."'
		where stud_id=".$_REQUEST['id']);
		if($query==true)
			$response[]=array("message"=>"Update Success");
		else
			$response[]=array("message"=>"Update Failed");
	}
	return $response;
}
function res($response){
	echo json_encode(array("status"=>200,"data"=>$response));
}
?>