function getAllData() {
    $.ajax({
        type: "GET",
        DataType: "json",
        // only for recent route
        url: "/adminChart",
        success: function (totalData) {
            charts.createCompletedJobsChart(totalData);
            console.log('main response ', totalData);
        },
    });
}

getAllData();

var charts = {
    init: function () {},

    createCompletedJobsChart: function (totalData) {
        const dateList = totalData[0];
        var days = [
            "Sunday",
            "Monday",
            "Tuesday",
            "Wednesday",
            "Thursday",
            "Friday",
            "Saturday",
        ];

        const getWeakDayFromDate = (date) => {
            var dateObject = new Date(date);
            var dayName = days[dateObject.getDay()];
            return dayName;
        };
        
        const weekdayValueMap = [];
        days.map((singleDay,index) => {
                weekdayValueMap[index] = 0;
        });

        dateList.map((item, index) => {
            const weekday = getWeakDayFromDate(item);
            days.map((singleDay , singleDayIndex) => {
                if (singleDay == weekday) {
                    weekdayValueMap[singleDayIndex] = totalData[1][index];
                } 
               
            });
        });
        console.log('data values ',weekdayValueMap);



        var ctx = document.getElementById("myAreaChart");
        var myLineChart = new Chart(ctx, {
            type: "line",
            data: {
                labels: days, // The response got from the ajax request containing all month names in the database
                //labels: response.months,
                datasets: [
                    {
                        label: "$",
                        lineTension: 0.3,
                        backgroundColor: "transparent",
                        borderColor: "#063d75",
                        pointRadius: 5,
                        pointBackgroundColor: "#f36a10",
                        pointBorderColor: "rgba(255,255,255,0.8)",
                        pointHoverRadius: 5,
                        pointHoverBackgroundColor: "rgba(2,117,216,1)",
                        pointHitRadius: 20,
                        pointBorderWidth: 2,
                        data: weekdayValueMap, // The response got from the ajax request containing data for the completed jobs in the corresponding months //data: response.post_count_data
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
                                max: Math.max(...totalData[1]) +2 , // The response got from the ajax request containing max limit for y axis //max: response.max,
                                maxTicksLimit: 5,
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
    },
};
charts.init();
