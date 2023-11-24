<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Estudiante
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($nombre,$apellidos,$cedula,$telefono)
	{
		$sql="INSERT INTO estudiantes (Nombre,Apellidos,Cedula,Teléfono)
		VALUES ('$nombre','$apellidos','$cedula','$telefono')";
		return EjecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar($id,$nombre,$apellidos,$cedula,$telefono)
	{
		$sql="UPDATE estudiantes SET Id='$id', Nombre='$nombre', Apellidos='$apellidos', Cedula='$cedula', Teléfono='$telefono' WHERE Id='$id'";
		return EjecutarConsulta($sql);
	}

	//Implementamos un método para eliminar registros
	public function eliminar($id)
	{	$sql="DELETE FROM estudiantes WHERE Id='$id'";
		return EjecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro especifico
	public function mostrar($id)
	{
		$sql="SELECT * FROM estudiantes WHERE Id='$id'";
		return EjecutarConsulta($sql);		
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT * FROM estudiantes";
		return EjecutarConsulta($sql);		
	}
}

?>