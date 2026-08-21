<?php
class Student
{
public $s;
public $r ;
public $e ;
public $sm;
public $c;
public $m; 
function Information($s,$m,$r,$e,$sm,$c)
{
 $this-> student_name=$s;

 $this-> marks=$m;

 $this-> roll_no=$r;

 $this-> english_marks=$e;

 $this-> math_marks=$sm;

 $this-> computer_marks=$c;
}
 function total_marks (){

$total_marks=$this-> english_marks + $this-> math_marks + $this-> computer_marks;
 echo "Total_marks:".$total_marks."<br>";
 return;
}


function percentage(){

$p=$this-> english_marks + $this-> math_marks + $this-> computer_marks;
$d=$p / $this-> marks;
$per=$d*100;

?>
<h3>Percentage:</h3>
<h3><?php echo $per;?><br></h3>
return;
<?php
}


function grade(){
$p=$this-> english_marks+$this-> math_marks+$this-> computer_marks/$this-> marks;
$per=$p*100;
if($per>80){
    
 echo "Grade: A+ <br> ";
 return;

}
elseif($per>70){
    
 echo "Grade: A <br> ";
 return;

}
elseif($per>60){
    
 echo "Grade: B <br> ";
 return;

}
elseif($per>50){
    
echo "Grade: C <br> ";
return;
}
else{
echo "Grade: F <br>  ";
return;
}
 }
function print(){
echo "Name:".$this->student_name."<br>";
echo "Roll_No:".$this->roll_no."<br>";

}
}
 $Markssheet=new Student();
 $Markssheet->Information("Aliyan",300,123,60,80,90);
 $Markssheet->print();
  $Markssheet->percentage();
  $Markssheet->total_marks();
  $Markssheet->grade();
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

</body>
</html>

