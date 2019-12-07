<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Honorer_m extends CI_Model
{
	public function jumlah_data($string,$skpd){
		$this->db->from('honorer');
		if (!empty($string)) {
			$this->db->like('nama',$string);
		}
		if (!empty($skpd)) {
			$this->db->where('id_lokasi_kerja',$string);
		}
		$rs = $this->db->count_all_results();
		return $rs;
	}
	public function searcing_data($sampai,$dari,$string,$skpd){
		// $this->db->select('data_pegawai.*,master_golongan');
		
		// $this->db->join('master_satuan_kerja', 'master_satuan_kerja.id_satuan_kerja = honorer.id_satuan_kerja');
		if (!empty($string)) {
			$this->db->like('honorer.nama',$string);}
		if (!empty($skpd)) {
			$this->db->where('honorer.id_satuan_kerja',$skpd);
		}
		$this->db->order_by('nama','asc');
		$query = $this->db->get('honorer',$sampai,$dari);
		return $query->result();
	}
	public function detail_pegawai($id){
		// $this->db->select('data_pegawai.*,master_golongan');
		$this->db->join('master_golongan', 'master_golongan.id_golongan = data_pegawai.id_golongan');
		// $this->db->join('master_lokasi_kerja', 'master_lokasi_kerja.id_lokasi_kerja = data_pegawai.lokasi_kerja');
		$this->db->join('master_status_pegawai', 'master_status_pegawai.id_status_pegawai = data_pegawai.status_pegawai');
		$this->db->join('master_agama', 'master_agama.id_agama = data_pegawai.agama');
		$this->db->where('id_honorer',$id);
		$query = $this->db->get('data_pegawai');
		return $query->row();
	}
	public function detail_honorer($id){
		$this->db->where('id_honorer',$id);
		$query = $this->db->get('honorer');
		return $query->row();
	}
	public function sppd_honorer($id){
		$this->db->join('sppd_ld', 'sppd_ld.id_sppd_ld = master_pengikut.id_sppd');
		$this->db->where('master_pengikut.id_pegawai',$id);
		$this->db->where('lvl','honorer');
		$this->db->order_by('master_pengikut.id_pengikut','desc');
		$query = $this->db->get('master_pengikut');
		return $query->result();
	}
	public function akun_honorer($id){
		$this->db->where('id_pegawai',$id);
		$this->db->where('lvl','2');
		$query = $this->db->get('users');
		return $query->row();
	}
	public function select_data($tabel){
		$query = $this->db->get($tabel);
		return $query->result();
	}
	public function detail_data($tabel,$field,$id){
		$this->db->where($field, $id);
		$query = $this->db->get($tabel);
		return $query->row();
	}
	public function get_sppd_honorer($sppd,$honor){
		$this->db->where('id_sppd_ld', $sppd);
		$this->db->where('id_honorer', $honor);

		$query = $this->db->get('sppd_honorer');
		return $query->row();
	}
	function insert_data($tabel,$data){
		$this->db->insert($tabel,$data);
	}
	public function delete_data($tabel,$field,$id){
		$this->db->where($field, $id);
		$this->db->delete($tabel);
	}
	public function update_data($tabel,$field,$id,$data){
		$this->db->where($field, $id);
		$this->db->update($tabel,$data);
	}
	public function gtdataharian($prov,$jab){
		$this->db->where('id_provinsi', $prov);
		$this->db->where('id_jabatan', $jab);
		$query = $this->db->get('master_biaya_harian');
		return $query->row();
	}
	public function gtdatahotel($prov,$jab){
		$this->db->where('id_provinsi', $prov);
		$this->db->where('id_jabatan', $jab);
		$query = $this->db->get('master_biaya_hotel');
		return $query->row();
	}
}
