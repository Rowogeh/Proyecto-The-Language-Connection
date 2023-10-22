<?php

	$datostabla = '<div class="contain" style="margin-top: 50px">';
	$datostabla .='<table class="table table-bordered table-striped">'.

						'<thead>
							<th colspan="4" class="text-center">Listado de Respaldos</th>
						</thead>' .

						'<tr class="text-center">
							<td>Nombre</td>
							<td>Descargar</td>
							<td>Eliminar</td>
							<td>Subir</td>
						</tr>'


	;

	if ($gestor = opendir(/*$_SERVER['DOCUMENT_ROOT'].*/'../backup/')){
		
		while (false !== ($archivo = readdir($gestor))){
			if (preg_match("/sql/i", $archivo)){

				$datostabla .= "<tr>";

				$datostabla .= "<td align='center'><i class='fa fa-database'></i>&nbsp;$archivo</td>";

				$datostabla .= "<td>

									<center>

										<a style='text-decoration:none; color:#000;' href='../php/download.php?arch=$archivo'>

											<button class='blue'><i class='fa fa-cloud-download-alt'></i></button>

											<br/>

										</a>

									</center>

								</td>";

				$datostabla .= '<td>

									<center>

										<a style="cursor:pointer; color:#000;" onclick="eliminar(&quot;'.$archivo.'&quot;)">

											<button class="red"><i class="fa fa-trash"></i></button>

											<br />

										</a>

									</center>

								</td>';

				$datostabla .= '<td>

									<center>

										<a style="cursor:pointer; color:#000;" onclick="cargar(&quot;'.$archivo.'&quot;)">


										<button class="violet"><i class="fa fa-upload"></i></button>

										<br />

										</a>

				

									</center>

								</td>';

				$datostabla .= "</tr>";
			}
		}
		closedir($gestor);
	}
	$datostabla .= "</table>";
	$datostabla .= "</div>";
	$response=null;
	$response[0] = array('tabla' => $datostabla);
	
	echo json_encode($response);
?>