$("select[name=log_picker]").change(function () {
    if ( $(this).val() ) {
            $(".log").hide();
            $("#" + $(this).val()).show();
    }
}).change();