@extends('layouts.global')

@section('title')
    Edit Book
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8">

            @if (session('status'))
                <div class="alert alert-success">
                    {{session('status')}}
                </div>
            @endif


            <form enctype="multipart/form-data" method="POST" action="{{route('books.update', [$books->id])}}" class="p-3 shadow-sm bg-white">
            @csrf
            <input type="hidden" name="_method" value="PUT">

            <label for="judul">Judul</label>
            <input type="text" class="form-control {{$errors->first('judul') ? "is-invalid" : ""}}"
                value="{{old('judul') ? old('judul') : $books->judul}}" name="judul" placeholder="book judul"> 
                <div class="invalid-feedback">
                    {{$errors->first('judul')}}
                </div>
                <br>

            <label for="penulis">Penulis</label> <br>
            <input type="text" class="form-control {{$errors->first('penulis') ? "is-invalid" : ""}}" value="{{old('penulis') ? old('penulis') : $books->penulis}}" name="penulis" placeholder="enter-a-penulis"> 
            <div class="invalid-feedback">
                {{$errors->first('penulis')}}
            </div>
            <br>

            <label for="penerbit">Penerbit</label> <br>
            <input type="text" class="form-control {{$errors->first('penerbit') ? "is-invalid" : ""}}" placeholder="penerbit" id="penerbit" name="penerbit" value="{{old('penerbit') ? old('penerbit') : $books->penerbit}}">
            <div class="invalid-feedback">
                {{$errors->first('penerbit')}}
            </div>
            <br>

            <label for="stok">Stok</label>
            <input placeholder="stok" value="{{old('stok') ? old('stok') : $books->stok}}" type="text" id="stok" name="stok" class="form-control {{$errors->first('stok') ? "is-invalid" : ""}}">
            <div class="invalid-feedback">
                {{$errors->first('stok')}}
            </div>
            <br>

            <label for="harga">Harga</label> <br>
            <input type="number" class="form-control {{$errors->first('harga') ? "is-invalid" : ""}}" name="harga"
                placeholder="harga" id="harga" value="{{old('harga') ? old('harga') : $books->harga}}"> 
                <div class="invalid-feedback">
                    {{$errors->first('harga')}}
                </div>
                <br>

            <button class="btn btn-primary" value="PUBLISH">Update</button>
            <a href="{{ url("/books") }}" class="btn btn-info">Kembali</a>
            </form>
        </div>
    </div>
@endsection

@section('footer-scripts')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
@endsection