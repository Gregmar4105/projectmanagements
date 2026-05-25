<?php defined('BASEPATH') OR exit('No direct script access allowed');
// v5.9
class Migration_update extends CI_Migration {

	public function __construct() {
		parent::__construct();
		$this->load->dbforge();
	}

	public function up() {  

		$this->db->query("CREATE TABLE `broadcast` (`id` INT NOT NULL AUTO_INCREMENT , `from_id` INT NOT NULL , `to_whom` TEXT NOT NULL , `subject` TEXT NOT NULL , `msg` TEXT NOT NULL , `created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`))");
	
		$this->db->query("INSERT INTO `settings` (`id`, `type`, `value`, `created`) VALUES (NULL, 'maintenance_mode', '{\"maintenance_mode\":0}', current_timestamp())");
		
		$this->db->set('value', '5.9');
        $this->db->where('type', 'system_version');
        $this->db->update('settings');

	}

	public function down() {
	}
}
