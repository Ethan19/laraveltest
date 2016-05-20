var Flow = function () {
    return {
        //main function to initiate the module
        //修改过的插件，原方法名initCharts,
        //作用：图表显示
        //源码:jquery.flot.js
        //@author：ethan
        //date:2016年3月10日
        flowPicture: function () {
            if (!jQuery.plot) {
                return;
            }

            var data = [];
            //var totalPoints = 250;

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


            //var index = indexValue;
            var index = [
                ["20160329",  2],
                ["20160330",  8],
                ["20160331",  10],
                ["20160401",  12],
                ["20160402",  14],
                ["20160403",  16],
 
            ];
            var topicList = [
                [1,  2],
                [2,  8],
                [3,  8]
 
            ];
            // console.log(index);
            // console.log(topicList);
            var topic = [
                [1,  4],
                [2,  50],
                [3,  50]
            ];
            var notice = [
                [1,  4],
                [2,  50],
                [3,  50]
            ];
            var vip = [
                [1,  4],
                [2,  50],
                [3,  50]
            ];
            var domain = [
                [1,  4],
                [2,  4],
                [3,  50]
            ];
            var free = [
                [1,  4],
                [2,  4],
                [3,  50]
            ];
            var question = [
                [1,  4],
                [2,  4],
                [3,  50]
            ];

            if ($('#site_statistics').size() != 0) {

                $('#site_statistics_loading').hide();
                $('#site_statistics_content').show();

                var plot_statistics = $.plot($("#site_statistics"), [
                    {
                        data: index,
                        label: "主页"
                    }, 
                    // {
                    //     data: topicList,
                    //     label: "活动列表页"
                    // },
                    // {
                    //     data: topic,
                    //     label: "活动详情页"
                    // },
                    // {
                    //     data: notice,
                    //     label: "公告"
                    // }, {
                    //     data: vip,
                    //     label: "vip特权"
                    // },
                    // {
                    //     data: domain,
                    //     label: "域名验证"
                    // },
                    // {
                    //     data: free,
                    //     label: "免费体验"
                    // }, {
                    //     data: question,
                    //     label: "常见问题"
                    // }
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
                    //colors: ["#EA5405", "#8FC320", "#009A44","#1D2089","#FFEF03","#D60079","#008CD7","#0C131B"],
                    colors: ["#EA5405"],
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