 <?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
 class Model_data extends CI_Model {
  function getData() {
    $query = $this->db->get('master_satuan_kerja');
	return $query->result();
  }
}
