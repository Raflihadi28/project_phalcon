{{ form('/User/create', 'role': 'form') }}
Halaman Input Data
<div class="card" style="margin-top: 300px;">
   <div class="card-header">
<form>
   <div class="mb-3">
     <label for="name" class="form-label">Nama</label>
     <input type="text" class="form-control" name="txt_nama" aria-describedby="emailHelp">
   </div>
   <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input type="text" class="form-control" name="txt_email" aria-describedby="emailHelp">
    </div>
   <button type="submit" class="btn btn-primary" >Save</button>
 </form>
    </div>
   <div class="card-body">
   <?php
   echo Phalcon\Tag::linkTo("User/viewData", "Lihat Data");
   ?>
   </div>   
 </div>
