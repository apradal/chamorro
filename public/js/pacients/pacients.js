/**
 * Created by anton on 04/08/2018.
 */
if (typeof CHA == "undefined") {
    var CHA = {};
}

CHA.formsearch = {

    pacientInput: $("#pacient"),
    pacientIdInput: $("input[name='pacient_id']"),

    init: function () {
        this.events();
    },
    events: function () {
        this.getPacients();
    },
    getPacients: function () {
        var that = this;
        this.pacientInput.on('keyup', function () {
            if (this.value.length <= 1) {
                that.pacientIdInput.val('');
            }
        });
        this.pacientInput.autocomplete({
            source: function( request, response ) {
                $.ajax( {
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "/pacients/seach-pacient-ajax",
                    dataType: "json",
                    data: {
                        term: request.term
                    },
                    success: function( data ) {
                        response( data );
                    }
                } );
            },
            minLength: 1,
            select: function( event, ui ) {
                that.pacientIdInput.val(ui.item.id);
            }
        });
    }
};

$(document).ready(function(){
    CHA.formsearch.init();
});

