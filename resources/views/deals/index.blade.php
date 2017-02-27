@extends('layout.main')

@section('title')
Deals
@endsection

@section('content')
<div class="container">
    <h1>Deals</h1>

    <!-- will be used to show any messages -->
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Date</td>
            <td>Status</td>
        </tr>
        </thead>
        <tbody>
        @foreach($deals as $deal)
            <tr>
                <td>{{ $deal->id }}</td>
                <td>{{ $deal->name }}</td>
                <td>{{ $deal->date }}</td>
                <td>{{ $deal->status }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ Html::link(route('deals.create'), 'Add Deal', ['class' => 'btn btn-info']) }}
</div>
@endsection