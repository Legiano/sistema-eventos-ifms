@extends('layouts.main')

@section('title', $event->title)

@section('content')

<div class="col-md-10 offset-md-1" id="white-container">
    <div class="row">
        <div id="image-container" class="col-md-6">
            <img src="/img/events/{{ $event->image }}" class="img-fluid" alt="{{ $event->title }}">
        </div>

        <div id="info-container" class="col-md-6">
            <h1>{{ $event->title }}</h1>
            <p class="event-city"><ion-icon name="location-outline"></ion-icon> {{ $event->city }}</p>
            <p class="event-address"><ion-icon name="home-outline"></ion-icon> {{ $event->address }}</p>
            <p class="events-participants"><ion-icon name="people-outline"></ion-icon> {{ count($event->users) }} Participantes</p>
            <p class="event-owner"><ion-icon name="star-outline"></ion-icon> {{ $eventOwner->name }}</p>

            <!-- Confirmação de presença ou exibição de mensagem caso o usuário já tenha confirmado -->
            @if(!$hasUserJoined)
                <form action="{{ route('events.join', $event->id) }}" method="POST" id="join-form">
                    @csrf
                    <button type="submit" class="btn btn-primary" id="event-submit">
                        Confirmar Presença
                    </button>
                </form>
            @else
                <form action="{{ route('events.leave', $event->id) }}" method="POST" id="leave-form">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" id="event-submit">
                        Sair do Evento
                    </button>
                </form>
                <p class="already-joined-msg">Você já está participando deste evento!🤠</p>
            @endif

            <h3>O evento conta com:</h3>
            <ul id="items-list">
                @php
                    // Converte a string de itens em um array, verificando o tipo do valor
                    if (is_string($event->items)) {
                        $itemsArray = explode(',', $event->items);
                    } elseif (is_array($event->items)) {
                        $itemsArray = $event->items;
                    } else {
                        $itemsArray = [];
                    }
                @endphp
                @foreach($itemsArray as $item)
                    <li><ion-icon name="arrow-forward-outline"></ion-icon><span>{{ $item }}</span></li>
                @endforeach
            </ul>
        </div>

        <div class="col-md-12" id="description-container">
            <h3>Sobre o evento:</h3>
            <p class="event-description">{{ $event->description }}</p>
        </div>
    </div>
</div>

@endsection
