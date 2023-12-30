<?php

class Kaprodi extends Controller
{
    public function index()
    {
        $data['judul'] = 'Login Page';
        $this->view('Templates/header', $data);
        $this->view('Kaprodi/login', $data);
        $this->view('Templates/footer');
    }

    public function login()
    {
        $this->model('Kaprodi_model')->login();
    }

    public function home()
    {
        $data['judul'] = 'Dashboard';
        $data['lowongan'] = $this->model('Kaprodi_model')->getAllLowongan();
        $data['nama'] = $this->model('Kaprodi_model')->getNama();
        $this->view('Templates/header', $data);
        $this->view('Kaprodi/navbar', $data);
        $this->view('Kaprodi/index', $data);
        $this->view('Templates/footer');
    }

    public function approval()
    {
        $data['judul'] = 'Approval Page';
        $data['lowongan'] = $this->model('Kaprodi_model')->getApproval();
        $data['nama'] = $this->model('Kaprodi_model')->getNama();
        $this->view('Templates/header', $data);
        $this->view('Kaprodi/navbar', $data);
        $this->view('Kaprodi/approvalLowongan', $data);
        $this->view('Templates/footer');
    }

    public function terima($id)
    {
        if ($this->model('Kaprodi_model')->terima($id) > 0) {
            Flasher::setFlash('Lowongan Diterima', 'success');
            header('Location: ' . URL . '/Kaprodi/approval');
            exit;
        }
    }

    public function tolak($id)
    {
        if ($this->model('Kaprodi_model')->tolak($id) > 0) {
            Flasher::setFlash('Lowongan Ditolak', 'danger');
            header('Location: ' . URL . '/Kaprodi/approval');
            exit;
        }
    }
}
