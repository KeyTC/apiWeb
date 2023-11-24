<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Notas
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($nota,$estado,$idEstudiante)
	{
		$sql="INSERT INTO notas (nota,estado,idEstudiante)
		VALUES ('$nota','$estado','$idEstudiante')";
		return EjecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar($id,$nota,$estado,$idEstudiante)
	{
		$sql="UPDATE notas SET nota='$nota', estado='$estado', idEstudiante='$idEstudiante' WHERE Id='$id'";
		return EjecutarConsulta($sql);
	}

	//Implementamos un método para eliminar registros
	public function eliminar($id)
	{	$sql="DELETE FROM notas WHERE Id='$id'";
		return EjecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro especifico
	public function mostrar($id)
	{
		$sql="SELECT * FROM notas WHERE Id='$id'";
		return EjecutarConsulta($sql);		
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT notas.Id,nota,estado,idEstudiante,estudiantes.Nombre FROM notas INNER JOIN estudiantes ON notas.idEstudiante = estudiantes.Id";
		return EjecutarConsulta($sql);		
	}
}

?>