<?php 

include 'Banco/conect.php';

//header
include_once 'includes/header.php';
?>


<div class="row">
  <div class="col s12 m6 push-m3">
            <h3 class="light">Ranking da Semana</h3>
       <table class="striped">
        <thead>
          <tr>
             
              
              <th>Series Name:</th>
              <th>Genre:</th>
              <th>Seasons:</th>
              <th>Synopsis:</th>
          </tr>
        </thead>

        <tbody>
          <?php 
            $results= $conn->prepare("SELECT * FROM series");
            $results->execute();
            $control = $results->fetchAll(PDO::FETCH_ASSOC);
            // var_dump($control);
          ?>
        <?php foreach ($control as $test): ?>

        
          <tr>
              <td><?= $test["name"];?></td>
              <td><?= $test["genre"];?></td>
              <td><?= $test["seasons"];?></td>
              <td><?= $test["synopsis"];?></td>
            </td>
              <td>><a href="" class="btn-floating orange"> <i class="material-icons">edit</i></a></td>
            <td>
              <a href="" class="btn-floating red"> <i class="material-icons">remove</i></a>
              </td>
          </tr>
         
     <?php endforeach;?>

        </tbody>
      </table>
            <a href="addUser.php" class="btn"> Adicionar Série </a>
<!-- <a class="waves-effect waves-light btn">Adicionar Série</a> -->


  </div>
</div>









<?php 
//footer
include_once 'includes/footer.php';
 
?>
