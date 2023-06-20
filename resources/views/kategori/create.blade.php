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

            <label for="judul">Judul</label><br>
            <input type="text" class="form-control {{$errors->first('judul') ? "is-invalid" : ""}}" name="judul" placeholder="Judul Buku">
            <div class="invalid-feedback">
                {{$errors->first('judul')}}
            </div>
            <br>

            <label for="penulis">Penulis</label><br>
            <input type="text" class="form-control {{$errors->first('penulis') ? "is-invalid" : ""}}" name="penulis" placeholder="Penulis Buku">
            <div class="invalid-feedback">
                {{$errors->first('penulis')}}
            </div>
            <br>
            
            <label for="penerbit">Penerbit</label><br>
            <input type="text" class="form-control {{$errors->first('penerbit') ? "is-invalid" : ""}}" name="penerbit" placeholder="Penerbit">
            <div class="invalid-feedback">
                {{$errors->first('penerbit')}}
            </div>
            <br>

            <label for="stok">Stok</label><br>
            <input type="text" class="form-control {{$errors->first('stok') ? "is-invalid" : ""}}" name="stok" placeholder="Stok Buku">
            <div class="invalid-feedback">
                {{$errors->first('stok')}}
            </div>
            <br>

            <label for="harga">Harga</label><br>
            <input type="text" class="form-control {{$errors->first('harga') ? "is-invalid" : ""}}" name="harga" placeholder="Harga Buku">
            <div class="invalid-feedback">
                {{$errors->first('harga')}}
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

<script>



    $("#categories").select2({
        ajax: {
            url: "{{asset('/')}}ajax/categories/search",
            processResults: function (data) {
                return {
                    results: data.map(function (item) {
                        return {
                            id: item.id,
                            text: item.name
                        }
                    })
                }
            }
        }
    });
</script>
@endsection