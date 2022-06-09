<?php

class Member extends Controller {
    public function index(){				
        $data['judul'] = 'Daftar Member';
        $data['member'] = $this->model('Member_model')->getAllMember();
        $this->view('templates/header', $data);
        $this->view('member/index', $data);
        $this->view('templates/footer2'); 	  
    }

    public function detail($id) {
        $data['judul'] = 'Detail Member';
        $data['member'] = $this->model('Member_model')->getMemberById($id);
        $this->view('templates/header', $data);
        $this->view('member/detail', $data);
        $this->view('templates/footer');
    }

    public function tambah() {
        $data['title'] = 'Tambah Member';  
        $this->view('templates/header', $data);
        $this->view('member/tambah');
        $this->view('templates/footer2');
    }

    public function insMember() {
        if($this->model('Member_model')->tambahDataMember($_POST) > 0) {
            //set flash message
            Flasher::setFlash('berhasil','ditambahkan','success');
            header('Location: ' . BASEURL . '/member');
            exit;
        } else {
            Flasher::setFlash('gagal','ditambahkan','danger');
            header('Location: ' . BASEURL . '/member');
            exit;
        }
    }

    public function getubah() {
        echo json_encode($this->model('Member_model') -> getMemberById($_POST['id']));
    }

    public function ubah() {
        if($this->model('Member_model')->ubahDataMember($_POST) > 0) {
            //set flash message
            Flasher::setFlash('berhasil','diubah','success');
            header('Location: ' . BASEURL . '/member');
            exit;
        } else {
            Flasher::setFlash('gagal','diubah','danger');
            header('Location: ' . BASEURL . '/member');
            exit;
        }
    }

    public function hapus($id) {
        if($this->model('Member_model')->hapusDataMember($id) > 0) {
            //set flash message
            Flasher::setFlash('berhasil','dihapus','success');
            header('Location: ' . BASEURL . '/member');
            exit;
        } else {
            Flasher::setFlash('gagal','dihapus','danger');
            header('Location: ' . BASEURL . '/member');
            exit;
        }
    }

    public function cari() {
        $data['judul'] = 'Daftar Member';
        $data['member'] = $this->model('Member_model')->cariDataMember();
        $this->view('templates/header', $data);
        $this->view('member/index', $data);
        $this->view('templates/footer2');
    }
}