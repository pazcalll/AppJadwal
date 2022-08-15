<!-- Modal -->
<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-delete">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    Apakah anda yakin ingin menghapus jadwal "<span class="aktivitas_hapus"></span>"?
                    <input type="hidden" name="id" id="id_hapus">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>