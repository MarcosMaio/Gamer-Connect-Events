@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')
    <div class="col-md-10 offset-md-1 dashboard-title-container">
        <h1>My Events</h1>
    </div>
    <div class="col-md-10 offset-md-1 dashboard-events-container">
        <div class="container-fluid">
            @if(session('msg'))
                <div class="badges">
                    <button class="success">{{ session('msg') }}</button>
                </div>
            @endif
        </div>
        @if(count($events) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th scope="col" id="#">#</th>
                    <th scope="col" id="name">Name</th>
                    <th scope="col" id="participants">Participants</th>
                    <th scope="col" id="actions">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($events as $event)
                    <tr>
                        <td scope="row">{{ $loop->index + 1}}</td>
                        <td><a style="font-weight: 700; color:#fff" href="/events/{{$event->id}}">{{ $event->title }}</a></td>
                        <td>{{ count($event->users) }}</td>
                        <td id="btn-controllers-actions">
                            <a href="/events/edit/{{ $event->id }}" style="background-color: #da1066; border-color: #550c2c " class="btn btn-info edit-btn">
                                <ion-icon name="create-outline"></ion-icon>
                                Edit
                            </a>
                            <form action="/events/{{ $event->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" id="delete" class="btn btn-danger delete-btn">
                                    <ion-icon name="trash-outline"></ion-icon>
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @else
            <p>You don't have events yet, <a href="/events/create">Create Event</a></p>
        @endif
        </div>
        <div class="col-md-10 offset-md-1 dashboard-title-container">
            <h1>Events I'm participating in</h1>
        </div>

        <div class="col-md-10 offset-md-1 dashboard-events-container">
            @if(count($eventsasparticipant) > 0):
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Participants</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($eventsasparticipant as $event)
                        <tr>
                            <td scope="row">{{ $loop->index + 1}}</td>
                            <td><a style="font-weight: 700; color:#fff" href="/events/{{$event->id}}">{{ $event->title }}</a></td>
                            <td>{{ count($event->users) }}</td>
                            <td>
                                <form class="leave-event" action="/events/leave/{{ $event->id }}" method="POST">
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" id="delete" class="btn btn-danger delete-btn"><ion-icon name='trash-outline' style="margin-right: 0.2rem;"></ion-icon>Leave</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            @else
            <p>You are not participating in any events yet, <a href="/">See all Events</a></p>
            @endif
        </div>
    @endsection
