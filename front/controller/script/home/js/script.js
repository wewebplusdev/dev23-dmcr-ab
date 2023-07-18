$(document).ready(function () {
    $(function () {

        var urlgo = $("base").attr("href");
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
                console.log(data.data);
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
                var chart = {
                    type: 'bar'
                };
                var title = {
                    text: 'ปะการังเทียม'
                };
                var xAxis = {
                    categories: categorycoral,
                    title: {
                        text: null
                    }
                };
                var yAxis = {
                    min: 0,
                    title: {
                        text: 'จุด',
                        align: 'high'
                    },
                    labels: {
                        overflow: 'justify'
                    }
                };
                var tooltip = {
                    valueSuffix: ' จุด'
                };
                var plotOptions = {
                    bar: {
                        dataLabels: {
                            enabled: true
                        }
                    }
                };
                var legend = {
                    // layout: 'vertical',
                    align: 'center',
                    verticalAlign: 'bottom',
                    // x: -40,
                    // y: 100,
                    // floating: true,
                    // borderWidth: 1,

                    // backgroundColor: (
                    //     (Highcharts.theme && Highcharts.theme.legendBackgroundColor) ||
                    //     '#FFFFFF'),
                    // shadow: true
                };
                var credits = {
                    enabled: false
                };
                var series = [
                    {
                        name: 'ทรัพยากรชายฝั่ง',
                        data: departmentcoral
                    },
                    {
                        name: 'อื่นๆ',
                        data: othercoral
                    }
                ];
                var json = {};
                json.chart = chart;
                json.title = title;
                json.tooltip = tooltip;
                json.xAxis = xAxis;
                json.yAxis = yAxis;
                json.series = series;
                json.plotOptions = plotOptions;
                json.legend = legend;
                json.credits = credits;
                $('#container').highcharts(json);

            },
            error: function () {
                console.log("error");
            }
        });

    });
});
