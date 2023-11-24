<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Profesor
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($nombre,$apellidos,$cedula,$telefono)
	{
		$sql="INSERT INTO profesor (Nombre,Apellidos,Cedula,Telefono)
		VALUES ('$nombre','$apellidos','$cedula','$telefono')";
		return EjecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar($id,$nombre,$apellidos,$cedula,$telefono)
	{
		$sql="UPDATE profesor SET Id='$id', Nombre='$nombre', Apellidos='$apellidos', Cedula='$cedula', Telefono='$telefono' WHERE Id='$id'";
		return EjecutarConsulta($sql);
	}

	//Implementamos un método para eliminar registros
	public function eliminar($id)
	{	$sql="DELETE FROM profesor WHERE Id='$id'";
		return EjecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro especifico
	public function mostrar($id)
	{
		$sql="SELECT * FROM profesor WHERE Id='$id'";
		return EjecutarConsulta($sql);		
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT * FROM profesor";
		return EjecutarConsulta($sql);		
	}
}

?>