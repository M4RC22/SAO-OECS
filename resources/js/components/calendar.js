import { Calendar } from '@fullcalendar/core';
import dayGridPlugin from '@fullcalendar/daygrid';

document.addEventListener('DOMContentLoaded', function() {
    
    const calendarEl = document.getElementById("calendar");

    let calendar = new Calendar(calendarEl, {
        height: 550,
        themeSystem: 'bootstrap',
        plugins: [ dayGridPlugin, ],
        initialView: 'dayGridMonth',
        headerToolbar: {
            left: 'title',
            right: 'prev,next today'
        },
        // go ahead with other parameters
    });

    calendar.render();
});

