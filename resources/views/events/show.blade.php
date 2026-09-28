@extends('layouts.app')

@section('title', $event->title)

@section('content')
    <a href="/events" class="btn btn-link px-0 mb-3">
        Retour aux événements
    </a>

    <article class="card">
        <div class="card-body p-4">
            <p class="event-date">
                {{ $event->event_date->format('d/m/Y') }}
            </p>

            <h1>{{ $event->title }}</h1>

            <p class="lead mt-4">
                {{ $event->description }}
            </p>
        </div>
    </article>
@endsection