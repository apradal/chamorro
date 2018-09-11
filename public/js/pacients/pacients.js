/**
 * Created by anton on 04/08/2018.
 */
if (typeof CHA == "undefined") {
    var CHA = {};
}

CHA.formsearch = {

    pacientInput: $("#pacient"),
    hiddenPacientId: $("#pacient-id-hidden"),

    init: function () {
        this.events();
    },
    events: function () {
        this.getPacients();
    },
    getPacients: function () {
        var that = this;
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
            minLength: 2,
            select: function( event, ui ) {
                that.pacientInput.val(ui.item.name);
                that.hiddenPacientId.attr('value', ui.item.id);
                return false;
            }
        });
    }
};

$(document).ready(function(){
    CHA.formsearch.init();
});

