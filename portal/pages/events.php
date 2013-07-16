<style type="text/css">
table.ui-datepicker-calendar tbody td.highlight > a {
    background: url("images/ui-bg_inset-hard_55_ffeb80_1x100.png") repeat-x scroll 50% bottom #FFEB80;
    color: #363636;
    border: 1px solid #FFDE2E;
}
</style>
<script type="javascript">
var events = [ 
    { Title: "Five K for charity", Date: new Date("02/13/2011") }, 
    { Title: "Dinner", Date: new Date("02/25/2011") }, 
    { Title: "Meeting with manager", Date: new Date("03/01/2011") }
];

$("#calendar").datepicker({
    beforeShowDay: function(date) {
        var result = [true, '', null];
        var matching = $.grep(events, function(event) {
            return event.Date.valueOf() === date.valueOf();
        });
        
        if (matching.length) {
            result = [true, 'highlight', null];
        }
        return result;
    },
    onSelect: function(dateText) {
        var date,
            selectedDate = new Date(dateText),
            i = 0,
            event = null;
        
        while (i < events.length && !event) {
            date = events[i].Date;

            if (selectedDate.valueOf() === date.valueOf()) {
                event = events[i];
            }
            i++;
        }
        if (event) {
            alert(event.Title);
        }
    }
);
</script>
<div id="calendar"></div>