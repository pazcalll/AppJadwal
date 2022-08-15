<!-- Modal -->
<div class="modal fade" id="modalStatus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="form-status">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @csrf
                    @method("PUT")
                    <input type="hidden" name="id" id="id_edit">
                    <div class="form-group">
                        <input type="hidden" name="id" id="id_status">
                        <label for="id_metode_edit">Metode</label>
                        <select class="form-control" name="status" id="id_metode_edit" required>
                            <option value="0">Akan Datang</option>
                            <option value="1">Selesai</option>
                            <option value="2">Sedang Berlangsung</option>
                        </select>    
                    </div>
                    <p>
                        <small><i>Keterangan warna label:</i></small>
                    </p>
                    <div class="bg bg-success p-1">Jadwal Selesai</div>
                    <div class="bg bg-warning p-1">Jadwal Sedang Berlangsung</div>
                    <div class="bg bg-info p-1">Jadwal Akan Datang</div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button form="form-status" type="submit" class="btn btn-primary">Ubah</button>
                </div>
            </form>
        </div>
    </div>
</div>