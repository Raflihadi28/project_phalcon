  <?php $v16580057351iterated = false; ?><?php $v16580057351iterator = $page->items; $v16580057351incr = 0; $v16580057351loop = new stdClass(); $v16580057351loop->self = &$v16580057351loop; $v16580057351loop->length = count($v16580057351iterator); $v16580057351loop->index = 1; $v16580057351loop->index0 = 1; $v16580057351loop->revindex = $v16580057351loop->length; $v16580057351loop->revindex0 = $v16580057351loop->length - 1; ?><?php foreach ($v16580057351iterator as $datas) { ?><?php $v16580057351loop->first = ($v16580057351incr == 0); $v16580057351loop->index = $v16580057351incr + 1; $v16580057351loop->index0 = $v16580057351incr; $v16580057351loop->revindex = $v16580057351loop->length - $v16580057351incr; $v16580057351loop->revindex0 = $v16580057351loop->length - ($v16580057351incr + 1); $v16580057351loop->last = ($v16580057351incr == ($v16580057351loop->length - 1)); ?><?php $v16580057351iterated = true; ?>
  <?php if ($v16580057351loop->first) { ?>
  <div class="card" style="margin-top: 150px;">
    <div class="card-header">
<center> 
    <b>Hasil Cari</b>
  </center>
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
                <a href="<?= $this->url->get('user/hapus/' . $datas->id_user) ?>" onclick="return confirm('Apakah anda yakin ingin menghapus ?')" type="button" class="btn btn-danger">Delete</a>
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
  <?php if ($v16580057351loop->last) { ?>
      </table>
      <tr>
        <td align="center" colspan="3"><?= $this->tag->linkTo(['user/cari', '<i class="icon-fast-backward"></i> First', 'class' => 'btn btn-primary']) ?>
                <?= $this->tag->linkTo(['user/cari?page=' . $page->before, '<i class="icon-step-backward"></i> Previous', 'class' => 'btn btn-primary']) ?>
                <?= $this->tag->linkTo(['user/cari?page=' . $page->next, '<i class="icon-step-forward"></i> Next', 'class' => 'btn btn-primary']) ?>
                <?= $this->tag->linkTo(['user/cari?page=' . $page->last, '<i class="icon-fast-forward"></i> Last', 'class' => 'btn btn-primary']) ?>
            <br /><center>
        <span class="help-inline">Page <?= $page->current ?> Of <?= $page->total_pages ?></span></center>
            
        </td>
    </tr>
      <td> <a href="<?= $this->url->get('user/viewData/' . $datas->id_user) ?>" type="button" class="btn btn-primary">Back</a> </td>
    </div>
  </div>
  <?php } ?>
  <?php $v16580057351incr++; } if (!$v16580057351iterated) { ?>
      No data
  <?php } ?> 
  