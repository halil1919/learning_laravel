@extends('backend')


@section('title')

    @endsection

@section('breadcrumb')
        @include('backend.home.breadcrumb')
    @endsection

@section('content')
        <div class="col-md-12">

            {{ $data['veri'] }}

            @php
            $veri  = 12;
            echo($veri);
            @endphp

        </div>
    @endsection

@push('customCss')

    @endpush

@push('customJs')

@endpush

