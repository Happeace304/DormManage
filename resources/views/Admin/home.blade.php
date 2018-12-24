@extends('layouts.app')
@section('content')
    <div class="col-md-8">
      {{Date('2018-12-29')  < \Illuminate\Support\Carbon::now()->format('Y-m-d')}}
    </div>
    @endsection