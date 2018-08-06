/**
 * Created by anton on 06/08/2018.
 */
if (typeof CHA == "undefined") {
    var CHA = {};
}

CHA.card = {

    init: function () {
        this.events();
    },
    events: function () {
        this.showHideTextAreas();
    },
    showHideTextAreas: function () {
        var checkBoxes = $("input[type=checkbox]");
        checkBoxes.on('click', function () {
            if (this.checked === true) {
                $("#" + this.id + "-desc").removeClass("hidden");
                $("#" + this.id + "-desc").fadeIn(500);
            } else {
                $("#" + this.id + "-desc").fadeOut(500);
                $("#" + this.id + "-desc").val("");
            }
        });
    }
};

$(document).ready(function(){
    CHA.card.init();
});