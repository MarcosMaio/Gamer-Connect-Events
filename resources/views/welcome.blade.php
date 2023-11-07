@extends('layouts.main')

@section('title', 'Gamer Connect - Events')

@section('content')

<div id="search-container" class="col-md-12">
    <h1>Looking for events?</h1>
    <form action="/" method="GET">
        <input type="text" id="search" name="search" class="form-control" placeholder="Find a Event" />
    </form>
</div>

<div id="events-container" class="col-md-12">
    <div class="events-info">
        @if($search)
            <h2>Searching for: {{ $search }}</h2>
        @else
            <h2>Next Events</h2>
            <p class="subtitle" >See the events of the next few days</p>
        @endif
        <div class="container-fluid">
            @if(session('msg'))
                <div class="badges">
                    <button class="success">{{ session('msg') }}</button>
                </div>
            @endif
        </div>
    </div>

    <div id="card-container" class="row">
        @foreach($events as $event)
            <div class="card col-md-3">
                <img src="./img/events/{{ $event->image }}" alt="{{ $event->title }}"/>
                <div class="card-body">
                    <p class="card-date">{{date('d/m/y', strtotime($event->date))}}</p>
                    <h5 class="card-title">{{ $event->title }}</h5>
                    <p class="card-participants">{{ count($event->users) }} Participants</p>
                    <a href="/events/{{ $event->id }}" class="btn btn-primary">To know more</a>
                </div>
            </div>
        @endforeach

    @if(count($events) == 0 && $search)
        <p style="color: #fefefe; display:flex; align-items:center; margin-right:1.5rem;padding-left:0; margin-left: 0.5rem; gap: 5px">Unable to find any event with {{ $search }}!
            <a href="/" >See all events</a></p>
    @elseif(count($events) == 0)
        <span style="color: #fefefe; display:flex; align-items:center; margin-right:1.5rem;padding-left:0; margin-left: 0.5rem">There are no events available</span>
    @endif
</div>
</>

@endsection
