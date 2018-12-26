<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin_m extends CI_Model
{
	public function info_pt($id){
		$this->db->where('id_info_pt', $id);
		$query = $this->db->get('info_pt');
		return $query->row();
	}
	public function jumlah_data($jk){
		$this->db->from('data_pegawai');
		$this->db->where('jenis_kelamin',$jk);
		$rs = $this->db->count_all_results();
		return $rs;
	}
	public function jumlah_skpd($id){
		$this->db->from('data_pegawai');
		$this->db->where('id_satuan_kerja',$id);
		$rs = $this->db->count_all_results();
		return $rs;
	}
	public function jml_data($table,$field,$id){
		$this->db->from($table);
		$this->db->where($field,$id);
		$rs = $this->db->count_all_results();
		return $rs;
	}
	public function cek_pt($id){
		$this->db->where('id_info_pt', $id);
		$query = $this->db->get('info_pt');
		return $query;
	}
	public function Update_pt($id,$data){
		$this->db->where('id_info_pt', $id);
		$this->db->update('info_pt',$data);
	}
	public function all_link(){
		$this->db->join('kategori_link', 'kategori_link.id_kategori_link = link.id_kategori_link');
		$query = $this->db->get('link');
		return $query->result();
	}
	public function all_kat_link(){
		$query = $this->db->get('kategori_link');
		return $query->result();
	}
	public function detail_link($id){
		$this->db->join('kategori_link', 'kategori_link.id_kategori_link = link.id_kategori_link');
		$this->db->where('id_link', $id);
		$query = $this->db->get('link');
		return $query->row();
	}
	public function detail_kategori_link($id){
		$this->db->where('id_kategori_link', $id);
		$query = $this->db->get('kategori_link');
		return $query->row();
	}
	function insert_link($data){
		$this->db->insert('link', $data);
	}
	function insert_kategori_link($data){
		$this->db->insert('kategori_link', $data);
	}
	function update_link($id,$data){
		$this->db->where('id_link',$id);
		$this->db->update('link', $data);
	}
	function update_kategori_link($id,$data){
		$this->db->where('id_kategori_link',$id);
		$this->db->update('kategori_link', $data);
	}
	public function delete_link($id){
		$this->db->where('id_link', $id);
		$this->db->delete('link');
	}
	public function cek_link_by_katelink($id){
		$this->db->where('id_kategori_link', $id);
		$query = $this->db->get('link');
		return $query->result();
	}
	public function delete_kategori_link($id){
		$this->db->where('id_kategori_link', $id);
		$this->db->delete('kategori_link');
	}
	public function select_data($tabel){
		$query = $this->db->get($tabel);
		return $query->result();
	}
	public function select_data_order($tabel,$field,$id){
		$this->db->where($field, $id);
		$query = $this->db->get($tabel);
		return $query->result();
	}
	public function select_data_s_k(){
		$this->db->order_by('id_satuan_kerja','asc');
		$query = $this->db->get('master_satuan_kerja');
		return $query->result();
	}
	public function detail_data_order($tabel,$field,$id){
		$this->db->where($field, $id);
		$query = $this->db->get($tabel);
		return $query->row();
	}
	public function detail_data_min($tabel,$field,$fieldorder,$valorder,$id){
		$this->db->where($field, $id);
		$this->db->order_by($fieldorder,$valorder);
		$query = $this->db->get($tabel);
		return $query->row();
	}
	public function riwayat_max($id){
		$this->db->where('id_pegawai', $id);
		$this->db->join('master_golongan', 'master_golongan.id_golongan = data_riwayat_pangkat.id_golongan');
		$this->db->order_by('id_riwayat_pangkat','desc');
		$query = $this->db->get('data_riwayat_pangkat');
		return $query->row();
	}
	public function jabatan_min($id){
		$this->db->where('id_pegawai', $id);
		$this->db->join('master_jabatan', 'master_jabatan.id_jabatan = data_riwayat_jabatan.id_jabatan');
		$this->db->order_by('id_riwayat_jabatan','asc');
		$query = $this->db->get('data_riwayat_jabatan');
		return $query->row();
	}
	public function jabatan_max($id){
		$this->db->where('id_pegawai', $id);
		$this->db->join('master_jabatan', 'master_jabatan.id_jabatan = data_riwayat_jabatan.id_jabatan');
		$this->db->order_by('id_riwayat_jabatan','desc');
		$query = $this->db->get('data_riwayat_jabatan');
		return $query->row();
	}
	function insert_data($tabel,$data){
		$this->db->insert($tabel, $data);
	}
	public function delete_data($tabel,$field,$id){
		$this->db->where($field, $id);
		$this->db->delete($tabel);
	}
	public function update_data($tabel,$field,$id,$data){
		$this->db->where($field, $id);
		$this->db->update($tabel,$data);
	}
	public function update($tabel,$field,$id,$data){
		$this->db->where($field, $id);
		$this->db->update($tabel,$data);
	}
	// 
	public function data_pegawai($id){
		$this->db->where('id_pegawai', $id);
		$query = $this->db->get('data_pegawai');
		return $query->row();
	}
	public function data_sppd(){
		$query = $this->db->get('sppd_ld');
		return $query->result();
	}
	public function last_id_p(){
		$this->db->select('id_pegawai');
		$this->db->order_by('id_pegawai','desc');
		$query = $this->db->get('data_pegawai');
		return $query->row();
	}
	public function last_id_h(){
		$this->db->select('id_honorer');
		$this->db->order_by('id_honorer','desc');
		$query = $this->db->get('honorer');
		return $query->row();
	}
	public function getpangkatpeg($id){
		// $this->db->select('id_pegawai');
		$this->db->where('id_pegawai', $id);
		$this->db->order_by('id_pegawai','desc');
		$query = $this->db->get('data_riwayat_pangkat');
		return $query->row();
	}
	public function getgolpeg($id){
		// $this->db->select('id_pegawai');
		$this->db->where('id_pegawai', $id);
		$this->db->order_by('id_pegawai','desc');
		$query = $this->db->get('data_riwayat_golongan');
		return $query->row();
	}
	public function getjabpeg($id){
		// $this->db->select('id_pegawai');
		$this->db->where('id_pegawai', $id);
		$this->db->order_by('id_pegawai','desc');
		$query = $this->db->get('data_riwayat_jabatan');
		return $query->row();
	}
	public function select_data_jabatan($limit){
		$this->db->join('data_pegawai', 'data_pegawai.id_pegawai = data_riwayat_jabatan.id_pegawai');
		$this->db->join('master_jenis_jabatan', 'master_jenis_jabatan.id_jenis_jabatan = data_riwayat_jabatan.id_jenis_jabatan');
		$this->db->join('master_eselon', 'master_eselon.id_eselon = data_riwayat_jabatan.id_eselon');
		$this->db->join('master_satuan_kerja', 'master_satuan_kerja.id_satuan_kerja = data_riwayat_jabatan.id_satuan_kerja');
		if ($limit == TRUE) {
			$this->db->limit($limit);
		}
		$query = $this->db->get('data_riwayat_jabatan');
		return $query->result();
	}
}
