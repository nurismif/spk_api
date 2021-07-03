/* global Chart:false */
var mode = "index";
var intersect = true;
var chartOptions = {
    maintainAspectRatio: false,
    tooltips: {
        mode: mode,
        intersect: intersect,
    },
    hover: {
        mode: mode,
        intersect: intersect,
    },
    legend: {
        display: true,
        position: "right",
        align: "middle",
    },
};

function getRandomColor() {
    var letters = "0123456789ABCDEF".split("");
    var color = "#";
    for (var i = 0; i < 6; i++) {
        color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
}

function drawAhpChart(data) {
    //     AHP chart
    x_values = Object.keys(data);
    y_values = Object.values(data);
    colors = y_values.map((v) => getRandomColor());
    const $ahpChart = $("#ahp-method-canvas");
    const ahpChartData = {
        labels: x_values,
        datasets: [
            {
                data: y_values,
                backgroundColor: colors,
            },
        ],
    };
    const ahpChart = new Chart($ahpChart, {
        type: "doughnut",
        data: ahpChartData,
        options: chartOptions,
    });
}

function drawWpChart(data) {
    //     WP Chart
    x_values = Object.keys(data);
    y_values = Object.values(data);
    colors = y_values.map((v) => getRandomColor());
    const $wpChart = $("#wp-method-canvas");
    const wpChartData = {
        labels: x_values,
        datasets: [
            {
                data: y_values,
                backgroundColor: colors,
            },
        ],
    };
    const wpChart = new Chart($wpChart, {
        type: "doughnut",
        data: wpChartData,
        options: chartOptions,
    });
}

function drawHasilAkhirChart(data) {
    //     Hasil Akhir Chart
    x_values = Object.keys(data.values);
    y_values = Object.values(data.values);
    colors = y_values.map((v) => getRandomColor());
    const $hasilAkhirChart = $("#hasil-akhir-canvas");
    const hasilAkhirChartData = {
        labels: x_values,
        datasets: [
            {
                data: y_values,
                backgroundColor: colors,
            },
        ],
    };
    const hasilAkhirChart = new Chart($hasilAkhirChart, {
        type: "doughnut",
        data: hasilAkhirChartData,
        options: chartOptions,
    });
}

$(function () {
    "use strict";

    // The Calender
    $("#calendar").datetimepicker({
        format: "L",
        inline: true,
    });

    //  Charts
    $.ajax({
        url: "../../api/dashboard/hasil-akhir",
        method: "GET",
        dataType: "json",
    })
        .done(function (result) {
            drawHasilAkhirChart(result.data);
            const hasilAkhirButtonEl = $("#hasil-akhir-button");
            hasilAkhirButtonEl.removeClass("d-none");
            if (result.data.method == "ahp") {
                hasilAkhirButtonEl.children()[0].innerHTML = "AHP Method";
            } else {
                hasilAkhirButtonEl.children()[0].innerHTML = "WP Method";
            }
        })
        .fail(function (er) {
            console.log(er);
        });
});
