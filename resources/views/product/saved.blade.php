@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="card mb-3">
<div class="row g-0">
    <div class="col-md-4">
        <img src="https://laravel.com/img/logotype.min.svg" class="img-fluid rounded-start">
    </div>
    <div class="col-md-8">
       <div class="card-body">
        <h1 class="card-title">
          Guardado con exito   {{ $viewData["name"] }}
        </h5>
      </div>
    </div>
  </div>
</div>
@endsection
