<?php 
    $countsfile="sample.txt";
    if(!file_exists($countsfile)){
        file_put_contents($countsfile,0);
    }
    $count=file_get_contents($countsfile);
    $count++;
    file_put_contents($countsfile,$count);
?>
<Doctype html>
<html>
<head>
    <title>Visitor count</title>
</head>
<body>
    <h1>welcome to my website</h1>
    <h1>visitor count <?php echo "$count";?></h1>
</body>
</html>