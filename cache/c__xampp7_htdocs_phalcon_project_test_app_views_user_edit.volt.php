<?= $this->tag->form(['user/update', 'role' => 'form']) ?>
<!-- <div class="card">
   <div class="card-header">
<form>
   <div class="mb-3">
      <input type="hidden" name="txt_id" value=<?php echo $id ?>>
    </div>
   <div class="mb-3">
     <label for="name" class="form-label">Nama</label>
     <input type="text" class="form-control" name="txt_nama" value="<?php echo $nama ?>"aria-describedby="emailHelp">
   </div>
   <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input type="text" class="form-control" name="txt_email" value="<?php echo $email ?>" aria-describedby="emailHelp">
    </div>
   <button type="submit" class="btn btn-primary">Save</button>
 </form></div>
   <div class="card-body">
   <?php
   echo Phalcon\Tag::linkTo("User/viewData", "Kembali");
   ?>
   </div>
 </div> -->
 <!DOCTYPE html>
 <html>
 <head>
     <title>Edit Pengguna</title>
     <!-- Tautan ke Bootstrap CSS dan JavaScript (pastikan sudah diunduh atau menggunakan CDN) -->

 </head>
 <body>
     <h1>Edit Pengguna</h1>
     <link rel="stylesheet" href="path/to/bootstrap.min.css">
     <script src="path/to/bootstrap.min.js"></script>
     <!-- Tombol atau tautan untuk membuka modal -->
     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal">
         Edit Pengguna
     </button>
 
     <!-- Formulir edit pengguna yang berada dalam modal -->
     <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">Edit Pengguna</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <div class="modal-body">
                  <form>
                     <div class="mb-3">
                        <input type="hidden" name="txt_id" value=<?php echo $id ?>>
                      </div>
                     <div class="mb-3">
                       <label for="name" class="form-label">Nama</label>
                       <input type="text" class="form-control" name="txt_nama" value="<?php echo $nama ?>"aria-describedby="emailHelp">
                     </div>
                     <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" name="txt_email" value="<?php echo $email ?>" aria-describedby="emailHelp">
                      </div>
                     <button type="submit" class="btn btn-primary">Save</button>
                   </form>
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                     <button type="button" class="btn btn-primary">Simpan Perubahan</button>
                 </div>
             </div>
         </div>
     </div>
 </body>
 </html>
 