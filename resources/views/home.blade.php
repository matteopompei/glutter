@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="dashboard">
      <div class="row">
        <div class="col">
          <div class="title">
            <h3><i class="fa-solid fa-angle-right"></i> Dashboard</h3>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-4 info">
          <div class="text-center title">
            <h4>Riepilogo informazioni</h4>
          </div>
          <img
            src="https://loredanavistarini.it/wp-content/uploads/2020/01/136-1366211_group-of-10-guys-login-user-icon-png.png"
            alt="Avatar" class="img-fluid avatar">
          <ul>
            <li><strong>Nome attività: </strong> placeholder</li>
            <li><strong>Indirizzo: </strong> placeholder</li>
            <li><strong>Email: </strong> placeholder</li>
            <li><strong>Partita IVA: </strong> placeholder</li>
            <li><strong>Categorie: </strong> placeholder</li>
          </ul>
          <a href="#" class="btn btn-primary edit">Modifica informazioni</a>
        </div>
        <div class="col-8 welcome">
          <h2>Bentornato!</h2>
          <div class="row">
            <div class="col"><a href="#" class="btn btn-primary">Visualizza menù</a></div>
            <div class="col"><a href="#" class="btn btn-primary">Visualizza ordini</a></div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
