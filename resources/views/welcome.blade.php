@extends('layouts.main')

@section('title', 'TECSO Learn')

@section('content')

<div id="search-container" class="col-md-12">
    <h1>Busque um evento</h1>
    <form action="/" method="get">
        <input type="text" name="search" id="search" class="form-control" placeholder="procurar evento">
    </form>
</div>
<div id="events-container" class="col-md-12">
    @if($search)
        <h2>Busca por: {{ $search }}</h2>
    @else
        <h2>Proximos eventos</h2>
        <p class="subtitle">Veja os eventos dos proximos dias</p>
    @endif
    <div id="cards-container" class="row">
        @foreach($events as $event)
            <div class="card col-md-3">
                <img src="/img/events/{{ $event->image }}" alt="{{ $event->title }}">
                <div class="card-body">
                    <p class="card-date">{{ date('d/m/Y', strtotime($event->date)) }}</p>
                    <h5 class="card-title">{{ $event->title }}</h5>
                    <p class="card-participants">{{ count($event->users) }} Participantes</p>
                    <a href="/events/{{ $event->id }}" class="btn btn-primary">Saber Mais</a>
                </div>
            </div>
        @endforeach
        @if(count($events) == 0 && $search)
            <p>Nao foi possivel encontrar um evento com nome {{ $search }}! <a href="/">Ver todos</a></p>
        @elseif(count($events) == 0)
            <p>Nao ha eventos disponiveis</p>
        @endif
    </div>
</div>

@endsection