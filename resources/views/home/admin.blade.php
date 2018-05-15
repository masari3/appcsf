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

@section('smallbox')
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>0</h3>
                    <p>Posting</p>
                </div>
            <div class="icon">
                <i class="ion ion-ios-paper"></i>
            </div><a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>0</h3>
                    <p>Comments</p>
                </div>
                <div class="icon">
                    <i class="ion ion-ios-chatboxes"></i>
                </div><a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>0</h3>
                    <p>Downloads</p>
                </div>
                <div class="icon">
                    <i class="ion ion-ios-download"></i>
                </div><a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>0</h3>
                    <p>Unique Visitors</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div><a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
@endsection

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3>Selamat Datang</h1> Anda berada di halaman kendali aplikasi. <br/>
                <a href="{{ route('logout') }}"> {{ Auth::user()->name }} </a> telah berhasil login, untuk
                pengoperasian aplikasi, silahkan gunakan menu di layar sebelah samping komputer Anda.

            </div>
        </div>
    </div>
</div>
@endsection
