@extends('backend')


@section('title')

    @endsection

@section('breadcrumb')
        @include('backend.kurumsal.breadcrumb')
    @endsection

@section('content')
        <div class="col-md-12 text-right">
            <a class="btn btn-primary" href="">Kurumsal Ekle</a>
        </div><br>
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Kurumsal Sayfaların Listesi</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Baslik</th>
                            <th>Resim</th>
                            <th style="width: 40px">İşlem</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($kurumsal as $key)
                        <tr>
                            <td>{{ $key->id }}</td>
                            <td>{{ $key->baslik }}</td>
                            <td>
                               @if(isset($key->cover_img))
                                    <img width="50" height="50" src="{{ asset('uploads/'.$key->cover_img)  }}">

                                   @endif

                            </td>
                            <td>
                                <a href="">Sil</a><br>
                                <a href="">Düzenle</a>
                            </td>
                        </tr>
                         @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 float-right">
                        <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                    </ul>
                </div>
            </div>


        </div>
    @endsection

@push('customCss')

    @endpush

@push('customJs')

@endpush

