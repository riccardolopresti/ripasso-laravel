@extends('layouts.app')


@section('content')
    <form class="m-5" action="{{route('admin.articles.store')}}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Titolo dell'articolo*</label>
            <input type="text" class="form-control" id="title" value="{{old('title')}}" name="title" placeholder="Titolo dell'articolo">
        </div>

        <div class="mb-3">
            <label for="url" class="form-label">Url dell'articolo*</label>
            <input type="text" class="form-control" id="url" value="{{old('url')}}" name="url" placeholder="Url dell'articolo">
        </div>

        <button type="submit" class="btn btn-success">Crea</button>

    </form>
@endsection
