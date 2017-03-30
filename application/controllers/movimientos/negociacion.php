<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class negociacion extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		if(!$this->session->userdata('logged_in'))
		{
			redirect('sesion');
		}
		else
		{
			$this->view_data['usuario']= $this->session->userdata('user_id');
		}

	}

	public function listado($idcliente=-1)
	{
		$this->view_data['page_title']=  'Negociaciones';
		$this->view_data['activo']=  'clientes';
		$this->view_data['idcliente']= $idcliente;
		$this->load_partials();
		$this->load->view('movimientos/negociaciones/listado',$this->view_data);
	}
    
    public function nuevo($idcliente=-1)
    {
    	$method = $this->input->server('REQUEST_METHOD');
    	$this->view_data['page_title']=  'Creación de negociación';
    	$this->view_data['activo']=  'clientes';
    	$this->view_data['idcliente']= $idcliente;
		$this->load_partials();
		switch ($method) 
		{
			case 'GET':
				$datosnegociacion = new stdClass();
				$this->view_data['datosnegociacion']=$datosnegociacion;

				$datosnegociacion->idproyecto=$this->input->post('proyectos');
				$datosnegociacion->idcliente=$this->input->post('cliente');

				$datosnegociacion->clientejuridico=$this->input->post('clientejuridico');
				$datosnegociacion->especifiquejuridico=$this->input->post('especifiquejuridico');
				$datosnegociacion->nombramientojuridico=$this->input->post('nombramientojuridico');

				$datosnegociacion->idinmueble=$this->input->post('inmueble');
				$datosnegociacion->idasesor=$this->input->post('asesor');
				$datosnegociacion->idtipoinmueble=$this->input->post('tiposinmueble');
				$datosnegociacion->idmodelo=$this->input->post('modelo');

				$datosnegociacion->tamano=$this->input->post('tamano');
				$datosnegociacion->dormitorios=$this->input->post('dormitorios');
				
				$datosnegociacion->precioventa=$this->input->post('precioventa');
				$datosnegociacion->reserva=$this->input->post('reserva');
				$datosnegociacion->reciboreserva=$this->input->post('reciboreserva');
				$datosnegociacion->fechareserva=$this->input->post('fechareserva');
				$datosnegociacion->enganche=$this->input->post('enganche');
				$datosnegociacion->saldoenganche=$this->input->post('saldoenganche');
				$datosnegociacion->saldoenganche=$this->input->post('financiamientobanco');
				$datosnegociacion->nocuotas=$this->input->post('nocuotas');
				$datosnegociacion->cuotamensual=$this->input->post('cuotamensual');			
				$datosnegociacion->comision=$this->input->post('comision');		
				$datosnegociacion->banco=$this->input->post('banco');		

				$datosnegociacion->monedacontrato=$this->input->post('monedacontrato');
				$datosnegociacion->tipocambioneg=$this->input->post('tipocambioneg');

				$datosnegociacion->tablai=str_replace(array("\""), "'", $this->input->post('tablainmuebles'));
				$datosnegociacion->tablaotros=str_replace(array("\""), "'", $this->input->post('tablaotros'));
				$datosnegociacion->total_tablai=$this->input->post('txtTotalDecimal');


				$datosnegociacion->otrosclientes=$this->input->post('otrosclientes');
				$this->load->view('movimientos/negociaciones/nuevo',$this->view_data);	
				break;
			case 'POST':  //aqui entra cuando le clic al boton
				//echo json_decode($this->input->post('test'));
				//exit();
				// falta validaciones para combos
				$this->form_validation->set_rules('proyectos','Proyectos');

			
				/*$this->input->post('especifiquejuridico');
				$this->input->post('nombramientojuridico');*/
				if($this->input->post('clientejuridico')=="2")
				{
					$this->form_validation->set_rules('especifiquejuridico','Especifíque','required');
					$this->form_validation->set_rules('nombramientojuridico','Nombramiento','required');
				}
				
				if($this->input->post('monedacontrato')=="2")
				{
					$this->form_validation->set_rules('tipocambioneg','Tipo de cambio','required|numeric');
				}
				
				$this->form_validation->set_rules('precioventa','Precio Venta','required|numeric');
				$this->form_validation->set_rules('reserva','Reserva','required|numeric');
				$this->form_validation->set_rules('enganche','Enganche','required|numeric');
				$this->form_validation->set_rules('saldoenganche','Saldo enganche','required|numeric');
				$this->form_validation->set_rules('nocuotas','No. Cuotas','required|integer');
				$this->form_validation->set_rules('cuotamensual','Cuota mensual','required|numeric');
				$this->form_validation->set_rules('fechaprimerpago','Fecha primer pago','required');
				//Falta validacion para asesor
				$this->form_validation->set_rules('comision','Comision','required|numeric');
				$this->form_validation->set_rules('banco','Banco');
				
				if($this->form_validation->run()==FALSE)
				{
					$datosnegociacion = new stdClass();	

					$datosnegociacion->idproyecto=$this->input->post('proyectos');
					$datosnegociacion->idcliente=$this->input->post('cliente');

					$datosnegociacion->clientejuridico=$this->input->post('clientejuridico');
					$datosnegociacion->especifiquejuridico=$this->input->post('especifiquejuridico');
					$datosnegociacion->nombramientojuridico=$this->input->post('nombramientojuridico');


					$datosnegociacion->idinmueble=$this->input->post('inmueble');
					$datosnegociacion->idasesor=$this->input->post('asesor');
					$datosnegociacion->idtipoinmueble=$this->input->post('tiposinmueble');
					$datosnegociacion->idmodelo=$this->input->post('modelo');

					$datosnegociacion->tamano=$this->input->post('tamano');
					$datosnegociacion->dormitorios=$this->input->post('dormitorios');

					$datosnegociacion->fechaprimerpago=$this->input->post('fechaprimerpago');
					$datosnegociacion->precioventa=$this->input->post('precioventa');
					$datosnegociacion->reserva=$this->input->post('reserva');
					$datosnegociacion->reciboreserva=$this->input->post('reciboreserva');
					$datosnegociacion->fechareserva=$this->input->post('fechareserva');
					$datosnegociacion->enganche=$this->input->post('enganche');
					$datosnegociacion->saldoenganche=$this->input->post('saldoenganche');
					$datosnegociacion->saldoenganche=$this->input->post('financiamientobanco');
					$datosnegociacion->nocuotas=$this->input->post('nocuotas');
					$datosnegociacion->cuotamensual=$this->input->post('cuotamensual');
					$datosnegociacion->comision=$this->input->post('comision');		
					$datosnegociacion->banco=$this->input->post('banco');

					$datosnegociacion->monedacontrato=$this->input->post('monedacontrato');
      				$datosnegociacion->tipocambioneg=$this->input->post('tipocambioneg');



										
					$datosnegociacion->tablai=str_replace(array("\""), "'", $this->input->post('tablainmuebles'));
					$datosnegociacion->tablaotros=str_replace(array("\""), "'", $this->input->post('tablaotros'));
					$datosnegociacion->total_tablai=$this->input->post('txtTotalDecimal');

					$datosnegociacion->otrosclientes=$this->input->post('otrosclientes');

					$this->view_data['datosnegociacion']=$datosnegociacion;					
					$this->load->view('movimientos/negociaciones/nuevo',$this->view_data);
				}
				else 	// SI la validacion fue correcta
				{					
					$datosnegociacion = new stdClass();	

					$datosnegociacion->idproyecto=$this->input->post('proyectos');
					$datosnegociacion->idcliente=$this->input->post('cliente');
					$datosnegociacion->clientejuridico=$this->input->post('clientejuridico');
					$datosnegociacion->especifiquejuridico=$this->input->post('especifiquejuridico');
					$datosnegociacion->nombramientojuridico=$this->input->post('nombramientojuridico');

					$datosnegociacion->idinmueble=$this->input->post('inmueble');
					$datosnegociacion->idasesor=$this->input->post('asesor');
					$datosnegociacion->idtipoinmueble=$this->input->post('tiposinmueble');
					$datosnegociacion->idmodelo=$this->input->post('modelo');

					$datosnegociacion->tamano=$this->input->post('tamano');
					$datosnegociacion->dormitorios=$this->input->post('dormitorios');

					$datosnegociacion->fechaprimerpago=$this->input->post('fechaprimerpago');
					$datosnegociacion->precioventa=$this->input->post('precioventa');
					$datosnegociacion->reserva=$this->input->post('reserva');
					$datosnegociacion->reciboreserva=$this->input->post('reciboreserva');
					$datosnegociacion->fechareserva=$this->input->post('fechareserva');
					$datosnegociacion->enganche=$this->input->post('enganche');
					$datosnegociacion->saldoenganche=$this->input->post('saldoenganche');
					$datosnegociacion->saldoenganche=$this->input->post('financiamientobanco');
					$datosnegociacion->nocuotas=$this->input->post('nocuotas');
					$datosnegociacion->cuotamensual=$this->input->post('cuotamensual');
					$datosnegociacion->comision=$this->input->post('comision');		
					$datosnegociacion->banco=$this->input->post('banco');
					
					$datosnegociacion->monedacontrato=$this->input->post('monedacontrato');
					$datosnegociacion->tipocambioneg=$this->input->post('tipocambioneg');


					$datosnegociacion->tablai=str_replace(array("\""), "'", $this->input->post('tablainmuebles'));
					$datosnegociacion->tablaotros=str_replace(array("\""), "'", $this->input->post('tablaotros'));
					$datosnegociacion->total_tablai=$this->input->post('txtTotalDecimal');

					$datosnegociacion->otrosclientes=$this->input->post('otrosclientes');

					$this->view_data['datosnegociacion']=$datosnegociacion;				

					$err="";
					if($this->input->post('enganche') > $this->input->post('precioventa') || $this->input->post('reserva') > $this->input->post('precioventa'))	
					{
						$err = "El monto del enganche o reserva no puede ser mayor al precio de venta";
					}

					if($this->input->post('reserva') > $this->input->post('enganche'))	
					{
						$err = "El monto de reserva no puede ser mayor al monto de enganche";
					}

					if($err=="")
					{
						// Inserta la negociacion
						$this->load->model('mnegociacion');
						$inserto=$this->mnegociacion->grabar(array(
							   'idproyecto'=>$this->input->post('proyectos'),
							   'idcliente'=>$this->input->post('cliente'),
							   'clientejuridico'=>$this->input->post('clientejuridico'),
							   'especifiquejuridico'=>$this->input->post('especifiquejuridico'),
							   'nombramientojuridico'=>$this->input->post('nombramientojuridico'),
							   'idinmueble'=>$this->input->post('inmueble'),
							   'idasesor'=>$this->input->post('asesor'),
							   'fecha'=>date('Y-m-d',strtotime($this->input->post('fechaprimerpago'))),
							   'precioventa'=>$this->input->post('precioventa'),
							   'reserva'=>$this->input->post('reserva'),
							   'reciboreserva'=>$this->input->post('reciboreserva'),
							   'fechareserva'=>$this->input->post('fechareserva'),
							   'enganche'=>$this->input->post('enganche'),
							   'saldoenganche'=>$this->input->post('saldoenganche'),
							   'financiamientobanco' =>$this->input->post('financiamientobanco'),
							   'nocuotas'=>$this->input->post('nocuotas'),
							   'cuotamensual'=>$this->input->post('cuotamensual'),
							   'comision'=>$this->input->post('comision'),
							   'facturabanco' =>$this->input->post('banco'),
							   'monedacontrato'=>$this->input->post('monedacontrato'),
							   'tipocambioneg'=>$this->input->post('tipocambioneg'),
							   'status'=>'AC',
							   //Auditoria
							   'CreadoPor'=>$this->session->userdata('user_id'),
							   'FechaCreado'=>date("Y-m-d H:i:s"),
							   'ModificadoPor'=>$this->session->userdata('user_id'),
							   'FechaModificado'=>date("Y-m-d H:i:s")
							   ),$err);
	              		if($inserto)
						{
							// Inserta las cuotas
							$this->load->model('mnegociacion');
							$datosnegociacionMax = $this->mnegociacion->getMaxNegociacion();
							$fecha = strtotime($this->input->post('fechaprimerpago'));
							//Inserta detalle de pago
							for($x=1;$x<=$this->input->post('nocuotas');$x++)
							{
								$this->load->model('mdetallepago');
								$inserto2=$this->mdetallepago->grabar(array(
									   'idnegociacion'=>$datosnegociacionMax->maximo,
									   'nopago'=>$x,
									   'fechalimitepago'=>date('Y-m-d',$fecha),
									   'pagocalculado'=>$this->input->post('cuotamensual'),
									   'pagoefectuado'=>0,
									   'moracalculada'=>0,
									   'morapagada'=>0,
									   //Auditoria
									   'CreadoPor'=>$this->session->userdata('user_id'),
									   'FechaCreado'=>date("Y-m-d H:i:s"),
									   'ModificadoPor'=>$this->session->userdata('user_id'),
									   'FechaModificado'=>date("Y-m-d H:i:s")
									   ),$err);

								$fecha = strtotime('+1 month',$fecha);
							}

							$arreglo = json_decode($this->input->post('tablainmuebles'));
							//$arreglo = $_POST['arreglo'];
					    	$this->load->model('mdetallenegociacion');
							$inserto=$this->mdetallenegociacion->grabar($arreglo,$datosnegociacionMax->maximo,$err);
							//echo $arreglo;
							//exit();

							redirect('movimientos/negociacion/listado/'.$this->input->post('cliente'));
						}
						else
	                    {
	                    	$this->view_data['mensaje']="Error: No se pudo insertar el registro: ".$err;
	                    	$this->view_data['tipoAlerta']="alert-danger";
	                    	$this->load->view('movimientos/negociaciones/nuevo',$this->view_data);
	                    }
	                }
                	else
                	{
                			$this->view_data['mensaje']="Error: No se pudo actualizar el registro ".$err;
	                    	$this->view_data['tipoAlerta']="alert-danger";
	                    	$this->load->view('movimientos/negociaciones/nuevo',$this->view_data);
                	}
				}
				break;
			default:
				die("Invalid Method");
				break;
		}
    }

	public function edit($idnegociacion=-1)
    {
    	$method = $this->input->server('REQUEST_METHOD');
    	$this->view_data['page_title']=  'Modificación de negociación';
    	$this->view_data['activo']=  'clientes';
		$this->load_partials();
		switch ($method) 
		{
			case 'GET':
				$this->load->model('mnegociacion');
				$datosnegociacion = $this->mnegociacion->getNegociacionId($idnegociacion);

				$datosnegociacion->tablai="";
				$datosnegociacion->tablaotros="";
			    $datosnegociacion->total_tablai=$datosnegociacion->precioventa;
        		$this->view_data['datosnegociacion']=$datosnegociacion;
				$this->load->view('movimientos/negociaciones/edit',$this->view_data);
				break;
			case 'POST':
				// falta validaciones para combos
				$this->form_validation->set_rules('proyectos','Proyectos');

				if($this->input->post('clientejuridico')=="2")
				{
					$this->form_validation->set_rules('especifiquejuridico','Especifíque','required');
					$this->form_validation->set_rules('nombramientojuridico','Nombramiento','required');
				}

				if($this->input->post('monedacontrato')=="2")
				{
					$this->form_validation->set_rules('tipocambioneg','Tipo de cambio','required|numeric');
				}

				$this->form_validation->set_rules('precioventa','Precio Venta','required|numeric');
				$this->form_validation->set_rules('reserva','Reserva','required|numeric');
				$this->form_validation->set_rules('enganche','Enganche','required|numeric');
				$this->form_validation->set_rules('saldoenganche','Saldo enganche','required|numeric');
				$this->form_validation->set_rules('nocuotas','No. Cuotas','required|integer');
				$this->form_validation->set_rules('cuotamensual','Cuota mensual','required|numeric');
				$this->form_validation->set_rules('fechaprimerpago','Fecha primer pago','required');
				//Falta validacion para asesor
				$this->form_validation->set_rules('comision','Comision','required|numeric');
				$this->form_validation->set_rules('banco','Banco');
				if($this->form_validation->run()==FALSE)
				{
					$datosnegociacion = new stdClass();					
					$datosnegociacion->idnegociacion=$this->input->post('idnegociacion');
					$datosnegociacion->idproyecto=$this->input->post('proyectos');

					$datosnegociacion->clientejuridico=$this->input->post('clientejuridico');
					$datosnegociacion->especifiquejuridico=$this->input->post('especifiquejuridico');
					$datosnegociacion->nombramientojuridico=$this->input->post('nombramientojuridico');

					$datosnegociacion->idcliente=$this->input->post('cliente');
					$datosnegociacion->idinmueble=$this->input->post('inmueble');
					$datosnegociacion->idasesor=$this->input->post('asesor');
					$datosnegociacion->idtipoinmueble=$this->input->post('tiposinmueble');
					$datosnegociacion->idmodelo=$this->input->post('modelo');

					$datosnegociacion->tamano=$this->input->post('tamano');
					$datosnegociacion->dormitorios=$this->input->post('dormitorios');

					$datosnegociacion->fecha=$this->input->post('fechaprimerpago');
					$datosnegociacion->precioventa=$this->input->post('precioventa');
					$datosnegociacion->reserva=$this->input->post('reserva');
					$datosnegociacion->reciboreserva=$this->input->post('reciboreserva');
					$datosnegociacion->fechareserva=$this->input->post('fechareserva');
					$datosnegociacion->enganche=$this->input->post('enganche');
					$datosnegociacion->saldoenganche=$this->input->post('saldoenganche');
					$datosnegociacion->financiamientobanco=$this->input->post('financiamientobanco');
					$datosnegociacion->nocuotas=$this->input->post('nocuotas');
					$datosnegociacion->cuotamensual=$this->input->post('cuotamensual');
					$datosnegociacion->comision=$this->input->post('comision');
					$datosnegociacion->facturabanco=$this->input->post('banco');
					$datosnegociacion->monedacontrato=$this->input->post('monedacontrato');
					$datosnegociacion->tipocambioneg=$this->input->post('tipocambioneg');

					$datosnegociacion->status=$this->input->post('status');

					$datosnegociacion->tablai=str_replace(array("\""), "'", $this->input->post('tablainmuebles'));
					$datosnegociacion->tablaotros=str_replace(array("\""), "'", $this->input->post('tablaotros'));
					//$atosnegociacion->total_tablai=$this->input->post('txtTotalDecimal');

					$this->view_data['datosnegociacion']=$datosnegociacion;
					$this->load->view('movimientos/negociaciones/edit',$this->view_data);
				}
				else
				{
					$datosnegociacion = new stdClass();		
                    $datosnegociacion->idnegociacion=$this->input->post('idnegociacion');			
					$datosnegociacion->idproyecto=$this->input->post('proyectos');
					$datosnegociacion->idcliente=$this->input->post('cliente');

					$datosnegociacion->clientejuridico=$this->input->post('clientejuridico');
					$datosnegociacion->especifiquejuridico=$this->input->post('especifiquejuridico');
					$datosnegociacion->nombramientojuridico=$this->input->post('nombramientojuridico');

					$datosnegociacion->idinmueble=$this->input->post('inmueble');
					$datosnegociacion->idasesor=$this->input->post('asesor');
					$datosnegociacion->idtipoinmueble=$this->input->post('tiposinmueble');
					$datosnegociacion->idmodelo=$this->input->post('modelo');

					$datosnegociacion->tamano=$this->input->post('tamano');
					$datosnegociacion->dormitorios=$this->input->post('dormitorios');

					$datosnegociacion->fecha=$this->input->post('fechaprimerpago');
					$datosnegociacion->precioventa=$this->input->post('precioventa');
					$datosnegociacion->reserva=$this->input->post('reserva');
					$datosnegociacion->reciboreserva=$this->input->post('reciboreserva');
					$datosnegociacion->fechareserva=$this->input->post('fechareserva');
					$datosnegociacion->enganche=$this->input->post('enganche');
					$datosnegociacion->saldoenganche=$this->input->post('saldoenganche');
					$datosnegociacion->financiamientobanco=$this->input->post('financiamientobanco');
					$datosnegociacion->nocuotas=$this->input->post('nocuotas');
					$datosnegociacion->cuotamensual=$this->input->post('cuotamensual');
					$datosnegociacion->comision=$this->input->post('comision');
					$datosnegociacion->facturabanco=$this->input->post('banco');

					$datosnegociacion->monedacontrato=$this->input->post('monedacontrato');
					$datosnegociacion->tipocambioneg=$this->input->post('tipocambioneg');

					$datosnegociacion->status=$this->input->post('status');

					$datosnegociacion->tablai=str_replace(array("\""), "'", $this->input->post('tablainmuebles'));
					$datosnegociacion->tablaotros=str_replace(array("\""), "'", $this->input->post('tablaotros'));
					//$datosnegociacion->total_tablai=$this->input->post('txtTotalDecimal');

					$this->view_data['datosnegociacion']=$datosnegociacion;

					$this->load->model('mdetallepago');
					$datosdetallepago = $this->mdetallepago->getCantidadPagosEfectuados($this->input->post('idnegociacion'));
					$pagosefectuados = $datosdetallepago->pagosefectuados;

					$err="";
					if($this->input->post('nocuotas') < $pagosefectuados)	
					{
						$err = "El número de cuotas no puede ser menor a la cantidad de pagos efectuados";
					}

					if($this->input->post('enganche') > $this->input->post('precioventa') || $this->input->post('reserva') > $this->input->post('precioventa'))	
					{
						$err = "El monto del enganche o reserva no puede ser mayor al precio de venta";
					}

					if($this->input->post('reserva') > $this->input->post('enganche'))	
					{
						$err = "El monto de reserva no puede ser mayor al monto de enganche";
					}

					if($err=="")
					{
						$this->load->model('mnegociacion');
						$err="";
						$siactualizo=$this->mnegociacion->modificar($this->input->post('idnegociacion'),
							    array(
							    	'clientejuridico'=>$this->input->post('clientejuridico'),
							   		'especifiquejuridico'=>$this->input->post('especifiquejuridico'),
							   		'nombramientojuridico'=>$this->input->post('nombramientojuridico'),
							    	'idasesor'=>$this->input->post('asesor'),
								   'fecha'=>date('Y-m-d',strtotime($this->input->post('fechaprimerpago'))),
								   'precioventa'=>$this->input->post('precioventa'),
								   'reserva'=>$this->input->post('reserva'),
								   'reciboreserva'=>$this->input->post('reciboreserva'),
							   	   'fechareserva'=>$this->input->post('fechareserva'),
								   'enganche'=>$this->input->post('enganche'),
								   'saldoenganche'=>$this->input->post('saldoenganche'),
								   'financiamientobanco' =>$this->input->post('financiamientobanco'),
								   'nocuotas'=>$this->input->post('nocuotas'),
								   'cuotamensual'=>$this->input->post('cuotamensual'),
								   'comision'=>$this->input->post('comision'),
								   'facturabanco'=>$this->input->post('banco'),
								   'monedacontrato'=>$this->input->post('monedacontrato'),
								   'tipocambioneg'=>$this->input->post('tipocambioneg'),
								   // Auditoria
								   'ModificadoPor'=>$this->session->userdata('user_id'),
								   'FechaModificado'=>date("Y-m-d H:i:s")
							        ),$err);
	                    
	                    
	                    if ($siactualizo)
	                    {
	                    	// 09-03-2015, Actualiza los inmuebles de la negociacion
	                    	$arreglo = json_decode($this->input->post('tablainmuebles'));
							//$arreglo = $_POST['arreglo'];							
					    	$this->load->model('mdetallenegociacion');
					    	$sielimino=$this->mdetallenegociacion->borrar($this->input->post('idnegociacion'),$err);
					    	if($sielimino)
								$inserto=$this->mdetallenegociacion->grabar($arreglo,$this->input->post('idnegociacion'),$err);

	                    	// Si el numero de cuotas es mayor a los pagos efectuados
	                    	/*if($this->input->post('nocuotas') > $pagosefectuados)
	                    	{
	                    		//$fecha = $this->input->post('fechaprimerpago');
	                    		//print_r($fecha);
	                    		//exit;

	                    		if($pagosefectuados == 0){
	                    			$fecha = strtotime($this->input->post('fechaprimerpago'));
	                    		}
	                    		else{
	                    			$fecha = strtotime($this->input->post('fechaprimerpago'));
	                    			for ($y=1; $y <= $pagosefectuados; $y++) { 
	                    				$fecha = strtotime('+1 month',$fecha);
	                    			}
	                    			$fecha = strtotime('+1 month',$fecha);
	                    		}
								//$datosdetallepago = $this->mdetallepago->getSaldo($this->input->post('idnegociacion'));
								$datosdetallepago = $this->mdetallepago->getMontoCalculadoPagado($this->input->post('idnegociacion'));
								$saldo = $this->input->post('saldoenganche') - $datosdetallepago->pagado;

								$nuevacuotamensual = $saldo / ($this->input->post('nocuotas') - $pagosefectuados);

								$this->mdetallepago->borrar($this->input->post('idnegociacion'),$pagosefectuados+1,$err);
								$montoacumulado = 0;
								
								for($x=$pagosefectuados+1;$x<=$this->input->post('nocuotas');$x++)
								{

									if($x == $this->input->post('nocuotas')){
										$nuevacuotamensual = $saldo - $montoacumulado;
									}
									else{
										$montoacumulado += round($nuevacuotamensual,2);
									}

									$this->load->model('mdetallepago');
									$inserto2=$this->mdetallepago->grabar(array(
										   'idnegociacion'=>$this->input->post('idnegociacion'),
										   'nopago'=>$x,
										   'fechalimitepago'=>date('Y-m-d',$fecha),
										   'pagocalculado'=>round($nuevacuotamensual,2),
										   'pagoefectuado'=>0,
										   'moracalculada'=>0,
										   'morapagada'=>0,
										   //Auditoria
										   'CreadoPor'=>$this->session->userdata('user_id'),
										   'FechaCreado'=>date("Y-m-d H:i:s"),
										   'ModificadoPor'=>$this->session->userdata('user_id'),
										   'FechaModificado'=>date("Y-m-d H:i:s")
										   ),$err);

									$fecha = strtotime('+1 month',$fecha);
								}
							}*/
	                    	redirect('movimientos/negociacion/listado/'.$this->input->post('cliente'));
	                    }
	                    else
	                    {
	                    	$this->view_data['mensaje']="Error: No se pudo actualizar el registro ".$err;
	                    	$this->view_data['tipoAlerta']="alert-danger";
	                    	$this->load->view('movimientos/negociaciones/edit',$this->view_data);
	                    }
                	}
                	else
                	{
                			$this->view_data['mensaje']="Error: No se pudo actualizar el registro ".$err;
	                    	$this->view_data['tipoAlerta']="alert-danger";
	                    	$this->load->view('movimientos/negociaciones/edit',$this->view_data);
                	}
				}
				break;
			default:
				die("Invalid Method");
				break;
		}
    }

    public function pago($idnegociacion=-1)
    {
    	$method = $this->input->server('REQUEST_METHOD');
    	$this->view_data['page_title']=  'Realizar pago';
    	$this->view_data['activo']=  'clientes';
		$this->load_partials();
		$this->load->model('mnegociacion');
		$datosnegociacion = $this->mnegociacion->getNegociacionId($idnegociacion);
		$this->view_data['datosnegociacion']=$datosnegociacion;
		$this->load->view('movimientos/negociaciones/pago',$this->view_data);
    }


	public function borrar($idnegociacion=-1)
 	{
 		$this->load->model('mnegociacion');
		$sielimino=$this->mnegociacion->borrar($idnegociacion,$err);
        

		if ($sielimino)
        {
        	$this->load->model('mnegociacion');
			$datosnegociacion = $this->mnegociacion->getNegociacionId($idnegociacion);
        	redirect('movimientos/negociacion/listado/'.$datosnegociacion->idcliente);
        }
        else
        {
        	$this->view_data['page_title']=  'Negociaciones';
    		$this->view_data['activo']= 'clientes';
			$this->load_partials();
        	$this->view_data['mensaje']="Error: No se pudo eliminar el registro: ".$err;
            $this->view_data['tipoAlerta']="alert-danger";
            $this->load->view('movimientos/clientes/listado',$this->view_data);
        }
	}
	
	//public function index($page=1)
	public function getNegociacion($idcliente=-1)
	{
		$this->load->model('mnegociacion');
		$negociacion = $this->mnegociacion->getNegociaciones($idcliente);	
		$this->output->set_content_type('application/json');
		$this->output->set_output(json_encode($negociacion));
	}

	
	public function getDetNegociacion($idnegociacion=-1)
	{
		$this->load->model('mdetallenegociacion');
		$negociacion = $this->mdetallenegociacion->getDetalleNegociacion($idnegociacion);	
		$this->output->set_content_type('application/json');
		$this->output->set_output(json_encode($negociacion));
	}

	public function getNegociacionProyectoCliente()
	{
		$idcliente = $_POST['idcliente'];
    	
        if(isset($_POST['idproyecto']))
        {
        	$idproyecto=$_POST['idproyecto'];	
        }
        else
        {
        	$idproyecto=0;
        }

		$this->load->model('mnegociacion');
		$negociacion = $this->mnegociacion->getNegociacionesProyectoCliente($idcliente,$idproyecto);	
		//echo json_encode($negociacion);
		$this->output->set_content_type('application/json');
		$this->output->set_output(json_encode($negociacion));
	}

	public function getMaxNegociacion()
	{
		$this->load->model('mnegociacion');
		$negociacion = $this->mnegociacion->getMaxNegociaciones();	
		$this->output->set_content_type('application/json');
		$this->output->set_output(json_encode($negociacion));
	}

	public function getDetallePago($idnegociacion=-1)
	{
		$this->load->model('mdetallepago');
		$negociacion = $this->mdetallepago->getDetallePago($idnegociacion);	
		$this->output->set_content_type('application/json');
		$this->output->set_output(json_encode($negociacion));
	}

	public function grabarNuevoPago()
    {	

    	$montoTotal = $_POST['monto'];
    	$idnegociacion=$_POST['idnegociacion'];
        $arreglo = $_POST['arreglo'];

        $this->load->model('mdetallepago');
        $datosdetallepago = $this->mdetallepago->getSaldo($idnegociacion);
        $saldo = $datosdetallepago->saldo;

        if($montoTotal <= $saldo) // si el monto a pagar no sobrepasa al saldo
        {
        	// Inserta el pago
		    $this->load->model('mpago');
			$inserto=$this->mpago->grabar($arreglo,$err);
	        if($inserto)
			{
				// si inserta bien el pago, actualiza las cuotas pagadas
				$this->load->model('mdetallepago');
				$datosdetallepago = $this->mdetallepago->getDetallePago($idnegociacion);

				// Recorre las cuotas
				foreach ($datosdetallepago as $detPago) {
					$moraporpagar = 0;
					$pagoporpagar = 0;

					// Si no sea a pagado completamente la cuota o tiene mora pendiente
					if($detPago->pagocalculado != $detPago->pagoefectuado || $detPago->moracalculada != $detPago->morapagada)
					{
						// Si tiene mora pendiente
						if ($detPago->moracalculada != $detPago->morapagada) {
							// Si el abono cubre el total de la mora, se paga el total de la mora, sino solo el monto del abono
							$moraporpagar = ($detPago->moracalculada - $detPago->morapagada > $montoTotal ? $montoTotal : $detPago->moracalculada - $detPago->morapagada) ;

							if($moraporpagar > 0){
								$err="";
								$siactualizo=$this->mdetallepago->modificar($idnegociacion,$detPago->nopago,
									    array(
										   'morapagada'=>round($moraporpagar + $detPago->morapagada,2),
										   // Auditoria
										   'ModificadoPor'=>$this->session->userdata('user_id'),
										   'FechaModificado'=>date("Y-m-d H:i:s")
									        ),$err);
								if ($siactualizo) {
									$montoTotal = round($montoTotal - $moraporpagar,2);
								}
							}
						}
						// Si la cuota pendiente
						if ($detPago->pagocalculado != $detPago->pagoefectuado) {
							// Si el abono cubre el total de la cuota, se paga el total de la cuota, sino solo el monto del abono
							$pagoporpagar = ($detPago->pagocalculado - $detPago->pagoefectuado > $montoTotal ? $montoTotal : $detPago->pagocalculado - $detPago->pagoefectuado);

							if($pagoporpagar > 0){
								$err="";
								$siactualizo=$this->mdetallepago->modificar($idnegociacion,$detPago->nopago,
									    array(
										   'pagoefectuado'=>round($pagoporpagar + $detPago->pagoefectuado,2),
										   // Auditoria
										   'ModificadoPor'=>$this->session->userdata('user_id'),
										   'FechaModificado'=>date("Y-m-d H:i:s")
									        ),$err);
								if ($siactualizo) {
									$montoTotal = round($montoTotal - $pagoporpagar,2);
								}
							}
						}
					}
				}

				echo "";
				//redirect('catalogos/producto/listado');
			}
			else
	        {
	            echo "Error al actualizar el pago";	
	        }
    	}
    	else
    	{
    		echo "El monto a pagar es mayor al saldo de la negociación";
    	}
	}


	//erick
	public function getNegociacionesProyectoClienteNoRS($idproyecto=-1,$idcliente=-1)
	{
		
		$this->load->model('mnegociacion');
		$negociacion = $this->mnegociacion->getNegociacionesProyectoClienteNoRS($idcliente,$idproyecto);	
		//echo json_encode($negociacion);
		$this->output->set_content_type('application/json');
		$this->output->set_output(json_encode($negociacion));
	}

    //ess 04-05-2016
	public function otrosduenos($idnegociacion=-1)
	{
    	$method = $this->input->server('REQUEST_METHOD');
		$this->view_data['page_title']=  'Otros Dueños';
		$this->view_data['activo']=  'clientes';
		$this->view_data['idnegociacion']= $idnegociacion;
		$this->load_partials();
		switch ($method) 
		{
			case 'GET':
				$this->load->view('movimientos/negociaciones/otrosduenos',$this->view_data);
				break;
			case 'POST':
			    //echo $this->input->post('idnegociacion');
			    //echo $this->input->post('cliente');

				// Inserta otros dueños
				$this->load->model('mnegociacion');
				$inserto=$this->mnegociacion->grabarOtrosDuenos(array(
					   'idnegociacion'=>$this->input->post('idnegociacion'),
					   'idcliente'=>$this->input->post('cliente'),
					   'CreadoPor'=>$this->session->userdata('user_id'),
					   'FechaCreado'=>date("Y-m-d H:i:s"),
					   'ModificadoPor'=>$this->session->userdata('user_id'),
					   'FechaModificado'=>date("Y-m-d H:i:s")
					   ),$err);

				$this->view_data['idnegociacion']= $this->input->post('idnegociacion');;
				$this->load->view('movimientos/negociaciones/otrosduenos',$this->view_data);
				break;

		}

	}

	public function getCompradores($idnegociacion=-1)
	{
		
		$this->load->model('mnegociacion');
		$compradores = $this->mnegociacion->getCompradores($idnegociacion);	
		$this->output->set_content_type('application/json');
		$this->output->set_output(json_encode($compradores));
	}



    public function borrarComprador($idnegociacion=-1,$idcliente=-1)
 	{
 		
 		$this->load->model('mnegociacion');
		$sielimino=$this->mnegociacion->borrarComprador(array('idnegociacion'=>$idnegociacion,'idcliente'=>$idcliente),$err);
       	redirect('movimientos/negociacion/otrosduenos/'.$idnegociacion);
  
	}


}