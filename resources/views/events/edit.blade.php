@extends('layouts.main')

@section('title', 'Editando: ' . $event->title)

@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Editando: {{$event->title}}</h1>
    <form action="{{ route('events.update', $event->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <!-- Imagem -->
        <div class="form-group">
            <label for="image">Imagem do Evento:</label>
            <input type="file" name="image" id="image" class="form-control-file">
            <img src="/img/events/{{$event->image}}" alt="{{$event->title}}" class="img-preview">
        </div><br>

        <!-- Título -->
        <div class="form-group">
            <label for="title">Evento:</label>
            <input type="text" name="title" id="title" class="form-control" placeholder="Nome do Evento" value="{{$event->title}}">
        </div><br>

        <!-- Data -->
        <div class="form-group">
            <label for="date">Data do evento:</label>
            <input type="date" name="date" id="date" class="form-control" value="{{ $event->date->format('Y-m-d') }}">
        </div><br>

        <!-- Cidade -->
        <div class="form-group">
            <label for="city">Cidade:</label>
            <input type="text" name="city" id="city" class="form-control" placeholder="Local do Evento" value="{{$event->city}}">
        </div><br>

        <!-- Endereço -->
        <div class="form-group">
            <label for="address">Endereço:</label>
            <input type="text" name="address" id="address" class="form-control" placeholder="Informe um Endereço" value="{{$event->address}}">
        </div><br>

        <!-- Evento Privado -->
        <div class="form-group">
            <label for="private">O evento é privado?</label>
            <select name="private" id="private" class="form-control">
                <option value="0" {{ $event->private == 0 ? "selected" : "" }}>Não</option>
                <option value="1" {{ $event->private == 1 ? "selected" : "" }}>Sim</option>
            </select>
        </div><br>

        <!-- Descrição -->
        <div class="form-group">
            <label for="description">Descrição:</label>
            <textarea name="description" id="description" class="form-control" placeholder="O que vai acontecer no evento!🤔">{{$event->description}}</textarea>
        </div><br>

        <!-- Itens -->
        <div class="form-group">
            <label for="items">Adicione seus itens aqui:</label>

            @foreach (['Cadeira', 'Palco', 'Bebidas', 'Open Food', 'Brindes'] as $item)
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="{{ $item }}" 
                        {{ in_array($item, is_array($event->items) ? $event->items : explode(',', $event->items)) ? 'checked' : '' }}>
                    {{ $item }}
                </div>
            @endforeach
        </div><br>
        
        <!-- Botão de Enviar -->
        <input type="submit" class="btn btn-primary" value="Atualizar Evento">
    </form>
</div>

@endsection
