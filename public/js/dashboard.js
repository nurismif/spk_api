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
    const $ahpChart = $("#ahp-method-canvas");
    const ahpChartData = {
        labels: x_values,
        datasets: [
            {
                data: y_values,
                backgroundColor: [
                    getRandomColor(),
                    getRandomColor(),
                    getRandomColor(),
                ],
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
    const $wpChart = $("#wp-method-canvas");
    const wpChartData = {
        labels: x_values,
        datasets: [
            {
                data: y_values,
                backgroundColor: [
                    getRandomColor(),
                    getRandomColor(),
                    getRandomColor(),
                ],
            },
        ],
    };
    const wpChart = new Chart($wpChart, {
        type: "doughnut",
        data: wpChartData,
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
        url: "../../api/dashboard/ahp",
        method: "GET",
        dataType: "json",
    })
        .done(function (result) {
            drawAhpChart(result.data);
        })
        .fail(function (er) {
            console.log(er);
        });

    $.ajax({
        url: "../../api/dashboard/wp",
        method: "GET",
        dataType: "json",
    })
        .done(function (result) {
            drawWpChart(result.data);
        })
        .fail(function (er) {
            console.log(er);
        });
});
