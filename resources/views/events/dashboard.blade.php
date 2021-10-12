@extends("layouts.main")

@section("title", "Dashboard")

@section("content")

<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Meus Eventos</h1>
</div>

<div class="col-md-10 offset-md-1 dashboard-events-container">
@if(count($events) > 0)
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Participantes</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
    
        <tbody>
        @foreach($events as $event)
            <tr>
                <th scropt="row">{{$loop->index + 1}}</th>
                <td><a href="events/{{$event->id}}">{{$event->title}}</a></td>
                <td>{{count($event->users)}}</td>
                <td>
                    <a href="events/edit/{{$event->id}}" class="btn btn-info edit-btn"><ion-icon name="create"></ion-icon></a>
                    <form action="/events/{{$event->id}}" method="post">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-danger delete-btn"><ion-icon name="trash"></ion-icon></button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@else
    <p>Você ainda não tem eventos, <a href="/events/create" title="">Criar Evento</a></p>
@endif
</div>

<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Eventos que estou participando </h1>
</div>

<div class="col-md-10 offset-md-1 dashboard-events-container">
@if(count($eventsAsParticipant) > 0)
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Participantes</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
    
        <tbody>
        @foreach($eventsAsParticipant as $participant)
            <tr>
                <th scropt="row">{{$loop->index + 1}}</th>
                <td><a href="events/{{$event->id}}">{{$event->title}}</a></td>
                <td>{{count($event->users)}}</td>
                <td>
                    <form action="/events/leave/{{$event->id}}" method="post">
                    @csrf
                    @method("DELETE")
                    <button class="btn btn-danger delete-btn">
                        <ion-icon name="trash"></ion-icon>
                        Sair do Evento
                    </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@else
    <p>Você ainda não está participando do evento, <a href="/" title="">Veja todos os eventos</a></p>
@endif
</div>

@endsection
