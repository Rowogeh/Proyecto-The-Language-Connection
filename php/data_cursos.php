<?php
include '../php/config/config.php';

$datab = new mysqli (host, usr, pssw, db);
$datab->set_charset('utf8');
if($datab->connect_errno){
  echo $datab->connect_error;
  exit();
}

$limite = 5;
$inicio = 0;

if(isset($_GET['pagi'])){
  $pagi = $_GET['pagi'];
  $inicio = ($pagi-1) * $limite;
}else{
  $pagi = 1;
}

$x = isset($_POST['val']) ? $_POST['val'] : '';

$consulta = "SELECT * FROM nom WHERE nom LIKE '%$x%' OR ape LIKE '%$x%' OR nom LIKE '%$x%' LIMIT $inicio, $limite";

if (!$res = $datab->query($consulta)){
  echo $datab->error;
  exit();
}
?>
<div class="section">
  <?php if($res->num_rows) : ?>
  <table width="100%" class="bordered centered responsive-table">
    <thead>
      <th colspan="11">cursos</th>
    </thead>
    <tbody>
      <tr>
        <td>Todo</td>
        <td>nombre</td>
        <td>codigo</td>
        <td>Opciones</td>
      </tr>
      <?php while($row = $res->fetch_assoc()) : ?>
      <tr>
        <td>
          <a class="btn btn-floating waves-effect waves-light pink accent-3" target="_blank" href="todo_cursos.php?nom=<?php echo $row['nom'] ?>">
            <i class="material-icons">person_outline</i>
          </a>
        </td>
        <td><?php echo $row['nom'] ?></td>
        <td><?php echo $row['cod'] ?></td>
        
        <td>
          <button id="alum_rep" class="btn tooltipped indigo lighten-1 waves-effect waves-light" data-delay="50" data-tooltip="Representados" value="<?php echo $row['ci'] ?>">
            <i class="material-icons">face</i>
          </button>
        </td>
        <td>
          <button id="edit_repre" class="btn tooltipped green accent-3 waves-effect" data-delay="50" data-tooltip="Editar" value="<?php echo $row['ci'] ?>">
            <i class="material-icons">edit</i>
          </button>
          <button id="borr_repre" class="btn tooltipped red darken-3 waves-effect" data-delay="50" data-tooltip="Eliminar" value="<?php echo $row['ci'] ?>">
            <i class="material-icons">delete</i>
          </button>
        </td>
      </tr>
    <?php
      endwhile;
      $squery = "SELECT * FROM cursos WHERE nom LIKE '%$x%' OR nom LIKE '%$x%' OR nom LIKE '%$x%'";
      $fields = $datab->query($squery);
      $rows = $fields->num_rows;
      $total = ceil($rows/$limite);
    ?>

    <tr>
      <td colspan="11" class="center">
        <ul class="pagination"><?php
          if($pagi > 1): ?>
            <li>
              <a href="?pagi=<?php echo ($pagi-1); ?>"><i class="material-icons">chevron_left</i></a>
            </li>
          <?php else : ?>
            <li class="disabled">
              <a href="javascript:void(0)"><i class="material-icons">chevron_left</i></a>
            </li><?php endif;
          for($i = 1; $i <= $total; $i++) :
            if($inicio == $i) : ?>
              <li class="waves-effect"><a href="javascript:void(0)"><?php echo $i ?></a></li><?php else : ?>
              <li class="waves-effect"><a href="?pagi=<?php echo $i; ?>"><?php echo $i ?></a></li><?php
            endif;
          endfor;

          if($pagi != $total) : ?>
            <li class="waves-effect">
              <a href="?pagi=<?php echo ($pagi+1); ?>"><i class="material-icons">chevron_right</i></a>
            </li>
          <?php else : ?>
            <li class="disabled">
              <a href="javascript:void(0)"><i class="material-icons">chevron_right</i></a>
            </li><?php
          endif; ?>
        </ul>
      </td>
      <div class="fixed-action-btn horizontal click-to-toggle">
        <a class="btn-floating btn-large red">
          <i class="material-icons">menu</i>
        </a>
        <ul>
          <li>
            <input type="search" id="val" placeholder="Buscar" value="<?php echo $x ?>">
          </li>
          <li>
            <button class="btn-floating waves-effect blue" id="go">
              <i class="material-icons">search</i>
            </button>
          </li>
        </ul>
      </div>
    </tr>
    </tbody>
  </table>
</div>
<?php else : ?>
  <div class="card-panel teal lighten-2" align="center">
    <p><strong>No Hay Registros</strong></p>
  </div>
  <div class="fixed-action-btn horizontal click-to-toggle">
    <a class="btn-floating btn-large red">
      <i class="material-icons">menu</i>
    </a>
    <ul>
      <li>
        <input type="search" id="val" placeholder="Buscar" value="<?php echo $x ?>">
      </li>
      <li>
        <button class="btn-floating waves-effect blue" id="go">
          <i class="material-icons">search</i>
        </button>
      </li>
    </ul>
  </div>
<?php endif; ?>