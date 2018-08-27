/**
 * Created by anton on 04/08/2018.
 */
if (typeof CHA == "undefined") {
    var CHA = {};
}

CHA.formsearch = {

    pacientInput: $("#pacient"),

    init: function () {
        this.events();
    },
    events: function () {
        this.getPacients();
    },
    getPacients: function () {
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
            minLength: 1
        });
    }
};

$(document).ready(function(){
    CHA.formsearch.init();
});

