 <main>

 <?php  

include ('../html/head.html');
include 'root.php';


if($_POST['buscar']) 
{   
   ?>
   <!-- el resultado de la búsqueda lo encapsularemos en un tabla -->
   <table width="100%" border="0" align="center" cellpadding="1" cellspacing="1">
    <thead>
        <th colspan="11">Resultados de la Busqueda</th>
      </thead>
       <tr>
            <!--creamos los títulos de nuestras dos columnas de nuestra tabla -->
            <td width="100" align="center"><strong>Nombre</strong></td>
            <td width="100" align="center"><strong>Apellidos</strong></td>
            <td width="100" align="center"><strong>Cedula</strong></td>
            <td width="100" align="center"><strong>Estudiante</strong></td>
            <td width="100" align="center"><strong>Estudiante</strong></td>
            <td width="100" align="center"><strong>Estudiante</strong></td>
       </tr> 
       <?php
       //obtenemos la información introducida anteriormente desde nuestro buscador PHP
       $buscar = $_POST["palabra"];
       /* ahora ejecutamos nuestra sentencia SQL, lo que hemos vamos a hacer es usar el 
       comando like para comprobar si existe alguna coincidencia de la cadena insertada 
       en nuestro campo del formulario con nuestros datos almacenados en nuestra base de 
       datos, la cadena insertada en el buscador se almacenará en la variable $buscar */
 
       /* hemos usado también la sentencia or para indicarle que queremos que nos encuentre
       las coincidencias en alguno de los campos de nuestra tabla (apellidos o nombre), 
       si hubiéramos puesto un and solo nos devolvería el resultado del filtro en el 
       caso de cumplirse las dos condiciones */
 
       $consulta_mysql= mysqli_query ($bd, "SELECT * FROM representante WHERE nom like '%$buscar%' or ape like '%$buscar%' or ci like '%$buscar%'");
 
       while($registro = mysqli_fetch_assoc($consulta_mysql)) 
       {
           ?> 
           <tr>
               <!--mostramos el nombre y apellido de las tuplas que han coincidido con la 
               cadena insertada en nuestro formulario-->
               <td class="estilo-tabla" align="center"><?=$registro['nom']?></td>
               <td class=”estilo-tabla” align="center"><?=$registro['ape']?></td>
               <td class=”estilo-tabla” align="center"><?=$registro['ci']?></td>


               <td class=”estilo-tabla” align="center">
                  <a target="_blank" href="hrefe.php?ci=<?php echo $registro['ci'] ?>">
                  <i class="">Ver</i>
                </a>         
                </td>

                <td class=”estilo-tabla” align="center">
        <button id="editr" type="submit" value="<?php echo $registro['ci'] ?>">edit</button>       
      </td>

      <td class=”estilo-tabla” align="center">
        <button id="dtlr" type="submit" value="<?php echo $registro['ci']; ?>">delete</button>
      </td>
           </tr> 

           
           <?php 
       } //fin blucle
    ?>
    </table>
    <?php
} // fin if 
?>

</main>

<div id="here"></div>

<script type="text/javascript">
  
 $(document).on('click', '#dtlr', function(){
      var ci = this.value;
      var conf = confirm('¿Desea borrar este registro?');
      if(conf){
        $.ajax({
          type: 'POST',
          url: '../php/set/repre.php',
          data: {ci: ci, orden: 'delete'},
          dataType: 'html'
        })
        .done(function(html){
        $('#here').html(html);
        });
      }
    });
</script>
