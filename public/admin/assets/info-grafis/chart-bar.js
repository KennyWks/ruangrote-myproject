// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily =
    '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = "#292b2c";

// Bar Chart
const dataLabelMonth1 = document.querySelector('#data-labelmonth').getAttribute('data-labelmonth1');
const dataLabelMonth2 = document.querySelector('#data-labelmonth').getAttribute('data-labelmonth2');
const dataLabelMonth3 = document.querySelector('#data-labelmonth').getAttribute('data-labelmonth3');
const dataLabelMonth4 = document.querySelector('#data-labelmonth').getAttribute('data-labelmonth4');
const dataLabelMonth5 = document.querySelector('#data-labelmonth').getAttribute('data-labelmonth5');
const dataLabelMonth6 = document.querySelector('#data-labelmonth').getAttribute('data-labelmonth6');

const dataMonth1 = document.querySelector('#data-month').getAttribute('data-month1');
const dataMonth2 = document.querySelector('#data-month').getAttribute('data-month2');
const dataMonth3 = document.querySelector('#data-month').getAttribute('data-month3');
const dataMonth4 = document.querySelector('#data-month').getAttribute('data-month4');
const dataMonth5 = document.querySelector('#data-month').getAttribute('data-month5');
const dataMonth6 = document.querySelector('#data-month').getAttribute('data-month6');

var ctx = document.getElementById("myBarChart");
var myLineChart = new Chart(ctx, {
    type: "bar",
    data: {
        labels: [dataLabelMonth1, dataLabelMonth2, dataLabelMonth3, dataLabelMonth4, dataLabelMonth5, dataLabelMonth6],
        datasets: [
            {
                label: "Revenue",
                backgroundColor: "rgba(2,117,216,1)",
                borderColor: "rgba(2,117,216,1)",
                data: [dataMonth1, dataMonth2, dataMonth3, dataMonth4, dataMonth5, dataMonth6],
            },
        ],
    },
    options: {
        scales: {
            xAxes: [
                {
                    time: {
                        unit: "month",
                    },
                    gridLines: {
                        display: false,
                    },
                    ticks: {
                        maxTicksLimit: 6,
                    },
                },
            ],
            yAxes: [
                {
                    ticks: {
                        min: 0,
                        max: 100,
                        maxTicksLimit: 5,
                    },
                    gridLines: {
                        display: true,
                    },
                },
            ],
        },
        legend: {
            display: false,
        },
    },
});
