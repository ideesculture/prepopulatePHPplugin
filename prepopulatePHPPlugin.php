<?php
	
require_once(__CA_MODELS_DIR__."/ca_objects.php");
	
class prepopulatePHPPlugin extends BaseApplicationPlugin {
	# -------------------------------------------------------
	public function __construct() {
		//$this->description = "Prepopulate PHP";
		parent::__construct();


	}
	# -------------------------------------------------------
	/**
	 * Override checkStatus() to return true - the MMS plugin always initializes ok
	 */
	public function checkStatus() {
		return array(
			'description' => "",
			'errors' => array(),
			'warnings' => array(),
			'available' => (bool) true
		);
	}
	# -------------------------------------------------------
	public function hookSaveItem(&$pa_params) {
		
		$item = $pa_params["instance"];

		$vs_table = get_class($item);
		$type = $item->get($vs_table.".type_id");
		$id = $item->get($vs_table.".object_id");
		switch($vs_table) {
			
			case "ca_occurrences":
				// Pour les occurrences, exemple
				// $objects = $item->getWithTemplate("<unit relativeTo='ca_objects_x_occurrences' delimiter=';'>^ca_objects.object_id</unit>");
				// $item->setMode(ACCESS_WRITE);
				// $objects = explode(";", $objects);
				// foreach($objects as $object_id){
				// 	$object = new ca_objects($object_id);
				// 	$dimensions["dimensions_height"] = $object->getWithTemplate("^ca_objects.dimensions.dimensions_height");
				// 	$dimensions["dimensions_width"] = $object->getWithTemplate("^ca_objects.dimensions.dimensions_width");
				// 	$dimensions["dimensions_depth"] = $object->getWithTemplate("^ca_objects.dimensions.dimensions_depth");
				// 	$dimensions["circumference"] = $object->getWithTemplate("^ca_objects.dimensions.circumference");
				// 	$dimensions["dimensions_poids"] = $object->getWithTemplate("^ca_objects.dimensions.dimensions_poids");
				// 	$dimensions["type_dimensions"] = $object->getWithTemplate("^ca_objects.dimensions.type_dimensions");
				// 	$item->addAttribute($dimensions, "dimensions");
				// }
				// $item->update();
				break;
			
			default:
				break;
		}

	}
	static public function getRoleActionList() {
		return array();
	}	
}
