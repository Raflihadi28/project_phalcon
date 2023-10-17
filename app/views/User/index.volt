{{ form('/User/create', 'role': 'form') }}
<div class="card" style="margin-top: 300px;" id="indexdata">
   <div class="card-header">
    <form action="{{ url('user/create') }}" id="createForm" method="post" role="form">
      <div class="form-group">
          <label for="txt_nama">Nama</label>
          <input type="text" class="form-control" id="txt_nama" name="txt_nama" placeholder="Masukan Nama User"/>
      </div>  
      <div class="form-group">
          <label for="txt_email">Email</label>
          <input type="email" class="form-control" id="txt_email" name="txt_email" placeholder="Masukan Email User"/>
      </div>
      <button type="submit" class="btn btn-primary">Create</button>
    </form>
    </div>
   <div class="card-body">
   <?php
   echo Phalcon\Tag::linkTo("User/viewData", "Lihat Data");
   ?>
   </div>   
 </div>
 <script>
  $(document).ready(function() {
    $('#createForm').submit(function(e) {
        e.preventDefault();
        var form = $(this);

        $.ajax({
            type: 'post',
            url: form.attr('action'),
            data: form.serialize(),
            success: function(data) {
                // Proses respons dari server (misalnya, pesan sukses atau kesalahan)
                var obj = JSON.parse(data);
                if (obj.return) {
                    alert("Pengguna berhasil dibuat.");
                    window.location.href = "http://localhost:8080/phalcon_project/test/user/index";
                } else {
                    alert("Terjadi kesalahan. Pengguna tidak dapat dibuat.");
                }
            }
        });
    });
});

 </script>

 

