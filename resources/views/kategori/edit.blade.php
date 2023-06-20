@extends('layouts.global')


@section('title')
Edit category
@endsection

@section('pageTitle')
Edit Category
@endsection

@section('content')

<div class="col-md-8">

    @if (session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>
    @endif


    <form enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="{{route('kategori.update', [$category->id])}}"
        method="POST">

        @csrf
        <input type="hidden" value="PUT" name="_method">

        <label for="id">ID</label>
        <input type="text" class="form-control {{$errors->first('id') ? "is-invalid" : ""}}" name="id" value="{{old('id') ? old('id') : $category->id}}" disabled>
        <div class="invalid-feedback">
            {{$errors->first('id')}}
        </div>

        <label for="kategori">Jenis Kategori</label>
        <input type="text" class="form-control {{$errors->first('kategori') ? "is-invalid" : ""}}" name="kategori" value="{{old('kategori') ? old('kategori') : $category->kategori}}">
        <div class="invalid-feedback">
            {{$errors->first('kategori')}}
        </div>
        <br><br>

        <input type="submit" class="btn btn-primary" value="Update">

    </form>
</div>

@endsection
