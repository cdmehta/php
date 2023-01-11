<?php 
class db{
    private $host ;
    private $dbusername ;
    private $password ;        
    private $dbname;    

protected function connect(){
    $this->host="localhost";
    $this->dbusername="root";
    $this->password="admin@123";
    $this->dbname="chiragdb";

        $con = new mysqli($this->host, $this->dbusername, $this->password, $this->dbname);
        return $con;
}
}

class query extends db{
    public function getData($table,$field='*',$condition_arr='',$order_by_field='',$order_by_type='',$limit=''){
         $sql = "select $field from $table ";
         if($condition_arr!=''){
            $sql.= " where ";
            $c = count($condition_arr);
            $i = 1;
            foreach($condition_arr as $key=>$val){
                if($i==$c)
                $sql .= "$key='$val' ";
                else
                $sql .= "$key='$val' and ";
                $i++;
            }
         }
        
        if($order_by_field!='')
            $sql.=" order by $order_by_field $order_by_type ";

            if($limit!=''){
            $sql .= " limit $limit ";
            }
        $result = $this->connect()->query($sql);
        if($result->num_rows>0){
            $arr = array();
            while($row=$result->fetch_assoc()){
                $arr[]=$row;
            }
            return $arr;
        }else{
            return 0;
        }
    }

    public function insertData($table,$condition_arr){
        if($condition_arr!=''){
           foreach($condition_arr as $key=>$val){
                $fieldArr[] = $key;
                $valueArr[] = $val;
           }
        }
        $field = implode(",", $fieldArr);
        $value = implode("','", $valueArr);
        $value = "'" . $value . "'";
        $sql = "insert into $table ($field) values($value) ";
       echo $sql;
       $result = $this->connect()->query($sql);
    }


    public function deleteData($table,$condition_arr){
        $sql = "delete from $table  where ";
        if($condition_arr!=''){
            $c = count($condition_arr);
            $i = 1;
            foreach($condition_arr as $key=>$val){
                if($i==$c)
                $sql .= "$key='$val' ";
                else
                $sql .= "$key='$val' and ";
                $i++;
            }
         }
        
       $result = $this->connect()->query($sql);
    }
    public function updateData($table,$condition_arr,$where_field,$where_value){
        $sql = "update $table  set ";
        if($condition_arr!=''){
            $c = count($condition_arr);
            $i = 1;
            foreach($condition_arr as $key=>$val){
                if($i==$c)
                $sql .= "$key='$val' ";
                else
                $sql .= "$key='$val' , ";
                $i++;
            }
         }
        echo $sql .= " where $where_field='$where_value'";
       $result = $this->connect()->query($sql);
    }
    public function get_safe_str($str){
        if($str!='')
        return mysqli_real_escape_string($this->connect(),$str);
    }
}
?>