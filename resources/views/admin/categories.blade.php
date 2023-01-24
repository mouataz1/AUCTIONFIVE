@extends('layouts.back_base')

@section('css')
 <!-- CSS Libraries -->
 <link rel="stylesheet" href="{{asset('backend/assets/modules/datatables/datatables.min.css')}}">
 <link rel="stylesheet" href="{{('backend/assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')}}">
 <link rel="stylesheet" href="{{('backend/assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css')}}">
@endsection

@section('title')
Categories
@endsection

@section('main')
<div class="main-content" style="padding-top: 164px !important;">
<div class="section">
    <div class="section-body">
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4>Basic DataTables</h4>
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

                  <th>Action</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    1
                  </td>
                  <td>Create a mobile app</td>
                  <td><a href="#" class="btn btn-warning">Modifier</a></td>
                  <td><a href="#" class="btn btn-danger">Suprimer</a></td>
                </tr>
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
