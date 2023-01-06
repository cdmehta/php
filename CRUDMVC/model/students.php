<?php

class students
{
    // table fields
    public $stud_id;
    
    public $stud_name;
    public $stud_dept;
    // message string
    public $dept_msg;
    public $name_msg;
    // constructor set default value
    function __construct()
    {
        $stud_id=0;$stud_dept=$stud_name="";
        $id_msg=$dept_msg=$name_msg="";
    }
}

?>