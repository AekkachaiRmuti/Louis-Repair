<!DOCTYPE html>
<html lang="en">
<head>
   
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.css">

    <style>
        :root {
            --bs-success-rgb: 71, 222, 152 !important;
        }

        html,
        body {
            height: 100%;
            width: 100%;
            /* font-family: Apple Chancery, cursive; */
        }

        .btn-info.text-light:hover,
        .btn-info.text-light:focus {
            background: #000;
        }
        table, tbody, td, tfoot, th, thead, tr {
            border-color: #ededed !important;
            border-style: solid;
            border-width: 1px !important;
        }
        .title{
            font-size: 30px;
        }
    </style>
</head>
<body class="bg-light">


<!-- https://www.nicesnippets.com/blog/how-to-use-full-calendar-with-mysql-in-php -->
<!-- https://www.nicesnippets.com/blog/how-to-use-full-calendar-with-mysql-in-php -->
    <?php
        
$sql = "SELECT * FROM `tbl_pm_maintenanace`";
        $schedules = mysqli_query($conn, $sql);
        $sched_res = [];

        foreach($schedules->fetch_all(MYSQLI_ASSOC) as $row){
          $row['sdate'] = date("F d, Y h:i A",strtotime($row['pm_date_start']));
            $row['edate'] = date("F d, Y h:i A",strtotime($row['pm_date_end']));
            
            $sched_res[$row['pm_id']] = $row;
        }

        if(isset($conn)) $conn->close();
      
     
    ?>

    <!-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark bg-gradient" id="topNavBar">
        <div class="container d-flex justify-content-center">
            <div class="row">
                <div class="col-md-12">
                    <a class="navbar-brand title" href="#">How to use Full Calendar with MySQL in PHP? - Nicesnippets.com</a>
                </div>
            </div>
        </div>
    </nav> -->
    <div class="container py-5" id="page-container">
        
        <div class="row">
            <div class="col-lg-12">
                <div id="calendar"></div>
            </div>
            <!-- <div class="col-md-3">
                <div class="cardt rounded-0 shadow">
                    <div class="card-header bg-gradient bg-primary text-light">
                        <h5 class="card-title">Schedule Form</h5>
                    </div>
                    <div class="card-body">
                        <div class="container-fluid">
                            <form action="save_schedule.php" method="post" id="schedule-form">
                                <input type="hidden" name="id" value="">
                                <div class="form-group mb-2">
                                    <label for="title" class="control-label">Title</label>
                                    <input type="text" class="form-control form-control-sm rounded-0" name="title" id="title" required>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="description" class="control-label">Description</label>
                                    <textarea rows="3" class="form-control form-control-sm rounded-0" name="description" id="description" required></textarea>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="start_datetime" class="control-label">Start</label>
                                    <input type="datetime-local" class="form-control form-control-sm rounded-0" name="start_datetime" id="start_datetime" required>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="end_datetime" class="control-label">End</label>
                                    <input type="datetime-local" class="form-control form-control-sm rounded-0" name="end_datetime" id="end_datetime" required>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="text-center">
                            <button class="btn btn-primary btn-sm rounded-0" type="submit" form="schedule-form" name="btn_save"><i class="fa fa-save"></i> Save</button>
                            <button class="btn btn-default border btn-sm rounded-0" type="reset" form="schedule-form"><i class="fa fa-reset"></i> Cancel</button>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
    <!-- Event Details Modal -->
    <div class="modal fade" tabindex="-1" data-bs-backdrop="static" id="event-details-modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-0">
                <div class="modal-header rounded-0">
                    <h5 class="modal-title">Schedule Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body rounded-0">
                    <div class="container-fluid">
                        <dl>
                            <dt class="text-muted">Title</dt>
                            <dd id="title" class="fw-bold fs-4"></dd>
                            <dt class="text-muted">Description</dt>
                            <dd id="description" class=""></dd>
                            <dt class="text-muted">Start</dt>
                            <dd id="start" class=""></dd>
                            <dt class="text-muted">End</dt>
                            <dd id="end" class=""></dd>
                        </dl>
                    </div>
                </div>
                <div class="modal-footer rounded-0">
                    <div class="text-end">
                        <button type="button" class="btn btn-primary btn-sm rounded-0" id="edit" data-id="">Edit</button>
                        <button type="button" class="btn btn-danger btn-sm rounded-0" id="delete" data-id="">Delete</button>
                        <button type="button" class="btn btn-secondary btn-sm rounded-0" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.js"></script>
    <!-- <script src="calendar.js"></script> -->
    <script>
        var scheds = $.parseJSON('<?= json_encode($sched_res) ?>')
        console.log(scheds);
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
            var pm_id = info.events.pm_id;

            if (!!scheds[pm_id]) {
                details.find('#title').text(scheds[pm_id].pm_name);
                details.find('#description').text(scheds[pm_id].pm_invt_name);
                details.find('#start').text(scheds[pm_id].pm_date_start);
                details.find('#end').text(scheds[pm_id].pm_date_end);
                details.find('#edit,#delete').attr('data-id', pm_id);
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
        var id = $(this).attr('data-id');

        if (!!scheds[id]) {
            var form = $('#schedule-form');

            console.log(String(scheds[id].pm_date_start), String(scheds[id].pm_date_start).replace(" ", "\\t"));
            form.find('[name="id"]').val(id);
            form.find('[name="title"]').val(scheds[id].pm_name);
            form.find('[name="description"]').val(scheds[id].pm_invt_name);
            form.find('[name="start_datetime"]').val(String(scheds[id].pm_date_start).replace(" ", "T"));
            form.find('[name="end_datetime"]').val(String(scheds[id].pm_date_end).replace(" ", "T"));
            $('#event-details-modal').modal('hide');
            form.find('[name="title"]').focus();
        } else {
            alert("Event is undefined");
        }
        console.log(id);
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
    </script>
</body>
</html>