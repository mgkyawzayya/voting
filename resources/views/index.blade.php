@extends('layouts.template')
@section('content')
<nav class="navbar navbar-color-on-scroll navbar-transparent fixed-top navbar-expand-lg" color-on-scroll="100">
    <div class="container">
        <div class="navbar-translate">
        <a class="navbar-brand" href="">
            Voting</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon"></span>
            <span class="navbar-toggler-icon"></span>
            <span class="navbar-toggler-icon"></span>
        </button>
        </div>
        <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
            <a href="{{ url('/') }}" class="nav-link">
                <i class="material-icons">home</i>Home
            </a>
            </li>
            <li class="nav-item">
            <a href="{{ url('/kings') }}" class="nav-link">
                <i class="material-icons">king</i>King
            </a>
            </li>
            <li class="nav-item">
            <a href="{{ url('/queens') }}" class="nav-link">
                <i class="material-icons">queen</i>Queen
            </a>
            </li>
        </ul>
        </div>
    </div>
</nav>

<div class="page-header header-filter" data-parallax="true" style="background-image: url('assets/img/ucspkku.jpg')">
    <div class="container">
      <div class="row">
        <div class="col-md-8 ml-auto mr-auto">
          <div class="brand text-center">
            <h1>King & Queen Voting</h1>
            <h3 class="title text-center">2019 - 20 Fresher Welcome</h3>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="main main-raised">
      <h1 class="text-center title">Agenda</h1>
      <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 ml-auto mr-auto">
                <img src="{{ asset('/agenda/ag1.jpg') }}" alt="" class="img-raised rounded img-fluid">
            </div>
            <div class="col-lg-4 col-md-6 ml-auto mr-auto">
                <img src="{{ asset('/agenda/ag2.jpg') }}" alt="" class="img-raised rounded img-fluid">
            </div>
            <div class="col-lg-4 col-md-6 ml-auto mr-auto">
                <img src="{{ asset('/agenda/ag3.jpg') }}" alt="" class="img-raised rounded img-fluid">
            </div>
        </div>
        <div class="row">

            <div class="col-lg-4 col-md-6 ml-auto mr-auto">
                <img src="{{ asset('/agenda/ag4.jpg') }}" alt="" class="img-raised rounded img-fluid">
            </div>
            <div class="col-lg-4 col-md-6 ml-auto mr-auto">
                <img src="{{ asset('/agenda/ag5.jpg') }}" alt="" class="img-raised rounded img-fluid">
            </div>
        </div>
        <br>
      </div>
  </div>
@endsection
