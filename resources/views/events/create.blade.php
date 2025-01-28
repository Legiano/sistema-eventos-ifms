@extends('layouts.main')

@section('title', 'Criar Evento')

@section('content')
<div id="event-create-container" class="col-md-6 offset-md-3">
    <div id="white-container">
        <h1>Crie seu evento</h1>
        <form action="/events" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="image">Imagem do Evento:</label>
                <input type="file" name="image" id="image" class="form-control-file">
            </div><br>

            <div class="form-group">
                <label for="title">Nome do Evento:</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Nome do Evento">
            </div><br>

            <div class="form-group">
                <label for="date">Data do evento:</label>
                <input type="date" name="date" id="date" class="form-control">
            </div><br>

            <div class="form-group">
                <label for="city">Cidade:</label>
                <input type="text" name="city" id="city" class="form-control" placeholder="Cidade - UF">
            </div><br>

            <!--Endereço-->
            <div class="form-group">
                <label for="address">Endereço:</label>
                <input type="text" name="address" id="address" class="form-control" placeholder="Rua, nº, Bairro...">
            </div><br>

            <div class="form-group">
                <label for="private">O evento é aberto ao público?</label>
                <select name="private" id="private" class="form-control">
                    <option value="1">Sim</option>
                    <option value="0">Não</option>
                </select>
            </div><br>

            <div class="form-group">
                <label for="description">Descrição:</label>
                <textarea name="description" id="description" class="form-control"
                    placeholder="O que vai acontecer no evento! 🤔"></textarea>
            </div><br>

            <div class="form-group">
                <label>Adicione seus itens aqui:</label>

                <div class="form-check">
                    <input type="checkbox" name="items[]" value="Cadeiras" class="form-check-input" id="item_cadeira">
                    <label class="form-check-label" for="item_cadeira">Cadeiras</label>
                </div>

                <div class="form-check">
                    <input type="checkbox" name="items[]" value="Apresentações" class="form-check-input" id="item_palco">
                    <label class="form-check-label" for="item_palco">Apresentações</label>
                </div>

                <div class="form-check">
                    <input type="checkbox" name="items[]" value="Bebidas" class="form-check-input" id="item_bebidas">
                    <label class="form-check-label" for="item_bebidas">Bebidas</label>
                </div>

                <div class="form-check">
                    <input type="checkbox" name="items[]" value="Comida" class="form-check-input"
                        id="item_open_food">
                    <label class="form-check-label" for="item_open_food">Comida</label>
                </div>

                <div class="form-check">
                    <input type="checkbox" name="items[]" value="Brindes" class="form-check-input" id="item_brindes">
                    <label class="form-check-label" for="item_brindes">Brindes</label>
                </div>

            </div><br>

            <input type="submit" class="btn btn-primary" value="Criar Evento">
        </form>
    </div>
</div>

@endsection
