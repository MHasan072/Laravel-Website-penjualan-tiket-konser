<div id="modal_user" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Pengguna</h4>
            </div>
            <div class="modal-body">
                <span id="form_result_user"></span>
                <form autocomplete="off" method="post" id="form_user" class="form-horizontal">
                    @csrf
                    <div class="form-container">
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input class="form-control" type="text" id="name" name="name">
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input class="form-control" type="email" id="email" name="email">
                        </div>

                        <div class="form-group">
                            <label for="no_hp">No HP</label>
                            <input class="form-control" type="text" id="no_hp" name="no_hp">
                        </div>

                        <div class="form-group" align="center">
                            <input type="hidden" name="action" class="action" id="action" value="Edit" />
                            <input type="hidden" name="id_user" id="id_user_edit" />
                            <input type="submit" name="action_button" id="form_user_btn" class="action btn btn-success"
                                value="Simpan" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
