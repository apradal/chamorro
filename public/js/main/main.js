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

    init: function () {
        this.events();
    },
    events: function () {
        this.showHideTreatments();
        this.showHideCuadrantes();
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
    }
};

$(document).ready(function(){
    CHA.main.init();
});