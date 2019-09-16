@extends('layouts.template')

@section('content')
<nav class="navbar navbar-color-on-scroll navbar-transparent fixed-top navbar-expand-lg" color-on-scroll="100">
        <div class="container">
          <div class="navbar-translate">
            <a class="navbar-brand" href="#">
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
      <div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('assets/img/ucspkku.jpg') }}')">
        <div class="container">
          <div class="row">
            <div class="col-md-8 ml-auto mr-auto">
              <div class="brand text-center">
                <h1>King & Queen Voting</h1>
                <h3 class="title text-center">2018 - 19 Fresher Welcome</h3>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="main main-raised">          
          @if(session('success'))
          <div class="alert alert-success text-center">
          {{ session('success') }}
          </div>
          @endif
          @if(session('notfound'))
          <div class="alert alert-danger text-center">
          {{ session('notfound') }}
          </div>
          @endif
          @if(session('using'))
          <div class="alert alert-info text-center">
          {{ session('using') }}
          </div>
          @endif
          <div class="container">
              <div class="row">
                <div class="card card-plain">
                <div class="col-lg-4 col-md-6 ml-auto mr-auto">
                  <div class="team-player text-center">
                          <div class="col-md-12 ml-auto mr-auto">
                              <img src="{{ asset('/kingphoto/'. $king->photo) }}" alt="" class="img-raised rounded img-fluid">
                          </div>
                          <h4 class="card-title text-center"> {{ $king->name }}
                              <br>
                          <medium class="card-text text-muted">No - {{ $king->no }}</medium>
                          </h4>

                          <!-- Button trigger modal -->
                        <button class="btn btn-primary btn-round" data-toggle="modal" data-target="#exampleModal">
                                <i class="material-icons">favorite</i>    Vote
                        </button>    
                      </div>
                  </div>
                </div>
              </div>
            </div>
      </div>

     <!-- Modal -->
     <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Voting</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <form class="form" method="POST" action="{{ url('/kingvote') }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{ $king->id }}">
                                <div class="form-group bmd-form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="key" placeholder="Enter Key">
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection