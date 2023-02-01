<?php

class ShiftModel extends CI_Model{

	public function __construct()
	{
		$this->load->database();
	}

	public function get_shift($date, $type){

		$day = date("Y-m-d");
		$day_end = date("Y-m-d"); //code review result.
		//$day = date("2022-09-15"); //test

		switch ($type){
			case 'regular':
				if
				(
					$date > date('H:i:s', strtotime('06:00:00'))
					&& $date <= date('H:i:s', strtotime('15:36:00'))
				)
				{
					$shift = "reg1";
					$start = "06:00:00";
					$end = '15:36:00';
				}
				elseif
				(
					/*
					$date > date('H:i:s', strtotime('15:36:00'))
					&& $date <= date('H:i:s', strtotime('23:35:59'))
					*/
					$date > date('H:i:s', strtotime('15:36:00'))
					&& $date <= date('H:i:s', strtotime('23:53:59'))
				)
				{
					$shift = "reg2";
					$start = "15:36:00";
					$end = '23:53:59';
				}
				else
				{
					$shift = "reg3";
					$start = "23:00:00";
					$end = '05:59:59';

					if(
						/*
						$date >= date('H:i:s', strtotime('23:36:00'))
						&& $date <= date('H:i:s', strtotime('23:59:59'))
						*/
						$date >= date('H:i:s', strtotime('23:00:00'))
						&& $date <= date('H:i:s', strtotime('23:59:59'))
					)
					{
						$day_end = date('Y-m-d', strtotime(date('Y-m-d') . ' +1 day'));
					}

				}
				break;


			case 'rotating':
				if(
					$date > date('H:i:s', strtotime('06:00:00'))
					&& $date <= date('H:i:s', strtotime('18:00:00'))
				)
				{

					$shift = "rot1";
					$start = '06:00:00';
					$end = '18:00:00';
				}
				else
				{
					$shift = "rot2";
					$start = '18:00:00';
					$end = '05:59:59';

					if(
						$date >= date('H:i:s', strtotime('18:00:01'))
						&& $date <= date('H:i:s', strtotime('23:59:59'))
					)
					{
						$day_end = date('Y-m-d', strtotime(date('Y-m-d') . ' +1 day')); //changed to day end as result of code review.
					}

					//$day = date('Y-m-d', strtotime(date('Y-m-d') . ' +1 day'));
				}
				break;


			case 'overtime':
				$shift = "ot1";
				$start = '00:00:00';
				$end = '23:59:59';
				break;


			case 'weekend':
				if(
					$date > date('H:i:s', strtotime('06:00:00'))
					&& $date <= date('H:i:s', strtotime('18:00:00'))
				)
				{

					$shift = "w1";
					$start = '06:00:00';
					$end = '18:00:00';
				}
				else
				{
					$shift = "w2";
					$start = '18:00:00';
					$end = '05:59:59';

					if(
						$date >= date('H:i:s', strtotime('18:00:01'))
						&& $date <= date('H:i:s', strtotime('23:59:59'))
					)
					{
						$day_end = date('Y-m-d', strtotime(date('Y-m-d') . ' +1 day')); //changed to day end as result of code review.
					}

					//$day = date('Y-m-d', strtotime(date('Y-m-d') . ' +1 day'));
				}
				break;


			default:
				$shift = 'N/A';
				$start = '00:00:00';
				$end = '00:00:00';
				//$end = 'N/A'; changed to 00:00:00 as result of code review.
				break;

		}


		return array(
			'shift' => $shift,//'reg1',reg2,reg3,rot1,rot2,ot1,w1,w2,w3
			'type' => $type, //regular, rotating, overtime, weekend
			'start' => $start, //start of shift time
			'end' => $end, //end of shift time
			'day' => $day, //day of shift
			'day_end'=> $day_end, //day of shift end
			'hours'=> $date //in H:i:s format
		);

	}


	public  function  get_shift_excel($date)
	{
		$day = date("Y-m-d");//default day is today.
		$day_end = date("Y-m-d");//default end day is today.

		$empleado = $this->input->post('work_id');

		$this->db->select('*');
		$this->db->from('empleados_report');
		$this->db->where('id', $empleado);


		$query = $this->db->get();

		$number_of_rows = $query->num_rows();
		if($number_of_rows == 0)
		{
			return array(
				'shift' => "N/A",//'reg1',reg2,reg3,rot1,rot2,ot1,w1,w2,w3
				'type' => "N/A", // MATU LV 6:00 a 15:36 BREAK 36 MIN , VESP LV 15:30-23:54 break 36 m, Turno Nocturno 21:36 pm-6:00 am, 3er Turno 23:00 a 06:00, Turno Rotativo A, Turno Rotativo B, Turno Rotativo C, Turno Rotativo D, Turno Fin de Semana Matutino, Turno FDS Lac 6:00-17:00
				'start' => "N/A", //start of shift time
				'end' => "N/A", //end of shift time
				'day' => "N/A", //day of shift
				'day_end'=> "N/A", //day of shift end
				'hours'=> "N/A" //in H:i:s format
			);
		}
		else
		{
			$last_query = $this->db->last_query();
			print_r($last_query);
			$row =  $query->row_array();



			switch ($row['turno'])
			{
				case 'MATU LV 6:00 a 15:36 BREAK 36 MIN':
					$turno = 'MATU LV 6:00 a 15:36 BREAK 36 MIN';

					$shift = "reg1";
					$start = "06:00:00";
					$end = '15:36:00';

					break;

				case 'VESP LV 15:30-23:54 break 36 m':
					$turno = 'VESP LV 15:30-23:54 break 36 m';

					$shift = "reg2";
					$start = "15:30:00";
					$end = '23:54:00';

					break;

				case 'Turno Nocturno 21:36 pm-6:00 am':
					$turno = 'Turno Nocturno 21:36 pm-6:00 am';

					$shift = "reg3";
					$start = "21:36:00";
					$end = '06:00:00';

					if(
						$date >= date('H:i:s', strtotime('21:36:00'))
						&& $date <= date('H:i:s', strtotime('23:59:59'))
					)
					{
						$day_end = date('Y-m-d', strtotime(date('Y-m-d') . ' +1 day'));
					}

					break;

				case '3er Turno 23:00 a 06:00':
					$turno = '3er Turno 23:00 a 06:00';

					$shift = "reg3";
					$start = "23:00:00";
					$end = '06:00:00';

					if(
						$date >= date('H:i:s', strtotime('23:00:00'))
						&& $date <= date('H:i:s', strtotime('23:59:59'))
					)
					{
						$day_end = date('Y-m-d', strtotime(date('Y-m-d') . ' +1 day'));
					}

					break;

				case 'Turno Rotativo A': //6AM-6PM
					$turno = 'Turno Rotativo A';

					$shift = "rot1";
					$start = "06:00:00";
					$end = '18:00:00';


					break;

				case 'Turno Rotativo B': //6AM-6PM
					$turno = 'Turno Rotativo B';

					$shift = "rot2";
					$start = "06:00:00";
					$end = '18:00:00';


					break;

				case 'Turno Rotativo C': //6PM-6AM
					$turno = 'Turno Rotativo C';

					$shift = "rot1";
					$start = "18:00:00";
					$end = '06:00:00';

					if(
						$date >= date('H:i:s', strtotime('18:00:00'))
						&& $date <= date('H:i:s', strtotime('23:59:59'))
					)
					{
						$day_end = date('Y-m-d', strtotime(date('Y-m-d') . ' +1 day'));
					}

					break;

				case 'Turno Rotativo D'://6PM-6AM
					$turno = 'Turno Rotativo D';

					$shift = "rot2";
					$start = "18:00:00";
					$end = '06:00:00';

					if(
						$date >= date('H:i:s', strtotime('18:00:00'))
						&& $date <= date('H:i:s', strtotime('23:59:59'))
					)
					{
						$day_end = date('Y-m-d', strtotime(date('Y-m-d') . ' +1 day'));
					}

					break;

				case 'Turno Fin de Semana Matutino':
					$turno = 'Turno Fin de Semana Matutino';

					$shift = "w1";
					$start = "06:00:00";
					$end = '18:00:00';

					break;

				case 'Turno FDS Lac 6:00-17:00':
					$turno = 'Turno FDS Lac 6:00-17:00';

					$shift = "w2";
					$start = "06:00:00";
					$end = '17:00:00';

					break;


				default:
					$turno = 'N/A';
					$shift = 'N/A';
					$start = '00:00:00';
					$end = '00:00:00';
					break;


			}


			return array(
				'shift' => $shift,//'reg1',reg2,reg3,rot1,rot2,ot1,w1,w2,w3
				'type' => $turno, // MATU LV 6:00 a 15:36 BREAK 36 MIN , VESP LV 15:30-23:54 break 36 m, Turno Nocturno 21:36 pm-6:00 am, 3er Turno 23:00 a 06:00, Turno Rotativo A, Turno Rotativo B, Turno Rotativo C, Turno Rotativo D, Turno Fin de Semana Matutino, Turno FDS Lac 6:00-17:00
				'start' => $start, //start of shift time
				'end' => $end, //end of shift time
				'day' => $day, //day of shift
				'day_end'=> $day_end, //day of shift end
				'hours'=> $date //in H:i:s format
			);
		}



	}



}

