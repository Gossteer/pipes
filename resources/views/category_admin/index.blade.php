@extends('layouts.app', ['activePage' => 'category', 'titlePage' => __('Магазин')])

@section('content')
    @livewire('category-admin', ['categories' => $categories])
@endsection
