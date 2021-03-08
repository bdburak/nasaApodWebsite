<?php 
/*
   2016-05-12 
    */
    $datestart = strtotime('1998-01-05');//you can change it to your timestamp;
    //$dateend = strtotime('2020-07-31');//you can change it to your timestamp;
    
    $daystep = 86400;

    $datebetween = abs((time() - $datestart) / $daystep);

    $randomday = rand(0, $datebetween);

    //echo "\$randomday: $randomday\n";

    echo date("Y-m-d", $datestart + ($randomday * $daystep)) . "\n";
    //Generate a timestamp using mt_rand.
    $timestamp = mt_rand(1, time());
 
    //Format that timestamp into a readable date string.
    $randomDate = date("Y-m-d", $datestart + ($randomday * $daystep));
    $response = file_get_contents("https://api.nasa.gov/planetary/apod?api_key=oc8pgVHdxt7tAB4JehrLeFZr09ATTSO7zzOsuPje&date=$randomDate");
    $response = json_decode($response,true);
    var_dump($response);
    echo '<hr><br>';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>
    
</head>
<body style='background: url("<?php echo $response['hdurl'];?>");background-repeat: no-repeat;
  background-size: 100% 100%; '>
    <div class="main">
        <h1><?php echo $response["title"]; ?></h1>
        <p> <?php echo $response['explanation']; ?> </p>
        <br>
       
    </div>
</body>
</html>