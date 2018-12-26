 <?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
 class Model_honorer extends CI_Model {
  function getData() {
    $query = $this->db->get('honorer');
	return $query->result();
  }
}
