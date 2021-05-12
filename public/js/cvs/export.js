$(document).ready(function() {
    $('#by').change(function (){
        $('#div_by_day').hide();
        $('#div_by_week').hide();
        $('#div_by_month').hide();
        $('#div_by_year').hide();
        $('#div_by_rango').hide();
        id = this.value;
        switch (id) {
            case "2":
                $('#div_by_day').show();
                break;
            case "3":
                $('#div_by_week').show();
                break;
            case "4":
                $('#div_by_month').show();
                break;
            case "5":
                $('#div_by_year').show();
                break;
            case "6":
                $('#div_by_rango').show();
                break;
        
            default:
                break;
        }
    });
});