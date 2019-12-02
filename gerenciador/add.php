<?php
include_once "classes/Consulta.php";
$consulta = new Consulta();


// var_dump($consulta);
// print_r($_POST['check']);
var_dump($_POST['teste']);

foreach ($_POST as  $value) {
  print_r("valor é", $value);
}






// echo $_POST['$arraQntd'];
// foreach ($arraQntd as $key => $value) {
//       if(isset($_POST[$arraQntd[$key]])){
//
//             $result = $consulta->consJardimProd($_POST[$arraQntd[$key]],$_POST[$arraytotal[$key]]);
//             var_dump($result);
//       }
// }



 ?>
