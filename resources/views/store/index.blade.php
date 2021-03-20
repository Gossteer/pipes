@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'store', 'title' => __('Store')])

@section('content')
    {{-- <x-many-hero/> --}}
    @livewire('store', ['stores' => $stores])

    @push('style')
        <link href="{{ asset('material') }}/css/store-bootstrap.css" rel="stylesheet" />
        <link href="{{ asset('material') }}/datepicker/css/datepicker-bs4.min.css" rel="stylesheet" />
    @endpush
    @push('js')
        <script src="{{ asset('material') }}/datepicker/js/datepicker-full.min.js"></script>
        <script src="{{ asset('material') }}/datepicker/js/locales/ru.js"></script>
        <script>
            const elem = document.querySelector('input[name="datepicker"]');
            const datepicker = new Datepicker(elem, {
                language: 'ru',
                disableTouchKeyboard: true,
                minDate: new Date(),
            });
            // $lol = datepicker.beforeShowDay(new Date());
            // $lol.enabled = false;
        </script>
    @endpush
@endsection
