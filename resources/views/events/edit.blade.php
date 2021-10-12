@extends("layouts.main")

@section("title", "Editando: " . $event->title)

@section("content")

<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1 class="text-center">Edite o seu evento</h1>
    
    <form action="/events/update/{{$event->id}}" method="post" enctype="multipart/form-data" class="form-width">     
        @csrf   
        @method("PUT")
        <div class="form-group">
            <label for="image">Imagem do Evento:</label>
            <input type="file" class="form-control-file" id="image" name="image">            
            <img class="img-preview" src="/img/events/{{$event->image}}" alt="{{$event->title}}" title="{{$event->title}}">
        </div>

        <div class="form-group">
            <label for="title">Evento:</label>
            <input type="text" class="form-control" id="title" name="title" value="{{$event->title}}">            
        </div>

        <div class="form-group">
            <label for="date">Data do evento:</label>
            <input type="date" class="form-control" id="date" name="date" value="{{$event->date->format('Y-m-d')}}">            
        </div>

        <div class="form-group">
            <label for="title">Cidade:</label>
            <input type="text" class="form-control" id="city" name="city" value="{{$event->city}}">            
        </div>

        <div class="form-group">
            <label for="title">O evento é privado?</label>
            <select class="form-control" name="private" id="private">
                <option value="0">Não</option>
                <option @if($event->private == true) {{"selected='selected'"}} @endif value="1">Sim</option>
            </select>           
        </div>

        <div class="form-group">
            <label for="title">Descrição</label>
            <textarea class="form-control" name="description">{{$event->description}}</textarea>            
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
                <input type="checkbox" name="items[]" value="Cerveja Grátis"> Cerveja Grátis
            </div>     
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Open Food"> Open Food
            </div>    
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Brindes"> Brindes
            </div>    
        </div>

        <input type="submit" class="btn btn-primary" value="Editar Evento">
    </form>
</div>

@endsection