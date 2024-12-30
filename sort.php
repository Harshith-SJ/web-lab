<?php
$conn=new mysqli("localhost","root","","college");
$sql="SELECT * from studentdetail";
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
echo "<h1>Students sorted</h1>";
echo "<table border='1'>
        <tr>
            <th>USN</th>
            <th>name</th>
            <th>Marks</th>
        </tr>";
foreach($students as $student){
    echo "<tr>
        <td>".$student['usn'].",<td>
        <td>".$student['name'].",<td>
        <td>".$student['marks'].",<td>
    </tr>";
}
echo "</table>";
$conn->close();
?>