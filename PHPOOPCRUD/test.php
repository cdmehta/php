<?php
include("db.php");
$obj = new query();

$condition_arr=array('stud_id'=>4,'stud_name'=>'chirag');
//Display
//$result=$obj->getData("stud_mst",'*','','stud_id','asc',2);
//$result=$obj->getData("stud_mst",'*');

//insert
//$condition_arr = array('stud_name'=>'Yatin','stud_email'=>'yatin@gmail.com','stud_address'=>'Palsana','stud_salary'=>8000);
//$result=$obj->insertData("stud_mst",$condition_arr);

//delete
//$condition_arr = array('stud_id'=>4);
//$result=$obj->deleteData("stud_mst",$condition_arr);

//update
$condition_arr = array('stud_name'=>'chintan','stud_email'=>'chintna@gmail.com','stud_address'=>'Kamrej','stud_salary'=>'5000');
$result=$obj->updateData("stud_mst",$condition_arr,'stud_id',8);

?>