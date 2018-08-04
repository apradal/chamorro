/**
 * Created by anton on 04/08/2018.
 */
if (typeof CHA == "undefined") {
    var CHA = {};
}

CHA.formsearch = {

    pacients: [],
    firtsValue: null,
    pacientInput: $("#pacient"),

    init: function () {
        this.events();
    },
    events: function () {
        this.getPacients();
    },
    getPacients: function () {
        var that = this;
        this.pacientInput.keyup(function () {
            if(this.value.length === 1 && this.firtsValue !== this.value.toLowerCase()) {
                this.firtsValue = this.value.toLowerCase();
                var value = { letter : this.firtsValue };
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: '/pacients/seach-pacient-ajax',
                    data: value,
                    type: 'post',
                    success: function(response){
                        if (response.success && Object.keys(response.pacients).length > 0) {
                            for (var index in response.pacients) {
                                that.pacients.push(response.pacients[index]);
                            }
                            that.pacientInput.autocomplete({
                                source: that.pacients
                            });
                        }
                    }
                });
            } else if (this.value.length === 0) {
                if (Object.keys(that.pacients).length > 0) that.pacients = [];
            }
        });
    }
};

$(document).ready(function(){
    CHA.formsearch.init();
});

