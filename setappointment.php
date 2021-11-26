<?php
	function set_appointment(){
		extract($_POST);
		$doc = $this->db->query("SELECT * FROM designers_list where id = ".$doctor_id);
		$schedule = date('Y-m-d',strtotime($date)).' '.date('H:i',strtotime($time)).":00";
		$day = date('l',strtotime($date));
		$time = date('H:i',strtotime($time)).":00";
		$sched = date('H:i',strtotime($time));
		$doc_sched_check = $this->db->query("SELECT * FROM designers_schedule where doctor_id = $doctor_id and day = '$day' and ('$time' BETWEEN time_from and time_to )");
		if($doc_sched_check->num_rows <= 0){
			return json_encode(array('status'=>2,"msg"=>"Appointment schedule not valid for selected doctor's schedule."));
			exit;
		}

		$data = " doctor_id = '$doctor_id' ";
		if(!isset($patient_id))
		$data .= ", patient_id = '".$_SESSION['login_id']."' ";
		else
		$data .= ", p_id = '$patient_id' ";

		$data .= ", schedule = '$schedule' ";
		if(isset($status))
		$data .= ", status = '$status' ";
		if(isset($id) && !empty($id))
		$save = $this->db->query("UPDATE appointment_list set ".$data." where id = ".$id);
		else
		$save = $this->db->query("INSERT INTO appointment_list set ".$data);
		if($save){
			return json_encode(array('status'=>1));
		}
	}
	?>
