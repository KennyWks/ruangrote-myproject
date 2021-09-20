// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily =
    '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = "#292b2c";

const dataLabelDay1 = document.querySelector('#data-label-day').getAttribute('data-labelday1');
const dataLabelDay2 = document.querySelector('#data-label-day').getAttribute('data-labelday2');
const dataLabelDay3 = document.querySelector('#data-label-day').getAttribute('data-labelday3');
const dataLabelDay4 = document.querySelector('#data-label-day').getAttribute('data-labelday4');
const dataLabelDay5 = document.querySelector('#data-label-day').getAttribute('data-labelday5');
const dataLabelDay6 = document.querySelector('#data-label-day').getAttribute('data-labelday6');
const dataLabelDay7 = document.querySelector('#data-label-day').getAttribute('data-labelday7');

const day1 = document.querySelector('#data-day').getAttribute('data-day1');
const day2 = document.querySelector('#data-day').getAttribute('data-day2');
const day3 = document.querySelector('#data-day').getAttribute('data-day3');
const day4 = document.querySelector('#data-day').getAttribute('data-day4');
const day5 = document.querySelector('#data-day').getAttribute('data-day5');
const day6 = document.querySelector('#data-day').getAttribute('data-day6');
const day7 = document.querySelector('#data-day').getAttribute('data-day7');

// Area Chart Example
var ctx = document.getElementById("myAreaChart");
var myLineChart = new Chart(ctx, {
    type: "line",
    data: {
        labels: [
            dataLabelDay1,
            dataLabelDay2,
            dataLabelDay3,
            dataLabelDay4,
            dataLabelDay5,
            dataLabelDay6,
            dataLabelDay7,
        ],
        datasets: [
            {
                label: "Sessions",
                lineTension: 0.3,
                backgroundColor: "rgba(2,117,216,0.2)",
                borderColor: "rgba(2,117,216,1)",
                pointRadius: 5,
                pointBackgroundColor: "rgba(2,117,216,1)",
                pointBorderColor: "rgba(255,255,255,0.8)",
                pointHoverRadius: 5,
                pointHoverBackgroundColor: "rgba(2,117,216,1)",
                pointHitRadius: 50,
                pointBorderWidth: 2,
                data: [day1, day2, day3, day4, day5, day6, day7],
            },
        ],
    },
    options: {
        scales: {
            xAxes: [
                {
                    time: {
                        unit: "date",
                    },
                    gridLines: {
                        display: false,
                    },
                    ticks: {
                        maxTicksLimit: 7,
                    },
                },
            ],
            yAxes: [
                {
                    ticks: {
                        min: 0,
                        max: 500,
                        maxTicksLimit: 7,
                    },
                    gridLines: {
                        color: "rgba(0, 0, 0, .125)",
                    },
                },
            ],
        },
        legend: {
            display: false,
        },
    },
});
