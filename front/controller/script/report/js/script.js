$(document).ready(function () {

    var voteData = [680, 693, 66, 253, 95];
    var voteLabels = ["พึงพอใจมากที่สุด", "พึงพอใจมาก", "พึงพอใจปานกลาง", "พึงพอใจน้อย", "พึงพอใจน้อยที่สุด"];
    var voteColors = ["#004AC9", "#29A2FF", "#9B0AF7", "#FF2C66", "#F7CC02"];
    var ctv = document.getElementById("doughnutChart");
    var voteChart = new Chart(ctv, {
        type: 'doughnut',
        data: {
            labels: voteLabels,
            datasets: [{
                label: 'ผลโหวต',
                data: voteData,
                backgroundColor: voteColors,
                borderWidth: 0,
                rotation: 45,
            }],
        },
        options: {
            plugins: {
                legend: {
                    display: true,
                    position: 'bottom',
                    align: 'center',
                    labels: {
                        usePointStyle: true,
                        padding: 25,
                    },
                },
            },
            layout: {
                padding: {
                    top: 10,
                    bottom: 10,
                }
            },
            responsive: true,
            maintainAspectRatio: false
        },
    });


});