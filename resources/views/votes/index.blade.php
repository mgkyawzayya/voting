@extends('layouts.dashboard')
@section('content')
<div class="sidebar" data-color="purple" data-background-color="white" data-image="">
    <div class="logo">
      <a href="#" class="simple-text logo-normal">
        Voting
      </a>
    </div>
    <div class="sidebar-wrapper">
      <ul class="nav">
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/dashboard') }}">
            <i class="material-icons">dashboard</i>
            <p>Dashboard</p>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/king') }}">
            <i class="material-icons">person</i>
            <p>King</p>
          </a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="{{ url('/queen') }}">
            <i class="material-icons">person</i>
            <p>Queen</p>
          </a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="{{ url('/voteuser') }}">
            <i class="material-icons">person</i>
            <p>Vote User</p>
          </a>
        </li>
      </ul>
    </div>
  </div>
  <div class="main-panel">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
      <div class="container-fluid">
        <div class="navbar-wrapper">
          <a class="navbar-brand" href="#pablo">Dashboard</a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
          <span class="sr-only">Toggle navigation</span>
          <span class="navbar-toggler-icon icon-bar"></span>
          <span class="navbar-toggler-icon icon-bar"></span>
          <span class="navbar-toggler-icon icon-bar"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end">
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="material-icons">person</i>
                <p class="d-lg-none d-md-block">
                  Account
                </p>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <a class="dropdown-item" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                   {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="content">
      <div class="container-fluid">
        <a href="{{ url('vote/create') }}" class="btn btn-primary btn-round text-right">Create Key</a>
        <a href="{{ url('vote/delete') }}" class="btn btn-danger btn-round text-right">Delete</a>
{{--        <a href="{{ url('vote/show') }}" class="btn btn-info btn-round text-right">Show</a>--}}
        <a class="btn btn-warning btn-round" href="{{ route('export') }}">Export User Data</a>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">Vote Key</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                        ID
                      </th>
                      <th>
                        Key
                      </th>
                      <th>
                        King
                      </th>
                      <th>
                        Queen
                      </th>
                    </thead>
                    <tbody>
                    @foreach( $votes as $vote)
                      <tr>
                        <td>
                          {{ $vote->id }}
                        </td>
                        <td>
                          {{ $vote->key }}
                        </td>
                        <td>
                          {{ $vote->king }}
                        </td>
                        <td>
                          {{ $vote->queen }}
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