@extends('layouts.main')

@section('title', 'Criar Evento')

@section('content')
    <div id="event-create-container" class="col-md-6 offset-md-3">
        <h1>Create your event!</h1>
        <form action="/events" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group" style="display: flex; align-items: center; margin: 0 auto; gap: 5px">
                <label for="image">Event Image:</label>
                <input type="file" id="image" class="form-control-file" name="image"/>
            </div>
            <div class="form-group">
                <label for="title">Event:</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Event name" />
            </div>
            <div class="form-group">
                <label for="date">Event date:</label>
                <input type="date" class="form-control" id="date" name="date"/>
            </div>
            <div class="form-group">
                <label for="title">City:</label>
                <input type="text" class="form-control" id="city" name="city" placeholder="Event place" />
            </div>
            <div class="form-group">
                <label for="title">Is the event private?</label>
                <select name="private" id="private" class="form-control">
                    <option value="0">No</option>
                    <option value="1">Yes</option>
                </select>
            </div>
            <div class="form-group">
                <label for="title">Description:</label>
                <textarea name="description" id="description" class="form-control" placeholder="What will happen at the event?" id="text-area">
                </textarea>
            </div>
            <div class="form-group events-actions">
                <label id="title" for="title">Add
                    infrastructure items:</label>
                <div class="form-group check-box-styles">
                    <input type="checkbox" name="items[]" value="Game Stations"> Game Stations
                </div>
                <div class="form-group check-box-styles">
                    <input type="checkbox" name="items[]" value="Virtual Reality (VR) Zone"> Virtual Reality (VR) Zone
                </div>
                <div class="form-group check-box-styles">
                    <input type="checkbox" name="items[]" value="Cosplay Area"> Cosplay Area
                </div>
                <div class="form-group check-box-styles">
                    <input type="checkbox" name="items[]" value="Live Streaming Area"> Live Streaming Area
                </div>
                <div class="form-group check-box-styles">
                    <input type="checkbox" name="items[]" value="Tournaments and Competitions"> Tournaments and Competitions
                </div>
                <div class="form-group check-box-styles">
                    <input type="checkbox" name="items[]" value="Presentation Stage"> Presentation Stage
                </div>
                <div class="form-group check-box-styles">
                    <input type="checkbox" name="items[]" value="Food and Beverage Area"> Food and Beverage Area
                </div>
                <div class="form-group check-box-styles">
                    <input type="checkbox" name="items[]" value="Commerce Zone"> Commerce Zone
                </div>
                <div class="form-group check-box-styles">
                    <input type="checkbox" name="items[]" value="Zona de Networking"> Zona de Networking
                </div>
                <div class="form-group check-box-styles">
                    <input type="checkbox" name="items[]" value="Exhibition Area"> Exhibition Area
                </div>
                <input type="submit" class="btn btn-primary" value="Create Event" />
            </div>
        </form>
    </div>
@endsection
