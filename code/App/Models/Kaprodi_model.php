<?php

class Kaprodi_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function login()
    {
        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $input_password = $_POST['password'];

            // Encrypt the input password using MD5
            $encrypted_password = md5($input_password);
            $query = "SELECT * FROM kaprodi WHERE email = :email AND password = :password";
            $this->db->query($query);
            $this->db->bind(':email', $email);
            $this->db->bind(':password', $encrypted_password);
            $result = $this->db->single();

            if ($result) {
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $encrypted_password;
                header('Location: ' . URL . '/Kaprodi/home');
                exit; // Add exit after redirecting the page
            } else {
                Flasher::setFlash('Invalid email or password', 'danger');
                header('Location: ' . URL . '/Kaprodi/index');
                exit;
            }
        }
    }

    public function getAllLowongan()
    {
        $query = "SELECT * FROM lowongan_magang WHERE status_lowongan = 'OPEN'";
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function getApproval()
    {
        $query = "SELECT * FROM lowongan_magang WHERE status_lowongan = 'WAITING'";
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function getNama()
    {
        $queryNama = "SELECT nama FROM kaprodi WHERE email=:email LIMIT 1";
        $this->db->query($queryNama);
        $this->db->bind(':email', $_SESSION['email']);
        return $this->db->single()['nama'];
    }

    public function terima($id)
    {
        $queryTerima = "UPDATE lowongan_magang SET status_lowongan = 'OPEN' WHERE id_lowongan = :id";
        $this->db->query($queryTerima);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function tolak($id)
    {
        $queryTolak = "UPDATE lowongan_magang SET status_lowongan = 'DECLINED' WHERE id_lowongan = :id";
        $this->db->query($queryTolak);
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }
}
