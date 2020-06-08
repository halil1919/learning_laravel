@extends('backend')


@section('title')

    @endsection

@section('breadcrumb')
        @include('backend.kurumsal.breadcrumb')
    @endsection

@section('content')
        <div class="col-md-12">

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Ekleme Formu</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                @if($errors->any())

                    @foreach($errors->all() as $key)
                        {{ $key }}
                    @endforeach

                @endif

                <form action="{{ route('.admin.kurumsal.kurumsalekleforminsert')  }}" method="POST" enctype='multipart/form-data' role="form">
                    {{ csrf_field() }}
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Kurumsal Baslik</label>
                            <input name="baslik" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Kurumsal İçerik</label>
                            <input name="icerik" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputFile">Slider Resim</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input name="cover_img" type="file" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text" id="">Upload</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>

        </div>
    @endsection

@push('customCss')

    @endpush

@push('customJs')

@endpush

