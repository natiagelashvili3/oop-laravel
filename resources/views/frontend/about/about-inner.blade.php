@extends('layout')

@section('test-content')
    <main>
        <h1>{{ $data['title'] }}</h1>
        <p>{{ $data['text'] }}</p>
    </main>
@endsection


@section('test-footer')
    <p>this is a about page footer</p>
@endsection