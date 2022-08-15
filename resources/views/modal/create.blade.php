<!-- Modal -->
<div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="form-create">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambahkan Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @csrf
                @method("POST")
                <div class="form-group">
                    <label for="aktivitas">Aktivitas</label>
                    <input type="text" class="form-control" id="aktivitas" required name="aktivitas" placeholder="Masukkan Aktivitas">
                </div>
                <div class="form-group">
                    <label for="tanggal_mulai">Mulai Aktivitas</label>
                    <input type="date" required name="mulai" class="form-control" id="tanggal_mulai" placeholder="Tanggal Mulai">
                </div>
                <div class="form-group">
                    <label for="tanggal_selesai">Selesai Aktivitas</label>
                    <input type="date" required name="selesai" class="form-control" id="tanggal_selesai" placeholder="Tanggal Selesai">    
                </div>
                <div class="form-group">
                    <label for="id_metode">Metode</label>
                    <select class="form-control" name="id_metode" id="id_metode" required>
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
                <button form="form-create" type="submit" class="btn btn-primary">Tambahkan</button>
            </div>
            </form>
        </div>
    </div>
</div>