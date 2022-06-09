<div class="container mt-3">

    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash(); ?>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-lg-6">
            <button type="button" class="btn btn-primary tombolTambahDataProduk" data-bs-toggle="modal" data-bs-target="#formModalProduk">
                Tambah Data Produk
            </button>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-lg-6">
            <form action="<?= BASEURL;?>/produk/cari" method="post">
                <div class="input-group mb-1">
                    <input type="text" class="form-control" placeholder="Cari Produk" name="keyword" id="keyword" autocomplete="off" aria-describedby="button-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit" id="tombolCari">Cari</button>    
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
        <h1>Daftar Produk</h1>   
            <table class="table table-stripped">
            <thead>
            <tr>
                <th scope="col">Nama Produk</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($data['produk'] as $p) : ?>
            <tr>
                <td><?= $p['nama'];?></td>
                <td>
                <a href="<?= BASEURL; ?>/produk/detail/<?= $p['id'];?>" class="btn btn-primary">Detail</a>
                <a href="<?= BASEURL; ?>/produk/edit/<?= $p['id'];?>" class="btn btn-success">Edit</a>
                <a href="<?= BASEURL; ?>/produk/delProduk/<?= $p['id'];?>" class="btn btn-danger" onclick="return confirm('Yakin?');">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
            </tbody>
            </table>    
            <!-- <a href="<?= BASEURL; ?>/produk/tambah" class="btn btn-success mt-2">Tambah Data</a> -->
        </div>
    </div>
</div>

<!-- Modal Tambah-->
<div class="modal fade" id="formModalProduk" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel">Tambah Data Produk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL;?>/produk/tambah" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" id="id">
                <div class="form-group">
                    <label for="nama">Nama Barang</label>
                    <input type="text" name="tnama" id="nama" class="form-control">
                </div>
                <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="text" name="tharga" id="harga" class="form-control">
                </div>
                <div class="form-group">
                    <label for="stok">Jumlah Stok</label>
                    <input type="text" name="tjml" id="stok" class="form-control">
                </div>
                <div class="form-group">
                    <label for="ket">Keterangan</label>
                    <input type="text" name="tket" id="ket" class="form-control">
                </div>
                <div class="form-group foto-form">
                    <label for="foto">Gambar Produk</label>
                    <input type="file" name="foto" id="foto" class="form-control control-foto">
                </div>
            </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah Data</button>
                </form>
            </div>
        </div>
    </div>
</div>