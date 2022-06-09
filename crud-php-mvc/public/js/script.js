//ketika dokumen sudah siap, jalankan fungsi didalamnya
$(function() {

    $('.tampilModalUbah').on('click', function() {
        // console.log("OK");
        $('#formModalLabel').html('Ubah Data Member');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action', 'http://localhost/crud-php-mvc/public/member/ubah');
        $('#password').attr('type', 'text');

        const id = $(this).data('id');
        
        //run AJAX
        $.ajax({
            url: 'http://localhost/crud-php-mvc/public/member/getubah',
            data: {id : id},
            method: 'post',
            dataType : 'json',
            success: function(data) {
                $('#nama').val(data.nama_member);
                $('#email').val(data.email);
                $('#telp').val(data.telp);
                $('#alamat').val(data.alamat);
                $('#kota').val(data.kota);
                $('#provinsi').val(data.provinsi);
                $('#gender').val(data.gender);
                $('#username').val(data.userName);
                $('#password').val(data.password);
                $('#id').val(data.id);
            }
        });
    });
});