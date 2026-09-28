@extends('layouts.app')

@section('title', 'Événements')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1>Événements</h1>
            <p class="text-secondary mb-0">Les prochains événements du campus.</p>
        </div>
    </div>

    @if ($events->isEmpty())
        <div class="alert alert-info">
            Aucun événement n'est disponible.
        </div>
    @else
        <div class="row g-4">
            @foreach ($events as $event)
                <div class="col-md-6 col-lg-4">
                    <article class="card h-100 event-card">
                        <div class="card-body">
                            <p class="event-date mb-2">
                                {{ $event->event_date->format('d/m/Y') }}
                            </p>

                            <h2 class="h5">{{ $event->title }}</h2>

                            <p class="text-secondary">
                                {{ \Illuminate\Support\Str::limit($event->description, 110) }}
                            </p>

                            <a href="events/{{$event->id}}" class="btn btn-outline-primary">
                                Voir l'événement
                            </a>
                        </div>
                    </article>
                </div>
            @endforeach
        </div>
    @endif
@endsection
