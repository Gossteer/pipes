@extends('layouts.app', ['activePage' => 'recordings-customer', 'titlePage' => __('Записи')])

@section('content')
    @livewire('recordings-customer', ['recordings' => $recordings])
@endsection
