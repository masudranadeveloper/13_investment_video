



// ajax
$.ajax({
    "url" : url+"api/home/home_chart_js",
    "method" : "POST",
    "data" : {},
    success:function(data){
        // daily income cal
        let todays = data.data.todayIncome;
        let yesterday = data.data.easterdayIncome;
        if(todays == 0){
            var in_t = 1;
        }else{
            var in_t = Number(todays).toFixed(0);
        }

        if(yesterday == 0){
            var in_y = 1;
        }else{
            var in_y = Number(yesterday).toFixed(0);
        }
        // calc
        var today_cal = Number((in_t*100)/(Number(in_t)+Number(in_y))).toFixed(0);
        var yesterday_cal = Number((in_y*100)/(Number(in_t)+Number(in_y))).toFixed(0);

        // chsrt 1
        var options1 = {
            series: [today_cal, yesterday_cal],
            chart: {
            type: 'pie',
        },
        labels: ['Today', 'Yesterday'],
        };

        var chart = new ApexCharts(document.querySelector("#chart_1"), options1);
        chart.render();


        // daily income cal
        let todays_recharge = data.data.todayIncome;
        let Gen = data.data.easterdayIncome;
        if(todays_recharge == 0){
            var in_t = 1;
        }else{
            var in_t = Number(todays_recharge).toFixed(0);
        }

        if(Gen == 0){
            var in_y = 1;
        }else{
            var in_y = Number(Gen).toFixed(0);
        }
        // calc
        var today_cal = Number((in_t*100)/(Number(in_t)+Number(in_y))).toFixed(0);
        var Gen_cal = Number((in_y*100)/(Number(in_t)+Number(in_y))).toFixed(0);

        // chart 2
        var options2 = {
            series: [44, 55],
            chart: {
            type: 'donut',
          },
          labels: ['Rafarel', 'Genaration'],
        };

        var chart = new ApexCharts(document.querySelector("#chart_2"), options2);
        chart.render();
    }
});

