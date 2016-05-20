var Index = function () {
    return {
        //main function to initiate the module
        initCharts: function () {
            if (!jQuery.plot) {
                return;
            }

            var data = [];
            var totalPoints = 250;

            // random data generator for plot charts



            function showTooltip(title, x, y, contents,xcont,ycont) {
                $('<div id="tooltip" class="chart-tooltip" ><div class="date">' + title + '<\/div><div class="label label-success">日期: ' + xcont + '<\/div><div class="label label-important">访问数: ' + ycont + '<\/div><\/div>').css({
                    position: 'absolute',
                    display: 'none',
                    top: y - 100,
                    width: 130,
                    height:70,
                    left: x - 50,
                    border: '0px solid #ccc',
                    padding: '2px 6px',
                    'background-color': '#fff',
                }).appendTo("body").fadeIn(200);
            }


            var pageviews = [
                [1, 3],
                [2, 3],
                [3, 2 ],
                [4, 3 ],
                [5, 5 ],
                [6, 10 ],
                [7, 15 ],
                [8, 20 ],
                [9, 25 ],
                [10, 30 ],
                [11, 35 ],
                [12, 25 ],
                [13, 15 ],
                [14, 20 ],
                [15, 45 ],
                [16, 50 ],
                [17, 65 ],
                [18, 70 ],
                [19, 85 ],
                [20, 80 ],
                [21, 75 ],
                [22, 80 ],
                [23, 75 ],
                [24, 70 ],
                [25, 65 ],
                [26, 75 ],
                [27, 80 ],
                [28, 85 ],
                [29, 90 ],
                [30, 95 ]
            ];

            var visitors = [
                [1,  5],
                [2,  5],
                [3,  5],
                [4, 6 ],
                [5, 5 ],
                [6, 20 ],
                [7, 25 ],
                [8, 36 ],
                [9, 26 ],
                [10, 38 ],
                [11, 39 ],
                [12, 50 ],
                [13, 51 ],
                [14, 12 ],
                [15, 13 ],
                [16, 14 ],
                [17, 15 ],
                [18, 15 ],
                [19, 16 ],
                [20, 17 ],
                [21, 18 ],
                [22, 19 ],
                [23, 20 ],
                [24, 21 ],
                [25, 14 ],
                [26, 24 ],
                [27, 25 ],
                [28, 26 ],
                [29, 27 ],
                [30, 31 ]
            ];
            var test3 = [
                [1,  5],
                [2,  5],
                [3,  5],
                [4, 6 ],
                [5, 5 ],
                [6, 20 ],
                [7, 25 ],
                [8, 36 ],
                [9, 26 ],
                [10, 38 ],
                [11, 39 ],
                [12, 50 ],
                [13, 51 ],
                [14, 2 ],
                [15, 3 ],
                [16, 4 ],
                [17, 5 ],
                [18, 5 ],
                [19, 6 ],
                [20, 7 ],
                [21, 8 ],
                [22, 19 ],
                [23, 20 ],
                [24, 21 ],
                [25, 14 ],
                [26, 24 ],
                [27, 25 ],
                [28, 26 ],
                [29, 27 ],
                [30, 2 ]
            ];

            if ($('#site_statistics').size() != 0) {

                $('#site_statistics_loading').hide();
                $('#site_statistics_content').show();

                var plot_statistics = $.plot($("#site_statistics"), [
                    {
                        data: pageviews,
                        label: "Unique Visits"
                    }, {
                        data: visitors,
                        label: "Page Views"
                    },
{
                        data: test3,
                        label: "test-3"
                    }
                ], {
                    series: {
                        lines: {
                            show: true,
                            lineWidth: 2,
                            fill: true,
                            fillColor: {
                                colors: [{
                                        opacity: 0.05
                                    }, {
                                        opacity: 0.01
                                    }
                                ]
                            }
                        },
                        points: {
                            show: true
                        },
                        shadowSize: 2
                    },
                    grid: {
                        hoverable: true,
                        clickable: true,
                        tickColor: "#eee",
                        borderWidth: 0
                    },
                    colors: ["green", "red", "yellow"],
                    xaxis: {
                        ticks: 11,
                        tickDecimals: 0
                    },
                    yaxis: {
                        ticks: 11,
                        tickDecimals: 0
                    }
                });

                var previousPoint = null;
                $("#site_statistics").bind("plothover", function (event, pos, item) {
                    $("#x").text(pos.x.toFixed(2));
                    $("#y").text(pos.y.toFixed(2));
                    if (item) {
                        if (previousPoint != item.dataIndex) {
                            previousPoint = item.dataIndex;

                            $("#tooltip").remove();
                            var x = item.datapoint[0].toFixed(2),
                                y = item.datapoint[1].toFixed(2);
                                console.log(x);
                                console.log(y);

                            showTooltip('流量', item.pageX, item.pageY, item.series.label + " of " + x + " = " + y,"2016年3月10日","35");
                        }
                    } else {
                        $("#tooltip").remove();
                        previousPoint = null;
                    }
                });
            }               
        },
    };
}();