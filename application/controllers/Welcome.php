<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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

    function __construct() {
        parent::__construct();
        date_default_timezone_set("Asia/Jakarta");
    }

	public function index() {
		$model=$this->MainModel;
		$data['tutor']=$model->get_all();
		$this->load->view('main', $data);
	}

	public function tambah() {
		$model=$this->MainModel;
		$this->form_validation->set_rules('tutorial', 'Tutorial', 'required',[
			'required' => 'Input wajib di isi',
		]);
		$this->form_validation->set_rules('kategori_tutorial', 'Kategori Tutorial', 'required',[
			'required' => 'Input wajib di isi',
		]);
		$this->form_validation->set_rules('konten_tutorial', 'Konten Tutorial', 'required',[
			'required' => 'Input wajib di isi',
		]);
		if ($this->form_validation->run() != false) {
            check_csrf();
			$model->add();
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible">
            <h4><i class="icon fa fa-check"></i> Sukses!</h4>Berhasil Proses Data</div>');
			redirect();
		} else {
			$this->load->view('dashboard/tambah');
		}
	}

	public function edit($id) {
		$model=$this->MainModel;
		$getRow = $model->get_where($id);
		if ($getRow->num_rows() < 1) {
			show_404();
		}
		$data['tutorial'] = $model->get_by_id($id);
		$this->load->view('dashboard/edit', $data);
	}

	public function patch() {
		$post = $this->input->post();
		$model=$this->MainModel;
		$this->form_validation->set_rules('tutorial', 'Tutorial', 'required',[
			'required' => 'Input wajib di isi',
		]);
		$this->form_validation->set_rules('kategori_tutorial', 'Kategori Tutorial', 'required',[
			'required' => 'Input wajib di isi',
		]);
		$this->form_validation->set_rules('konten_tutorial', 'Konten Tutorial', 'required',[
			'required' => 'Input wajib di isi',
		]);
		if ($post['id_tutorial']==null) {
			show_404();
			if ($this->form_validation->run() == false) {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible">
				<h4><i class="icon fa fa-trash"></i> Gagal!</h4>Gagal Proses Data</div>');
				$this->edit($post['id_tutorial']);
			}
		} else {
            check_csrf();
			$model->update();
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible">
            <h4><i class="icon fa fa-check"></i> Sukses!</h4>Berhasil Proses Data</div>');
			redirect();
		}
	}

	public function hapus($id) {
		$model=$this->MainModel;
		if ($id) {
			$model->delete($id);
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible">
			<h4><i class="icon fa fa-trash"></i> Terhapus!</h4>Data Terhapus</div>');
			redirect();
		}
	}
}
