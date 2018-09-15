if (typeof CHA == "undefined") {
    var CHA = {};
}

CHA.reminder = {

    container : $("#next-dates-popup"),
    loader: $("#loader"),
    background: $(".block-background"),

    init: function () {
        this.closeNextDates();
    },
    getNextDates: function () {
        var that = this;
        $.ajax( {
            url: "/reminder/get-dates",
            success: function(data) {
                that.container.html(data);
                that.loader.css('display', 'none');
                that.background.addClass("hidden");
                CHA.reminder.init();
            }
        });
    },
    closeNextDates: function () {
        var closeDates = $(".close-reminder-date");
        var that = this;
        closeDates.on("click", function(e) {
            that.loader.css('display', 'block');
            that.background.removeClass("hidden");
            var id = e.target.dataset.additionalInfo;
            $.ajax( {
                url: "/reminder/close-date",
                dataType: "json",
                data: {
                    id: id
                },
                success: function() {
                    that.getNextDates();

                }
            });
        });
    }
};