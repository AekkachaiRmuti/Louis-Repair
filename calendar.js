var calendar;
var Calendar = FullCalendar.Calendar;
var events = [];

$(function() {

    if (!!scheds) {
        Object.keys(scheds).map(k => {
            var row = scheds[k]
            events.push({ id: row.pm_id, title: row.pm_name, pm_key: row.pm_key, pm_type: row.pm_type,pm_user: row.pm_user,start: row.pm_date_start,end: row.pm_date_end,pm_frequency: row.pm_frequency,pm_invt_name: row.pm_invt_name });
       console.log(row);
        });
        
    }
    
    var date = new Date()
    var d = date.getDate(),
        m = date.getMonth(),
        y = date.getFullYear(),

    calendar = new Calendar(document.getElementById('calendar'), {
        headerToolbar: {
            left: 'prev,next today',
            right: 'dayGridMonth,dayGridWeek,list',
            center: 'title',
            
        },
        
        selectable: true,
        themeSystem: 'bootstrap',
        events: events,
        eventClick: function(info) {
            var details = $('#event-details-modal');
            var id = info.events.id;

            if (!!scheds[pm_id]) {
                details.find('#title').text(scheds[id].pm_name);
                details.find('#description').text(scheds[id].pm_invt_name);
                details.find('#start').text(scheds[id].pm_date_start);
                details.find('#end').text(scheds[id].pm_date_end);
                details.find('#edit,#delete').attr('data-id', id);
                details.modal('show');
            } else {
                alert("Event is undefined");
            }
        },
        eventDidMount: function(info) {
            // Do Something after events mounted
        },
        editable: true
    });

    calendar.render();
    console.log();


    // Form reset listener
    $('#schedule-form').on('reset', function() {
        $(this).find('input:hidden').val('');
        $(this).find('input:visible').first().focus();
    });

    // Edit Button
    $('#edit').click(function() {
        var pm_id = $(this).attr('data-id');

        if (!!scheds[pm_id]) {
            var form = $('#schedule-form');

            console.log(String(scheds[pm_id].pm_date_start), String(scheds[pm_id].pm_date_start).replace(" ", "\\t"));
            form.find('[name="id"]').val(pm_id);
            form.find('[name="title"]').val(scheds[pm_id].pm_name);
            form.find('[name="description"]').val(scheds[pm_id].pm_invt_name);
            form.find('[name="start_datetime"]').val(String(scheds[pm_id].pm_date_start).replace(" ", "T"));
            form.find('[name="end_datetime"]').val(String(scheds[pm_id].pm_date_end).replace(" ", "T"));
            $('#event-details-modal').modal('hide');
            form.find('[name="title"]').focus();
        } else {
            alert("Event is undefined");
        }
        console.log(pm_id);
    });

    // Delete Button / Deleting an Event
    $('#delete').click(function() {
        var pm_id = $(this).attr('data-id');

        if (!!scheds[pm_id]) {
            var _conf = confirm("Are you sure to delete this scheduled event?");
            if (_conf === true) {
                location.href = "./delete_schedule.php?id=" + pm_id;
            }
        } else {
            alert("Event is undefined");
        }
    });
});