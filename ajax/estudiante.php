<?php 
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

$jsonData = file_get_contents('php://input');
$data = json_decode($jsonData, true);
require_once "../modelos/Estudiante.php";
$estudiante=new Estudiante();
$op = isset($_GET['op']) ? $_GET['op'] : '';
$id = isset($data['id']) ? $data['id'] : '';
$nombre = isset($data['nombre']) ? $data['nombre'] : '';
$apellidos = isset($data['apellidos']) ? $data['apellidos'] : '';
$cedula = isset($data['cedula']) ? $data['cedula'] : '';
$telefono = isset($data['telefono']) ? $data['telefono'] : '';
switch ($op){
	case 'insertar':
		
			$rspta=$estudiante->insertar($nombre,$apellidos,$cedula,$telefono);
			echo json_encode($rspta ? ["mensaje" => " registrada"] : ["error" => "No se pudo registrar"]);
			break;

		case 'actualizar':
			$rspta=$estudiante->editar($id,$nombre,$apellidos,$cedula,$telefono);
			echo json_encode($rspta ? ["mensaje" => " actualizada"] : ["error" => " no se pudo actualizar"]);
		
			break;

			case 'eliminar':
				$rspta=$estudiante->eliminar($id);
				echo json_encode($rspta ? ["mensaje" => " eliminada"] : ["error" => " no se pudo eliminar"]);
			
				break;
				case 'mostrar':
					$rspta = $estudiante->mostrar($id);
					// Verifica si se obtuvieron resultados
					if ($rspta->num_rows > 0) 
					{
						// Inicializa un array para almacenar los resultados
						$data = array();
				
						// Obtiene cada fila como un array asociativo
						while ($row = $rspta->fetch_assoc()) {
							$data[] = $row;
						}
				
						// Libera la memoria de los resultados
						$rspta->free();
				
					// Devuelve el array de datos en Json
					echo json_encode($data);
					}
					else
					{
						echo json_encode(["mensaje" => "No hay registros"]);
					}
		
					break;

	   case 'listar':
			$rspta = $estudiante->listar();
			// Verifica si se obtuvieron resultados
			if ($rspta->num_rows > 0) 
			{
				// Inicializa un array para almacenar los resultados
				$data = array();
		
				// Obtiene cada fila como un array asociativo
				while ($row = $rspta->fetch_assoc()) {
					$data[] = $row;
				}
		
				// Libera la memoria de los resultados
				$rspta->free();
		
			// Devuelve el array de datos en Json
			echo json_encode($data);
		    }
			else
			{
				echo json_encode(["mensaje" => "No hay registros"]);
			}

			break;
	
		default:
			echo json_encode(["error" => "Operación no válida"]);
			break;
}
?>