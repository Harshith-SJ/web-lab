<?php 
$countfile="counter.txt";
if(!file_exists($countfile)){
    file_put_contents($countfile,0);
}
$count = file_get_contents($countfile);
$count++;
file_put_contents($countfile,$count);
?>
<!Doctype html>
<html>
    <head>
        <title>count visitors</title>
    </head>
    <body>
        <h1>Welcome to my website</h1>
        <h1>count:<?php echo $count; ?></h1>
    </body>
</html>