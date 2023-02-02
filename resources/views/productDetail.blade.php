@extends('layouts.front_base')
@section('title')
Bien | Enchérer
@endsection
@section('css')

@endsection
@section('content')
<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                    <a href="#">Women’s </a>
                    <span>Essential structured blazer</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Product Details Section Begin -->
<section class="product-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="product__details__pic">
                    <div class="product__details__pic__left product__thumb nice-scroll">
                        @foreach ($product->images as $m)
                        <a class="pt active" href="#product-{{$m->id}}">
                            <img src="{{asset('bien_imgs')}}/{{$m->link}}" alt="">
                        </a>
                        @endforeach


                    </div>
                    <div class="product__details__slider__content">
                        <div class="product__details__pic__slider owl-carousel">

                            @foreach ($product->images as $m)
                            <img data-hash="product-1" class="product__big__img"
                                src="{{asset('bien_imgs')}}/{{$m->link}}" alt="">
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="product__details__text">
                    <h3>{{$product->title}}</h3>

                    <div class="product__details__price">{{$product->initialPrice}} MAD</div>
                    <div class="alert alert-warning">
                        <p>Le dernier Propoder est : {{$biggest}} MAD</p>
                    </div>
                    <p>{{$product->description}}</p>
                    <div class="product__details__button">
                        <div class="quantity">

                            @if($product->due_at >= Carbon\Carbon::today())
                                @if (auth()->user())
                                <span>Enchérer ici</span>
                                @if(Session::has('error'))
                                    <div class="alert alert-danger">
                                        {{ Session::get('error') }}
                                        @php
                                            Session::forget('error');
                                        @endphp
                                    </div>
                                    @endif

                                    @if(Session::has('success'))
                                    <div class="alert alert-success">
                                        {{ Session::get('success') }}
                                        @php
                                            Session::forget('success');
                                        @endphp
                                    </div>
                                    @endif
                                <form action="{{route('addprice', $product->id)}}" method="POST">
                                    @csrf
                                    <div class="pro-qty">
                                    <input type="text" name="price" value="{{$biggest}}">

                                </div>
                                <button type="submit" class="cart-btn"><span class=""></span> Valider</button>
                                </form>

                                @else
                                <h3 class="text-warning">Vous devez etre connecter pour pouvoir enchérer</h3>
                                <a class="btn-btn-success" href="/login">Se connecter</a>
                                <p>Vous avez pas de compte ? <a href="/register">S'inscrire</a></p>
                                @endif

                            @else
                            <h3 class="text-warning">Date éxpiré</h3>
                            <p>Malhereusement la date limite d'enchérer a ce produit et éxpiré</p>
                            @endif

                        </div>


                    </div>
                    @if($product->due_at > Carbon\Carbon::today())
                    <div class="alert alert-success" role="alert">
                        <h4 class="alert-heading">La date limite d'enchérer dans</h4>
                        <p>{{ date('j F, Y', strtotime($product->due_at))}}</p>
                        <hr>

                    </div>
                    @endif



                </div>
            </div>
            <div class="col-lg-12">
                <div class="product__details__tab">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Description</a>
                        </li>


                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <h6>Description</h6>
                            <p>{{$product->description}}</p>
                        </div>


                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<!-- Product Details Section End -->
@endsection
@section('js')

@endsection
