@extends('layouts/back_base')

@section('title')
Profile
@endsection

@section('css')
@endsection

@section('main')
<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Profile</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
          <div class="breadcrumb-item">Profile</div>
        </div>
      </div>
      <div class="section-body">
        <h2 class="section-title">Bonjour Mouataz</h2>
        <p class="section-lead">
          Modifier les informations de votre Profile
        </p>

        <div class="row mt-sm-4">
          <div class="col-12 col-md-12 col-lg-5">
            <div class="card profile-widget">
              <div class="profile-widget-header">
                <img alt="image" src="backend/assets/img/avatar/avatar-1.png" class="rounded-circle profile-widget-picture">
                <div class="profile-widget-items">
                  <div class="profile-widget-item">
                    <div class="profile-widget-item-label">Produits</div>
                    <div class="profile-widget-item-value">5</div>
                  </div>
                  <div class="profile-widget-item">
                    <div class="profile-widget-item-label">Mes enchères</div>
                    <div class="profile-widget-item-value">1</div>
                  </div>
                  <div class="profile-widget-item">
                    <div class="profile-widget-item-label">Revenue</div>
                    <div class="profile-widget-item-value">5000 DH</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="card profile-widget">
                <div class="profile-widget-header">

                  <div class="profile-widget-items">
                    <div class="form-group col-md-12 col-12">
                        <label>Modifier la photo de profile</label>
                        <input type="file" class="form-control" value="Ujang" required="">
                        <div class="invalid-feedback">
                          choisissez une photo
                        </div>
                      </div>
                  </div>
                  <div class="card-footer text-right">
                    <button class="btn btn-primary">Modifier La photo</button>
                  </div>
                </div>
              </div>
          </div>
          <div class="col-12 col-md-12 col-lg-7">
            <div class="card">
              <form action="{{ route('updateProfile', auth()->user()->id) }}" method="post" class="needs-validation" novalidate="">
                @csrf
                <div class="card-header">
                  <h4>Modifier vos information général</h4>


                </div>
                @if (session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                <div class="card-body">
                    <div class="row">
                      <div class="form-group col-md-6 col-12">
                        <label>Prénom</label>
                        <input type="text" class="form-control" name="name" value="{{auth()->user()->name}}"  required="">
                        <div class="invalid-feedback">
                          entrez votre prénom
                        </div>
                      </div>
                      <div class="form-group col-md-6 col-12">
                        <label>Nom</label>
                        <input type="text" class="form-control" name="lname" value="{{auth()->user()->lname}}" required="">
                        <div class="invalid-feedback">
                          entrez votre nom
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-7 col-12">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" value="{{auth()->user()->email}}" required="">
                        <div class="invalid-feedback">
                          Entrez votre numero temail
                        </div>
                      </div>
                      <div class="form-group col-md-5 col-12">
                        <label>Téléphone</label>
                        <input type="tel" class="form-control" name="phone" value="{{auth()->user()->phone}}">
                      </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-7 col-12">
                          <label>Ville</label>
                          <input type="text" class="form-control" name="city" value="{{auth()->user()->city}}" required="">
                          <div class="invalid-feedback">
                            Entrez votre numero ville
                          </div>
                        </div>
                        <div class="form-group col-md-5 col-12">
                          <label>ZIP CODE</label>
                          <input type="number" class="form-control" name="zip_code" value="{{auth()->user()->zip_code}}">
                        </div>
                      </div>

                      <div class="row">
                        <div class="form-group col-md-7 col-12">
                          <label>Address</label>
                          <input type="text" class="form-control" name="address" value="{{auth()->user()->address}}" required="">
                          <div class="invalid-feedback">
                            Entrez votre numero address
                          </div>
                        </div>
                        <div class="form-group col-md-5 col-12">
                          <label>Provance/région</label>
                          <input type="text" class="form-control" name="state" value="{{auth()->user()->state}}">
                        </div>
                      </div>
                      <div class="form-group col-md-7 col-12">
                        <label>CODE Pays</label>
                        <input type="text" class="form-control" name="country_code" value="{{auth()->user()->country_code}}" required="">
                        <div class="invalid-feedback">
                          Entrez votre numero address
                        </div>
                      </div>

                </div>
                <div class="card-footer text-right">
                  <button type="submit" class="btn btn-primary">Entrgidtere les modifications</button>
                </div>
              </form>
            </div>

            <div class="card">
                <form action="{{route('updateProfilePassword', auth()->user()->id)}}" method="post" class="needs-validation" novalidate="">
                    @csrf
                  <div class="card-header">
                    <h4>Modifier votre Mot de passe</h4>
                  </div>
                  @if (session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    @if (session()->has('error'))
                        <div class="alert alert-danger">
                            {{ session()->get('error') }}
                        </div>
                    @endif
                  <div class="card-body">
                      <div class="row">
                        <div class="form-group col-md-6 col-12">
                          <label>Anciene mot de pass</label>
                          <input type="password" name="old_password" class="form-control"  required="">
                          <div class="invalid-feedback">
                            entrez l'ancien mot de passe
                          </div>
                        </div>
                        <div class="form-group col-md-6 col-12">
                          <label>Nouveau Mot de pass</label>
                          <input type="password" name="password" class="form-control"  required="">
                          <div class="invalid-feedback">
                            entrez votre nouveau mot de passe
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group col-md-7 col-12">
                          <label>Confirmer Le mot de passe</label>
                          <input type="password" name="password_confirmation" class="form-control"  required="">
                          <div class="invalid-feedback">
                            Confirmer votre mot de passe
                          </div>
                        </div>

                      </div>
                  </div>
                  <div class="card-footer text-right">
                    <button class="btn btn-primary">Modifier Le mot de passe</button>
                  </div>
                </form>
              </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection

@section('js')
@endsection
