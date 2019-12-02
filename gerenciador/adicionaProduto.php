<?php include_once "includes/cabecalho.php" ?>

<div class="col-2">

  <form class=""  method="post"   >

      <?php
      require_once "classes/Consulta.php";
      $consulta = new Consulta();
      $query = $consulta->exibeProd();
       ?>

           <table class="tabela">
              <tr id="rotulo">
                <th>Produto:</th>
                <th>Quantidade:</th>
                <th>Valor:</th>
                <th>Adicionar</th>
              </tr>
              <?php
                    // $t = $consulta->insereServico();
                    // $var_dump($t);
                  $arrayCod = array();
                  $arraQntd = array();
                  foreach ($query as $sla) {
                    array_push($arraQntd,  'quant' . $sla['cod']);
                    array_push($arrayCod,  $sla['cod']);

                  ?>
                    <tr>
                          <td><?=$sla['namep']?></td>
                          <td><input type="number" value="" name="quant<?=$sla['cod']?>" onchange="atualizaValor(document.getElementById('total<?=$sla["cod"];?>'), document.getElementById('unitario<?=$sla["cod"];?>').innerHTML,this.value)"></td>
                          <td name="<?=$sla['cod']?>" id='unitario<?=$sla["cod"];?>'><?=$sla['valuevd']?></td>
                          <td name="total<?=$sla['cod']?>">R$<span id="total<?=$sla["cod"];?>"></span></td>

                    </tr>

                <?php }
              ?>
              </table>
              <input type="submit" name="confirmarButton" value="Confirmar">

              </form>
              <?php
              include_once "classes/Consulta.php";
              $consulta = new Consulta();

              // $result = $consulta->consJardimProd(5, 10);
              if (isset($_POST['confirmarButton'])) {


                  foreach ($arraQntd as $i => $value) {
                      if (isset($_POST[$arraQntd[$i]])){
                        $qntd = $_POST[$arraQntd[$i]];
                        $cod = $arrayCod[$i];
                        print_r($arrayCod[$i]);
                        echo "   <br>";
                        print_r($qntd);
                        // echo $cod;
                        print_r( $_SESSION['id']);
                       $sql = $consulta->consJardimProd( $_SESSION['id'],$cod, $qntd);
                       header("Location: cadJardim.php");
                      }
                }

          }
                // echo $_POST['check'];// TESTA ISSO, E VE OQ PRINTA
                // testa, vê se entra aquiii
                // deu... O problema agora é saber qual desses check tao ligado pra poder pegar o cod
                // segue o array, sempre vai ser o mesmo indice, tipo, se aquele array o check estiver ativo, é pq vc precisa salvar no banco, faz um foreach e percore
                // os check talvez de certo
                // echo "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa";

                  // if (isset($_POST['check'])) {
                  //   echo "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa";
                  // }

                  // ESSE NEGOCIO ELE NAO VERIFICA SE TA O CHECK SETADO OU NAO;;;;

                    	// print_r($_SESSION['id']);
                      // echo $_POST($arraQntd[$key]);
                      // print_r($_SESSION['codProd']);
                      // $id = $consulta->consultaCod($_POST['namep']);
                    	// $_SESSION['codProd'] =	$id[0]['cod'];
                        // if(!empty($_POST[$arraQntd[$key]])){
                              // var_dump($arraQntd);
                              // var_dump($arraQntd);

                              // $result = $consulta->consJardimProd($_SESSION['id'],$arraQntd[$key]);
                              // $result = $consulta->consJardimProd(5, 10);

                              // var_dump($result);
                        // }
                    //   }
                    // }
              ?>
              <br>



</div>
  <script src="js/carrinho.js"></script>
<?php include "includes/rodape.php"; ?>
