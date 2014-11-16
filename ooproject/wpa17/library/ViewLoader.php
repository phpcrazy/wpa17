<?php 

class View {
	public static function load($view, $data = null) {
		ob_start();
		if($data != null) {
			extract($data); 
		}
		require DD . '/app/view/' . $view . '.php';
		ob_end_flush();
	}
}

?>