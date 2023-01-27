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
<div class="card">
    <form action="{{route('updateBien', $bien->id)}}" method="POST">
        @csrf
        <div class="card-header">
            <h4>Modifier le Bien</h4>
        </div>
        <div class="card-body">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Titre du bien</label>
                    <input type="text" name="title" class="form-control" id="inputEmail4" value="{{$bien->title}}" placeholder="titre" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Category</label>
                    <select class="form-control" name="category_id" id="" required>
                        @foreach ( $categories as $c)
                            <option value="{{$c->id}}">{{$c->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="description">Description</label>
                    <textarea name="description" class="form-control" id="description"   required > {{$bien->description}}</textarea>
                </div>
                <div class="form-group col-md-6">
                    <label for="initialPrice">Prix initial</label>
                    <input type="number" name="initialPrice" class="form-control" value="{{$bien->initialPrice}}"  id="initialPrice" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="due_at">Date d'expiration</label>
                    <input type="date" name="due_at" class="form-control" value="{{$bien->due_at}}"  id="due_at" required>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Modifier</button>
        </div>
    </form>

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
