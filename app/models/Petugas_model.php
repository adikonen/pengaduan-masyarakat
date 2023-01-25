<?php

class Petugas_model
{
    private $db;
    private $table;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getPetugasByUsernamePassword($data)
    {
        $this->db->query("SELECT * FROM petugas WHERE username = :username AND password = :password");
        $this->db->bind('username', $data['username']);
        $this->db->bind('password', $data['password']);

        return $this->db->get();
    }

    public function getbyUsername($username)
    {
        $this->db->query("SELECT * FROM petugas WHERE username = :us");
        $this->db->bind('us', $username);

        return $this->db->first();
    }
}