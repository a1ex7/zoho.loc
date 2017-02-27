@extends('layout.main')

@section('title')
Deals
@endsection

@section('content')
<div class="container">
    {{ Html::link(route('deals.create'), 'Add Deal', ['class' => 'btn btn-info']) }}
</div>
@endsection