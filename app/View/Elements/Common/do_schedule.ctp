<script>
    var click = false;
    $(function() {

        var date = new Date();
        var d = date.getDate(),
                m = date.getMonth(),
                y = date.getFullYear(), h = date.getHours(), mm = date.getMinutes();
        var canlendar = $('#canlendar');
        var form = $('#addBuoiForm');
        var ten_buoi_tb = $('#new-event');
        var mau_nen_tb = $('#txt_background_color');
        var su_kien_hien_tai_selector = $('#txt_current_event');
        var uu_tien_tb = $('#pri-event');
        var phong_cb = $('#room-event');
        var nut_add = $('#add-new-event');
        var nut_sua = $('#edit-event');
        var nut_xoa = $('#delete-event');
        var nut_luu = $('#save-event');
        var nut_huy = $('#cancel-event');
        /**********************************************************/

        khoi_tao_color_picker();
        khoi_tao_full_canlendar();
        khoi_tao_su_kien($('#external-events div.external-event'));
        khoi_tao_form();
        khoi_tao_them();
        khoi_tao_xoa();
        khoi_tao_huy();
        function khoi_tao_color_picker() {
            $('.demo').each(function() {
                $(this).minicolors({
                    control: $(this).attr('data-control') || 'hue',
                    defaultValue: $(this).attr('data-defaultValue') || '',
                    inline: $(this).attr('data-inline') === 'true',
                    letterCase: $(this).attr('data-letterCase') || 'lowercase',
                    opacity: $(this).attr('data-opacity'),
                    position: $(this).attr('data-position') || 'bottom left',
                    change: function(hex, opacity) {
                        if (!hex)
                            return;
                        if (opacity)
                            hex += ', ' + opacity;
                    },
                    theme: 'bootstrap'
                });
            });
        }
        function khoi_tao_full_canlendar() {
            $('#calendar').fullCalendar({
                allDayDefault: false,
                defaultView: 'agendaWeek',
                firstHour: 8,
                slotMinutes: 30,
                defaultEventMinutes: 240,
                axisFormat: 'HH:mm',
                timeFormat: {
                    agenda: 'H:mm{ - h:mm}'
                },
                dragOpacity: {
                    agenda: .5
                },
                minTime: 0,
                maxTime: 24,
                /***/
                dayNamesShort: ['CN', 'Hai', 'Ba', 'Tư', 'Năm', 'Sáu', 'Bảy'],
                dayNames: ['Chủ nhật', 'Thứ hai', 'Thứ ba', 'Thứ tư', 'Thứ năm', 'Thứ sáu', 'Thứ bảy'],
                columnFormat: {
                    month: 'ddd', // Mon
                    week: 'ddd d/M', // Mon 9/7
                    day: 'dddd d/M'  // Monday 9/7
                },
                monthNames: ['Tháng giêng', 'Tháng hai', 'Tháng ba', 'Tháng tư', 'Tháng năm', 'Tháng sáu', 'Tháng bảy',
                    'Tháng tám', 'Tháng chín', 'Tháng mười', 'Tháng mười một', 'Tháng mười hai'],
                titleFormat: {
                    month: 'MMMM - yyyy', // September 2009
                    week: "d[ yyyy]{ '&#8212;'[ MMM] d  MMM yyyy}", // Sep 7 - 13 2009
                    day: 'dddd, d MMM, yyyy'                  // Tuesday, Sep 8, 2009
                },
                monthNamesShort: ['Th01', 'Th02', 'Th03', 'Th04', 'Th05', 'Th06', 'Th07', 'Th08', 'Th09', 'Th10', 'Th11', 'Th02'],
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
                //Random default events
                events: '<?php echo SUB_DIR ?>/courses_rooms/index.json?course_id=' +<?php echo $course_id; ?>,
                editable: true,
                droppable: true, // this allows things to be dropped onto the calendar !!!
                eventRender: function(event, element) {

                    var stDate = $.fullCalendar.formatDate(event.start, "hh:mm ngày dd-MM-yyyy");
                    var stEnd = $.fullCalendar.formatDate(event.end, "hh:mm ngày dd-MM-yyyy");
                    var content = '<h3>' + event.title + '</h3>' +
                            '<p><b>Bắt đầu:</b> ' + stDate + '<br />' +
                            (event.end && '<p><b>Kết thúc:</b> ' + stEnd + '</p>' || '') +
                            '<p><b>Thứ tự học:</b> ' + event.priority + '<br />' +
                            (event.room && '<p><b>Địa điểm:</b> ' + event.room + '</p>' || '');
                    element.qtip({
                        content: {
                            text: content
                        }
                    });

                },
                eventResize: function(event, dayDelta, minuteDelta, revertFunc, jsEvent, ui, view) {
                    var start = ($.fullCalendar.formatDate(event.start, 'yyyy-MM-dd H:mm'));
                    var end = ($.fullCalendar.formatDate(event.end, 'yyyy-MM-dd H:mm'));
                    $.ajax({
                        type: "POST",
                        url: '<?php echo SUB_DIR ?>/courses_rooms/cap_nhat_buoi/' + event.id,
                        data: {start: start, end: end}
                    }).error(function() {
                        bootstrap_alert("Thay đổi thời gian bắt đầu không thành công");
                    }).done(function(data) {
                        data = $.parseJSON(data);
                        if (!data.status) {
                            bootstrap_alert(data.message);
                            revertFunc();
                            return true;
                        }
                    });

                },
                eventDrop: function(event, dayDelta, minuteDelta, allDay, revertFunc, jsEvent, ui, view) {

                    var start = ($.fullCalendar.formatDate(event.start, 'yyyy-MM-dd H:mm'));
                    var end = ($.fullCalendar.formatDate(event.end, 'yyyy-MM-dd H:mm'));

                    $.ajax({
                        type: "POST",
                        url: '<?php echo SUB_DIR ?>/courses_rooms/cap_nhat_buoi/' + event.id,
                        data: {start: start, end: end}
                    }).error(function() {
                        bootstrap_alert("Thay đổi thời gian bắt đầu không thành công");
                    }).done(function(data) {
                        data = $.parseJSON(data);

                        if (!data.status) {
                            bootstrap_alert(data.message);
                            revertFunc();
                            return true;
                        }
                    });
                },
                drop: function(date, allDay) {
                    var drop_element = $(this);
                    var originalEventObject = $(this).data('eventObject');
                    var copiedEventObject = sao_chep_su_kien($(this), originalEventObject, date, allDay);
                    //console.log(copiedEventObject);return;
                    var start = $.fullCalendar.formatDate(copiedEventObject.start, 'yyyy-MM-dd H:mm');
                    var end = $.fullCalendar.formatDate(copiedEventObject.end, 'yyyy-MM-dd H:mm');

                    //Cập nhật dữ liệu thời gian
                    $.ajax({
                        type: "POST",
                        url: '<?php echo SUB_DIR ?>/courses_rooms/cap_nhat_buoi/' + copiedEventObject.id,
                        data: {start: start, end: end}
                    }).error(function() {
                        bootstrap_alert("Cập nhật thời gian bắt đầu không thành công");
                    })
                            .done(function(data) {
                                data = $.parseJSON(data);
                                if (!data.status) {
                                    bootstrap_alert(data.message);

                                } else {
                                    $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);
                                    drop_element.remove();

                                }
                            });

                },
                eventClick: function(calEvent, jsEvent, view) {
                    xu_ly_click_su_kien(calEvent, jsEvent, view);
                },
                eventAfterAllRender: function(view) {
<?php
if (!empty($buoi_dau_tien)) {
    $date = new DateTime($buoi_dau_tien);
    ?>
                        if (!click) {
                            $('#calendar').fullCalendar('gotoDate', <?php echo $date->format('Y'); ?>,<?php echo ($date->format('m') - 1); ?>,<?php echo $date->format('d'); ?>);
                        }
                        click = true;
<?php } ?>
                }
            });

        }
        function khoi_tao_su_kien(ele) {
            ele.each(function() {
                var eventObject = {
                    title: $(this).data('title'), // use the element's text as the event title
                    room: $(this).data('room'),
                    backgroundColor: $(this).data('color'),
                    borderColor: "#f56954", //red
                    priority: $(this).data('priority')
                };
                // store the Event Object in the DOM element so we can get to it later
                $(this).data('eventObject', eventObject);
                // make the event draggable using jQuery UI
                $(this).draggable({
                    zIndex: 1070,
                    revert: true, // will cause the event to go back to its
                    revertDuration: 0  //  original position after the drag
                });
            });
        }
        function isInteger(argument) {
            return argument == ~~argument;
        }
        function sao_chep_su_kien(event, originalEventObject, date, allDay) {
            var copiedEventObject = $.extend({}, originalEventObject);
            // assign it the date that was reported
            copiedEventObject.id = event.data("id");
            if (isInteger(date.getHours()) && date.getHours() == 0) {
                date.setHours(7);
                //console.log(date);
            }

            if (!isInteger(date.getMinutes())) {
                date.setMinutes(30);
                //console.log(date);
            }

            var end = new Date(date);


            end.setMinutes(date.getMinutes() + 180);
            copiedEventObject.start = date;
            copiedEventObject.end = end;
            copiedEventObject.allDay = false;
            copiedEventObject.backgroundColor = event.data("color");
            copiedEventObject.borderColor = event.css("border-color");
            copiedEventObject.room_id = event.data("room_id");
            copiedEventObject.room = event.data("room");
            copiedEventObject.title = event.data("title");
            return copiedEventObject;
        }
        /* Xử lý click lên 1 sự kiện trên canlendar*/
        function xu_ly_click_su_kien(cal_event, js_event, view) {
            khoi_tao_sua();
            //Thiết lập các giá trị cho form thêm buổi
            dien_gia_tri_form_tu_event(cal_event.id, cal_event.color, cal_event.title, cal_event.priority, cal_event.room_id);
        }
        //Hàm xử lý khi nút edit-event được click
        function dien_gia_tri_form_tu_event(event_id, bg_color, title, priority, room_id) {
            su_kien_hien_tai_selector.val(event_id);
            mau_nen_tb.minicolors('value', bg_color);
            ten_buoi_tb.val(title);
            uu_tien_tb.val(priority);
            $("#room-event option[value='" + room_id + "']").attr('selected', 'selected');
        }
        function disable_form_input() {

            ten_buoi_tb.attr('disabled', 'disabled');
            uu_tien_tb.attr('disabled', 'disabled');
            mau_nen_tb.attr('disabled', 'disabled');
            phong_cb.attr('disabled', 'disabled');
        }
        function khoi_tao_nut() {
            //Ẩn nút thêm
            nut_add.removeClass('disabled');
            nut_sua.addClass('disabled');
            nut_luu.addClass('disabled');
            nut_xoa.addClass('disabled');
            nut_huy.addClass('disabled');
        }
        function khoi_tao_form() {
            form.resetForm();
            su_kien_hien_tai_selector.val('');
            disable_form_input();
            khoi_tao_nut();
        }
        function khoi_tao_them() {
            nut_add.bind('click', function() {
                nut_add.addClass('disabled');
                ten_buoi_tb.removeAttr('disabled');
                uu_tien_tb.removeAttr('disabled');
                mau_nen_tb.removeAttr('disabled');
                phong_cb.removeAttr('disabled');
                nut_luu.removeClass('disabled');
                nut_huy.removeClass('disabled');
                nut_sua.addClass('disabled');
                nut_xoa.addClass('disabled');
            });
        }
        function khoi_tao_sua() {
            nut_add.addClass('disabled');
            nut_luu.addClass('disabled');
            nut_sua.removeClass('disabled');
            nut_xoa.removeClass('disabled');
            nut_huy.removeClass('disabled');
            ten_buoi_tb.attr('disabled', 'disabled');
            uu_tien_tb.attr('disabled', 'disabled');
            mau_nen_tb.attr('disabled', 'disabled');
            phong_cb.attr('disabled', 'disabled');
            nut_sua.off('click');
            nut_sua.bind('click', function() {
                ten_buoi_tb.removeAttr('disabled');
                uu_tien_tb.removeAttr('disabled');
                mau_nen_tb.removeAttr('disabled');
                phong_cb.removeAttr('disabled');
                nut_luu.removeClass('disabled');
                nut_huy.removeClass('disabled');
                nut_sua.addClass('disabled');
                nut_xoa.addClass('disabled');
            });
        }
        function khoi_tao_xoa() {
            nut_xoa.bind('click', function() {
                var current_event_id = su_kien_hien_tai_selector.val();
                if (current_event_id) {
                    var r = confirm("Bạn chắc xóa không ?");
                    if (r == true) {
                        //Retrieve current event
                        var current_event = $('#calendar').fullCalendar('clientEvents', current_event_id);

                        //Check if found
                        if (current_event && current_event.length == 1) {
                            $.ajax({
                                type: "POST",
                                url: '<?php echo SUB_DIR ?>/courses_rooms/removeEvent/' + current_event_id
                            }).done(function(data, textStatus, jqXHR) {

                                $('#calendar').fullCalendar('removeEvents', current_event_id);
                                khoi_tao_form();
                            });
                        }
                    }
                }
            });
        }
        function khoi_tao_huy() {
            nut_huy.bind('click', function() {
                khoi_tao_form();
            });
        }
        //form.removeAttr('onsubmit');
        form.on('submit', function(e) {
            e.preventDefault();
            //Create vars
            var current_event_id = su_kien_hien_tai_selector.val();
            //Check if value found
            if (current_event_id) {                 //Retrieve current event

                var current_event = $('#calendar').fullCalendar('clientEvents', current_event_id);
                //sửa
                if (current_event && current_event.length == 1) {
                    //Retrieve current event from array
                    current_event = current_event[0];
                    //Set values
                    current_event.backgroundColor = mau_nen_tb.val();
                    current_event.title = ten_buoi_tb.val();
                    current_event.textColor = '#fff';
                    current_event.borderColor = mau_nen_tb.val();
                    current_event.room_id = phong_cb.val();
                    current_event.room = $("#room-event option:selected").text();
                    current_event.priority = uu_tien_tb.val();
                    current_event.color = mau_nen_tb.val();
                    //Update event
                    var options = {
                        //target: '#output2', // target element(s) to be updated with server response 
                        success: function(responseText, statusText, xhr, $form) {
                            if (responseText.response.status) {
                                $('#calendar').fullCalendar('updateEvent', current_event);
                                khoi_tao_form();
                            } else {
                                var error = responseText.response.message;
                                bootstrap_alert(error, 'warning');
                            }
                        }, // post-submit callback 
                        // other available options: 
                        url: '<?php echo SUB_DIR ?>/courses_rooms/' + current_event.id + '.json', // override for form's 'action' attribute 
                        type: 'put', // 'get' or 'post', override for form's 'method' attribute 
                        //resetForm: true, // reset the form after successful submit
                        timeout: 3000
                    };
                    $(this).append('<input type="hidden" name="data[CoursesRoom][course_id]" value="' + <?php echo $course_id; ?> + '">');
                    $(this).ajaxSubmit(options);
                    return false;
                }
            } else {
                form.append('<input type="hidden" name="data[CoursesRoom][course_id]" value="<?php echo $course_id; ?>">');
                form.ajaxSubmit({
                    url: '<?php echo SUB_DIR ?>/courses_rooms/add.json',
                    success: addBuoiResponse
                });
            }

        });
        /* ADDING EVENTS */
        function remote_add_event() {
            form.on('submit', function(e) {
                $(this).append('<input type="hidden" name="data[CoursesRoom][course_id]" value="<?php echo $course_id; ?>">');
                e.preventDefault();
                $(this).ajaxSubmit({
                    url: '<?php echo SUB_DIR ?>/courses_rooms/add.json',
                    success: addBuoiResponse
                });
            });
        }
        function addBuoiResponse(responseText, statusText, xhr, $form) {
            if (responseText.response.status) {
                var event = $("<div />");
                event.css(
                        {
                            "id": responseText.response.id,
                            "background-color": responseText.response.currColor,
                            "border-color": responseText.response.currColor,
                            "color": "#fff"
                        }).addClass("external-event");
                event.attr('data-room', responseText.response.room);
                event.attr('data-title', responseText.response.title);
                event.attr('data-room_id', responseText.response.room_id);
                event.attr('data-priority', responseText.response.priority);
                event.attr('data-color', responseText.response.currColor);
                event.attr('data-id', responseText.response.id);
                event.html(responseText.response.title);
                $('#external-events').prepend(event);
                //Thêm khả năng kéo thả
                khoi_tao_su_kien(event);
                khoi_tao_form();
            } else {
                var error = responseText.response.message;
                bootstrap_alert(error, 'warning');
            }

            return true;
        }
        function bootstrap_alert(message, type) {
            if (type == 'warning')
                $('#message').append('<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4>Cảnh báo</h4>' + message + '</div>');
            else
                $('#message').append('<div class="alert alert-block alert-info"><button type="button" class="close" data-dismiss="alert">&times;</button><h4>Thông báo!</h4>' + message + '</div>');
            alertTimeout(7000); //and here
        }
        function alertTimeout(wait) {
            setTimeout(function() {
                $('#message').children('.alert:first-child').remove();
            }, wait);
        }
    });
</script>