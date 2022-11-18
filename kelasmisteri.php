<!-- Sekolah Isekai
Di Sebuah sekolah Isekai, terdapat 5 kelas, pembagian kelas dilakukan berdasarkan nilai Ujian Akhir 
semester sesuai Angka puluhannya. Jumlah siswa setiap kelas tidak ditentukan.
Akan tetapi, terdapat sebuah kelas Khusus (Kelas ke-6), dimana diisi murid yang memiliki nama dengan 
huruf "C", dan "O". Kelas ini merupakan kelas prioritas dimana yang mendapatkan nilai yang habis dibagi 
7 pasti akan menikah tahun depan.
contoh: BUCOCO mendapat nilai 77, maka dia akan menikah di tahun 2023.
Misteri Tidak berakhir di situ
Terdapat sebuah kutukan mengerikan di sekolah ini, dimana apabila siswa mendapatkan Nilai Ujian 
Bilangan Prima, maka dia akan mati di tahun ini, di bulan yang sama dengan angka satuan nilai ujiannya 
tersebut. Jika Bulannya telah lewat, maka kutukan berlaku di tahun depan.
contoh: TUMEYU mendapat nilai 51, maka dia akan meninggal di Bulan Januari tahun depan
Data:
Berikut adalah API untuk mendapatkan 100 nama, dan 100 nilai ujian akhir semester
http://ecocim-backend-theone.beit.co.id/api/ManualConfig/TestBEIT
Tugas:
Tampilkan data detail setiap kelas, beserta jumlah siswa yang akan mati di bulan ini dan akan menikah di 
tahun depan.
Bentuk data yang ditampilkan bebas, namun harus jelas dan detail -->
<?php
//Defisikan array nama siswa dan nilai
$nama= array ("ZEQAQE","LEJAQU","FUVELE","KOZEWU","MALIKU","VECULA","REMEGI","KIJARA","BOYUHU","LICUGI","GUREXI","XEKOHA","JUNAGO","RAVILA","VUWIJU","QAGISA","NAWETI","HENOSE","SEFALO","QETOZO","HUQERE","TUWITI","KIRONO","QUFIPI","XIDIBA","MUFAHE","PALAVE","GOXOVU","KICAHI","SAXAZA","LABIWO","RIFEXO","PEMIMU","VEREFI","YUYUJE","XUJOXU","CAVUPE","LUFABE","RIRABI","COWITI","WECACA","FIQIHO","WIPAJO","ZILUDE","XOQUPU","TOCENE","LOHEXI","XIVAJU","WICUZO","HAKAYU","YOXEPA","FEFENI","KUJANU","DUHUDI","RADINU","KERARI","KIJOLU","TUPEWA","LOGIWE","YAFIYA","GAMUYO","TINURO","LONUDO","SUHOFA","KOVALA","LITUME","ZOVOHO","DEZASA","KULURI","ZOFEHO","MUCUSA","KADIKI","QIGIME","WEYARE","BAMAJU","GIBEHI","GIVUPI","TOCORA","LEQERE","HUBEYU","HUDOFU","HEJIQI","GULEGO","KEFOZI","QAVIWE","HIMOFI","VOMAFI","YUKOVO","VIREME","RORAXI","QOBETI","HEVOGU","YAYAHE","FIPEZA","PAVOFI","BIQUNA","KABIRO","QEJUMI","FOMIMI","KAWILE");
$nilai= array (77,55,95,66,68,83,72,54,92,78,85,50,83,72,71,92,71,59,94,88,89,52,97,86,95,74,59,69,85,66,84,93,78,97,84,80,70,92,52,92,53,90,56,60,96,73,53,62,67,73,95,79,58,62,76,79,78,55,96,94,62,82,67,69,91,97,83,61,95,53,66,71,61,62,80,97,95,82,91,83,69,71,79,91,73,83,68,76,69,73,61,90,87,97,96,76,84,92,83,69);

//hitung total nama dan nilai apakah sama
echo "jumlah siswa adalah ".count($nama).'<br>';
echo "jumlah nilai adalah ".count($nilai).'<br>';
if (count($nilai)==count($nama)){
    echo "jumlah nama dan nilai sudah sama.";
}else{echo "jumlah nama dan nilai tidak sama";};

// Menyebutkan semua siswa dan nilai siswa
echo "</br></br>Nama nama dan nilai : </br>";
for ($x=0;$x<count($nama);$x++){
echo ($x+1).'. '.$nama[$x].' : '.$nilai[$x].'</br>';
};

//Pembagian Kelas
//Soal kurang detail, apakah kelas ke 6 isi nya ((yang memiliki huruf C dan O && nilai habis dibagi 7))
//atau
//apakah kelas ke 6 isi nya ((yang memiliki huruf C dan O || nilai habis dibagi 7))
   

    //Mencari nama di kelas ke 6 dahulu, karena paling unik
    $kelaske6a=array();
    echo "</br>kelas ke 6 jika case nya pakai atau(&&) tidak ditemukan.</br>";
    for($x=0;$x<100;$x++){
        if((preg_match("/c/i", $nama[$x])) && (preg_match("/o/i", $nama[$x])) 
            &&($nilai[$x]%7==0)) {
            echo $nama[$x].'</br>'.$nilai[$x].'</br>';
            array_push($kelaske6a,$nama[$x]);
            }
    };
    echo 'Jumlah kelas ke 6 dengan case (&&) adalah '.count($kelaske6a).'</br>';
    
//pembagian kelas diawali dari kelas 6 ( case || )dahulu, sisanya baru ke kelas ke 1 - 5
$kelaske6b=array();
echo "</br>Kelas ke 6 jika case nya pakai atau(||)</br>";
echo "Siswa siswa yang masuk ke kelas ke 6 yaitu</br>";

for($x=0;$x<100;$x++){
    if((preg_match("/c/i", $nama[$x])) && (preg_match("/o/i", $nama[$x])) 
        || ($nilai[$x]%7==0)) {
        echo $nama[$x].' :'.$nilai[$x].'</br>';
        array_push($kelaske6b,$nama[$x]);
        }
};
echo 'Jumlah kelas ke 6 dengan case (||) adalah '.count($kelaske6b).'</br>';

//menentukan siswa yang menikah tahun depan
$nikah=array();
echo "</br>Siswa yang akan menikah tahun depan adalah yang memiliki nilai yang habis dibagi 7, yaitu : </br>";
for($x=0;$x<100;$x++){
    if($nilai[$x]%7==0) {
        echo $nama[$x].' :'.$nilai[$x].'</br>';
        array_push($nikah,$nama[$x]);
        }
};
echo 'Jumlah siswa yang akan menikah tahun depan adalah '.count($nikah).'</br></br>';


//membuat array selain kelas ke 6
$namaX=$nama;
foreach($kelaske6b as $pull){
    $keyToPull = array_search($pull, $namaX);
    unset($namaX[$keyToPull]);
}
echo "Jumlah siswa selain kelas ke 6 yaitu ".count($namaX);


//membuat array kelas 1 - 5
$kelas=array(
$kelas1=array(),
$kelas2=array(),
$kelas3=array(),
$kelas4=array(),
$kelas5=array()
);
    for($x=1;$x<=5;$x++){
        echo '</br>Siswa siswa yang masuk ke kelas ke '.$x.' yaitu :</br>';
        for ($y=0;$y<count($namaX);$y++){
            if(($nilai[$y]>=(($x+4)*10)) && ($nilai[$y]<(($x+5)*10))){
                echo $nama[$y].' :'.$nilai[$y].'</br>';
                array_push($kelas[($x-1)],$nama[$y]);
            };
        };
        echo "Jumlah siswa kelas ke ".$x." yaitu ".count($kelas[($x-1)]).'</br>';
    };

//MISTERI BELUM BERAKHIR
//Array bilangan Prima
    //bilangan prima adalah bilangan asli lebih dari 1 dan bisa habis dibagi oleh dirinya sendiri
echo "</br></br>MISTERI BELUM BERAKHIR</br>";
$prima=array();
$nprima=array();

for($x=0;$x<100;$x++){
    if($nilai[$x]>1 && $nilai[$x]%2!=0 && $nilai[$x]%3!=0 && $nilai[$x]%5!=0 && $nilai[$x]%7!=0 && $nilai[$x]%11!=0){
        array_push($prima,$nama[$x]);
        array_push($nprima,$nilai[$x]);
    };
};
echo 'Siswa yang mendapat nilai prima berjumlah '.count($prima).' yaitu : </br>';
for($x=0;$x<count($prima);$x++){
echo $prima[$x].', ';
};
echo '</br></br>';
// Mencari siswa yang meninggal per bulan
for($x=0;$x<count($prima);$x++){
    $bulanMati=$nprima[$x]%10;
    if($bulanMati<date("m")){
        $date = date_create(date('Y').'-'.$bulanMati);
        echo $prima[$x].' dengan Nilai:'.$nprima[$x].', meninggal pada '.date_format($date, 'Y-M').'</br>';
    }elseif($bulanMati>=date("m")){
    $date = date_create((date('Y')+1).'-'.$bulanMati);
    echo $prima[$x].' dengan Nilai:'.$nprima[$x].', meninggal pada '.date_format($date, 'Y-M').'</br>';
    };
}
echo "Karena bulan ini adalah bulan November, maka tidak ada yang meninggal tahun besok (2023)";

echo "</br></br>Misal bulan ini adalah bulan Juli, maka hasilnya akan menjadi </br> ";
for($x=0;$x<count($prima);$x++){
    $bulanMati=$nprima[$x]%10;
    if($bulanMati<7){
        $date = date_create(date('Y').'-'.$bulanMati);
        echo $prima[$x].' dengan Nilai:'.$nprima[$x].', meninggal pada '.date_format($date, 'Y-M').'</br>';
    }elseif($bulanMati>=7){
    $date = date_create((date('Y')+1).'-'.$bulanMati);
    echo $prima[$x].' dengan Nilai:'.$nprima[$x].', meninggal pada '.date_format($date, 'Y-M').'</br>';
    };
}
?>

