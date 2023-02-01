<?php

class Reports extends CI_Controller
{

	public function index()
	{
		$data['title'] = "Reportes";
		$data['scans'] = $this->ReportModel->get_scans();
		$data['groups'] = $this->ReportModel->get_scans_by_location();
		$data['employees'] = $this->ReportModel->get_scans_by_location_employee();
		$data['hours'] = $this->ReportModel->get_hours_employee_location();
		$data['hours_by_planning_group'] = $this->ReportModel->get_hours_by_planning_group();

		$this->load->view('templates/main/header');
		$this->load->view('templates/main/topnav');
		$this->load->view('templates/main/sidebar');
		$this->load->view('templates/main/wrapper');
		$this->load->view('reports/index', $data); //loading page and data
		$this->load->view('templates/main/footer');
	}



	public function tempus()
	{
		$data['title'] = "Reporte de Horas (Tempus)";
		$date = $this->input->get('date');

		//"2017-W01"
		if (!isset($date)) {
			//$week = "2017-W01";
			$date = new DateTime();
			$date = $date->format('Y-m-d');
		}
		$data['date'] = $date;

		$this->db->where('Fecha', $date);
		$query = $this->db->get('tempus');
		$data['tempus_hours'] = $query->result();

		//echo json_encode($data);


		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('templates/workspace_start');
		$this->load->view('reports/tempus/index', $data);
		$this->load->view('templates/footer');
	}


	public function tempus_import()
	{
		$csv = $_FILES['csv_file']['tmp_name'];

		$handle = fopen($csv, "r"); //open file

		$Col_Fecha = 0;
		$Col_TarjetaID = 1;
		$Col_NombreCompleto = 2;
		$Col_Ent1 = 3;
		$Col_Sal1 = 4;
		$Col_Ent2 = 5;
		$Col_Sal2 = 6;
		$Col_Supervisor = 7;
		$Col_Turno = 8;
		$Col_Ordinarias = 9;
		$Col_ExtAut = 10;
		$Col_ExtNoAut = 11;
		$Col_ExtrasPago = 12;
		$Col_ExtCalc = 13;
		$Col_Tardes = 14;
		$Col_HrPCG = 15;
		$Col_HrPSG = 16;
		$Col_Incidencia = 17;
		$Col_IncidenciaD = 18;


		$data_for_insert = array();

		$row = 0;
		while (($data = fgetcsv($handle, 10000, ",")) != FALSE) //get row vales
		{
			$row++;
			$num = count($data);

			if ($row == 1) continue;

			//09/28/22
			$date = date_create_from_format('m/d/y',  trim($data[$Col_Fecha]));
			$date_for_times = clone $date;

			$tarjeta_id = intval(trim($data[$Col_TarjetaID]));

			$nombre_completo = trim($data[$Col_NombreCompleto]);

			//ENTR1
			$ent_1 = NULL;
			$hours_minutes = $this->extractTime($data[$Col_Ent1]);
			if ($hours_minutes != NULL) {
				$date_for_times->setTime($hours_minutes['hours'], $hours_minutes['minutes']);
				$ent_1 = $date_for_times->format('Y-m-d H:i:s');
			}

			$sal_1 = NULL;
			$hours_minutes = $this->extractTime($data[$Col_Sal1]);
			if ($hours_minutes != NULL) {
				$date_for_times->setTime($hours_minutes['hours'], $hours_minutes['minutes']);
				$sal_1 = $date_for_times->format('Y-m-d H:i:s');
			}


			$ent_2 = NULL;
			$hours_minutes = $this->extractTime($data[$Col_Ent2]);
			if ($hours_minutes != NULL) {
				$date_for_times->setTime($hours_minutes['hours'], $hours_minutes['minutes']);
				$ent_2 = $date_for_times->format('Y-m-d H:i:s');
			}


			$sal_2 = NULL;
			$hours_minutes = $this->extractTime($data[$Col_Sal2]);
			if ($hours_minutes != NULL) {
				$date_for_times->setTime($hours_minutes['hours'], $hours_minutes['minutes']);
				$sal_2 = $date_for_times->format('Y-m-d H:i:s');
			}


			$supervisor = trim($data[$Col_Supervisor]);
			$turno = trim($data[$Col_Turno]);
			$ordinarias =  floatval($data[$Col_Ordinarias]);

			$ordinarias =  floatval($data[$Col_Ordinarias]);
			$ExtAut =  floatval($data[$Col_ExtAut]);
			$ExtNoAut =  floatval($data[$Col_ExtNoAut]);
			$ExtrasPago =  floatval($data[$Col_ExtrasPago]);
			$ExtCalc =  floatval($data[$Col_ExtCalc]);
			$Tardes =  floatval($data[$Col_Tardes]);
			$HrPCG =  floatval($data[$Col_HrPCG]);
			$HrPSG =  floatval($data[$Col_HrPSG]);

			$Incidencia =  trim($data[$Col_Incidencia]);
			$IncidenciaD =  trim($data[$Col_IncidenciaD]);


			array_push($data_for_insert, 			array(
				'Fecha' => $date->format('Y-m-d H:i:s'),
				'TarjetaID' => $tarjeta_id,
				'NombreCompleto' => $nombre_completo,
				'Ent1' => $ent_1,
				'Sal1' => $sal_1,
				'Ent2' => $ent_2,
				'Sal2' => $sal_2,
				'Supervisor' => $supervisor,
				'Turno' => $turno,
				'Ordinarias' => $ordinarias,
				'ExtAut' => $ExtAut,
				'ExtNoAut' => $ExtNoAut,
				'ExtrasPago' => $ExtrasPago,
				'ExtCalc' => $ExtCalc,
				'Tardes' => $Tardes,
				'HrPCG' => $HrPCG,
				'HrPSG' => $HrPSG,
				'Incidencia' => $Incidencia,
				'IncidenciaD' => $IncidenciaD,
				'TotalHours' => ($ordinarias + $ExtCalc)
			));
		}


		$this->db->db_debug = false;

		//print_r($data_for_insert);
		$insert = $this->db->insert_batch('tempus', $data_for_insert);

		if ($insert > 0) {
			$this->session->set_flashdata('succes_message', 'Se insertaron un total de ' . $insert . ' registros.');
		} else {
			$this->session->set_flashdata('error_message', 'Verifique la informacion, al parecer los datos ya están disponibles en el sistema. Se insertaron ' . $insert . ' registros.');
		}

		redirect('reports/tempus');
	}

	public function extractTime($time_str)
	{
		$time_str = trim($time_str);

		if ($time_str === '') return NULL;

		$dateTimeCreated = NULL;

		if (substr($time_str, 0, 10) === "30/12/1899") {
			//30/12/1899 07:05 AM
			$dateTimeCreated = date_create_from_format('d/m/Y h:i A', $time_str);
			//echo 'found rare time' . date_format($dateTimeCreated, "Y - m - d H:i:s");

		} else {
			//15:29
			//echo $time_str . "\n";
			$dateTimeCreated = date_create_from_format('G:i', $time_str);
			//echo 'created time' . date_format($dateTimeCreated, "Y - m - d H:i:s");
		}

		$hourString = $dateTimeCreated->format('H');
		$minuteString = $dateTimeCreated->format('i');

		return ['hours' => intval($hourString), 'minutes' =>  intval($minuteString)];
	}
}
