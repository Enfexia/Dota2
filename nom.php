<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Dota 2 Hesaplayıcı</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/vendor/bootstrap.min.css" rel="stylesheet">
    <link href="css/vendor/bootstrap.min.css" rel="stylesheet">
    <link href="css/flat-ui.min.css" rel="stylesheet">
    <link href="stylee.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  </head>
<body >
<div class="container">
      <div class="row">
      <div id="row"></div>
       <div class="row-fluid">
      <div class="span4 offset4 text-center">
        <p id="sd">Dota 2 oynayarak toplam</p>
      <span id="counter" class="text-center">

 <?php 
 function getir($baslangic, $son, $cekilmek_istenen)
{
    @preg_match_all('/' . preg_quote($baslangic, '/') .
    '(.*?)'. preg_quote($son, '/').'/i', $cekilmek_istenen, $m);
    return @$m[1];
}
 

$girdi = $_GET["girdi"];
$girdi2 = strlen($girdi);

if($girdi2 == 17){
$steam = "http://steamcommunity.com//profiles/";
}else{
$steam = "http://steamcommunity.com/id/";
}
$steamid = $steam . $girdi;
$steamurl = file_get_contents($steamid);
$userid = getir('steamid":"','","',$steamurl);

if($userid[0] == ""){
  $url='hata.html';
   echo "<META HTTP-EQUIV=REFRESH CONTENT='1; hata.html'>";
   echo '<p id="faruk" class="hidden-lg hidden-md hidden-sm hidden-xs">a</p>';
}
  $dokuz = 9;
    $baslik = array(
      'http'=>array(
        'method'=>"GET",
        'header'=>"Accept-language: tr-TR,tr;q=0.8,en-US;q=0.5,en;q=0.3\r\n" .
                  "User-Agent: Mozilla/5.0 (Windows NT 6.3; WOW64; rv:38.0) Gecko/20100101 Firefox/38.0\r\n"
      )
    );
    $icerik = stream_context_create($baslik);
    $kaynak = @file_get_contents("https://www.dotabuff.com/players/".$userid[0], false, $icerik);
    if($http_response_header[0]="HTTP/1.1 200 OK"){
        $saat = preg_match("/Stats Recorded<\/td><td>(.*?)<div /", $kaynak, $output_array);
        if($saat) {
            $string = str_replace(',', '', $output_array[1]); 
            echo $string * $dokuz;
        } else {
              $url='hata.html';
   echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
    echo '<p id="faruk" class="hidden-lg hidden-md hidden-sm hidden-xs">a</p>';
        }
       
    } else {
          echo $http_response_header[0];
    }
 ?>
</span>
<p>
      <p id="ds">Kişiyle tanıştın</p>
      <a class="thumbnail">
      <img src="img/a.png" id="cem" class="img-responsive"style="width: 64px; height=64px; display: block;" >
      </a>
      </p>
      </div>
    </div>
    </div>
  </div>
<script type="text/javascript">
  html = document.getElementById("faruk").innerHTML;
  if(html == "a"){
      console.log("Steam ID bulunamadı veya hesap gizli.");
      counter.classList.add("hidden-lg","hidden-md","hidden-sm","hidden-xs");
      sd.classList.add("hidden-lg","hidden-md","hidden-sm","hidden-xs");
      ds.classList.add("hidden-lg","hidden-md","hidden-sm","hidden-xs");
      cem.classList.add("hidden-lg","hidden-md","hidden-sm","hidden-xs");
  }else{

  }
</script>
<script>

    var $temp = $('#counter').html();
    var $cem = $temp - 9;
  var $el = $("#counter"); //[make sure this is a unique variable name]
  $({someValue: $cem}).animate({someValue: $temp}, {
      duration: 2000,
      easing:'swing', // can be anything
      step: function() { // called on every step
          // Update the element's text with rounded-up value:
          $el.text(commaSeparateNumber(Math.round(this.someValue)));
      }
  });

 function commaSeparateNumber(val){
    while (/(\d+)(\d{3})/.test(val.toString())){
      val = val.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
    }
    return val;
  }
</script>

<script src="js/vendor/jquery.min.js"></script>
    <script src="js/flat-ui.min.js"></script>
</body>
</html>
