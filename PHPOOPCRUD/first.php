<!--W A P to find minimum of 3 numbers; -->
<?php
//this is
#this is
/*

*/
/*$a = 20;
$b = 20;
$c = 20;
if ($a < $b && $a<$c)
    echo "a is less than b and c";
else if ($b < $a && $b < $c)
    echo "b is less than a and c";
else if ($a == $b && $b == $c)
    echo "a, b and c are same";
else
    echo "c is less than a and b";*/
//if statement
// $m1 = 50;
// $m2 = 50;
// $m3 = 50;
// $m4 = 50;
// $m5 = 50;
// $total=$m1+$m2+$m3+$m4+$m5;
// //$per=$total/5;
// $per=$total*100/500;
// echo "Total-->".$total."<br>";
// echo "Percentage-->".$per."<br>";
// if($per >=70)
//     echo "DIST";
// else if($per >=60 and $per <=69)
//     echo "first";
// else if($per >=50 and $per <=59)
//     echo " Second";
// else if($per >=36 and $per <=49)
//     echo "  Pass";
// else
//     echo "fail";
// $marks = 5;
// if ($marks < 36)
//     echo "You are FAIL";
// else
//     echo "You are pass";
?>

<?php
// $c = 1;
// switch ($c) {
//     case 1:
//         echo "Sunday";
//         break;
//     case 2:
//         echo "Monday";
//         break;
//     default:
//         echo "Invalid Choice";
// }
?>
<?php
// for ($i = 10; $i >= 1; $i--)
//     IF(fmod($i,2)!=0)
//     echo $i."&nbsp;&nbsp;";
$n = 5;
echo "<table  border='1'color='red'>";
for ($i = 1; $i <= 10; $i++) {
    echo "<tr>";
    //echo $n."*".$i."=".$n*$i."<br>";
    //echo "<td>$n</td>";
    echo "<td><font color=cyan size=6 face='comic sans ms'>$n</font></td>";
    echo "<td>*</td>";
    echo "<td>$i</td>";
    echo "<td>=</td>";
    echo "<td>".$n*$i."</td>";
    echo "</tr>";
}
echo "</table>";
?>

