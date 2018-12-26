 <?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
 class Model_golongan extends CI_Model {
  function getData() {
    $query = $this->db->get('master_golongan');
	return $query->result();
  }
}
