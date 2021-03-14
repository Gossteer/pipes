@extends('layouts.app', ['activePage' => 'store', 'titlePage' => __('Магазин')])

@section('content')
    @livewire('store-admin', ['stores' => $stores, 'categories' => $categories])
@endsection
