<!-- Modal -->
<div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="form-update">
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
                        <label for="aktivitas_edit">Aktivitas</label>
                        <input type="text" class="form-control" id="aktivitas_edit" required name="aktivitas" placeholder="Masukkan Aktivitas">
                    </div>
                    <div class="form-group">
                        <label for="tanggal_mulai_edit">Mulai Aktivitas</label>
                        <input type="date" required name="mulai" class="form-control" id="tanggal_mulai_edit" placeholder="Tanggal Mulai">
                    </div>
                    <div class="form-group">
                        <label for="tanggal_selesai_edit">Selesai Aktivitas</label>
                        <input type="date" required name="selesai" class="form-control" id="tanggal_selesai_edit" placeholder="Tanggal Selesai">    
                    </div>
                    <div class="form-group">
                        <label for="id_metode_edit">Metode</label>
                        <select class="form-control" name="id_metode" id="id_metode_edit" required>
                            @php
                                $metode = DB::table('metode')->where('metode', '!=', 'Job Assignment')->get();
                            @endphp
                            @foreach ($metode as $part_metode)
                                <option value="{{ $part_metode->id }}">{{ $part_metode->metode }}</option>
                            @endforeach
                        </select>    
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button form="form-update" type="submit" class="btn btn-primary">Ubah</button>
                </div>
            </form>
        </div>
    </div>
</div>