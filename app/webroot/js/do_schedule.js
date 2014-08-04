
$(function() {

    /* initialize the external events
     -----------------------------------------------------------------*/
    function ini_events(ele) {
        ele.each(function() {
            var eventObject = {
                title: $.trim($(this).text()) // use the element's text as the event title
            };
            $(this).data('eventObject', eventObject);
            $(this).draggable({
                zIndex: 1070,
                revert: true, // will cause the event to go back to its
                revertDuration: 0  //  original position after the drag
            });

        });
    }
    ini_events($('#external-events div.external-event'));
    var date = new Date();
    var d = date.getDate(),
            m = date.getMonth(),
            y = date.getFullYear();
    $('#calendar').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },
        buttonText: {//This is to add icons to the visible buttons
            prev: "<span class='fa fa-caret-left'></span>",
            next: "<span class='fa fa-caret-right'></span>",
            today: 'Hôm nay',
            month: 'tháng',
            week: 'tuần',
            day: 'ngày'
        },        
        editable: true,
        droppable: true,
        eventRender: function(event, element) {
            element.qtip({
                content: event.room,
                position: {corner: {tooltip: 'bottomLeft', target: 'topRight'}},
                style: {
                    width: 200,
                    padding: 5,
                    background: '#A2D959',
                    color: 'black',
                    textAlign: 'center',
                    border: {
                        width: 7,
                        radius: 5,
                        color: '#A2D959'
                    },
                    tip: 'bottomLeft',
                    name: 'dark'
                }
            });
        },
        drop: function(date, allDay) { 
            var originalEventObject = $(this).data('eventObject');
            var copiedEventObject = $.extend({}, originalEventObject);
            copiedEventObject.start = date;
            copiedEventObject.allDay = allDay;
            copiedEventObject.backgroundColor = $(this).css("background-color");
            copiedEventObject.borderColor = $(this).css("border-color");
            $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

            if ($('#drop-remove').is(':checked')) {
                // if so, remove the element from the "Draggable Events" list
                $(this).remove();
            }

        },
        
        eventClick: function(calEvent, jsEvent, view) {
          var title = prompt('Event Title:', calEvent.title, { buttons: { Ok: true, Cancel: false} });

          if (title){
              calEvent.title = title;
              $('#calendar').fullCalendar('updateEvent',calEvent);
          }
}
    });

    /* ADDING EVENTS */
    var currColor = "#f56954"; //Red by default
    //Color chooser button
    var colorChooser = $("#color-chooser-btn");
    $("#color-chooser > li > a").click(function(e) {
        e.preventDefault();
        //Save color
        currColor = $(this).css("color");
        //Add color effect to button
        colorChooser
                .css({"background-color": currColor, "border-color": currColor})
                .html($(this).text() + ' <span class="caret"></span>');
    });
    $("#add-new-event").click(function(e) {
        e.preventDefault();
        //Get value and make sure it is not null
        var val = $("#new-event").val();
        if (val.length == 0) {
            return;
        }

        //Create event
        var event = $("<div />");
        event.css({"background-color": currColor, "border-color": currColor, "color": "#fff"}).addClass("external-event");
        event.html(val);
        $('#external-events').prepend(event);

        //Add draggable funtionality
        ini_events(event);

        //Remove event from text input
        $("#new-event").val("");
    });
});
