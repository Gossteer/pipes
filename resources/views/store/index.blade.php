@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'store', 'title' => __('Store')])

@section('content')
    {{-- <x-many-hero/> --}}
    @livewire('store', ['stores' => $stores, 'recording_dates' => $recording_dates])
@endsection
