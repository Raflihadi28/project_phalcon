  {% for datas in page.items %}
  {% if loop.first %}
  <div class="card" style="margin-top: 150px;" id="isi">
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
  {% endif %}
      <tbody>
          <tr>
              <td>{{ datas.id_user }}</td>
              <td>{{ datas.nama_user }}</td>
              <td>{{ datas.email_user }}</td>
              <td>
                <a href='#exampleModal' class='btn btn-success btn-small' id='editId' data-toggle='modal' data-id="{{datas.id_user}}">Edit</a>
                <!-- <button type="button" class="btn btn-success" data-toggle="modal" data-target="#editModalll{{ datas.id_user }}">Edit</button> -->
                <!-- <a href="{{ url('user/hapus/' ~ datas.id_user) }}" onclick="return confirm('Apakah anda yakin ingin menghapus ?')" type="button" class="btn btn-danger">Delete</a> -->
                <a href='#deleteModal' class='btn btn-danger btn-small' id='deleteId' data-toggle='modal' data-id="{{datas.id_user}}">Delete</a>
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
                  <form action="{{ url('user/update') }}" id="frmUser">
                    <div class="form-group">
                      <label for="txt_nama">Nama</label>
                      <input type="hidden" id="id_user" name="id_user"  value="{{ datas.id_user }}"/>
                      <input type="text" class="form-control" id="nama_user" name="txt_nama" value="{{ datas.nama_user }}" placeholder="Masukan Nama User"/>
                    </div>	  
                    <div class="form-group">
                      <label for="txt_email">Email</label>
                      <input type="email" class="form-control" id="email_user" name="txt_email" value="{{ datas.email_user }}" placeholder="Masukan Email User"/>
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
                                <input type="hidden" id="id_user_d" name="id_user_d"/>
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
      <td> <a href="{{ url('user/viewData/' ~ datas.id_user) }}" type="button" class="btn btn-primary">Back</a> </td>
    </div>
  </div>
  
  {% endif %}
  {% else %}
      No data
  {% endfor %}
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
                    url: "{{ url('user/edit') }}",
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

        $.post("{{ url('user/save') }}", $("#frmUser").serialize(), function(res) {
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

        $.post("{{ url('user/delete') }}", { 'id_user': id }, function(res) {
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