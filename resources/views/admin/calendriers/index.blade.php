@extends('en_tete.entete_administrateurs')

@section('contenu')
    <div id='calendar'></div>

    <script>
        //  document.addEventListener('DOMContentLoaded', function() {
        //     var calendarEl = document.getElementById('calendar');
        //     var calendar = new FullCalendar.Calendar(calendarEl, {
        //         // Configuration du calendrier
        //         initialView: 'dayGridMonth',
        events: [
                    @foreach ($calendriers as $event)
                    {
                        title: '{{ $event['title'] }}',
                        start: '{{ $event['start'] }}',
                        @isset($event['end'])
                        end: '{{ $event['end'] }}',
                        @endisset
                        @isset($event['constraint'])
                        constraint: '{{ $event['constraint'] }}',
                        @endisset
                        @isset($event['color'])
                        color: '{{ $event['color'] }}',
                        @endisset
                        @isset($event['groupId'])
                        groupId: '{{ $event['groupId'] }}',
                        @endisset
                        @isset($event['display'])
                        display: '{{ $event['display'] }}',
                        @endisset
                        @isset($event['overlap'])
                        overlap: {{ $event['overlap'] ? 'true' : 'false' }},
                        @endisset
                    },
                    @endforeach
                ]
        //     });
        //     calendar.render();
        // });
    </script>

@endsection

@include('admin.calendriers.script')
@include('admin.calendriers.css')
