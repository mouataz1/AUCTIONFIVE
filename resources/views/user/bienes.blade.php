@extends('layouts.back_base')

@section('css')
 <!-- CSS Libraries -->
 <link rel="stylesheet" href="{{asset('backend/assets/modules/datatables/datatables.min.css')}}">
 <link rel="stylesheet" href="{{('backend/assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')}}">
 <link rel="stylesheet" href="{{('backend/assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css')}}">
@endsection

@section('title')
Bienes
@endsection

@section('main')
<div class="main-content" style="padding-top: 164px !important;">
<div class="section">
    <div class="section-body">
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
            <div class="row d-flex w-100">
                <div class="col-9">
                    <h4>Liste des Biens</h4>
                </div>
                <div class="col-3 float-end">
                    <a href="{{route('newBien')}}" class="btn btn-success">Ajouter</a>
                </div>
            </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped" id="table-1">
              <thead>
                <tr>
                  <th class="text-center">
                    #
                  </th>
                  <th>Titre</th>
                  <th>Description</th>
                  <th>Date de création</th>
                  <th>Date de fin</th>
                  <th>Prix initiale</th>
                  <th>Etat</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($biens as $b )
                    <tr>
                  <td>
                    1
                  </td>
                  <td>{{$b->title}}</td>
                  <td>{{$b->description}}</td>
                  <td> {{ date('j F, Y', strtotime($b->created_at))}}</td>
                  <td>{{ date('j F, Y', strtotime($b->due_at))}}</td>
                  <td>{{$b->initialPrice}} DH</td>
                  <td>
                    @if ($b->is_Approved)
                        @if ($b->is_active)
                            @if ($b->is_sold)
                                Vondu
                                @else
                                Disponible
                            @endif
                            @else
                            Non Activé
                        @endif

                    @elseif ($b->is_Approved != true)
                    En atten
                    @endif
                  </td>
                  <td>
                    <a href="#" class="btn btn-success">Afficher</a>
                    <a href="{{route('editBien', $b->id)}}" class="btn btn-warning">Modifier</a>
                    <a href="{{route('deleteBien', $b->id)}}" class="btn btn-danger">Suprimer</a>
                  </td>

                </tr>
                @endforeach

              </tbody>
            </table>
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
