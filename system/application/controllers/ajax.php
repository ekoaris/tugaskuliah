<?php
	class Ajax extends Controller {
		
		function Ajax () {
			parent::Controller();
			$this->load->model('ajax_model');
			$this->load->library('flexigrid');
		}
		
		function index() {
		$valid_fields = array('id','kd_negara','negara','merdeka');
		$this->flexigrid->validate_post('id','asc',$valid_fields);
		$records = $this->ajax_model->get_countries();
		$this->output->set_header($this->config->item('json_header'));
		
			$i = 1;
			foreach ($records['records']->result() as $row) {
					$record_items[] = array($row->id,
					$i++,
					$row->kd_negara,
					$row->negara,
					$row->merdeka,
					'<a href=\'country/delete/' .$row->id.'\'>delete</a>'
					);
			}
		
		$this->output->set_output($this->flexigrid->json_build($records['record_count'],$record_item));
		}
	}
?>