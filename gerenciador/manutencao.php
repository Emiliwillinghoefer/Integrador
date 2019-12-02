<?php include_once "includes/cabecalho.php" ?>

<div class="col-2">

  <form class=""  method="post"   >

      <?php
      require_once "classes/Consulta.php";
      $consulta = new Consulta();
      $query = $consulta->QueryManutencao();
       ?>
       <fieldset name="nome" >


          <?php
                  // $arrayCod = array();
                  $arrayName = array();
                  foreach ($query as $sla) {
                    array_push($arrayName,  $sla['idtipo']);
                    // array_push($arrayCod,  $sla['idtipo']);

                  ?>

                        <input type="checkbox" name="<?=$sla['idtipo']?>" value=""><?=$sla['typeser']?>
                        <br>
                <?php }?>
              </fieldset>
              <input type="submit" name="confirmarButton" value="Confirmar">

              </form>
              <?php
              include_once "classes/Consulta.php";
              $consulta = new Consulta();

              // $result = $consulta->consJardimProd(5, 10);
              if (isset($_POST['confirmarButton'])) {


                  foreach ($arrayName as $i => $value) {
                      if (isset($_POST[$arrayName[$i]])){
                        $nome = $_POST[$arrayName[$i]];
                        // echo "   <br>";
                        // print_r($arrayName[$i]);
                        // print_r($arrayName[$i]);
                        // echo $cod;
                        print_r( $_SESSION['id']);

                       $sql = $consulta->insereManutencao($arrayName[$i], $_SESSION['id']);
                       print_r($sql);
                       // header("Location: cadJardim.php");

                      }
                }

          }
          ?>
          <br>



</div>
<script src="js/carrinho.js"></script>
<?php include "includes/rodape.php"; ?>
