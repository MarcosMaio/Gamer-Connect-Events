@extends('layouts.main')

@section('title', $event->title)

@section('content')
    <div class="col-md-12 offset-md-1 container-event">
        <div class="row">
            <div id="image-container" class="col-md-6">
                <img src="/resources/img/events/{{ $event->image }}" class="img-fluid" alt="{{ $event->title }}" />
            </div>
            <div id="info-container" class="col-md-6">
                <h1>{{ $event->title }}</h1>
                <p class="event-city"><ion-icon name="location-outline"></ion-icon>{{ $event->city }}</p>

                <p class="events-participants"><ion-icon name="people-outline"></ion-icon> {{ count($event->users) }} Participants</p>

                <p class="events-participants"><ion-icon name="star-outline"></ion-icon>{{ $eventOwner['name'] }}</p>

                @if(!$hasUserJoined)
                <form action="/events/join/{{ $event->id }}" method="POST">
                    @csrf
                    <a href="/events/join/{{ $event->id }}" class="btn btn-primary" id="event-submit" onclick="event.preventDefault();this.closest('form').submit();">Confirm Presence</a>
                </form>
                @else
                <span class="already-joined-msg">You are already participating in this event!</span>
                @endif
                <h3>The event has:</h3>
                <div class="event-has">
                    <ul id="items-list">
                        @foreach($event->items as $item)
                        <li><ion-icon name="play-outline"></ion-icon><span>{{ $item }}</span></li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="col-md-12" id="description-container">
                <h3>About the event:</h3>
                <p class="event-description">{{ $event->description }}</p>
            </div>

        </div>
    </div>
@endsection
