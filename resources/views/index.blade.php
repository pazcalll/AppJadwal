@extends('layouts.template')

@section('title')
    Halaman Utama
@endsection

@section('content')
<br>
<div class="container-fluid">
    <table class="table">
        <thead class="thead-dark">
            <tr>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
    
    @include('modal.create')
    @include('modal.update')
    @include('modal.delete')
    @include('modal.status')
    <script>
        $(document).ready(function() {
            prepTable()
        })
        function prepTable() {
            let bulan = []
            bulan[0] = []
            bulan[1] = []
            bulan[2] = []
            bulan[3] = []
            bulan[4] = []
            bulan[5] = []
            let idContainer = []
            $.ajax({
                url: '{{ route("getAktivitas") }}',
                type: 'GET',
                success: (res) => {
                    // console.log(res)
                    $('.table tbody').html('')
                    let tbody = ``
                    res.forEach((data, _index) => {
                        if (_index+1 == res.length) {
                            tbody += `
                            <tr>
                                <th>${data.metode}</th>
                                <td colspan="6" style="background: #bfbfbf; text-align: center">Sesuai Penugasan</td>
                            </tr>
                        `
                        } else {    
                            tbody += `
                                <tr>
                                    <th>${data.metode}</th>
                                    <td>
                                        <ul>
                            `
                            data.aktivitas.forEach((jadwal, _index) => {
                                let parseBulan = parseInt(jadwal['mulai'][5]+jadwal['mulai'][6])
                                let tahunMulai = ''
                                let bulanMulai = ''
                                let hariMulai = ''
                                let tahunSelesai = ''
                                let bulanSelesai = ''
                                let hariSelesai = ''
                                let count = 0
                                for (let i = 0; i < 10; i++) {
                                    if (count == 0 && jadwal['mulai'][i] != '-') {
                                        tahunMulai += jadwal['mulai'][i]
                                        tahunSelesai += jadwal['selesai'][i]
                                    }else if(count == 1 && jadwal['mulai'][i] != '-'){
                                        bulanMulai += jadwal['mulai'][i]
                                        bulanSelesai += jadwal['selesai'][i]
                                    }else if(count == 2 && jadwal['mulai'][i] != '-'){
                                        hariMulai += jadwal['mulai'][i]
                                        hariSelesai += jadwal['selesai'][i]
                                    }else {
                                        count += 1
                                    }
                                }
                                if (parseBulan == 1) {
                                    tbody += `
                                        <li><span data-text="${jadwal['aktivitas']}"
                                    `
                                    if (jadwal['status']==null || jadwal['status']==0) {
                                        tbody += `class="badge p-3 badge-info" data-id="${jadwal['id']}" style="cursor: pointer" id="jadwal${jadwal['id']}">${jadwal['aktivitas']}<br>${hariMulai+"/"+bulanMulai+"/"+tahunMulai} - ${hariSelesai+"/"+bulanSelesai+"/"+tahunSelesai}</span></li>`
                                    }
                                    else if (jadwal['status']==1) {
                                        tbody += `class="badge p-3 badge-warning" data-id="${jadwal['id']}" style="cursor: pointer" id="jadwal${jadwal['id']}">${jadwal['aktivitas']}<br>${hariMulai+"/"+bulanMulai+"/"+tahunMulai} - ${hariSelesai+"/"+bulanSelesai+"/"+tahunSelesai}</span></li>`
                                    }
                                    else if (jadwal['status']==2) {
                                        tbody += `class="badge p-3 badge-success" data-id="${jadwal['id']}" style="cursor: pointer" id="jadwal${jadwal['id']}">${jadwal['aktivitas']}<br>${hariMulai+"/"+bulanMulai+"/"+tahunMulai} - ${hariSelesai+"/"+bulanSelesai+"/"+tahunSelesai}</span></li>`
                                    }
                                    idContainer.push(`#jadwal${jadwal['id']}`)
                                }
                            });
                            tbody += `
                                    <ul>
                                <td>
                            `
                            
                            data.aktivitas.forEach((jadwal, _index) => {
                                let parseBulan = parseInt(jadwal['mulai'][5]+jadwal['mulai'][6])
                                let tahunMulai = ''
                                let bulanMulai = ''
                                let hariMulai = ''
                                let tahunSelesai = ''
                                let bulanSelesai = ''
                                let hariSelesai = ''
                                let count = 0
                                for (let i = 0; i < 10; i++) {
                                    if (count == 0 && jadwal['mulai'][i] != '-') {
                                        tahunMulai += jadwal['mulai'][i]
                                        tahunSelesai += jadwal['selesai'][i]
                                    }else if(count == 1 && jadwal['mulai'][i] != '-'){
                                        bulanMulai += jadwal['mulai'][i]
                                        bulanSelesai += jadwal['selesai'][i]
                                    }else if(count == 2 && jadwal['mulai'][i] != '-'){
                                        hariMulai += jadwal['mulai'][i]
                                        hariSelesai += jadwal['selesai'][i]
                                    }else {
                                        count += 1
                                    }
                                }
                                if (parseBulan == 2) {
                                    tbody += `
                                        <li><span data-text="${jadwal['aktivitas']}"
                                    `
                                    if (jadwal['status']==null || jadwal['status']==0) {
                                        tbody += `class="badge p-3 badge-info" data-id="${jadwal['id']}" style="cursor: pointer" id="jadwal${jadwal['id']}">${jadwal['aktivitas']}<br>${hariMulai+"/"+bulanMulai+"/"+tahunMulai} - ${hariSelesai+"/"+bulanSelesai+"/"+tahunSelesai}</span></li>`
                                    }
                                    else if (jadwal['status']==1) {
                                        tbody += `class="badge p-3 badge-warning" data-id="${jadwal['id']}" style="cursor: pointer" id="jadwal${jadwal['id']}">${jadwal['aktivitas']}<br>${hariMulai+"/"+bulanMulai+"/"+tahunMulai} - ${hariSelesai+"/"+bulanSelesai+"/"+tahunSelesai}</span></li>`
                                    }
                                    else if (jadwal['status']==2) {
                                        tbody += `class="badge p-3 badge-success" data-id="${jadwal['id']}" style="cursor: pointer" id="jadwal${jadwal['id']}">${jadwal['aktivitas']}<br>${hariMulai+"/"+bulanMulai+"/"+tahunMulai} - ${hariSelesai+"/"+bulanSelesai+"/"+tahunSelesai}</span></li>`
                                    }
                                    idContainer.push(`#jadwal${jadwal['id']}`)
                                }
                            });
                            tbody += `
                                    <ul>
                                <td>
                            `
                            
                            data.aktivitas.forEach((jadwal, _index) => {
                                let parseBulan = parseInt(jadwal['mulai'][5]+jadwal['mulai'][6])
                                let tahunMulai = ''
                                let bulanMulai = ''
                                let hariMulai = ''
                                let tahunSelesai = ''
                                let bulanSelesai = ''
                                let hariSelesai = ''
                                let count = 0
                                for (let i = 0; i < 10; i++) {
                                    if (count == 0 && jadwal['mulai'][i] != '-') {
                                        tahunMulai += jadwal['mulai'][i]
                                        tahunSelesai += jadwal['selesai'][i]
                                    }else if(count == 1 && jadwal['mulai'][i] != '-'){
                                        bulanMulai += jadwal['mulai'][i]
                                        bulanSelesai += jadwal['selesai'][i]
                                    }else if(count == 2 && jadwal['mulai'][i] != '-'){
                                        hariMulai += jadwal['mulai'][i]
                                        hariSelesai += jadwal['selesai'][i]
                                    }else {
                                        count += 1
                                    }
                                }
                                if (parseBulan == 3) {
                                    tbody += `
                                        <li><span data-text="${jadwal['aktivitas']}"
                                    `
                                    if (jadwal['status']==null || jadwal['status']==0) {
                                        tbody += `class="badge p-3 badge-info" data-id="${jadwal['id']}" style="cursor: pointer" id="jadwal${jadwal['id']}">${jadwal['aktivitas']}<br>${hariMulai+"/"+bulanMulai+"/"+tahunMulai} - ${hariSelesai+"/"+bulanSelesai+"/"+tahunSelesai}</span></li>`
                                    }
                                    else if (jadwal['status']==1) {
                                        tbody += `class="badge p-3 badge-warning" data-id="${jadwal['id']}" style="cursor: pointer" id="jadwal${jadwal['id']}">${jadwal['aktivitas']}<br>${hariMulai+"/"+bulanMulai+"/"+tahunMulai} - ${hariSelesai+"/"+bulanSelesai+"/"+tahunSelesai}</span></li>`
                                    }
                                    else if (jadwal['status']==2) {
                                        tbody += `class="badge p-3 badge-success" data-id="${jadwal['id']}" style="cursor: pointer" id="jadwal${jadwal['id']}">${jadwal['aktivitas']}<br>${hariMulai+"/"+bulanMulai+"/"+tahunMulai} - ${hariSelesai+"/"+bulanSelesai+"/"+tahunSelesai}</span></li>`
                                    }
                                    idContainer.push(`#jadwal${jadwal['id']}`)
                                }
                            });
                            tbody += `
                                    <ul>
                                <td>
                            `
                            
                            data.aktivitas.forEach((jadwal, _index) => {
                                let parseBulan = parseInt(jadwal['mulai'][5]+jadwal['mulai'][6])
                                let tahunMulai = ''
                                let bulanMulai = ''
                                let hariMulai = ''
                                let tahunSelesai = ''
                                let bulanSelesai = ''
                                let hariSelesai = ''
                                let count = 0
                                for (let i = 0; i < 10; i++) {
                                    if (count == 0 && jadwal['mulai'][i] != '-') {
                                        tahunMulai += jadwal['mulai'][i]
                                        tahunSelesai += jadwal['selesai'][i]
                                    }else if(count == 1 && jadwal['mulai'][i] != '-'){
                                        bulanMulai += jadwal['mulai'][i]
                                        bulanSelesai += jadwal['selesai'][i]
                                    }else if(count == 2 && jadwal['mulai'][i] != '-'){
                                        hariMulai += jadwal['mulai'][i]
                                        hariSelesai += jadwal['selesai'][i]
                                    }else {
                                        count += 1
                                    }
                                }
                                if (parseBulan == 4) {
                                    tbody += `
                                        <li><span data-text="${jadwal['aktivitas']}"
                                    `
                                    if (jadwal['status']==null || jadwal['status']==0) {
                                        tbody += `class="badge p-3 badge-info" data-id="${jadwal['id']}" style="cursor: pointer" id="jadwal${jadwal['id']}">${jadwal['aktivitas']}<br>${hariMulai+"/"+bulanMulai+"/"+tahunMulai} - ${hariSelesai+"/"+bulanSelesai+"/"+tahunSelesai}</span></li>`
                                    }
                                    else if (jadwal['status']==1) {
                                        tbody += `class="badge p-3 badge-warning" data-id="${jadwal['id']}" style="cursor: pointer" id="jadwal${jadwal['id']}">${jadwal['aktivitas']}<br>${hariMulai+"/"+bulanMulai+"/"+tahunMulai} - ${hariSelesai+"/"+bulanSelesai+"/"+tahunSelesai}</span></li>`
                                    }
                                    else if (jadwal['status']==2) {
                                        tbody += `class="badge p-3 badge-success" data-id="${jadwal['id']}" style="cursor: pointer" id="jadwal${jadwal['id']}">${jadwal['aktivitas']}<br>${hariMulai+"/"+bulanMulai+"/"+tahunMulai} - ${hariSelesai+"/"+bulanSelesai+"/"+tahunSelesai}</span></li>`
                                    }
                                    idContainer.push(`#jadwal${jadwal['id']}`)
                                }
                            });
                            tbody += `
                                    <ul>
                                <td>
                            `
                            
                            data.aktivitas.forEach((jadwal, _index) => {
                                let parseBulan = parseInt(jadwal['mulai'][5]+jadwal['mulai'][6])
                                let tahunMulai = ''
                                let bulanMulai = ''
                                let hariMulai = ''
                                let tahunSelesai = ''
                                let bulanSelesai = ''
                                let hariSelesai = ''
                                let count = 0
                                for (let i = 0; i < 10; i++) {
                                    if (count == 0 && jadwal['mulai'][i] != '-') {
                                        tahunMulai += jadwal['mulai'][i]
                                        tahunSelesai += jadwal['selesai'][i]
                                    }else if(count == 1 && jadwal['mulai'][i] != '-'){
                                        bulanMulai += jadwal['mulai'][i]
                                        bulanSelesai += jadwal['selesai'][i]
                                    }else if(count == 2 && jadwal['mulai'][i] != '-'){
                                        hariMulai += jadwal['mulai'][i]
                                        hariSelesai += jadwal['selesai'][i]
                                    }else {
                                        count += 1
                                    }
                                }
                                let mulai = ''
                                let selesai = ''
                                if (parseBulan == 5) {
                                    tbody += `
                                    <li><span data-text="${jadwal['aktivitas']}"
                                    `
                                    if (jadwal['status']==null || jadwal['status']==0) {
                                        tbody += `class="badge p-3 badge-info" data-id="${jadwal['id']}" style="cursor: pointer" id="jadwal${jadwal['id']}">${jadwal['aktivitas']}<br>${hariMulai+"/"+bulanMulai+"/"+tahunMulai} - ${hariSelesai+"/"+bulanSelesai+"/"+tahunSelesai}</span></li>`
                                    }
                                    else if (jadwal['status']==1) {
                                        tbody += `class="badge p-3 badge-warning" data-id="${jadwal['id']}" style="cursor: pointer" id="jadwal${jadwal['id']}">${jadwal['aktivitas']}<br>${hariMulai+"/"+bulanMulai+"/"+tahunMulai} - ${hariSelesai+"/"+bulanSelesai+"/"+tahunSelesai}</span></li>`
                                    }
                                    else if (jadwal['status']==2) {
                                        tbody += `class="badge p-3 badge-success" data-id="${jadwal['id']}" style="cursor: pointer" id="jadwal${jadwal['id']}">${jadwal['aktivitas']}<br>${hariMulai+"/"+bulanMulai+"/"+tahunMulai} - ${hariSelesai+"/"+bulanSelesai+"/"+tahunSelesai}</span></li>`
                                    }
                                    idContainer.push(`#jadwal${jadwal['id']}`)
                                }
                            });
                            tbody += `
                                    <ul>
                                <td>
                            `
                            
                            data.aktivitas.forEach((jadwal, _index) => {
                                let parseBulan = parseInt(jadwal['mulai'][5]+jadwal['mulai'][6])
                                let tahunMulai = ''
                                let bulanMulai = ''
                                let hariMulai = ''
                                let tahunSelesai = ''
                                let bulanSelesai = ''
                                let hariSelesai = ''
                                let count = 0
                                for (let i = 0; i < 10; i++) {
                                    if (count == 0 && jadwal['mulai'][i] != '-') {
                                        tahunMulai += jadwal['mulai'][i]
                                        tahunSelesai += jadwal['selesai'][i]
                                    }else if(count == 1 && jadwal['mulai'][i] != '-'){
                                        bulanMulai += jadwal['mulai'][i]
                                        bulanSelesai += jadwal['selesai'][i]
                                    }else if(count == 2 && jadwal['mulai'][i] != '-'){
                                        hariMulai += jadwal['mulai'][i]
                                        hariSelesai += jadwal['selesai'][i]
                                    }else {
                                        count += 1
                                    }
                                }
                                if (parseBulan == 6) {
                                    tbody += `
                                        <li><span data-text="${jadwal['aktivitas']}"
                                    `
                                    if (jadwal['status']==null || jadwal['status']==0) {
                                        tbody += `class="badge p-3 badge-info" data-id="${jadwal['id']}" style="cursor: pointer" id="jadwal${jadwal['id']}">${jadwal['aktivitas']}<br>${hariMulai+"/"+bulanMulai+"/"+tahunMulai} - ${hariSelesai+"/"+bulanSelesai+"/"+tahunSelesai}</span></li>`
                                    }
                                    else if (jadwal['status']==1) {
                                        tbody += `class="badge p-3 badge-warning" data-id="${jadwal['id']}" style="cursor: pointer" id="jadwal${jadwal['id']}">${jadwal['aktivitas']}<br>${hariMulai+"/"+bulanMulai+"/"+tahunMulai} - ${hariSelesai+"/"+bulanSelesai+"/"+tahunSelesai}</span></li>`
                                    }
                                    else if (jadwal['status']==2) {
                                        tbody += `class="badge p-3 badge-success" data-id="${jadwal['id']}" style="cursor: pointer" id="jadwal${jadwal['id']}">${jadwal['aktivitas']}<br>${hariMulai+"/"+bulanMulai+"/"+tahunMulai} - ${hariSelesai+"/"+bulanSelesai+"/"+tahunSelesai}</span></li>`
                                    }
                                    idContainer.push(`#jadwal${jadwal['id']}`)
                                }
                            });
                            tbody += `
                                    <ul>
                                <td>
                            `
                        }
                    });
                    $('.table tbody').html(tbody)
                    idContainer.forEach(id => {
                        $(id).click(function() {
                            $('.input-jadwal').val($(id).data('text'))
                            $('.input-hidden').val($(id).data('id'))
                        })
                    });
                    $("#modalCreate").modal('hide')
                }
            })
        }
    </script>
    <script>
        function showCreateModal() {
            $("#modalCreate").modal('show')
        }
        function showUpdateModal() {
            if ($('.input-jadwal').val() != "") {
                $.ajax({
                    url: `{{ url("api/get_aktivitas") }}/find/${$(".input-hidden").val()}`,
                    type: "GET",
                    success: (res) => {
                        console.log(res)
                        $("#aktivitas_edit").val(res.aktivitas)
                        let tahunMulai = ''
                        let bulanMulai = ''
                        let hariMulai = ''
                        let tahunSelesai = ''
                        let bulanSelesai = ''
                        let hariSelesai = ''
                        let count = 0
                        for (let i = 0; i < 10; i++) {
                            if (count == 0 && res['mulai'][i] != '-') {
                                tahunMulai += res['mulai'][i]
                                tahunSelesai += res['selesai'][i]
                            }else if(count == 1 && res['mulai'][i] != '-'){
                                bulanMulai += res['mulai'][i]
                                bulanSelesai += res['selesai'][i]
                            }else if(count == 2 && res['mulai'][i] != '-'){
                                hariMulai += res['mulai'][i]
                                hariSelesai += res['selesai'][i]
                            }else {
                                count += 1
                            }
                        }
                        console.log(hariMulai+"/"+bulanMulai+"/"+tahunMulai)
                        $("#tanggal_mulai_edit").val(tahunMulai+"-"+bulanMulai+"-"+hariMulai)
                        $("#tanggal_selesai_edit").val(tahunSelesai+"-"+bulanSelesai+"-"+hariSelesai)
                        $("#id_edit").val(res.id)
                        $("#id_metode_edit").val(res.id_metode)
                        $("#modalUpdate").modal('show')
                    }
                })
            }
        }
        function showDeleteModal() {
            if ($('.input-jadwal').val() != "") {
                $("#id_hapus").val($('.input-hidden').val())
                $('.aktivitas_hapus').html($('.input-jadwal').val());
                $("#modalDelete").modal('show')
            }
        }
        function showStatusModal() {
            if ($('.input-jadwal').val() != "") {
                $("#id_status").val($('.input-hidden').val())
                $("#modalStatus").modal('show')
            }
        }
        $('#form-create').on('submit', function(e) {
            e.preventDefault()
            $.ajax({
                url: "{{ route('createAktivitas') }}",
                type: "POST",
                data: $(this).serialize(),
                success: (res) => {
                    console.log('success')
                    prepTable()
                    $('#modalCreate').modal('hide')
                }
            })
        })
        $('#form-update').on('submit', function(e) {
            e.preventDefault()
            $.ajax({
                url: "{{ route('editAktivitas') }}",
                type: "PUT",
                data: $(this).serialize(),
                success: (res) => {
                    console.log('success')
                    prepTable()
                    $('#modalUpdate').modal('hide')
                }
            })
        })
        $('#form-delete').on('submit', function(e) {
            e.preventDefault()
            $.ajax({
                url: "{{ route('deleteAktivitas') }}",
                type: "DELETE",
                data: $(this).serialize(),
                success: (res) => {
                    console.log('success')
                    prepTable()
                    $('#modalDelete').modal('hide')
                }
            })
        })
        $('#form-status').on('submit', function(e) {
            e.preventDefault()
            $.ajax({
                url: "{{ route('setStatus') }}",
                type: "PUT",
                data: $(this).serialize(),
                success: (res) => {
                    console.log('success')
                    prepTable()
                    $('#modalStatus').modal('hide')
                }
            })
        })
    </script>
</div>
@endsection