@extends('layouts.main-memories')

@section('title', 'Memórias')

@section('content')

<div id="memories-search-container" class="col-md-12">
    <h1>Busque por um evento</h1>
    <p><em>A página "Memórias" é um espaço dedicado a relembrar e celebrar os principais acontecimentos da nossa instituição ao longo dos anos. Aqui, você encontrará uma coleção de resumos das atividades realizadas, além de registros fotográficos que capturam os momentos mais significativos vividos por nossa comunidade.</em></p>
    <form action="/memories/" method="GET">
        <input type="text" name="search" id="search" class="form-control" placeholder="Procurar...">
    </form>
</div>

<div id="memories-container" class="col-md-12">
    @if($search)
        <h2>Buscando por: {{$search}}</h2>
    @else
        <h2>Últimos Eventos</h2>
    @endif

    <div id="cards-container" class="row">
        <div class="card col-md-3">
            <img src="/img/iconCEWB.png" alt="Deu Ruim">
            <div class="card-body">
                <p class="card-date">20/01/2025</p>
                <h5 class="card-title">Teste</h5>
                <a href="/memories/1" class="btn btn-primary">Saber mais</a>
            </div>
        </div>
        {{--@foreach($memories as $memory)
        <div class="card col-md-3">
            <img src="/img/memories/{{ $memory->image }}" alt="{{ $memory->title }}">
            <div class="card-body">
                <p class="card-date">{{ date('d/m/Y', strtotime($event->date)) }}</p>
                <h5 class="card-title">{{ $event->title }}</h5>
                // <p class="card-participants">{{ count($event->users) }} Participantes</p>
                <a href="/memories/{{ $memory->id }}" class="btn btn-primary">Saber mais</a>
            </div>
        </div>
        @endforeach--}}

        @if(count($memories) == 0 && $search)
            <p>Não foi possível encontrar nenhum evento com: {{$search}}!
                <a href="/memories/" style="text-decoration: none;">Ver todos <ion-icon
                        name="arrow-back-outline"></ion-icon></a>
            </p>
        @elseif(count($memories) == 0)
            <p>Não há eventos passados!</p>
        @endif
    </div>
</div>
@endsection
