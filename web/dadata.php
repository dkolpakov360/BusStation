<?php error_reporting(E_ALL & ~E_NOTICE); ?>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Считаем растояние между двух городов</title>
</head>

<body>

<form action="" method="POST">
    <input placeholder="Введите город №1" value="<?=$_POST['address1'];?>" id="address1" name="address1" type="text" />
    <input placeholder="Введите город №2" value="<?=$_POST['address2'];?>" id="address2" name="address2" type="text" />
    <input id="geo_lat1" name="geo_lat1" value="<?=$_POST['geo_lat1'];?>" type="text" />
    <input id="geo_lon1" name="geo_lon1" value="<?=$_POST['geo_lon1'];?>" type="text" />
    <input id="geo_lat2" name="geo_lat2" value="<?=$_POST['geo_lat2'];?>" type="text" />
    <input id="geo_lon2" name="geo_lon2" value="<?=$_POST['geo_lon2'];?>" type="text" />
<input  type="submit" id="sub1" />
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/suggestions-jquery@20.3.0/dist/css/suggestions.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/suggestions-jquery@20.3.0/dist/js/jquery.suggestions.min.js"></script>

<script>
    geo_lat1="";
    geo_lon1="";
    geo_lat2="";
    geo_lon2="";

    $("#address1").suggestions({
        token: "3d9bb414e17945b6e851f005fff77c562cc96a93",
        type: "ADDRESS",
        /* Вызывается, когда пользователь выбирает одну из подсказок */
        onSelect: function(suggestion) {
          geo_lat1=suggestion["data"]["geo_lat"];
          $("#geo_lat1").val(geo_lat1);
          geo_lon1=suggestion["data"]["geo_lon"];
          $("#geo_lon1").val(geo_lon1);
        }
    });
    
     $("#address2").suggestions({
        token: "3d9bb414e17945b6e851f005fff77c562cc96a93",
        type: "ADDRESS",
        /* Вызывается, когда пользователь выбирает одну из подсказок */
        onSelect: function(suggestion) {
          geo_lat2=suggestion["data"]["geo_lat"];
          $("#geo_lat2").val(geo_lat2);
          geo_lon2=suggestion["data"]["geo_lon"];
          $("#geo_lon2").val(geo_lon2);
        }
    });
    
   

</script>

<hr>

<?php 

if (isset($_POST['geo_lat1'])) {

    $lat1 = $_POST['geo_lat1'];
    $long1 = $_POST['geo_lon1'];
    $lat2 = $_POST['geo_lat2'];
    $long2 =$_POST['geo_lon2'];
         
    // Радиус земли
    define('EARTH_RADIUS', 6372795);
     
    function calculateTheDistance ($x1, $y1, $x2, $y2) {
     
        // перевести координаты в радианы
        $lat1 = $x1 * M_PI / 180;
        $lat2 = $x2 * M_PI / 180;
        $long1 = $y1 * M_PI / 180;
        $long2 = $y2 * M_PI / 180;
         
        // косинусы и синусы широт и разницы долгот
        $cl1 = cos($lat1);
        $cl2 = cos($lat2);
        $sl1 = sin($lat1);
        $sl2 = sin($lat2);
        $delta = $long2 - $long1;
        $cdelta = cos($delta);
        $sdelta = sin($delta);
         
        // вычисления длины большого круга
        $y = sqrt(pow($cl2 * $sdelta, 2) + pow($cl1 * $sl2 - $sl1 * $cl2 * $cdelta, 2));
        $x = $sl1 * $sl2 + $cl1 * $cl2 * $cdelta;
         
        //
        $ad = atan2($y, $x);
        $dist = $ad * EARTH_RADIUS;

        return $dist;
    }

    echo '<h4>'.$_POST['address1'].' - '.$_POST['address2'].'</h4>';
    echo (int)(calculateTheDistance($lat1, $long1, $lat2, $long2)/1000) . "км";

} ?>

</body>
</html>