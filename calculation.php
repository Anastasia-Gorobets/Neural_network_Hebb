<?php
$x1=$_POST['x1'];
$x2=$_POST['x2'];
$x3=$_POST['x3'];
$x4=$_POST['x4'];

$w1=array_fill(0,20,0); //начальные весы
$w2=array_fill(0,20,0);

$y1=[1,1];
$y2=[1,-1];
$y3=[-1,1];
$y4=[-1,-1];

$s1=0;
$s2=0;
//обучаем для x1

for($i=0;$i<=19;$i++){
    $w1[$i]=$w1[$i]+$x1[$i]*$y1[0];
    $w2[$i]=$w2[$i]+$x1[$i]*$y1[1];
}

//обучаем для x2
for($i=0;$i<=19;$i++){
    $w1[$i]=$w1[$i]+$x2[$i]*$y2[0];
    $w2[$i]=$w2[$i]+$x2[$i]*$y2[1];
}
//обучаем для x3
for($i=0;$i<=19;$i++){
    $w1[$i]=$w1[$i]+$x3[$i]*$y3[0];
    $w2[$i]=$w2[$i]+$x3[$i]*$y3[1];
}

//обучаем для x4
for($i=0;$i<=19;$i++){
    $w1[$i]=$w1[$i]+$x4[$i]*$y4[0];
    $w2[$i]=$w2[$i]+$x4[$i]*$y4[1];
}

echo "W:<br>";
print_r($w1);
echo '<br>';
print_r($w2);


if($_POST['ident'] == true ){
    $xi=$_POST['xi'];
    //проверка
    for($i=0;$i<=19;$i++){
        $s1 += $w1[$i]*$xi[$i];

        $s2+= $w2[$i]*$xi[$i];
    }
    echo "<br><br>S=$s1 $s2<br>";
    if($s1>0 && $s2>0)echo "This is most likely first symbol";
    if($s1>0 && $s2<0)echo "This is most likely second symbol";
    if($s1<0 && $s2>0)echo "This is most likely third symbol";
    if($s1<0 && $s2<0)echo "This is most likely fourth symbol";
}






