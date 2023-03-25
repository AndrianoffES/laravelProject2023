@extends('layouts.admin')

@section('content')
    <h3>Welcome to admin panel</h3>
    <br>
    @php $message = "Alert message" @endphp
    <x-alert type="danger" :message="$message" ></x-alert>
    <x-alert type="success" :message="$message" ></x-alert>
    <x-alert type="info" :message="$message" ></x-alert>
@endsection

