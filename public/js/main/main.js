/**
 * Created by anton on 27/08/2018.
 */
if (typeof CHA == "undefined") {
    var CHA = {};
}

CHA.main = {

    /** Main elements **/
    treatmentsBtn: $("#treatments-btn"),
    treatmentsBox: $("#treatments-box"),
    nextDatesBtn: $("#next-dates-btn"),
    nextDatesBox: $("#next-dates-box"),
    blockBackground: $(".block-background"),
    closeTreatmentsBoxBtn: $("#treatments-box-close"),
    closeNextDatesBoxBtn: $("#next-dates-box-close"),
    /** Treatment elements **/
    cuadranteBtn: $("#cuadrante-btn"),
    closeCuadranteBtn: $("#cuadrante-box-close"),
    revisionBtn: $("#revision-btn"),
    closeRevisionBtn: $("#revision-box-close"),
    limpiezaBtn: $("#limpieza-btn"),
    closeLimpiezaBtn: $("#limpieza-box-close"),
    mantenimientoBtn: $("#mantenimiento-btn"),
    closeMantenimientoBtn: $("#mantenimiento-box-close"),
    /** Next Date elemetns */
    dateRevisionBtn: $("#next-dates-revision-btn"),
    dateLimpiezaBtn: $("#next-dates-limpieza-btn"),
    dateMantenimientoBtn: $("#next-dates-mantenimiento-btn"),
    closeNextDateRevisionBtn: $("#revision-date-box-close"),
    closeNextDateLimpiezaBtn: $("#limpieza-date-box-close"),
    closeNextDateMantenimientoBtn: $("#mantenimiento-date-box-close"),


    init: function () {
        this.events();
    },
    events: function () {
        this.showHideTreatments();
        this.showHideTreatmentsList();
        this.showHideDates();
        this.showHideTreatmentsBox();
        /*this.showHideRevisions();
        this.showHideLimpiezas();
        this.showHideMantenimientos();*/
        this.showHideNextDates();
    },
    /** Main */
    showHideTreatments: function () {
        var that = this;
        this.treatmentsBtn.on('click', function () {
            that.treatmentsBox.fadeIn(800);
            that.treatmentsBox.removeClass("hidden");
            that.blockBackground.fadeIn(500);
            that.blockBackground.removeClass("hidden");
        });
        this.closeTreatmentsBoxBtn.on('click', function () {
            that.treatmentsBox.fadeOut(500);
            that.blockBackground.fadeOut(500);
        })
    },
    showHideDates: function () {
        var that = this;
        this.nextDatesBtn.on('click', function () {
            that.nextDatesBox.fadeIn(800);
            that.nextDatesBox.removeClass("hidden");
            that.blockBackground.fadeIn(500);
            that.blockBackground.removeClass("hidden");
        });
        this.closeNextDatesBoxBtn.on('click', function () {
            that.nextDatesBox.fadeOut(500);
            that.blockBackground.fadeOut(500);
        })
    },
    /** Tratments */
    showHideTreatmentsList: function () {
        var treatmentListHeader = $('.treatments-box-list-header');
        treatmentListHeader.on('click', function () {
           $(this).parent().toggleClass('list-no-active');
        })
    },
    showHideTreatmentsBox: function () {
        var that = this;
        $(this.cuadranteBtn).add(this.revisionBtn).add(this.limpiezaBtn).add(this.mantenimientoBtn).on('click', function () {
            var id = $(this.getAttribute('data-box'));
            id.fadeIn(500);
            id.removeClass("hidden");
            that.treatmentsBox.fadeOut(0);
        });
        $(this.closeCuadranteBtn).add(this.closeRevisionBtn).add(this.closeLimpiezaBtn).add(this.closeMantenimientoBtn).on('click', function () {
            var id = $(this.getAttribute('data-box'));
            id.fadeOut(500);
            that.blockBackground.fadeOut(500);
        })
    },
    /** Next dates */
    showHideNextDates: function () {
        var that = this;
        $(this.dateRevisionBtn).add(this.dateLimpiezaBtn).add(this.dateMantenimientoBtn).on('click', function () {
            var boxId = $(this.getAttribute('data-box'));
            boxId.fadeIn(500);
            boxId.removeClass("hidden");
            that.nextDatesBox.fadeOut(0);
        });
        $(this.closeNextDateRevisionBtn).add(this.closeNextDateLimpiezaBtn).add(this.closeNextDateMantenimientoBtn).on('click', function () {
            var id = $(this.getAttribute('data-box'));
            id.fadeOut(500);
            that.blockBackground.fadeOut(500);
        })
    },
};

$(document).ready(function(){
    CHA.main.init();
});