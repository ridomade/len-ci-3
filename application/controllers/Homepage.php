<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	
	 public function __construct() {
        parent::__construct();
        $this->load->model('Proyek_model');
		$this->load->model('Lokasi_model');
    }

    public function index() {
        $data['proyek'] = $this->Proyek_model->get_all();
		$data['lokasi'] = $this->Lokasi_model->get_all();
        $this->load->view('homepage', $data);
    }

	// Mengatur CRUD Lokaasi
	public function create_lokasi() {
        $this->load->view('lokasi/create');
    }

    public function store_lokasi() {
        $data = $this->input->post();
        $this->Lokasi_model->add($data);
        redirect('');
    }

    public function edit_lokasi($id) {
        $data['lokasi'] = $this->Lokasi_model->get_by_id($id);
        $this->load->view('lokasi/edit', $data);
    }
    

    public function update_lokasi($id) {
        $data = $this->input->post();
        $this->Lokasi_model->update($id, $data);
        redirect('');
    }

    public function delete_lokasi($id) {
        $this->Lokasi_model->delete($id);
        redirect('');
    }

	// Mengatur CRUD Proyek
    public function create_proyek() {
        $data['lokasi'] = $this->Proyek_model->get_all_lokasi();
        $this->load->view('proyek/create', $data);
    }

    public function store_proyek() {
        $data = array(
            'id' => null, 
            'namaProyek' => $this->input->post('namaProyek'),
            'client' => $this->input->post('client'),
            'tglMulai' => $this->input->post('tglMulai'),
            'tglSelesai' => $this->input->post('tglSelesai'),
            'pimpinanProyek' => $this->input->post('pimpinanProyek'),
            'keterangan' => $this->input->post('keterangan'),
            'lokasi' => array_map(function($id) {
                return array('id' => $id);
            }, $this->input->post('lokasi')),
            'createdAt' => date('Y-m-d\TH:i:s') 
        );

        $this->Proyek_model->add($data);
        redirect('');
    }

    public function edit_proyek($id) {
        $data['proyek'] = $this->Proyek_model->get_by_id($id);
        $data['lokasi'] = $this->Proyek_model->get_all_lokasi();
        $this->load->view('proyek/edit', $data);
    }

    public function update_proyek($id) {
        $data = array(
            'id' => $id,
            'namaProyek' => $this->input->post('namaProyek'),
            'client' => $this->input->post('client'),
            'tglMulai' => $this->input->post('tglMulai'),
            'tglSelesai' => $this->input->post('tglSelesai'),
            'pimpinanProyek' => $this->input->post('pimpinanProyek'),
            'keterangan' => $this->input->post('keterangan'),
            'lokasi' => array_map(function($id) {
                return array('id' => $id);
            }, $this->input->post('lokasi')),
            'createdAt' => date('Y-m-d\TH:i:s') 
        );
    
        $this->Proyek_model->update($id, $data);
        redirect('');
    }
    

    public function delete_proyek($id) {
        $this->Proyek_model->delete($id);
        redirect('');
    }
}
