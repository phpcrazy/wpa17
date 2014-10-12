<?php 

function _view_load($view, $data = null) {
	ob_start();
	if($data != null) {
		extract($data); 
	}
	require DD . '/app/view/' . $view . '.php';
	ob_end_flush();
}	

?>