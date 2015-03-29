<title>Cyber-Warrior Zone-H Mass</title>
<meta charset="utf-8">
<form method=POST>
<form action="" method="post">
    <input type="text" name="defacer" size="56" value="Cyber-Warrior" />
    <br>
    <select name="hackmode">
        <option>--------Hangi Yöntem--------</option>
        <option value="1">known vulnerability (i.e. unpatched system)</option>
        <option value="2" >undisclosed (new) vulnerability</option>
        <option value="3" >configuration / admin. mistake</option>
        <option value="4" >brute force attack</option>
        <option value="5" >social engineering</option>
        <option value="6" >Web Server intrusion</option>
        <option value="7" >Web Server external module intrusion</option>
        <option value="8" >Mail Server intrusion</option>
        <option value="9" >FTP Server intrusion</option>
        <option value="10" >SSH Server intrusion</option>
        <option value="11" >Telnet Server intrusion</option>
        <option value="12" >RPC Server intrusion</option>
        <option value="13" >Shares misconfiguration</option>
        <option value="14" >Other Server intrusion</option>
        <option value="15" >SQL Injection</option>
        <option value="16" >URL Poisoning</option>
        <option value="17" >File Inclusion</option>
        <option value="18" >Other Web Application bug</option>
        <option value="19" >Remote administrative panel access bruteforcing</option>
        <option value="20" >Remote administrative panel access password guessing</option>
        <option value="21" >Remote administrative panel access social engineering</option>
        <option value="22" >Attack against administrator(password stealing/sniffing)</option>
        <option value="23" >Access credentials through Man In the Middle attack</option>
        <option value="24" >Remote service password guessing</option>
        <option value="25" >Remote service password bruteforce</option>
        <option value="26" >Rerouting after attacking the Firewall</option>
        <option value="27" >Rerouting after attacking the Router</option>
        <option value="28" >DNS attack through social engineering</option>
        <option value="29" >DNS attack through cache poisoning</option>
        <option value="30" >Not available</option>
    </select>
    <br>
    <select name="reason">
        <option style='display:block;width:100%;'>--------Sebebi--------</option>
        <option value="1" >Heh...just for fun!</option>
        <option value="2" >Revenge against that website</option>
        <option value="3" >Political reasons</option>
        <option value="4" >As a challenge</option>
        <option value="5" >I just want to be the best defacer</option>
        <option value="6" >Patriotism</option>
        <option value="7" >Not available</option>
    </select>
    <br>
    <textarea name="domain" style='display:block;width:25%;height:150px;'>Site Listeniz</textarea><br>
    <input type="submit" value="Kaydet" name="Kaydet" />
</form></form>

<?php
function ZoneH($url, $hacker, $yontem,$neden, $site )
{
    $k = curl_init();
    curl_setopt($k, CURLOPT_URL, $url);
    curl_setopt($k,CURLOPT_POST,true);
    curl_setopt($k, CURLOPT_POSTFIELDS,"defacer=".$hacker."&domain1=". $site."&hackmode=".$yontem."&reason=".$neden);
    curl_setopt($k,CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($k, CURLOPT_RETURNTRANSFER, true);
    $hackroot = curl_exec($k);
    curl_close($k);
    return $hackroot;
}

if(@$_POST['Kaydet'])
{
    ob_start();
    $sub = @get_loaded_extensions();
    if(!in_array("curl", $sub))
    {
        die(' Desteklenmeyen URL !! ');
    }

    $hacker = $_POST['defacer'];
    $hizlan = $_POST['hackmode'];
    $neden = $_POST['reason'];
    $site = $_POST['domain'];

    if (!$hacker && $hacker ==null)
    {
        die (" Hacker İsmi Girmediniz ..!");
    }
    elseif($hizlan == "--------Hangi Yöntem--------")
    {
        die(" Hangi Yöntem Olduğunu Belirtin");
    }
    elseif($neden == "--------Sebebi--------")
    {
        die(" Sebebini Seçmelisiniz");
    }
    elseif(empty($site))
    {
        die(" Site Listesini Belirtin ");
    }
    $i = 0;
    $siteler = explode("\n", $site);
    while($i < count($siteler))
    {
        if(substr($siteler[$i], 0, 4) != "http")
        {
            $siteler[$i] = "http://".$siteler[$i];
        }

        ZoneH("http://zone-h.org/notify/single", $hacker, $hizlan, $neden, $siteler[$i]);
        echo "Site : ".$siteler[$i]." Deface Edildi !<br>";
        ++$i;
    }
    echo " Zone-h Gönderme İşlemi Başarı İle Tamamlanmıştır !!";
}
?>
