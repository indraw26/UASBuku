@extends('layouts.global')

@section('title')
    Books
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">

            {{-- @if (session('status'))
        <div class="alert alert-success">
            {{session('status')}}
        </div>
        @endif --}}

            <div class="row">
                <div class="col-md-6">
                    <form action="{{ route('books.index') }}">
                        <div class="input-group">
                            <input name="keyword" type="text" value="{{ Request::get('keyword') }}" class="form-control" placeholder="Filter by title">

                            <div class="input-group-append">
                                <input type="submit" value="Filter" class="btn btn-primary">
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-md-6">
                    <ul class="nav nav-pills card-header-pills">
                        <li class="nav-item">
                            <a class="nav-link {{ Request::get('status') == null && Request::path() == 'books' ? 'active' : '' }}" href="{{ route('books.index') }}">All</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::get('status') == 'publish' ? 'active' : '' }}" href="{{ route('books.index', ['status' => 'publish']) }}">Publish</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::get('status') == 'draft' ? 'active' : '' }}" href="{{ route('books.index', ['status' => 'draft']) }}">Draft</a>
                        </li>
                        {{-- <li class="nav-item">
                        <a class="nav-link {{Request::path() == 'books/trash' ? 'active' : ''}}"
                            href="{{route('books.trash')}}">Trash</a>
                    </li> --}}
                    </ul>
                </div>
            </div>

            <hr class="my-3">

            <div class="row mb-3">
                <div class="col-md-12 text-right">
                    <br>
                    <a href="{{ route('books.create') }}" class="btn btn-primary">
                        Tambah Buku
                    </a>
                </div>
            </div>

            <table class="table table-bordered table-stripped">
                <thead>
                    <tr>
                        <th><b>No</b></th>
                        <th><b>Judul</b></th>
                        <th><b>Penulis</b></th>
                        <th><b>Penerbit</b></th>
                        <th><b>Harga</b></th>
                        <th><b>Edit / Hapus</b></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($book as $item)
                        <tr>

                            <td>{{ $item->idBuku }}</td>
                            <td>{{ $item->judul }}</td>
                            <td>{{ $item->penulis }}</td>
                            <td>{{ $item->penerbit }}</td>
                            <td>{{ $item->harga }}</td>
                            <td>
                                <form action="{{ route('books.destroy', $item->idBuku) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button onclick="return confirm('are you sure?')" type="submit" class="btn btn-danger mb-1">Delete</button>
                                    <a href="" type="submit" class="btn btn-warning">Edit</a>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    {{-- @foreach ($books as $index => $book)
                <tr>
                    <td>{{$index +1}}</td>
                    <td>
                        @if ($book->cover)
                        <img src="{{asset('storage/'.$book->cover)}}" width="96px">
                        @endif
                    </td>
                    <td>{{$book->title}}</td>
                    <td>{{$book->author}}</td>
                    <td>
                        @if ($book->status == 'DRAFT')
                        <span class="badge bg-dark text-white">{{$book->status}}</span>
                        @else
                        <span class="badge badge-success">{{$book->status}}</span>
                        @endif
                    </td>
                    <td>
                        <ul class="pl-3">
                            @foreach ($book->categories as $category)
                            <li>{{$category->name}}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>{{$book->stock}}</td>
                    <td>{{$book->price}}</td>
                    <td>
                        <a href="{{route('books.edit', [$book->id])}}" class="btn btn-sm btn-info">Edit</a>

                        <form method="POST" class="d-inline" onsubmit="return confirm('Move book to trash?')"
                            action="{{route('books.destroy', [$book->id])}}">

                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="submit" value="Trash" class="btn btn-danger btn-sm">

                        </form>
                    </td>
                </tr>

                @endforeach --}}
                </tbody>
                <tfoot>
                    <tr>
                        {{-- <td colspan="10">
                        {{$books->appends(Request::all())->links()}}
                    </td> --}}
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection
