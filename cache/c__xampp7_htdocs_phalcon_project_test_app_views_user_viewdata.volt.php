<center>
    <?= $this->tag->form(['user/cari', 'role' => 'form']) ?>
</center>

<?php $v23347780131iterated = false; ?><?php $v23347780131iterator = $page->items; $v23347780131incr = 0; $v23347780131loop = new stdClass(); $v23347780131loop->self = &$v23347780131loop; $v23347780131loop->length = count($v23347780131iterator); $v23347780131loop->index = 1; $v23347780131loop->index0 = 1; $v23347780131loop->revindex = $v23347780131loop->length; $v23347780131loop->revindex0 = $v23347780131loop->length - 1; ?><?php foreach ($v23347780131iterator as $datas) { ?><?php $v23347780131loop->first = ($v23347780131incr == 0); $v23347780131loop->index = $v23347780131incr + 1; $v23347780131loop->index0 = $v23347780131incr; $v23347780131loop->revindex = $v23347780131loop->length - $v23347780131incr; $v23347780131loop->revindex0 = $v23347780131loop->length - ($v23347780131incr + 1); $v23347780131loop->last = ($v23347780131incr == ($v23347780131loop->length - 1)); ?><?php $v23347780131iterated = true; ?>
  <?php if ($v23347780131loop->first) { ?>
  <div class="card" style="margin-top: 150px;" >
    <div class="card-header">
        <nav class="navbar navbar-expand-lg bg-light" style="margin-left: 50px; margin-right: 50px;">
        <form class="d-flex" role="search">
            <input class="form-control me-2" id="cariNama" name="nama_user" type="search" placeholder="Cari Berdasarkan Nama" aria-label="Search">
            <input class="btn btn-outline-primary" type="submit" value="cari">
        </form>
    </nav>
  <table class="table" style="margin-top: 20px;">
    <thead class="table-info">
          <tr>
              <th>Id</th>
              <th>Name</th>
              <th>Email</th>
              <th colspan=2>Action</th>
          </tr>
      </thead>
  <?php } ?>
      <tbody>
          <tr>
              <td><?= $datas->id_user ?></td>
              <td><?= $datas->nama_user ?></td>
              <td><?= $datas->email_user ?></td>
              <td>
                <a href='#exampleModal' class='btn btn-success btn-small' id='editId' data-toggle='modal' data-id="<?= $datas->id_user ?>">Edit</a>
                <!-- <button type="button" class="btn btn-success" data-toggle="modal" data-target="#editModalll<?= $datas->id_user ?>">Edit</button> -->
                <!-- <a href="<?= $this->url->get('user/hapus/' . $datas->id_user) ?>" onclick="return confirm('Apakah anda yakin ingin menghapus ?')" type="button" class="btn btn-danger">Delete</a> -->
                <a href='#deleteModal' class='btn btn-danger btn-small' id='deleteId' data-toggle='modal' data-id="<?= $datas->id_user ?>">Delete</a>
            </td>
                      </tr>
                      
                      <!-- form data -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Form User</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="<?= $this->url->get('user/update') ?>" id="frmUser">
                    <div class="form-group">
                      <label for="txt_nama">Nama</label>
                      <input type="hidden" id="id_user" name="id_user"  value="<?= $datas->id_user ?>">
                      <input type="text" class="form-control" id="nama_user" name="txt_nama" value="<?= $datas->nama_user ?>" placeholder="Masukan Nama User">
                    </div>	  
                    <div class="form-group">
                      <label for="txt_email">Email</label>
                      <input type="email" class="form-control" id="email_user" name="txt_email" value="<?= $datas->email_user ?>" placeholder="Masukan Email User">
                    </div>	  
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" onclick="editUser()" class="btn btn-primary">Save</button>
                </div>
              </div>
            </div>
          </div>
        
                    <!-- hapus data -->
                    <div class="modal fade" id="deleteModal" role="dialog">
                        <div class="modal-dialog modal-sm">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" id="id_user_d" name="id_user_d">
                                  <p>Are you sure to delete this user ?</p>
                            </div>
                            <div class="modal-footer">
                                 <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                <button type="button" onclick="deleteUser()" class="btn btn-primary">Yes</button>
                            </div>
                          </div>
                        </div>
                    </div>
      </tbody>
      
  <?php if ($v23347780131loop->last) { ?>
      </table> 
      <tr>
        <td align="center" colspan="3"><?= $this->tag->linkTo(['user/viewData', '<i class="icon-fast-backward"></i> First', 'class' => 'btn btn-primary']) ?>
                <?= $this->tag->linkTo(['user/viewData?page=' . $page->before, '<i class="icon-step-backward"></i> Previous', 'class' => 'btn btn-primary']) ?>
                <?= $this->tag->linkTo(['user/viewData?page=' . $page->next, '<i class="icon-step-forward"></i> Next', 'class' => 'btn btn-primary']) ?>
                <?= $this->tag->linkTo(['user/viewData?page=' . $page->last, '<i class="icon-fast-forward"></i> Last', 'class' => 'btn btn-primary']) ?>
            <br /><center>
        <span class="help-inline">Page <?= $page->current ?> Of <?= $page->total_pages ?></span></center>
            
        </td>
    </tr>
    <br>
    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">New User</button><br><br> -->
    <td> <a href="<?= $this->url->get('user/' . $datas->id_user) ?>" id="tambahdata" type="button" class="btn btn-primary">Back</a> </td>
    </div>
  </div>
  
  <?php } ?>
  <?php $v23347780131incr++; } if (!$v23347780131iterated) { ?>
      No data
  <?php } ?>

  <script>
    $(document).ready(function(){
        $('#exampleModal, #deleteModal').on('show.bs.modal', function (e) {
            var id = $(e.relatedTarget).data('id');
            if (!id) {
                $('#id_user').val(''); 
                $('#id_user_d').val('');
                $('#nama_user').val('');
                $('#email_user').val('');
            } else {
                $.ajax({
                    type: 'post',
                    url: "<?= $this->url->get('user/edit') ?>",
                    data:  { 'id': id },
                    success: function(data){
                        var user = JSON.parse(data);

                        $('#id_user').val(user.id_user);
                        $('#id_user_d').val(user.id_user);
                        $('#nama_user').val(user.nama_user);
                        $('#email_user').val(user.email_user);
                    }
                });
            }
        });
    });

    function editUser() {
        var obj;

        if ($('#nama_user').val().trim() == '') {
            $('#nama_user').focus();
            return false;
        }

        if ($('#email_user').val().trim() == '') {
            $('#email_user').focus();
            return false;
        }	

        $.post("<?= $this->url->get('user/save') ?>", $("#frmUser").serialize(), function(res) {
            obj = JSON.parse(res);
            if (obj.return) {
                $('#exampleModal').modal('hide');
                location.reload();
            } else {
                alert(obj.msg);
            }
        });
    }

    function deleteUser() {
        var obj, id = $('#id_user_d').val();

        $.post("<?= $this->url->get('user/delete') ?>", { 'id_user': id }, function(res) {
            obj = JSON.parse(res);
            if (obj.return) {
                $('#deleteModal').modal('hide');
                location.reload();
            } else {
                alert(obj.msg);
            }
        });
    }
</script>

