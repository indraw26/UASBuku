@extends('layouts.global')

@section('title')
    Create Book
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8">

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <form action="{{ route('peminjaman.store') }}" method="POST" class="shadow-sm p-3 bg-white">

                @csrf
                <div class="form-group row">
                    <label for="book_id" class="col-sm-3 col-form-label">Buku</label>
                    <select name="book_id" class="form-control">
                        @foreach ($books as $item)
                            <option value="{{ $item->id }}">
                                {{ $item->judul }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group row">
                    <label for="kategori_id" class="col-sm-3 col-form-label">Buku</label>
                    <select name="kategori_id" class="form-control">
                        @foreach ($kategori as $item)
                            <option value="{{ $item->id }}">
                                {{ $item->kategori }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group row">
                    <label for="lamaPinjam" class="col-sm-3 col-form-label">Lama Pinjam [Hari]</label>
                    <input type="number" name='lamaPinjam' class="form-control" placeholder="Contoh : 1">
                </div>

                <button class="btn btn-primary" name="save_action">Tambah</button>

                <a class="btn btn-secondary" href="{{ url('/peminjaman') }}">Kembali</a>
            </form>
        </div>
    </div>
@endsection

@section('footer-scripts')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
@endsection
