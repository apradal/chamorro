/**
 * Created by anton on 27/08/2018.
 */
if (typeof CHA == "undefined") {
    var CHA = {};
}

CHA.main = {

    treatmentsBtn: $("#treatments-btn"),
    treatmentsBox: $("#treatments-box"),
    nextDatesBtn: $("#next-dates-btn"),
    nextDatesBox: $("#next-dates-box"),
    blockBackground: $(".block-background"),
    closeTreatmentsBoxBtn: $("#treatments-box-close"),
    closeNextDatesBoxBtn: $("#next-dates-box-close"),
    cuadranteBtn: $("#cuadrante-btn"),
    cuadranteFormBox: $("#cuadrante-box-add"),
    closeCuadranteBtn: $("#cuadrante-box-close"),
    revisionBtn: $("#revision-btn"),
    revisionFormBox: $("#revision-box-add"),
    closeRevisionBtn: $("#revision-box-close"),
    limpiezaBtn: $("#limpieza-btn"),
    limpiezaFormBox: $("#limpieza-box-add"),
    closeLimpiezaBtn: $("#limpieza-box-close"),
    mantenimientoBtn: $("#mantenimiento-btn"),
    mantenimientoFormBox: $("#mantenimiento-box-add"),
    closeMantenimientoBtn: $("#mantenimiento-box-close"),
    /** Next Date elemetns */
    dateRevisionBtn: $("#next-dates-revision-btn"),
    nextDateRevisionFormBox: $("#revision-date-box-add"),
    closeNextDateRevisionBtn: $("#revision-date-box-close"),



    init: function () {
        this.events();
    },
    events: function () {
        this.showHideTreatments();
        this.showHideTreatmentsList();
        this.showHideDates();
        this.showHideCuadrantes();
        this.showHideRevisions();
        this.showHideLimpiezas();
        this.showHideMantenimientos();
        this.showHideNextDateRevisions();
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
    showHideCuadrantes: function () {
        var that = this;
        this.cuadranteBtn.on('click', function () {
            that.cuadranteFormBox.fadeIn(500);
            that.cuadranteFormBox.removeClass("hidden");
            that.treatmentsBox.fadeOut(0);
        });
        this.closeCuadranteBtn.on('click', function () {
            that.cuadranteFormBox.fadeOut(500);
            that.blockBackground.fadeOut(500);
        })
    },
    showHideRevisions: function () {
        var that = this;
        this.revisionBtn.on('click', function () {
            that.revisionFormBox.fadeIn(500);
            that.revisionFormBox.removeClass("hidden");
            that.treatmentsBox.fadeOut(0);
        });
        this.closeRevisionBtn.on('click', function () {
            that.revisionFormBox.fadeOut(500);
            that.blockBackground.fadeOut(500);
        })
    },
    showHideLimpiezas: function () {
        var that = this;
        this.limpiezaBtn.on('click', function () {
            that.limpiezaFormBox.fadeIn(500);
            that.limpiezaFormBox.removeClass("hidden");
            that.treatmentsBox.fadeOut(0);
        });
        this.closeLimpiezaBtn.on('click', function () {
            that.limpiezaFormBox.fadeOut(500);
            that.blockBackground.fadeOut(500);
        })
    },
    showHideMantenimientos: function () {
        var that = this;
        this.mantenimientoBtn.on('click', function () {
            that.mantenimientoFormBox.fadeIn(500);
            that.mantenimientoFormBox.removeClass("hidden");
            that.treatmentsBox.fadeOut(0);
        });
        this.closeMantenimientoBtn.on('click', function () {
            that.mantenimientoFormBox.fadeOut(500);
            that.blockBackground.fadeOut(500);
        })
    },
    /** Next dates */
    showHideNextDateRevisions: function () {
        var that = this;
        this.dateRevisionBtn.on('click', function () {
            that.nextDateRevisionFormBox.fadeIn(500);
            that.nextDateRevisionFormBox.removeClass("hidden");
            that.nextDatesBox.fadeOut(0);
        });
        this.closeNextDateRevisionBtn.on('click', function () {
            that.nextDateRevisionFormBox.fadeOut(500);
            that.blockBackground.fadeOut(500);
        })
    },
};

$(document).ready(function(){
    CHA.main.init();
});