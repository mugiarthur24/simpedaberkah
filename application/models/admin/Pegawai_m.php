<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pegawai_m extends CI_Model
{
	public function jumlah_data($string,$skpd){
		$this->db->from('data_pegawai');
		if (!empty($string)) {
			$this->db->like('nama_pegawai',$string);
			$this->db->or_like('nip',$string);
			$this->db->or_like('nip_lama',$string);
		}
		if (!empty($skpd)) {
			$this->db->where('id_satuan_kerja',$string);
		}
		$rs = $this->db->count_all_results();
		return $rs;
	}
	public function jml(){
		$this->db->from('data_pegawai');
		$rs = $this->db->count_all_results();
		return $rs;
	}
	public function searcing_data($sampai,$dari,$string,$skpd){
		// $this->db->select('data_pegawai.*,master_golongan');
		// $this->db->join('master_golongan', 'master_golongan.id_golongan = data_pegawai.id_golongan');
		// $this->db->join('master_lokasi_kerja', 'master_lokasi_kerja.id_lokasi_kerja = data_pegawai.lokasi_kerja');
		$this->db->join('master_status_pegawai', 'master_status_pegawai.id_status_pegawai = data_pegawai.status_pegawai');
		if (!empty($string)) {
			$this->db->like('nama_pegawai',$string);
			$this->db->or_like('nip',$string);
			$this->db->or_like('nip_lama',$string);
		}
		if (!empty($skpd)) {
			$this->db->where('id_satuan_kerja',$skpd);
		}
		$this->db->order_by('nama_pegawai','asc');
		$query = $this->db->get('data_pegawai',$sampai,$dari);
		return $query->result();
	}
	public function detail_pegawai($id){
		// $this->db->select('data_pegawai.*,master_golongan');
		$this->db->join('master_golongan', 'master_golongan.id_golongan = data_pegawai.id_golongan');
		// $this->db->join('master_lokasi_kerja', 'master_lokasi_kerja.id_lokasi_kerja = data_pegawai.lokasi_kerja');
		$this->db->join('master_status_pegawai', 'master_status_pegawai.id_status_pegawai = data_pegawai.status_pegawai');
		$this->db->join('master_agama', 'master_agama.id_agama = data_pegawai.agama');
		$this->db->where('id_pegawai',$id);
		$query = $this->db->get('data_pegawai');
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
	public function data_keluarga($id){
		$this->db->where('id_pegawai', $id);
		$query = $this->db->get('data_keluarga');
		return $query->result();
	}
	public function data_rgolongan($id){
		$this->db->where('id_pegawai', $id);
		$query = $this->db->get('data_riwayat_golongan');
		return $query->result();
	}
	public function data_rpangkat($id){
		$this->db->where('id_pegawai', $id);
		$query = $this->db->get('data_riwayat_pangkat');
		return $query->result();
	}
	public function data_rjabatan($id){
		$this->db->where('id_pegawai', $id);
		$query = $this->db->get('data_riwayat_jabatan');
		return $query->result();
	}
	public function data_reselon($id){
		$this->db->where('id_pegawai', $id);
		$query = $this->db->get('data_riwayat_eselon');
		return $query->result();
	}
	public function data_pendidikan($id){
		$this->db->where('id_pegawai', $id);
		$query = $this->db->get('data_pendidikan');
		return $query->result();
	}
	public function data_pelatihan($id){
		$this->db->where('id_pegawai', $id);
		$query = $this->db->get('data_pelatihan');
		return $query->result();
	}
	public function data_penghargaan($id){
		$this->db->where('id_pegawai', $id);
		$query = $this->db->get('data_penghargaan');
		return $query->result();
	}
	public function data_seminar($id){
		$this->db->where('id_pegawai', $id);
		$query = $this->db->get('data_seminar');
		return $query->result();
	}
	public function data_organisasi($id){
		$this->db->where('id_pegawai', $id);
		$query = $this->db->get('data_organisasi');
		return $query->result();
	}
	public function data_gaji_pokok($id){
		$this->db->where('id_pegawai', $id);
		$query = $this->db->get('data_gaji_pokok');
		return $query->result();
	}
	public function data_hukuman($id){
		$this->db->where('id_pegawai', $id);
		$query = $this->db->get('data_hukuman');
		return $query->result();
	}
	public function data_dp3($id){
		$this->db->where('id_pegawai', $id);
		$query = $this->db->get('data_dp3');
		return $query->result();
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
