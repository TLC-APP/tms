// The goal of this language config is to give FullCalendar everything it needs for
// translations (in this case, French). This happens to be a merge of Moment's and
// the jQuery UI datepicker's configs, in addition to some other strings.
//
// Additionally, when this config is loaded, Moment and the jQuery UI datepicker
// (if it is on the page) will also be initialized.
//
(function(){
    function onload (moment, $) {

        // RIPPED STRAIGHT FROM MOMENT'S SOURCE
        // (https://github.com/moment/moment/blob/develop/lang/fr.js)
        //
        moment.lang('vi', {
            months : "Tháng giêng_Tháng hai_Tháng ba_Tháng tư_Tháng năm_Tháng sáu_Tháng bảy_Tháng tám_Tháng chín_Tháng mười_Tháng mười một_Tháng mười hai".split("_"),
            monthsShort : "Th01.Th02_Th03_Th04_Th05_Th06_Th07_Th08_Th09_Th10_Th11_Th12".split("_"),
            weekdays : "Thứ hai_Thứ ba_Thứ tư_Thứ năm_Thứ sáu_Thứ bảy_Chủ nhật".split("_"),
            weekdaysShort : "Hai_Ba_Tư_Năm_Sáu_Bảy_CN".split("_"),
            weekdaysMin : "H_Ba_Tư_Năm_Sáu_Bảy_CN".split("_"),
            longDateFormat : {
                LT : "HH:mm",
                L : "DD/MM/YYYY",
                LL : "D MMMM YYYY",
                LLL : "D MMMM YYYY LT",
                LLLL : "dddd D MMMM YYYY LT"
            },
            calendar : {
                sameDay: "[Aujourd'hui à] LT",
                nextDay: '[Demain à] LT',
                nextWeek: 'dddd [à] LT',
                lastDay: '[Hier à] LT',
                lastWeek: 'dddd [dernier à] LT',
                sameElse: 'L'
            },
            relativeTime : {
                future : "dans %s",
                past : "il y a %s",
                s : "quelques secondes",
                m : "une minute",
                mm : "%d minutes",
                h : "une heure",
                hh : "%d heures",
                d : "un jour",
                dd : "%d jours",
                M : "un mois",
                MM : "%d mois",
                y : "un an",
                yy : "%d ans"
            },
            ordinal : function (number) {
                return number + (number === 1 ? 'er' : '');
            },
            week : {
                dow : 1, // Monday is the first day of the week.
                doy : 4  // The week that contains Jan 4th is the first week of the year.
            }
        });
        
        
        if ($.fullCalendar) {
            $.fullCalendar.lang('vi', {
                // strings we need that are neither in Moment nor datepicker
                "day": "Ngày",
                "week": "Tuần",
                "month": "Tháng",
                "list": "Mon planning"
            }, {
                // VALUES ARE FROM JQUERY-UI DATEPICKER'S TRANSLATIONS
                // (https://github.com/jquery/jquery-ui/blob/master/ui/i18n/jquery.ui.datepicker-fr.js)
                // 
                // Values that are reduntant because of Moment are not included here.
                //
                // When fullCalendar's lang method is called, it will merge this config with Moment's
                // and make this stuff available for jQuery UI's datepicker:
                //
                //     $.datepicker.regional['fr'] = ...
                //
                closeText: 'Đóng lại',
                prevText: 'Trước',
                nextText: 'Kế',
                currentText: 'Hiện tại',
                dayNamesMin: ['Hai','Ba','Tư','Năm','Sáu','Bảy','CN'],
                weekHeader: 'Tuần',
                dateFormat: 'dd/mm/yyyy',
                firstDay: 1,
                isRTL: false,
                showMonthAfterYear: false,
                yearSuffix: ''
            });
        }

    }

    // we need Moment and jQuery before we can begin...
    //
    if (typeof define === "function" && define.amd) {
        define(["moment", "jquery"], onload);
    }
    if (typeof window !== "undefined" && window.moment && window.jQuery) {
        onload(window.moment, window.jQuery);
    }

})();
