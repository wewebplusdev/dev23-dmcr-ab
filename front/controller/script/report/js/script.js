$(document).ready(function () {
    var urlgo = $("base").attr("href");
    var url = urlgo + 'api/report';
    var masterkey = $('.report-page').data("masterkey");

    switch (masterkey) {
        case '1f':
            // donut chart //
            jQuery.ajax({
                url: urlgo + 'api/prov_coral',
                type: 'POST',
                dataType: 'json',
                success: function (data, status) {
                    const item = data.data.item;
                    // console.log(data.data);
                    const province = [];
                    const count = [];

                    for (let i = 0; i < item.length; i++) {
                        province.push(item[i].prov_th);
                        count.push(item[i].count);
                    }

                    var voteData = count;
                    var voteLabels = province;
                    // var voteColors = color;
                    var ctv = document.getElementById("doughnutChart");
                    var voteChart = new Chart(ctv, {
                        type: 'doughnut',
                        data: {
                            labels: voteLabels,
                            datasets: [{
                                label: 'จำนวน',
                                data: voteData,
                                // backgroundColor: voteColors,
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

                },
                error: function () {
                    console.log("error");
                }
            });

            // bar chart //
            jQuery.ajax({
                url: urlgo + 'api/report_coral',
                type: 'POST',
                dataType: 'json',
                success: function (data, status) {
                    const item = data.data.item;

                    const province = [];
                    const count = [];
                    const countother = [];

                    for (let i = 0; i < item.length; i++) {
                        province.push(item[i].prov_th);
                        count.push(item[i].count);
                        countother.push(item[i].count_other);
                    }



                    var data1 = count;
                    var data2 = countother;
                    var label = province;
                    var colorPrimary = '#004AC9'
                    var colorSecondary = '#F76A00'

                    var ctx = document.getElementById("bar-chart");
                    var myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: label,
                            datasets: [{
                                label: "ทรัพยากรทางทะเลและชายฝั่ง ",
                                data: data1,
                                backgroundColor: colorPrimary
                            }, {
                                label: "อื่นๆ ",
                                data: data2,
                                backgroundColor: colorSecondary
                            }],
                        },
                        options: {
                            plugins: {
                                title: {
                                    display: true,
                                    text: "ปะการังเทียม",
                                    font: {
                                        size: 18,
                                        weight: 'normal'
                                    },
                                    align: 'start',
                                    padding: {
                                        top: 10,
                                        bottom: 30
                                    }
                                },
                                legend: {
                                    display: true,
                                    position: 'bottom',
                                    align: 'center',
                                    labels: {
                                        usePointStyle: true,
                                        // pointStyle: 'rectRounded'
                                    },
                                },
                            },
                            layout: {
                                padding: {
                                    left: 10,
                                    right: 30
                                }
                            },
                            indexAxis: 'y',
                            responsive: true,
                            scales: {
                                x: {
                                    grid: {
                                        display: false,
                                    }
                                },
                                y: {
                                    grid: {
                                        display: false,
                                    }
                                },
                            },
                            maintainAspectRatio: false
                        },
                    });

                },
                error: function () {
                    console.log("error");
                }
            });
            break;
        case '2f':
            jQuery.ajax({
                url: urlgo + 'api/prov_float',
                type: 'POST',
                dataType: 'json',
                success: function (data, status) {
                    const item = data.data.item;
                    const province = [];
                    const count = [];


                    for (let i = 0; i < item.length; i++) {
                        province.push(item[i].prov_th);
                        count.push(item[i].count);
                    }

                    var voteData = count;
                    var voteLabels = province;
                    // var voteColors = color;
                    var ctv = document.getElementById("doughnutChart");
                    var voteChart = new Chart(ctv, {
                        type: 'doughnut',
                        data: {
                            labels: voteLabels,
                            datasets: [{
                                label: 'จำนวน',
                                data: voteData,
                                // backgroundColor: voteColors,
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

                    // bar chart //
                    jQuery.ajax({
                        url: urlgo + 'api/report_float',
                        type: 'POST',
                        dataType: 'json',
                        success: function (data, status) {
                            // console.log(data);
                            const item = data.data.item;

                            const province = [];
                            const count = [];
                            const countother = [];

                            for (let i = 0; i < item.length; i++) {
                                province.push(item[i].prov_th);
                                count.push(item[i].count);
                                countother.push(item[i].count_other);
                            }



                            var data1 = count;
                            var data2 = countother;
                            var label = province;
                            var colorPrimary = '#004AC9'
                            var colorSecondary = '#F76A00'

                            var ctx = document.getElementById("bar-chart");
                            var myChart = new Chart(ctx, {
                                type: 'bar',
                                data: {
                                    labels: label,
                                    datasets: [{
                                        label: "ทรัพยากรทางทะเลและชายฝั่ง ",
                                        data: data1,
                                        backgroundColor: colorPrimary
                                    }, {
                                        label: "อื่นๆ ",
                                        data: data2,
                                        backgroundColor: colorSecondary
                                    }],
                                },
                                options: {
                                    plugins: {
                                        title: {
                                            display: true,
                                            text: "ปะการังเทียม",
                                            font: {
                                                size: 18,
                                                weight: 'normal'
                                            },
                                            align: 'start',
                                            padding: {
                                                top: 10,
                                                bottom: 30
                                            }
                                        },
                                        legend: {
                                            display: true,
                                            position: 'bottom',
                                            align: 'center',
                                            labels: {
                                                usePointStyle: true,
                                                // pointStyle: 'rectRounded'
                                            },
                                        },
                                    },
                                    layout: {
                                        padding: {
                                            left: 10,
                                            right: 30
                                        }
                                    },
                                    indexAxis: 'y',
                                    responsive: true,
                                    scales: {
                                        x: {
                                            grid: {
                                                display: false,
                                            }
                                        },
                                        y: {
                                            grid: {
                                                display: false,
                                            }
                                        },
                                    },
                                    maintainAspectRatio: false
                                },
                            });

                        },
                        error: function () {
                            console.log("error");
                        }
                    });

                },
                error: function () {
                    console.log("error");
                }
            });
            break;
        case '3f':
            jQuery.ajax({
                url: urlgo + 'api/prov_sink',
                type: 'POST',
                dataType: 'json',
                success: function (data, status) {
                    const item = data.data.item;
                    const province = [];
                    const count = [];


                    for (let i = 0; i < item.length; i++) {
                        province.push(item[i].prov_th);
                        count.push(item[i].count);
                    }

                    var voteData = count;
                    var voteLabels = province;
                    // var voteColors = color;
                    var ctv = document.getElementById("doughnutChart");
                    var voteChart = new Chart(ctv, {
                        type: 'doughnut',
                        data: {
                            labels: voteLabels,
                            datasets: [{
                                label: 'จำนวน',
                                data: voteData,
                                // backgroundColor: voteColors,
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

                    // bar chart //
                    jQuery.ajax({
                        url: urlgo + 'api/report_sink',
                        type: 'POST',
                        dataType: 'json',
                        success: function (data, status) {
                            const item = data.data.item;
                            console.log(item);

                            const province = [];
                            const count = [];
                            const countother = [];

                            for (let i = 0; i < item.length; i++) {
                                province.push(item[i].prov_th);
                                count.push(item[i].count);
                                countother.push(item[i].count_other);
                            }



                            var data1 = count;
                            var data2 = countother;
                            var label = province;
                            var colorPrimary = '#004AC9'
                            var colorSecondary = '#F76A00'

                            var ctx = document.getElementById("bar-chart");
                            var myChart = new Chart(ctx, {
                                type: 'bar',
                                data: {
                                    labels: label,
                                    datasets: [{
                                        label: "ทรัพยากรทางทะเลและชายฝั่ง ",
                                        data: data1,
                                        backgroundColor: colorPrimary
                                    }, {
                                        label: "อื่นๆ ",
                                        data: data2,
                                        backgroundColor: colorSecondary
                                    }],
                                },
                                options: {
                                    plugins: {
                                        title: {
                                            display: true,
                                            text: "ปะการังเทียม",
                                            font: {
                                                size: 18,
                                                weight: 'normal'
                                            },
                                            align: 'start',
                                            padding: {
                                                top: 10,
                                                bottom: 30
                                            }
                                        },
                                        legend: {
                                            display: true,
                                            position: 'bottom',
                                            align: 'center',
                                            labels: {
                                                usePointStyle: true,
                                                // pointStyle: 'rectRounded'
                                            },
                                        },
                                    },
                                    layout: {
                                        padding: {
                                            left: 10,
                                            right: 30
                                        }
                                    },
                                    indexAxis: 'y',
                                    responsive: true,
                                    scales: {
                                        x: {
                                            grid: {
                                                display: false,
                                            }
                                        },
                                        y: {
                                            grid: {
                                                display: false,
                                            }
                                        },
                                    },
                                    maintainAspectRatio: false
                                },
                            });

                        },
                        error: function () {
                            console.log("error");
                        }
                    });

                },
                error: function () {
                    console.log("error");
                }
            });
            break;
        default:
            break;
    }

});