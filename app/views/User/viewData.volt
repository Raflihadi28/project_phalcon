<center>
    {{ form('user/cari', 'role': 'form') }}
</center>

{% for datas in page.items %}
  {% if loop.first %}
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
  {% endif %}
      <tbody>
          <tr>
              <td>{{ datas.id_user }}</td>
              <td>{{ datas.nama_user }}</td>
              <td>{{ datas.email_user }}</td>
              <td>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#editModalll{{ datas.id_user }}">Edit</button>
                <a href="{{ url('user/hapus/' ~ datas.id_user) }}" onclick="return confirm('Apakah anda yakin ingin menghapus ?')" type="button" class="btn btn-danger">Delete</a>
            </td>
                      </tr>
                      
                      <!-- edit data -->
          <div class="modal fade" id="editModalll{{ datas.id_user }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Pengguna</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                            </div>
                            <div class="modal-body">
                            <form action="{{ url('user/update') }}" method="post">
                                <div class="mb-3">
                                <input type="hidden" name="txt_id" value="{{ datas.id_user }}">
                                </div>
                                <div class="mb-3">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" class="form-control" name="txt_nama" value="{{ datas.nama_user }}" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" name="txt_email" value="{{ datas.email_user }}" aria-describedby="emailHelp">
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
        
                    <!-- hapus data -->
        <div class="modal fade" id="editModalll{{ datas.id_user }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Pengguna</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                            </div>
                            <div class="modal-body">
                            <form action="{{ url('user/update') }}" method="post">
                                <div class="mb-3">
                                <input type="hidden" name="txt_id" value="{{ datas.id_user }}">
                                </div>
                                <div class="mb-3">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" class="form-control" name="txt_nama" value="{{ datas.nama_user }}" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" name="txt_email" value="{{ datas.email_user }}" aria-describedby="emailHelp">
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
      
  {% if loop.last %}
      </table> 
      <tr>
        <td align="center" colspan="3">{{ link_to("user/viewData", '<i class="icon-fast-backward"></i> First', "class": "btn btn-primary") }}
                {{ link_to("user/viewData?page=" ~ page.before, '<i class="icon-step-backward"></i> Previous', "class": "btn btn-primary") }}
                {{ link_to("user/viewData?page=" ~ page.next, '<i class="icon-step-forward"></i> Next', "class": "btn btn-primary") }}
                {{ link_to("user/viewData?page=" ~ page.last, '<i class="icon-fast-forward"></i> Last', "class": "btn btn-primary") }}
            <br /><center>
        <span class="help-inline">Page {{ page.current }} Of {{ page.total_pages }}</span></center>
            
        </td>
    </tr>
    <br>
    <td> <a href="{{ url('user/' ~ datas.id_user) }}" type="button" class="btn btn-primary">Back</a> </td>
    </div>
  </div>
  
  {% endif %}
  {% else %}
      No data
  {% endfor %}
