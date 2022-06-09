<?php

class Produk extends Controller {
    public function index(){				
        $data['judul'] = 'Daftar Produk';
        $data['produk'] = $this->model('Produk_model')->getAllProduct();
        $this->view('templates/header', $data);
        $this->view('produk/index', $data);
        $this->view('templates/footer'); 	  
    
    }
   
    public function detail($id){
      $data['judul'] = 'Detail Produk';
      $data['produk'] = $this->model('Produk_model')->getProductById($id);
      $this->view('templates/header', $data);
      $this->view('produk/detail', $data);
      $this->view('templates/footer');
    }

    public function tambah() {
      if($this->model('Produk_model')->add($_POST, $_FILES['foto'])) {
          //set flash message
          Flasher::setFlash('berhasil','ditambahkan','success');
          header('Location: ' . BASEURL . '/produk');
          exit;
      } else {
          Flasher::setFlash('gagal','ditambahkan','danger');
          header('Location: ' . BASEURL . '/produk');
          exit;
      }
    }

    public function edit($id){

      $data['judul'] = 'Detail Produk';
      $data['produk'] = $this->model('Produk_model')->getProductById($id);
      $this->view('templates/header', $data);
      $this->view('produk/edit', $data);
      $this->view('templates/footer');
    }

    public function updProduk(){  
      $this->model('Produk_model')->edit($_POST,$_FILES['foto']);
      header("location:".BASEURL."/produk");
    }
    
    public function delProduk($id){       
      $this->model('Produk_model')->del($id);	
      header("location:".BASEURL."/produk");
    }

    public function cari() {
      $data['judul'] = 'Daftar Produk';
      $data['produk'] = $this->model('Produk_model')->cariDataProduk();
      $this->view('templates/header', $data);
      $this->view('produk/index', $data);
      $this->view('templates/footer');
  }
}