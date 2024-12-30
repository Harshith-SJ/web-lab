<?php 
$countfile="counter.txt";
if(!file_exists($countfile)){
    file_put_contents($countfile,0);
}
$count=file_get_contents($countfile);
$count++;
file_put_contents($countfile,$count);
?>
<!Doctype html>
<html>
<head>
        <title>visitor count</title>
</head>
<body>
    <h1>visitor count :<?php echo "$count"; ?></h1>
</body>
</html>