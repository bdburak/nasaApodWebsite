<?php
if (!isset($_POST["random"])) {
  $_POST["random"] = "0";
}
  if($_POST["random"] != '1') {
    $response = file_get_contents("https://api.nasa.gov/planetary/apod?api_key=oc8pgVHdxt7tAB4JehrLeFZr09ATTSO7zzOsuPje");
    $response = json_decode($response,true);
    $date =date("d/m/Y", strtotime($response['date']));
  }
  if($_POST["random"] == '1'){
    $datestart = strtotime('1998-01-05');

    $daystep = 86400;
    $datebetween = abs((time() - $datestart) / $daystep);
    $randomday = rand(0, $datebetween);
    //Generate a timestamp using mt_rand.
    $timestamp = mt_rand(1, time());

    //Format that timestamp into a readable date string.
    $randomDate = date("Y-m-d", $datestart + ($randomday * $daystep));
    $response = file_get_contents("https://api.nasa.gov/planetary/apod?api_key=oc8pgVHdxt7tAB4JehrLeFZr09ATTSO7zzOsuPje&date=$randomDate");
    $response = json_decode($response,true);
    $date =date("d/m/Y", strtotime($response['date']));
}


 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ASTRONOMY PICTURE OF THE DAY</title>
    <link href="https://fonts.googleapis.com/css?family=Expletus+Sans|Brawler" rel="stylesheet">
    <link rel="stylesheet" href="styleNew.css">
  </head>
  <body>
    <div id="siteTitle">
      <h1>ASTRONOMY PICTURE OF THE DAY</h1>
      <hr>
    </div>
    <div class="content">
      <h2 id="title"><?php echo $response['title'] ?></h2>
      <h3 id="date"><?php echo $date; ?></h3>
      <hr id="contentHr">
      <p id="explanation"><?php echo $response['explanation']; ?></p>
      <img id="image" onclick="pictureClicked()" src="<?php echo $response['hdurl'] ?>" alt="DustStormJune2018">
    </div>
    <form action="index.php" method="POST">
      <button type="submit" name="random" value="1" id="randomButton">Random Date</button>
    </form>

    <footer id="footer">
      Burak Dogucu 2020
    </footer>
    <script src="script.js" charset="utf-8"></script>
  </body>

</html>
