@extends('layouts.global')

@section('title')
    Books
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif




            <div class="row mb-3">
                <div class="col-md-12 text-right">
                    <br>
                    <a href="{{ route('peminjaman.create') }}" class=" mr-5 mb-3 btn btn-primary">
                        Tambah
                    </a>
                </div>
            </div>
            <div class="table-responsive">

                <table class="table table-bordered table-stripped">
                    <thead>
                        <tr>
                            <th><b>No.</b></th>
                            <th><b>Buku</b></th>
                            <th><b>Kategori</b></th>
                            <th><b>Lama Pinjam</b></th>
                            <th><b>Edit / Hapus</b></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($peminjaman as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->books->judul }}</td>
                                <td>{{ $item->kategori->kategori }}</td>
                                <td>{{ $item->lamaPinjam }}</td>
                                <td>
                                    <form action="{{ route('peminjaman.destroy', $item->id) }}" method="POST">
                                        @csrf

                                        <a href="{{ route('peminjaman.edit', $item->id) }}" type="submit" class="btn btn-warning">Edit</a>

                                        @method('delete')
                                        <button type="submit" class="btn btn-xs btn-danger show_confirm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script type="text/javascript">
        $('.show_confirm').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                    title: `Are you sure you want to delete this record?`,
                    text: "If you delete this, it will be gone forever.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <!-- row end -->
    <!-- row end -->
@endsection
