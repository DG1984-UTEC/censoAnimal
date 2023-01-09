<?php 
if(isset($_POST['txtbusca'])):
  include "../.php";
   $user=new ApptivaDB();  
    $u=$user->buscar("persona"," ci like '%".$_POST['txtbusca']."%'");
    $html="";
 foreach ($u as $v)
      $html.="<p>".$v['ci']."</p>";
 echo $html;
else:
    echo "Error";
endif;
 ?>