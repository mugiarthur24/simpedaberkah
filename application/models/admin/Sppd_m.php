<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Sppd_m extends CI_Model
{
	public function jumlah_data($string){
		$this->db->select('sppd_ld.*,data_pegawai.id_pegawai,data_pegawai.nip,data_pegawai.nip_lama,data_pegawai.nama_pegawai');
		$this->db->from('sppd_ld');
		$this->db->join('data_pegawai', 'data_pegawai.id_pegawai = sppd_ld.id_pegawai');
		if (!empty($string)) {
			$this->db->like('nama_pegawai',$string);
		}
		$rs = $this->db->count_all_results();
		return $rs;
	}
	public function searcing_data($sampai,$dari,$string){
		// $this->db->select('data_pegawai.*,master_golongan');
		$this->db->select('sppd_ld.*,data_pegawai.id_pegawai,data_pegawai.nip,data_pegawai.nip_lama,data_pegawai.nama_pegawai');
		$this->db->join('data_pegawai', 'data_pegawai.id_pegawai = sppd_ld.id_pegawai');
		if (!empty($string)) {
			$this->db->like('data_pegawai.nama_pegawai',$string);}
		$this->db->order_by('id_sppd_ld','desc');
		$query = $this->db->get('sppd_ld',$sampai,$dari);
		return $query->result();
	}
	public function searcing_data_honorer($sampai,$dari,$string){
		// $this->db->select('data_pegawai.*,master_golongan');
		$this->db->select('sppd_honorer.*,honorer.id_honorer,honorer.nama');
		$this->db->join('honorer', 'honorer.id_honorer = sppd_honorer.id_honorer');
		if (!empty($string)) {
			$this->db->like('honorer.nama',$string);}
		$this->db->order_by('id_sppd_honorer','desc');
		$query = $this->db->get('sppd_honorer',$sampai,$dari);
		return $query->result();
	}
	public function jumlah_data_detail_pegawai($id,$string){
		$this->db->select('sppd_ld.*,data_pegawai.id_pegawai,data_pegawai.nip,data_pegawai.nip_lama,data_pegawai.nama_pegawai');
		$this->db->from('sppd_ld');
		$this->db->join('data_pegawai', 'data_pegawai.id_pegawai = sppd_ld.id_pegawai');
		if (!empty($string)) {
			$this->db->like('nama_pegawai',$string);
		}
		$this->db->where('sppd_ld.id_pegawai',$id);
		$rs = $this->db->count_all_results();
		return $rs;
	}
	public function jumlah_data_detail_honorer($id,$string){
		$this->db->select('sppd_honorer.*,honorer.id_honorer,honorer.nama');
		$this->db->from('sppd_honorer');
		$this->db->join('honorer', 'honorer.id_honorer = sppd_honorer.id_honorer');
		if (!empty($string)) {
			$this->db->like('nama',$string);
		}
		$this->db->where('sppd_honorer.id_honorer',$id);
		$rs = $this->db->count_all_results();
		return $rs;
	}
	public function searcing_data_detail_pegawai($id,$sampai,$dari,$string){
		// $this->db->select('data_pegawai.*,master_golongan');
		$this->db->select('sppd_ld.*,data_pegawai.id_pegawai,data_pegawai.nip,data_pegawai.nip_lama,data_pegawai.nama_pegawai');
		$this->db->join('data_pegawai', 'data_pegawai.id_pegawai = sppd_ld.id_pegawai');
		if (!empty($string)) {
			$this->db->like('data_pegawai.nama_pegawai',$string);}
		$this->db->where('sppd_ld.id_pegawai',$id);
		$this->db->order_by('id_sppd_ld','desc');
		$query = $this->db->get('sppd_ld',$sampai,$dari);
		return $query->result();
	}
	public function searcing_data_detail_honorer($id,$sampai,$dari,$string){
		// $this->db->select('data_pegawai.*,master_golongan');
		$this->db->select('sppd_honorer.*,honorer.id_honorer,honorer.nama');
		$this->db->join('honorer', 'honorer.id_honorer = sppd_honorer.id_honorer');
		if (!empty($string)) {
			$this->db->like('honorer.nama',$string);}
		$this->db->where('sppd_honorer.id_honorer',$id);
		$this->db->order_by('id_sppd_honorer','desc');
		$query = $this->db->get('sppd_honorer',$sampai,$dari);
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
	public function select_data($tabel){
		$query = $this->db->get($tabel);
		return $query->result();
	}
	public function cari_pengikut($string){
		$this->db->like('nama_pegawai', $string);
		$this->db->or_like('nip', $string);
		$this->db->limit('3');
		$query = $this->db->get('data_pegawai');
		return $query->result();
	}
	public function cari_pengikuth($string){
		$this->db->like('nama', $string);
		$this->db->limit('3');
		$query = $this->db->get('honorer');
		return $query->result();
	}
	public function detail_data($tabel,$field,$id){
		$this->db->where($field, $id);
		$query = $this->db->get($tabel);
		return $query->result();
	}
	public function data_pengikut($id){
		// $this->db->join('data_pegawai', 'data_pegawai.id_pegawai = master_pengikut.id_pegawai');
		$this->db->where('master_pengikut.id_sppd', $id);
		$query = $this->db->get('master_pengikut');
		return $query->result();
	}
	public function biaya_harian($prov,$jab){
		$this->db->where('id_provinsi', $prov);
		$this->db->where('id_jabatan', $prov);
		$query = $this->db->get('master_biaya_harian');
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
	// sppd detail bagian detail para pegawai
	public function last_golongan($id){
		$this->db->where('id_pegawai',$id);
		$this->db->join('master_golongan', 'master_golongan.id_golongan = data_riwayat_golongan.id_golongan');
		$this->db->order_by('id_riwayat_golongan','desc');
		$query = $this->db->get('data_riwayat_golongan');
		return $query->row();
	}
	public function last_pangkat($id){
		$this->db->where('id_pegawai',$id);
		$this->db->join('master_pangkat', 'master_pangkat.id_pangkat = data_riwayat_pangkat.id_pangkat');
		$this->db->order_by('id_riwayat_pangkat','desc');
		$query = $this->db->get('data_riwayat_pangkat');
		return $query->row();
	}
	public function last_eselon($id){
		$this->db->where('id_pegawai',$id);
		$this->db->join('master_eselon', 'master_eselon.id_eselon = data_riwayat_eselon.id_eselon');
		$this->db->order_by('id_riwayat_eselon','desc');
		$query = $this->db->get('data_riwayat_eselon');
		return $query->row();
	}
	public function last_jabatan($id){
		$this->db->where('id_pegawai',$id);
		$this->db->join('master_jabatan', 'master_jabatan.id_jabatan = data_riwayat_jabatan.id_jabatan');
		$this->db->order_by('id_riwayat_jabatan','desc');
		$query = $this->db->get('data_riwayat_jabatan');
		return $query->row();
	}
	public function last_satuan_kerja($id){
		$this->db->where('id_pegawai',$id);
		$this->db->join('master_satuan_kerja', 'master_satuan_kerja.id_satuan_kerja = data_riwayat_jabatan.id_satuan_kerja');
		$this->db->order_by('id_riwayat_jabatan','desc');
		$query = $this->db->get('data_riwayat_jabatan');
		return $query->row();
	}
}
