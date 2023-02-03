@extends('layouts.back_base')

@section('css')
<!-- CSS Libraries -->
<link rel="stylesheet" href="{{asset('backend/assets/modules/datatables/datatables.min.css')}}">
<link rel="stylesheet"
    href="{{('backend/assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{('backend/assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css')}}">
@endsection

@section('title')
Bien Details
@endsection

@section('main')
<div class="main-content" style="padding-top: 164px !important;">
    <div class="section">
        <div class="section-body">
            <div class="card">
                <div class="row">
                    <div class="col-12 col-sm-6 col-lg-6">

                        <div class="card">
                            <div class="card-header">
                              <h4>{{$bien->title}}</h4>
                            </div>


                            <div class="card-body">
                                <div id="carouselExampleIndicators3" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        @foreach ($bien->images as $key => $m)
                                            <li data-target="#carouselExampleIndicators3" data-slide-to="{{$key}}" class="{{$key == 0 ? 'active' : ''}}"></li>
                                        @endforeach
                                    </ol>
                                    <div class="carousel-inner">
                                        @foreach ($bien->images as $key => $m)
                                            <div class="carousel-item {{$key == 0 ? 'active' : ''}}">
                                                <img class="d-block w-100" src="{{asset('bien_imgs/'.$m->link)}}" alt="{{$m->link}}">
                                            </div>
                                        @endforeach
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleIndicators3" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleIndicators3" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                          </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-6">

                      <div class="card" id="sample-login">
                        <div class="card">
                            <div class="card-header">
                              <h4>{{$bien->title}}</h4>
                            </div>
                            <div class="card-body">
                              <div class="row">
                                <div class="col-4">
                                  <div class="list-group" id="list-tab" role="tablist">
                                    <a class="list-group-item list-group-item-action active show" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-selected="true">Tiitre</a>
                                    <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-selected="false">Description</a>
                                    <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-selected="false">Date d'ajout / expiration</a>
                                    <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-selected="false">Prix proposé</a>
                                  </div>
                                </div>
                                <div class="col-8">
                                  <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade active show" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                                      {{$bien->title}}
                                    </div>
                                    <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
                                   {{$bien->description}}
                                    </div>
                                    <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">
                                     <h4><span class="text-bod">Ajouté le : </span>  {{ date('j F, Y', strtotime($bien->created_at))}}</h4>
                                     <h4><span class="text-bod">Date d'expiration  : </span>  {{ date('j F, Y', strtotime($bien->due_at))}}</h4>
                                    </div>
                                    <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">
                                     <ul class="list-group">
                                        @foreach ($bienPrices as $bp )
                                            <li class="list-item">{{$bp->amount}} dh par
                                                 @foreach ($users as $u)
                                                    @if ($u->id == $bp->user_id)
                                                        {{$u->name}} {{$u->lname}}
                                                    @endif
                                                 @endforeach
                                                  le <span class="text-success">{{ date('j F, Y', strtotime($bp->created_at))}}</span></li>
                                        @endforeach


                                     </ul>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                      </div>
                    </div>
                  </div>

            </div>
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
