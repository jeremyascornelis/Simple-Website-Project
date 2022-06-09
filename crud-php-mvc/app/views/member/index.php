<div class="container mt-3">

    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash(); ?>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-lg-6">
            <a href="<?= BASEURL; ?>/member/tambah" style="text-decoration: none; color: #fff; font-size: 16px;">
                <button type="button" class="btn btn-primary" >
                    Tambah Data Member
                </button>
            </a>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-lg-6">
            <form action="<?= BASEURL;?>/member/cari" method="post">
                <div class="input-group mb-1">
                    <input type="text" class="form-control" placeholder="Cari Nama Member" name="keyword" id="keyword" autocomplete="off" aria-describedby="button-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit" id="tombolCari">Cari</button>    
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
        <h1>Daftar Member</h1>   
            <table class="table table-stripped">
            <thead>
            <tr>
                <th scope="col">Nama</th>
                <th scope="col">Email</th>
                <th scope="col">Telp</th>
                <th scope="col">Gender</th>
                <th scope="col">Username</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($data['member'] as $mbr) : ?>
            <tr>
                <td><?= $mbr['nama_member'];?></td>
                <td><?= $mbr['email'];?></td>
                <td><?= $mbr['telp'];?></td>
                <td><?= $mbr['gender'];?></td>
                <td><?= $mbr['userName'];?></td>
                <td>
                <a href="<?= BASEURL; ?>/member/detail/<?= $mbr['id'];?>" class="btn btn-primary">Detail</a>
                <a href="<?= BASEURL; ?>/member/ubah/<?= $mbr['id'];?>" class="btn btn-success tampilModalUbah" data-bs-toggle="modal" data-bs-target="#formModal" data-id="<?= $mbr["id"]; ?>">Edit</a>
                <a href="<?= BASEURL; ?>/member/hapus/<?= $mbr['id'];?>" class="btn btn-danger">Delete</a>
                </td>
                
            </tr>
            <?php endforeach; ?>
            </tbody>
            </table>    
        </div>
    </div>

</div>

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel">Tambah Data Member</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL;?>/member/ubah" method="POST">
                <input type="hidden" name="id" id="id">
                <div class="form-group">
                    <label for="nama">Nama Member</label>
                    <input type="text" name="nama" id="nama" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="telp">Telp</label>
                    <input type="text" name="telp" id="telp" class="form-control">
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" name="alamat" id="alamat" class="form-control">
                </div>
                <div class="form-group">
                    <label for="kota">Kota</label>
                    <input type="text" name="kota" id="kota" class="form-control">
                </div>
                <div class="form-group">
                    <label for="provinsi">Provinsi</label>
                    <input type="text" name="provinsi" id="provinsi" class="form-control">
                </div>
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <select name="gender" id="gender" class="form-control">
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control">
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