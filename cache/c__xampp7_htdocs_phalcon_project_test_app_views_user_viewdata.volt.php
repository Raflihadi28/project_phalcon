<center>
    <?= $this->tag->form(['user/cari', 'role' => 'form']) ?>
</center>

<?php $v27927948131iterated = false; ?><?php $v27927948131iterator = $page->items; $v27927948131incr = 0; $v27927948131loop = new stdClass(); $v27927948131loop->self = &$v27927948131loop; $v27927948131loop->length = count($v27927948131iterator); $v27927948131loop->index = 1; $v27927948131loop->index0 = 1; $v27927948131loop->revindex = $v27927948131loop->length; $v27927948131loop->revindex0 = $v27927948131loop->length - 1; ?><?php foreach ($v27927948131iterator as $datas) { ?><?php $v27927948131loop->first = ($v27927948131incr == 0); $v27927948131loop->index = $v27927948131incr + 1; $v27927948131loop->index0 = $v27927948131incr; $v27927948131loop->revindex = $v27927948131loop->length - $v27927948131incr; $v27927948131loop->revindex0 = $v27927948131loop->length - ($v27927948131incr + 1); $v27927948131loop->last = ($v27927948131incr == ($v27927948131loop->length - 1)); ?><?php $v27927948131iterated = true; ?>
  <?php if ($v27927948131loop->first) { ?>
  <div class="card" style="margin-top: 150px;">
    <div class="card-header">
        <nav class="navbar navbar-expand-lg bg-light" style="margin-left: 50px; margin-right: 50px;">
        <form class="d-flex" role="search">
            <input class="form-control me-2" name="nama_user" type="search" placeholder="Cari Berdasarkan Nama" aria-label="Search">
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
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#editModalll<?= $datas->id_user ?>">Edit</button>
                <a href="<?= $this->url->get('user/hapus/' . $datas->id_user) ?>" type="button" class="btn btn-danger">Delete</a>
            </td>
                      </tr>
                      
                      
          <div class="modal fade" id="editModalll<?= $datas->id_user ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Pengguna</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                            </div>
                            <div class="modal-body">
                            <form action="<?= $this->url->get('user/update') ?>" method="post">
                                <div class="mb-3">
                                <input type="hidden" name="txt_id" value="<?= $datas->id_user ?>">
                                </div>
                                <div class="mb-3">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" class="form-control" name="txt_nama" value="<?= $datas->nama_user ?>" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" name="txt_email" value="<?= $datas->email_user ?>" aria-describedby="emailHelp">
                                </div>                      
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
      </tbody>
      
  <?php if ($v27927948131loop->last) { ?>
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
    <td> <a href="<?= $this->url->get('user/' . $datas->id_user) ?>" type="button" class="btn btn-primary">Back</a> </td>
    </div>
  </div>
  
  <?php } ?>
  <?php $v27927948131incr++; } if (!$v27927948131iterated) { ?>
      No data
  <?php } ?>
