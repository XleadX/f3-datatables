<?php

class DataTable extends DB\SQL\Mapper {
    public function __construct(DB\SQL $db) {
        parent::__construct($db,'table_name');
    }
	
	public function data($draw,$length,$offset,$search){
		$total = $this->count();
		$output = array();
		$output['draw'] = $draw;
		$output['recordsTotal'] = $output['recordsFiltered'] = $total;
		$output['data'] = array();

		if($search!=""){
			$this->load(array('field LIKE ?', '\'%'.$search.'%\''));
			$query = $this->query;
		} else {
			$this->load(array(),array('order'=>'field DESC','limit'=>$length,'offset'=>$offset));
			$query = $this->query;
		}

		foreach($query as $data) {
			$output['data'][] = array(
				$data['field_id'],
				$data['field_name'],
				$data['field_etc'],				
				...
			);
		}

		echo json_encode($output);
	}
}