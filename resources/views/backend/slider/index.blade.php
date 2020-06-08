@extends('backend')


@section('title')

    @endsection

@section('breadcrumb')
        @include('backend.home.breadcrumb')
    @endsection

@section('content')
        <div class="col-md-12">
            {{ $data["veri"] }}
            <a  class="float-right" style="display:block;" href="{{ route('.admin.slider.addform') }}">Slider Ekle</a><br><br>
            @if(\Illuminate\Support\Facades\Session::get('message'))
                <div class="alert alert-danger alert">{{ \Illuminate\Support\Facades\Session::get('message') }}</div>
                @endif
            <div class="card card-primary">
                <div class="card-header">
                    <div class="card-title">
                        Ekko Lightbox
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach($slidertüm as $key)
                        <div class="col-sm-2">
                            <a href="{{ asset('uploads/'.$key->slider_resim) }}" data-toggle="lightbox" data-title="sample 1 - white" data-gallery="gallery">
                                <img src="{{ asset('uploads/'.$key->slider_resim) }}" class="img-fluid mb-2" alt="white sample"/>
                            </a><br>
                            <a href="{{ route('.admin.slider.slidersil',['id'=>$key->id]) }}">Sil</a>
                            <a href="{{ route('.admin.slider.sliderdüzenle',['id'=>$key->id]) }}">Düzenle</a>
                        </div>
                         @endforeach

                    </div>
                </div>
            </div>


        </div>
    @endsection

@push('customCss')

    @endpush

@push('customJs')
    <script src="{{ asset('backend//plugins/ekko-lightbox/ekko-lightbox.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/filterizr/jquery.filterizr.min.js') }}"></script>
    <!-- Page specific script -->
    <script>
        $(function () {



            $(document).on('click', '[data-toggle="lightbox"]', function(event) {
                event.preventDefault();
                $(this).ekkoLightbox({
                    alwaysShowClose: true
                });
            });

            $('.filter-container').filterizr({gutterPixels: 3});
            $('.btn[data-filter]').on('click', function() {
                $('.btn[data-filter]').removeClass('active');
                $(this).addClass('active');
            });
        })
    </script>
@endpush

