<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

        <title>@yield('title')</title>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="{{ route('index') }}" style="padding: 5px 20px;  background-color: #4f4f4f">Aplikasi Penjadwalan</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                {{-- <ul class="navbar-nav">
                </ul> --}}
                <div class="btn-group mr-5">
                    <a class="btn btn-outline-success" onclick="showCreateModal()">Tambah</a>
                </div>
                <div class="input-group" style="max-width: 50%">
                    <input type="text" class="form-control input-jadwal" disabled placeholder="Jadwal">
                    <input type="hidden" class="form-control input-hidden" disabled placeholder="Jadwal">
                    <div class="input-group-append">
                        <a class="btn btn-outline-warning" onclick="showUpdateModal()">Ubah</a>
                        <a class="btn btn-outline-info pr-3 pl-3" onclick="showStatusModal()">Setel Status</a>
                        <a class="btn btn-outline-danger" onclick="showDeleteModal()">Hapus</a>
                    </div>
                </div>
            </div>
        </nav>
{{-- ======================================= --}}
        @yield('content')
        
{{-- ========================================================== --}}
    </body>
    <footer>
        {{-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> --}}
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
        
    </footer>

</html>