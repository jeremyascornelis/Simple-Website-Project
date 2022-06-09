<div class="container mt-3">
 <form action="<?= BASEURL; ?>/member/insMember" method="POST" enctype="multipart/form-data">
		<div class="mb-3">
		  <label for="l2" class="form-label">Nama member</label>
		  <input type="text" class="form-control" id="nama" name="tnama" placeholder="Nama member" required>
		</div>	
		<div class="mb-3">
		  <label for="l3" class="form-label">Email</label>
		  <input type="text" class="form-control" id="hrg" name="temail"  placeholder="Email" required> 
		</div>
		<div class="mb-3">
		  <label for="l4" class="form-label">Telp</label>
		  <input type="text" class="form-control" id="jml" name="ttelp"  placeholder="Telp" required> 
		</div>
		<div class="mb-3">
		  <label for="l5" class="form-label">Alamat</label>
		  <input type="text" class="form-control" id="ket" name="talamat"  placeholder="Alamat" required> 
		</div>
		<div class="mb-3">
		  <label for="l6" class="form-label">Kota</label>
		  <input type="text" class="form-control" id="nama" name="tkota" placeholder="Kota" required>
		</div>	
		<div class="mb-3">
		  <label for="l7" class="form-label">Provinsi</label>
		  <input type="text" class="form-control" id="hrg" name="tprovinsi"  placeholder="Provinsi" required> 
		</div>
		<div class="mb-3">
          <label for="gender" class="form-label">Gender</label>
            <select name="tgender" id="gender" class="form-control">
                <option value="Laki-Laki">Laki-Laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
		</div>
		<div class="mb-3">
		  <label for="l9" class="form-label">Username</label>
		  <input type="text" class="form-control" id="ket" name="tusername"  placeholder="Username" required> 
		</div>
		<div class="mb-3">
		  <label for="l10" class="form-label">Password</label>
		  <input type="password" class="form-control" id="ket" name="tpassword"  placeholder="Password" required> 
		</div>
	    <div class="mb-3">
		   <button class="btn btn-primary" type="submit">Simpan</button>		   
		   <a href="<?= BASEURL; ?>/member" class="btn btn-primary mt-2">Kembali</a>
	    </div>		
		
 </form>

</div>