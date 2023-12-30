<?php 

class User extends Controller {
    public function index()
    {
        $data['judul'] = 'User Page';
        $this->view('Templates/header', $data);
        $this->view('User/user', $data);
        $this->view('Templates/footer');
    }
    
}