@extends('layouts.global')

@section('title')
    Create Book
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8">
            {{-- <form action="{{ route('peminjaman.update', $peminjaman->id) }}" method="post" class="shadow-sm p-3 bg-white">
                @csrf
                <input type="hidden" value="PUT" name="_method">
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
                    <input type="number" name='lamaPinjam' class="form-control" value={{ $peminjaman->lamaPinjam }}>
                </div>
                <input type="submit" class="btn btn-primary" value="Update">
                <a class="btn btn-secondary" href="{{ url('/peminjaman') }}">Kembali</a>
            </form> --}}
            <form enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="{{route('peminjaman.update', [$peminjaman->id])}}"
                method="POST">
        
                @csrf
                <input type="hidden" value="PUT" name="_method">
        
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
                    <input type="number" name='lamaPinjam' class="form-control" value={{ $peminjaman->lamaPinjam }}>
                </div>
                <input type="submit" class="btn btn-primary" value="Update">
                <a class="btn btn-secondary" href="{{ url('/peminjaman') }}">Kembali</a>
            </form>
        </div>
    </div>
@endsection