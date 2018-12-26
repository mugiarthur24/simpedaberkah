<?php    
class Mread extends CI_Model{
	public function chart(){
		$query = $this->db->get('jk');
		return $query->result();
	}
    // function chart(){
    //     $query = $this->db->query("SELECT * from tbl_data_dp3");
         
    //     if($query->num_rows() > 0){
    //         foreach($query->result() as $data){
    //             $hasil[] = $data;
    //         }
    //         return $hasil;
    //     }else{
    //     	$hasil ="Tidak ada data";
    //     	return $hasil;
    //     }
    // }
}