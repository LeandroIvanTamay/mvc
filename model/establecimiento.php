<?php
include_once('./httpful.phar');
class Establecimiento
{
	private $pdo;

	public $id_estab;
	public $nombre_estab;
	public $num_exterior_estab;
    public $calle_estab;
    public $cruzamiento1_calle_estab;
	public $cruzamiento2_calle_estab;
	public $colonia_estab;
    public $ciudad_estab;
    public $telefono_estab;
    public $correo_estab;
    public $horarios;
    public $descripcion_estab;
    public $id_tipo_cocina;
    public $serv_domicilio;
    public $serv_reserv;
    public $calificacion;
    public $id_tipo_rest;
    public $ubicacion_gps_estab;
    public $foto_estab;
    public $logo_estab;

	public $response;
	public $key;

	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = Database::StartUp();
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Listar()
	{
		try
		{
			$key =  $_SESSION['claveApi'];
			$url = 'http://localhost/webserviceRestaurantes/establecimientos';

			$response = \Httpful\Request::get($url)
			->addHeader('authorization', $key)
			->send();

			return json_decode($response);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($folio)
	{
		try
		{
			$key =  $_SESSION['claveApi'];
			$url = 'http://localhost/webserviceRestaurantes/establecimientos/'.$folio;
			$response = \Httpful\Request::get($url)
			->addHeader('authorization', $key)
			->send();
			return json_decode($response);

		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($folio)
	{
		var_dump($folio);
		try
		{
			$key =  $_SESSION['claveApi'];
			$url = 'http://localhost/webserviceRestaurantes/establecimientos/'.$folio;

			$response = \Httpful\Request::delete($url)
			->addHeader('authorization', $key)
			->send();
			return json_decode($response);

		} catch (Exception $e)
		{
			die($e->getMessage());
		}

	}

	public function Actualizar($data,$folio)
	{
		
		try
		{
			$key =  $_SESSION['claveApi'];
			$url = 'http://localhost/webserviceRestaurantes/establecimientos/'.$folio;

			$response = \Httpful\Request::put($url)
			->addHeader('authorization', $key)
			->body($data)
			->send();

			return json_decode($response);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Registrar($data)
	{
		try
		{
			$key =  $_SESSION['claveApi'];
			$url = 'http://localhost/webserviceRestaurantes/establecimientos';

			$response = \Httpful\Request::post($url)
			->addHeader('authorization', $key)
			->body($data)
			->send();
			return json_decode($response);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}
}
