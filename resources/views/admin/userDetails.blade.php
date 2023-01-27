@extends('layouts.back_base')

@section('css')
<!-- CSS Libraries -->
<link rel="stylesheet" href="{{asset('backend/assets/modules/datatables/datatables.min.css')}}">
<link rel="stylesheet"
    href="{{('backend/assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{('backend/assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css')}}">
@endsection

@section('title')
Detail d'utilisateur
@endsection

@section('main')
<div class="main-content" style="padding-top: 164px !important;">
    <div class="section">
        <div class="section-body">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>{{$user->name}} {{$user->lname}}</h4>
                    <div class="card-header-action">
                        {{$user->country_code}}
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <p>email : {{$user->email}}</p>
                        </div>
                        <div class="col-6">
                            <p>Téléphone : {{$user->phone}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <p>Pays : {{$user->country_code}}</p>
                        </div>
                        <div class="col-6">
                            <p>Région : {{$user->state}}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">

                    @foreach ($products as $p)
                    <div class="col-12 col-md-6 col-lg-3">
                         <div class="card card-primary">
                        <div class="card-header">
                            <h4>{{$p->title}}</h4>
                        </div>
                        <div class="card-body">
                            <p>State <code>{{$p->is_Approved? "Apprevé":"En attend de verifivation"}}</code></p>
                        </div>
                        <a href="{{route('showBien', $p->id)}}" class="btn btn-success m-3">Afficher</a>
                    </div>
                </div>
                    @endforeach



            </div>
        </div>
    </div>
    @endsection

    @section('js')
    <!-- JS Libraies -->
    <script src="{{('backend/assets/modules/datatables/datatables.min.js')}}"></script>
    <script src="{{('backend/assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{('backend/assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js')}}"></script>
    <script src="{{('backend/assets/modules/jquery-ui/jquery-ui.min.js')}}"></script>

    <!-- Page Specific JS File -->
    <script src="{{('backend/assets/js/page/modules-datatables.js')}}"></script>
    @endsection
