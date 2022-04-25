@extends('layouts.app')

@section('title')
    {{ $order->id }}
@endsection

@section('content')
    <div class="container">
        <div class="dashboard">
            <div class="row">
                <div class="col">
                    <div class="title mb-5">
                        <h1><i class="fa-solid fa-angle-right"></i> {{ $order->name }}</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col left">

                    <div class="text-center mt-5 mb-1">
                        <a href="/dashboard"  class="btn btn-danger">Indietro</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection