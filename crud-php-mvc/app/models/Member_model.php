<?php

class Member_model {
    private $table = 'member';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllMember() {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getMemberById($id) {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahDataMember($data) {
        $nama = $data['tnama'];
        $email = $data['temail'];
        $telp = $data['ttelp'];
        $alamat = $data['talamat'];
        $kota = $data['tkota'];
        $provinsi = $data['tprovinsi'];
        $gender = $data['tgender'];
        $username = $data['tusername'];
        $password = $data['tpassword'];

        $this->db->query('SELECT if(max(id)is null,1,max(id)+1) as maks_id  FROM ' . $this->table);
        $data=$this->db->resultSet();
        foreach ($data as $rec){
            $id=$rec["maks_id"];
        }
        $this->db->query('INSERT INTO ' . $this->table . ' (id,nama_member,email,telp,alamat,kota,provinsi,gender,userName,password) 
        VALUES(:id,:nama, :email, :telp,:alamat,:kota,:provinsi,:gender,:username, :password)');
        $this->db->bind('id',$id);
        $this->db->bind('nama',$nama);
        $this->db->bind('email',$email);
        $this->db->bind('telp',$telp);
        $this->db->bind('alamat',$alamat);
        $this->db->bind('kota',$kota);
        $this->db->bind('provinsi',$provinsi);
        $this->db->bind('gender',$gender);
        $this->db->bind('username',$username);
        $this->db->bind('password',$password);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataMember($id) {
        $query = "DELETE FROM member WHERE id = :id";
        $this->db->query($query); //jalankan query nya
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function ubahDataMember($data) {
        $query = "UPDATE member SET
                    nama_member = :nama,
                    email = :email,
                    telp = :telp,
                    alamat = :alamat,
                    kota = :kota,
                    provinsi = :provinsi,
                    gender = :gender,
                    userName = :username,
                    password = :password
                  WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('telp', $data['telp']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('kota', $data['kota']);
        $this->db->bind('provinsi', $data['provinsi']);
        $this->db->bind('gender', $data['gender']);
        $this->db->bind('username', $data['username']);
        $this->db->bind('password', $data['password']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cariDataMember() {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM member WHERE nama_member LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }
} 