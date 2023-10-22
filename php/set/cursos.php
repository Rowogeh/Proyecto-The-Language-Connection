<?php
include '../root.php';

class cursos{
  private $nom;
  private $cod;
  private $db;
  private $idaux;

  public function __construct($nom, $cod, $db, $idaux){
    $this->nom = $nom;
    $this->cod = $cod;
    $this->db = $db;
    $this->idaux = $idaux;
  }

  public function Agregar(){
    $consulta = "INSERT cursos VALUES(
    '$this->nom', '$this->cod')";

    if($this->db->query($consulta)): ?>
      <script type="text/javascript">
        alert('¡Registro Exitoso!');
        window.location.href = "../html/menu.php";
      </script>
    <?php else : ?>
      <input type="hidden" id="errno" value="<?php echo $this->db->errno; ?>">
      <script type="text/javascript">
        if(document.getElementById('errno').value === '1062'){
          alert('Ya registro esa persona');
        }else{
          alert("Error al registrar <?php echo $this->db->error; ?>");
        }
      </script>
    <?php endif;
  }

  public function Eliminar(){
    $consulta = "DELETE FROM cursos WHERE cursos = '$this->idaux'";

    if ($this->db->query($consulta)): ?>
      <script type="text/javascript">
        alert('Registro Borrado');
      </script>
    <?php else : ?>
      <script type="text/javascript">
        alert("Error al Borrar <?php echo $this->db->error ?>");
      </script>
    <?php endif;
  }

  public function Actualizar(){
    $consulta = "UPDATE cursos SET 
    nom = '$this->nom', cod = '$this->cod' WHERE nom = '$this->idaux'";

    if($this->db->query($consulta)) : ?>
      <script type="text/javascript">
        alert('¡Registro Actualizado!');
        window.location.reload(true);
      </script>
    <?php else : ?>
      <script type="text/javascript">
        alert("Error al actualizar <?php echo $this->db->error ?>");
      </script>
    <?php endif;
  }
}

$db = new mysqli (host, usr, pssw, db);
$db->set_charset('utf8');
if($db->connect_errno){
  echo $db->connect_errror;
  exit();
}

$nom = isset($_POST['nom']) ? $_POST['nom'] : '';
$cod = isset($_POST['cod']) ? $_POST['cod'] : '';
$idaux = isset($_POST['idaux']) ? $_POST['idaux'] : '';
$orden = isset($_POST['orden']) ? $_POST['orden'] : '';


$obj = new cursos($nom, $cod, $db, $idaux);

switch ($orden) {
  case 'agregar':
    $obj->Agregar();
    break;
  case 'borrar':
    $obj->Eliminar();
    break;
  case 'editar':
    $obj->Actualizar();
    break;
  default:
    echo "No existe orden a ejecutar";
    break;
}
?>