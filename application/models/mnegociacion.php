<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mnegociacion extends CI_Model {

	public function getNegociaciones($idcliente)
	{		
		$query = $this->db->query("select a.idnegociacion,
							a.idcliente,
							a.idproyecto,
							a.clientejuridico,
							a.especifiquejuridico,
							a.nombramientojuridico,
							a.idinmueble,
							c.nombre nombreinmueble,
							a.idasesor,
							a.fecha,
							a.precioventa,
							a.reserva,
							a.reciboreserva,
							a.fechareserva,
							a.enganche,
							a.saldoenganche,
							a.financiamientobanco,
							a.nocuotas,
							a.cuotamensual,
							a.comision,
							a.facturabanco,
							a.monedacontrato,
							a.tipocambioneg,
							a.status
							from negociacion a
							join inmueble b on a.[idinmueble] = b.[idinmueble]
							and a.[idproyecto] = b.[idproyecto]
							join tipoinmueble c on c.[idtipoinmueble] = b.[idtipoinmueble]
							where a.idcliente = ".$idcliente);
		return $query->result();
	}

	public function getNegociacionesProyectoCliente($idcliente,$idproyecto)
	{		
		
		$query = $this->db->query("select a.idnegociacion,
							a.idcliente,
							a.idproyecto,
							a.clientejuridico,
							a.especifiquejuridico,
							a.nombramientojuridico,
							a.idinmueble,
							c.nombre nombreinmueble,
							a.idasesor,
							a.fecha,
							a.precioventa,
							a.reserva,
							a.reciboreserva,
							a.fechareserva,
							a.enganche,
							a.saldoenganche,
							a.financiamientobanco,
							a.nocuotas,
							a.cuotamensual,
							a.comision,
							a.facturabanco,
							a.monedacontrato,
							a.tipocambioneg,
							a.status
							from negociacion a
							join inmueble b on a.[idinmueble] = b.[idinmueble]
							and a.[idproyecto] = b.[idproyecto]
							join tipoinmueble c on c.[idtipoinmueble] = b.[idtipoinmueble]
							where a.idcliente = ".$idcliente. " and a.idproyecto = ".$idproyecto);
		return $query->result();
	}

	public function getNegociacionId($idnegociacion)
	{		

		$query = $this->db->query("select a.idnegociacion,
							a.idcliente,
							a.idproyecto,
							a.clientejuridico,
							a.especifiquejuridico,
							a.nombramientojuridico,
							a.idinmueble,
							b.idmodelo,
							b.tamano,
							b.dormitorios,
							c.nombre nombreinmueble,
							c.idtipoinmueble,
							a.idasesor,
							a.fecha,
							a.precioventa,
							a.reserva,
							a.reciboreserva,
							a.fechareserva,
							a.enganche,
							a.saldoenganche,
							a.financiamientobanco,
							a.nocuotas,
							a.cuotamensual,
							a.comision,
							a.facturabanco,
							a.monedacontrato,
							a.tipocambioneg,
							a.status
							from negociacion a
							join inmueble b on a.[idinmueble] = b.[idinmueble]
							and a.[idproyecto] = b.[idproyecto]
							join tipoinmueble c on c.[idtipoinmueble] = b.[idtipoinmueble]
							where a.idnegociacion = ".$idnegociacion);
		return $query->row();
	}

	/*public function getNegociacionId($idnegociacion)
	{		

		$this->db->select("a.idnegociacion,
							a.idcliente,
							a.idproyecto,
							a.idinmueble,
							a.idasesor,
							a.fecha,
							a.precioventa,
							a.reserva,
							a.enganche,
							a.saldoenganche,
							a.nocuotas,
							a.cuotamensual,
							a.status");
		$this->db->from("negociacion a");
		$this->db->where('a.idnegociacion',$idnegociacion);
		$query=$this->db->get();
		return $query->row();
	}*/

	public function getMaxNegociacion()
	{		
		$query = $this->db->query("select max(idnegociacion) maximo
									from negociacion;");
		return $query->row();
	}

	public function grabar($data,&$err)
	{
		$this->db->insert("negociacion",$data);	
		$data['error'] = $this->db->_error_message();
		$err=$data['error'];
		if ($err=="")
		{
			return true;
		} 
		else
		{
			return false;
		}
	}

    public function modificar($idnegociacion,$data,&$err)
	{
		$this->db->where('idnegociacion', $idnegociacion);
		$this->db->update("negociacion",$data);
		$data['error'] = $this->db->_error_message();
		$err=$data['error'];
		if ($err=="")
		{
			return true;
		} 
		else
		{
			return false;
		}	
	}

	public function borrar($idnegociacion,&$err)
	{
		$data = array(
               'status' => 'RS'
        );

		$this->db->where('idnegociacion', $idnegociacion);
		$this->db->update("negociacion",$data);
		$data['error'] = $this->db->_error_message();
		$err=$data['error'];
		if ($err=="")
		{
			return true;
		} 
		else
		{
			return false;
		}
	}


	//erick
	public function getNegociacionesProyectoClienteNoRS($idcliente,$idproyecto)
	{		
		
		$query = $this->db->query("select a.idnegociacion,
							a.idcliente,
							a.idproyecto,
							a.clientejuridico,
							a.especifiquejuridico,
							a.nombramientojuridico,
							a.idinmueble,
							c.nombre nombreinmueble,
							a.idasesor,
							a.fecha,
							a.precioventa,
							a.reserva,
							a.enganche,
							a.saldoenganche,
							a.financiamientobanco,
							a.nocuotas,
							a.cuotamensual,
							a.comision,
							a.facturabanco,
							a.monedacontrato,
							a.tipocambioneg,
							a.status
							from negociacion a
							join inmueble b on a.[idinmueble] = b.[idinmueble]
							and a.[idproyecto] = b.[idproyecto]
							join tipoinmueble c on c.[idtipoinmueble] = b.[idtipoinmueble]
							where a.idcliente = ".$idcliente. " and a.idproyecto = ".$idproyecto." 
		                    and a.status<>'RS'");
		return $query->result();
	}

	//erick otros dueños 08/05/2016
	public function grabarOtrosDuenos($data,&$err)
	{
		$this->db->insert("compradores",$data);	
		$data['error'] = $this->db->_error_message();
		$err=$data['error'];
		if ($err=="")
		{
			return true;
		} 
		else
		{
			return false;
		}
	}

	public function getCompradores($idnegociacion)
	{		
		$query = $this->db->query("select a.idnegociacion,a.idcliente,b.nombre,b.apellido
									from compradores a, cliente b
									where a.idcliente=b.idcliente
									and idnegociacion=$idnegociacion
									");
		return $query->result();
	}


	public function borrarComprador($data,&$err)
	{
		

		$txtQuery="PRAGMA foreign_keys = ON";
        $query= $this->db->query($txtQuery);

		$this->db->delete('compradores',$data);	
		$data['error'] = $this->db->_error_message();
		$err=$data['error'];
		if ($err=="" or $err=="database schema has changed")
		{
			//echo "si se borro";
		    //exit;
			$err="";
			return true;
		} 
		else
		{
			//echo "no se pudo borrar";
			//exit;
			$err=" posiblemente ese registro ya esta siendo usado";
			return false;
		}
	}

    
}