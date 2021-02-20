@extends('team.layouts.app')

@section('title')
{{ Auth::user()->name }} -- Dashboard
@endsection

@section('contetn')
    Member Section
@endsection
