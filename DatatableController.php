<?php

class DatatableController extends Controller {
	public function data(){
		$draw = intval($this->f3->get('REQUEST.draw'));
		$length = intval($this->f3->get('REQUEST.length'));
		$offset = intval($this->f3->get('REQUEST.start'));
		$search = $_REQUEST['search']["value"];
		
		$datatable = new DataTable($this->db);
		die($datatable->data($draw,$length,$offset,$search));
	}
}