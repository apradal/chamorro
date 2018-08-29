/**
 * Created by anton on 27/08/2018.
 */
if (typeof CHA == "undefined") {
    var CHA = {};
}

CHA.main = {

    treatmentsBtn: $("#treatments-btn"),
    treatmentsBox: $("#treatments-box"),
    blockBackground: $(".block-background"),
    closeTreatmentsBoxBtn: $("#treatments-box-close"),
    cuadranteBtn: $("#cuadrante-btn"),
    cuadranteFormBox: $("#cuadrante-box-add"),
    closeCuadranteBtn: $("#cuadrante-box-close"),
    revisionBtn: $("#revision-btn"),
    revisionFormBox: $("#revision-box-add"),
    closeRevisionBtn: $("#revision-box-close"),
    limpiezaBtn: $("#limpieza-btn"),
    limpiezaFormBox: $("#limpieza-box-add"),
    closeLimpiezaBtn: $("#limpieza-box-close"),

    init: function () {
        this.events();
    },
    events: function () {
        this.showHideTreatments();
        this.showHideCuadrantes();
        this.showHideRevisions();
        this.showHideLimpiezas();
    },
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
    }
};

$(document).ready(function(){
    CHA.main.init();
});