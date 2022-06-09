<div class="container mt-3">
    <table class="table table-borderless">
        <tr scope="row">
            <td>Nama</td>
            <td>: <?= $data['member']['nama_member']; ?></td>
        </tr>
        <tr scope="row">
            <td>Email</td>
            <td>: <?= $data['member']['email']; ?></td>
        </tr>
        <tr scope="row">
            <td>Telp</td>
            <td>: <?= $data['member']['telp']; ?></td>
        </tr>
        <tr scope="row">
            <td>Alamat</td>
            <td>: <?= $data['member']['alamat']; ?></td>
        </tr>
        <tr scope="row">
            <td>Kota</td>
            <td>: <?= $data['member']['kota']; ?></td>
        </tr>
        <tr scope="row">
            <td>Provinsi</td>
            <td>: <?= $data['member']['provinsi']; ?></td>
        </tr>
        <tr scope="row">
            <td>Gender</td>
            <td>: <?= $data['member']['gender']; ?></td>
        </tr>
        <tr scope="row">
            <td>Username</td>
            <td>: <?= $data['member']['userName']; ?></td>
        </tr>
    </table>
    <a href="<?= BASEURL; ?>/member" class="btn btn-primary">Kembali</a>
</div>