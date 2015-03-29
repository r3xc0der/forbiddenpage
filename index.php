Cümleten Selamun Aleyküm,

Bugün sizlerle yasakli.txt dosyamızda yer alan ip adreslerini kontrol ederek o ip adreslerinden bir tanesinden bile giriş varsa farklı bir sayfaya yönlendirip yönetici tarafından sistemden banlandınız gibisinden bir sayfaya yönlendirmeden bahsedeceğim. İlk olarak txt'yi okutacağımız ve girmeye çalışacağımız index.php sayfasını oluşturalım.

[B]
<?php
$filename="yasakli.txt";
$ip=$_SERVER['REMOTE_ADDR'];
$count=0;
if(file_exists($filename))
{
    $file=fopen($filename,'r');
    while(!feof($file))
    {
        $reading=fgets($file);
        if($ip===$reading)
        {
            $count++;
            break;
        }
    }
    fclose($file);
}
if($count!=0)
{
    header('Location : yasakli.php');
    exit;
}
echo '<html><title>Hoşgeldiniz></title><body><h1>Cyber-Warrior</h1></body></html>';
?>
[/B]

Evet şimdi ise yasakli.txt dökümanımızı oluşturalım ve içine bir kaç ip adresi girelim.
[B]
127.0.0.1
127.0.0.2
127.0.0.3
127.0.0.4
[/B]

Ve son olarakta yasakli.php adındaki dökümanımızı oluşturuyoruz. Burada ise yaptığımız eğer requestin geldiği ip ile yasakli.txt'deki ip adresi aynı ise kullanıcıyı yasakli.php adındaki sayfaya yönlendirip oradaki hata mesajını göstereceğimiz sayfadır kendisi.

[B]
<?php
echo '<html><title>Sistemden uzaklaştırıldınız</title><body><h1>İlgili siteden uzaklaştırıldınız."</body></html>';
?>
[/B]
