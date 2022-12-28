@extends('layouts.main')
@section('title', 'Edit: ' .$event->title)
@section('content')

<h1> edit a events</h1>

<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>edit: {{$event->title}}</h1>
    <form action="/events/update/{{$event->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Image event:</label>
            <input type="file" class="form-control-file" id="image" name="image" >
            <img src="/img/events/{{$event->image}}" alt="{{ $event->title}}" class="img">
        </div>
        <div class="form-group">
            <label for="title">Event:</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="name event" value="{{ $event->title}}">
        </div>
        <div class="form-group">
            <label for="title">Date event:</label>
            <input type="date" class="form-control" id="date" name="date" placeholder="Date" value="{{ $event->date->format('Y-m-d') }}">
        </div>
        <div class="form-group">
            <label for="title">City:</label>
            <input type="text" class="form-control" id="city" name="city" placeholder="city" value="{{ $event->city}}">
        </div>
        <div class="form-group">
            <label for="title">The event is private?</label>
            <select name="private" id="private" class="form-control">
                <option value="0">No</option>
                <option value="1" {{$event->private == 1 ? "selected='selected'" : ""}}>Yes</option>
            </select>
        </div>
        <div class="form-group">
            <label for="title">Description:</label>
            <textarea name="description" id="description" class="form-control" placeholder="O que" >{{ $event->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="title">Adicione itens de infraestrutura:</label>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Cadeiras"> Cadeiras          
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Palco"> Palco          
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Open-food"> Open-food          
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Cerveja-Gratis"> Cerveja-Gratis         
            </div>
        </div>
        <input type="submit" class="btn btn-primary" value="Criar Evento">
    </form>
</div>
@endsection