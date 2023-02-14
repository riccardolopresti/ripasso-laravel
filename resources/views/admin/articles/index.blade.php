@extends('layouts.app')

@section('content')
<a class="btn btn-success m-3" href="{{route('admin.articles.create')}}" role="button"><i class="fa-solid fa-plus"></i> Nuovo Progetto</a>
<ul>
    @foreach ($articles as $article )
        <li>
            <span>{{$article->title}} |</span>
            <span>{{$article->url}}</span>
        </li>
    @endforeach
</ul>

@endsection
