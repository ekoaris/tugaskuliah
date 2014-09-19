<?php
class Country extends Controller {
	function Country() {
		parent::Controller();
		$this->load->helper('flexigrid','url');
	}
	
	function index(){
						$colModel['id'] = array('ID',40,TRUE,'center',2);
						$colModel['kd_negara'] = array('Kode Negara',70,TRUE,'center',2);
						$colModel['negara'] = array('Nama Negara',180,TRUE,'center',2);
						$colModel['merdeka'] = array('Hari Kemerdekaan',180,TRUE,'center',2);
						$colModel['delete'] = array('DELETE',40,TRUE,'center',0);
						$gridParams = array (	
										'width' => '572',
										'height' => 'auto',
										'rp' => 15,
										'rpOptions' => '[10,15,20,25,40]',
										'pagestat' => 'Displaying:{from}to{to}of{total} items.',
										'blockOpacity' => 0.5,
										'title' => 'Data Negara Di Dunia',
										'showTableToggleBtn' => true
										);
										$buttons[] = array('separator');
										$buttons[] = array('Select All','add','test');
										$buttons[] = array('DeSelect All','delete','test');
										$buttons[] = array('separator');
										
										$grid_js = build_grid_js('felx1',site_url('/ajax'),$colModel,'id','asc',$gridParams,$buttons);
										
										$data['js_grid'] = $grid_js;
										$this->load->view('flexigrid',$data);
					}
	function delete($id){
							$this->load->model('ajax_model');
							$this->ajax_model->delete_country($id);
							reditect('country');
						}
	}						
?>
