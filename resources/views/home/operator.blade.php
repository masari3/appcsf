@extends('layouts.app')

@section('title')
    Dashboard
    @section('smtitle')
        Pusat Kendali
    @endsection
@endsection

@section('breadcrumb')
    @parent
    <li> Dashboard </li>
@endsection

@section('content')
<div class="col-xs-12">
    <div class="box">
        <div class="box-header">

            Selamat Datang dihalaman kendali aplikasi
            <a href="{{ route('logout') }}"> {{ Auth::user()->name }} </a>
        </div>
    </div>
</div>
@endsection
