<div id="modal_event" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Tambah Data</h4>
            </div>
            <div class="modal-body">
                <span id="form_result_event"></span>
                <form autocomplete="off" method="post" id="form_event" class="form-horizontal">
                    @csrf
                    <div class="form-container">
                        <div class="form-group">
                            <label for="event_name">Nama Event</label>
                            <input class="form-control" type="text" id="event_name" name="event_name">
                        </div>

                        <div class="form-group">
                            <label for="event_date">Tanggal</label>
                            <input class="form-control" type="date" id="event_date" name="event_date">
                        </div>

                        <div class="form-group">
                            <label for="venue">Lokasi</label>
                            <input class="form-control" type="text" id="venue" name="venue">
                        </div>

                        <div class="form-group">
                            <label for="price">Harga Tiket</label>
                            <input class="form-control qty" type="text" id="price" name="price">
                        </div>

                        <div class="form-group">
                            <label for="description">Deskripsi</label>
                            <input class="form-control" type="text" id="description" name="description">
                        </div>

                        <div class="form-group" align="center">
                            <input type="hidden" name="action" class="action" id="action" value="Add" />
                            <input type="hidden" name="id_event" id="id_event_edit" />
                            <input type="submit" name="action_button" id="form_ts" class="action btn btn-success"
                                value="Simpan" />
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
