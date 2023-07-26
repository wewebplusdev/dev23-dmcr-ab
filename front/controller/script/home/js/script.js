$(document).ready(function () {
    var urlgo = $("base").attr("href");
    $(function () {


        var url = urlgo + 'api/report';
        // console.log(url);
        jQuery.ajax({
            url: url,
            type: 'POST',
            dataType: 'json',
            success: function (data, status) {
                itemCoral = data.data.Coral.item;
                itemFloat = data.data.floating.item;
                itemSink = data.data.sinkship.item;
                lengthCoral = itemCoral.length;
                limit = 5;
                const categorycoral = [];
                const departmentcoral = [];
                const othercoral = [];
                const categoryfloat = [];
                const departmentfloat = [];
                const otherfloat = [];
                const categorysink = [];
                const departmentsink = [];
                const othersink = [];

                for (let i = 0; i < limit; i++) {
                    categorycoral.push(itemCoral[i].prov_th);
                    departmentcoral.push(itemCoral[i].count);
                    othercoral.push(itemCoral[i].count_other);

                    categoryfloat.push(itemFloat[i].prov_th);
                    departmentfloat.push(itemFloat[i].count);
                    otherfloat.push(itemFloat[i].count_other);

                    categorysink.push(itemSink[i].prov_th);
                    departmentsink.push(itemSink[i].count);
                    othersink.push(itemSink[i].count_other);

                }
                // START: Chart.js
                var charts = ['ปะการังเทียม', 'ทุ่นในทะเล', 'จุดวางเรือ'];

                var data1coral = departmentcoral;
                var data2coral = othercoral;
                var labelscoral = categorycoral;

                var data1float = departmentfloat;
                var data2float = otherfloat;
                var labelsfloat = categoryfloat;

                var data1sink = departmentsink;
                var data2sink = othersink;
                var labelssink = categorysink;

                var colorPrimary = '#004AC9'
                var colorSecondary = '#F76A00'

                var ctx = document.getElementById("myChart");
                var ctx2 = document.getElementById("myChartfloat");
                var ctx3 = document.getElementById("myChartsink");
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: labelscoral,
                        datasets: [{
                            label: "ทรัพยากรทางทะเลและชายฝั่ง ",
                            data: data1coral,
                            backgroundColor: colorPrimary
                        }, {
                            label: "อื่นๆ ",
                            data: data2coral,
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

                var myChartfloat = new Chart(ctx2, {
                    type: 'bar',
                    data: {
                        labels: labelsfloat,
                        datasets: [{
                            label: "ทรัพยากรทางทะเลและชายฝั่ง ",
                            data: data1float,
                            backgroundColor: colorPrimary
                        }, {
                            label: "อื่นๆ ",
                            data: data2float,
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

                var myChartsink = new Chart(ctx3, {
                    type: 'bar',
                    data: {
                        labels: labelssink,
                        datasets: [{
                            label: "ทรัพยากรทางทะเลและชายฝั่ง ",
                            data: data1sink,
                            backgroundColor: colorPrimary
                        }, {
                            label: "อื่นๆ ",
                            data: data2sink,
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


                $('#spinning').hide();

            },
            error: function () {
                console.log("error");
            }
        });

    });


    /// chart vote ////
    var gid = "34";
    jQuery.ajax({

        url: urlgo + 'api/votecount',
        type: 'POST',
        data: {
            gid: gid,
        },
        dataType: 'json',
        success: function (data, status) {
            console.log(data.data);
            const item = data.data;
            const count = [];
            const name = [];
            for (let i = 0; i < item.length; i++) {
                count.push(item[i].count);
                name.push(item[i].name);
            }
            var voteData = count;
            var voteLabels = name;
            var voteColors = ["#004AC9", "#29A2FF", "#9B0AF7", "#FF2C66", "#F7CC02"];
            var ctv = document.getElementById("voteChart");
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

        },
        error: function () {
            console.log("error");
        }
    });

});
