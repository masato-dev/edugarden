@extends('layout.clients.main')
@component('components.common.notification.alert')

@endcomponent

@section('content')
    <div class="container">
        <h1>{{ $book->title }}</h1>
    </div>
@endsection