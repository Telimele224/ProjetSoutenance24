<script src="{{asset('assets/index.global.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/@fullcalendar/locales/fr.js"></script>

<script>
// document.addEventListener('DOMContentLoaded', function() {
//   var calendarEl = document.getElementById('calendar');

//   var currentDate = new Date(); // Obtenir la date actuelle

//   var calendar = new FullCalendar.Calendar(calendarEl, {
//     locale: 'fr', // Définir la langue sur français
//     headerToolbar: {
//       left: 'prev,next today',
//       center: 'title',
//       right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
//     },
//     initialDate: currentDate, // Utiliser la date actuelle comme date initiale
//     navLinks: true, // peut cliquer sur les noms de jour/semaine pour naviguer entre les vues
//     businessHours: true, // afficher les heures de travail
//     editable: true,
//     selectable: true,
//     events: [
//       {
//         title: 'Business Lunch',
//         start: '2024-03-03T13:00:00',
//         constraint: 'businessHours'
//       },
//       {
//         title: 'Meeting',
//         start: '2024-03-13T11:00:00',
//         constraint: 'availableForMeeting', // defined below
//         color: '#257e4a'
//       },
//       {
//         title: 'Conference',
//         start: '2024-03-18',
//         end: '2024-03-20'
//       },
//       {
//         title: 'Party',
//         start: '2024-03-29T20:00:00'
//       },

//       // zones où "Meeting" doit être déplacé
//       {
//         groupId: 'availableForMeeting',
//         start: '2024-03-11T10:00:00',
//         end: '2024-03-11T16:00:00',
//         display: 'background'
//       },
//       {
//         groupId: 'availableForMeeting',
//         start: '2024-03-13T10:00:00',
//         end: '2024-03-13T16:00:00',
//         display: 'background'
//       },

//       // zones rouges où aucun événement ne peut être déplacé
//       {
//         start: '2024-03-24',
//         end: '2024-03-28',
//         overlap: false,
//         display: 'background',
//         color: '#ff9f89'
//       },
//       {
//         start: '2024-03-06',
//         end: '2024-03-08',
//         overlap: false,
//         display: 'background',
//         color: '#ff9f89'
//       }
//     ]
//   });

//   calendar.render();
// });
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var currentDate = new Date(); // Obtenir la date actuelle

    var calendar = new FullCalendar.Calendar(calendarEl, {
    locale: 'fr', // Définir la langue sur français
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
      },
      initialDate: currentDate, // Utiliser la date actuelle comme date initiale
      navLinks: true, // peut cliquer sur les noms de jour/semaine pour naviguer entre les vues
      businessHours: true, // afficher les heures de travail
      editable: true,
      selectable: true,
      events: [
        {
          title: 'Répas famiale',
          start: '2024-03-03T13:00:00',
          constraint: 'businessHours'
        },
        {
          title: 'Meeting',
          start: '2024-03-04T11:00:00',
          constraint: 'availableForMeeting', // defined below
          color: '#257e4a'
        },
        {
          title: 'Conference',
          start: '2024-03-18',
          end: '2024-03-20'
        },
        {
          title: 'Répos',
          start: '2024-0-29T20:00:00'
        },

        // areas where "Meeting" must be dropped
        {
          groupId: 'availableForMeeting',
          start: '2024-03-11T10:00:00',
          end: '2024-03-11T16:00:00',
          display: 'background'
        },
        {
          groupId: 'availableForMeeting',
          start: '2024-03-13T10:00:00',
          end: '2024-03-13T16:00:00',
          display: 'background'
        },

        // red areas where no events can be dropped
        {
          start: '2024-03-24',
          end: '2024-03-28',
          overlap: false,
          display: 'background',
          color: '#ff9f89'
        },
        {
          start: '2024-03-06',
          end: '2024-03-08',
          overlap: false,
          display: 'background',
          color: '#ff9f89'
        }
      ]
    });

    calendar.render();
  });

</script>
