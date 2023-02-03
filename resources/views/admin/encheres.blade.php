@extends('layouts.back_base')

@section('css')
 <!-- CSS Libraries -->
 <link rel="stylesheet" href="{{asset('backend/assets/modules/datatables/datatables.min.css')}}">
 <link rel="stylesheet" href="{{('backend/assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')}}">
 <link rel="stylesheet" href="{{('backend/assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css')}}">
@endsection

@section('title')
Enchères
@endsection

@section('main')
<div class="main-content" style="padding-top: 164px !important;">
<div class="section">
    <div class="section-body">
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4>Liste des utilisateurs</h4>
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
                  <th>Publier Le</th>

                  <th>Términer le</th>
                  <th>Etat</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ( $encheres as $en)
                 <tr>
                  <td>
                    {{$en->id}}
                  </td>
                  <td>{{$en->title}}</td>
                  <td>{{ date('j F, Y', strtotime($en->created_at))}}</td>

                  <td>{{ date('j F, Y', strtotime($en->due_at))}}</td>
                  <td>En attent</td>

                  <td>
                    <a href="{{route('showBien', $en->id)}}" class="btn btn-success">Afficher</a>
                    <a href="#" class="btn btn-warning">Valider</a>
                    <a href="#" class="btn btn-danger">Rejeter</a>
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
