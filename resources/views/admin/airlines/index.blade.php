@extends('admin.app')

@section('title', 'Airlines')
@section('actions')
    <li>
        <a href="{!! route('admin.airlines.create') !!}">
            <i class="ti-plus"></i>
            Add New</a>
    </li>
@endsection

@section('content')
    <div class="card">
        @include('admin.airlines.table')
    </div>
@endsection

