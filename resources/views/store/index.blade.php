@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'store', 'title' => __('Store')])

@section('content')
    {{-- <x-many-hero/> --}}
    @livewire('store', ['stores' => $stores])

    @push('style')
        <link href="{{ asset('material') }}/css/store-bootstrap.css" rel="stylesheet" />
    @endpush
    @push('js')
        <script>

        </script>
    @endpush
@endsection
