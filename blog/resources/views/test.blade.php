@extends('layout.main')
sd
@section('sidebar')
The current UNIX timestamp is {{ time() }}.
{!!time()!!}
    <p>This is appended.</p>
@endsection
