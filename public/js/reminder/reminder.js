if (typeof CHA == "undefined") {
    var CHA = {};
}

CHA.reminder = {

    container : $("#next-dates-popup"),

    init: function () {
        this.getNextDates();
    },
    getNextDates: function () {
        var that = this;
        $.ajax( {
            url: "/reminder/get-dates",
            success: function(data) {
                that.container.html(data);
            }
        } );
    }
};