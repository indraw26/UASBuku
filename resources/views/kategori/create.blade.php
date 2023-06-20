@extends('layouts.global')

@section('title')
    Create Book
@endsection

@section('content')


<div class="row">
    <div class="col-md-8">
        
        @if (session('status'))
            <div class="alert alert-success">
                {{session('status')}}
            </div>
        @endif
        
        <form action="{{route('kategori.store')}}" method="POST" class="shadow-sm p-3 bg-white">
        
            @csrf

            <label for="kategori">Jenis Kategori</label><br>
            <input type="text" class="form-control {{$errors->first('kategori') ? "is-invalid" : ""}}" name="kategori" placeholder="kategori Buku">
            <div class="invalid-feedback">
                {{$errors->first('kategori')}}
            </div>
            <br>


            <button class="btn btn-primary" name="save_action">Tambah</button>

            <a class="btn btn-secondary" href="{{ url('/kategori') }}">Kembali</a>
        </form>
    </div>
</div>

@endsection

@section('footer-scripts')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
@endsection