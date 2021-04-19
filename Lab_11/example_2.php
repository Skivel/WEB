 <?php
 $string="<font color=#FF0000><b>Математичний приклад</b></font>";
 $a=$_GET[a];
 $b=$_GET[b];
 $sum= $a+$b;
 $riz= $a-$b;
 $dob= $a*$b;
 $dil= $a/$b;
 echo "$string<br><br> ";
 echo "a=$a, b=$b<br><br> ";
 echo "<b>Сума </b> $sum<br> ";
 echo "<b>Різниця </b> $riz<br> ";
 echo "<b>Добуток </b> $dob<br> ";
 echo "<b>Частка </b> $dil<br> ";
 ?>
