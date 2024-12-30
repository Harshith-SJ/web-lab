<?php 
$conn=new mysqli("localhost","root","","student");
$sql="SELECT * from detail";
$result=$conn->query($sql);
$students=[];
if($result->num_rows>0){
    while($row=$result->fetch_assoc()){
        $students[]=$row;
    }
}
for($i=0;$i<count($students);$i++){
    $min=$i;
    for($j=$i+1;$j<count($students);$j++){
        if($students[$j]['marks']<$students[$min]['marks']){
            $min=$j;
        }
    }
    if($min!=$i){
        $temp=$students[$i];
        $students[$i]=$students[$min];
        $students[$min]=$temp;
    }
}
echo "<h1>sort by marks</h1>";
echo "<table border='1'>
        <tr>
        <th>name</th>
        <th>marks</th>
        </tr>";
foreach($students as $student){
    echo "<tr>
    <td>".$student['name']."</td>
    <td>".$student['marks']."</td>
    </tr>
    ";
}
echo "</table>";
$conn->close();
?>