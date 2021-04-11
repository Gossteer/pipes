@extends('layouts.app', ['activePage' => 'recordings-admin', 'titlePage' => __('Записи')])

@section('content')
    @livewire('recordings-admin', ['recordings' => $recordings])
@endsection
