@extends('layouts.app')

@section('content')
{{-- {{$superUser}} --}}

@if (Auth::user()->is_admin)

    @foreach ($users as $user )
        <ul>
            <li>
                {{$user->name}}
            </li>
        </ul>
    @endforeach

@else
    Non sei Admin!!
@endif
@endsection
