google.charts.load('current', {'packages':['corechart']});


google.setOnLoadCallback(drawChart);

function drawChart() {
    var data = google.visualization.arrayToDataTable([
    ['Temperature', 'Amsterdam', 'Rotterdam'],
    ['2007',  19.1,      18.5],
    ['2008',  19.2,      18.4],
    ['2009',  18.1,      18],
    ['2010',  17.2,      17.1],
    ['2011',  18.3,      18.1],
    ['2012',  16.4,      16.9],
    ['2013',  17.5,      17.5],
    ['2014',  17.5,      17.5],
    ['2015',  17.5,      17.5],
    ['2016',  16.8,       15.9],
    ['2017',  19.1,      18.5],
    ['2018',  18,      18.4],
    ['2019',  18.1,      18],
    ['2020',  17.2,      17.1]
    ]);

    var options = {
        curveType: 'function',
        chartArea: {
            backgroundColor: {
            fill: 'transparent',
            fillOpacity: 0.1
            },
        },
        backgroundColor: {
            fill: 'transparent',
            fillOpacity: 0.8
        },
        series: {
            0: { color: 'blue' },
            1: { color: 'lightblue' }
        },
        lineWidth: 2.5,
        text: 'white',
        hAxis: {
            textStyle:{color: '#FFF'}
        },
        vAxis: {
            textStyle:{color: '#FFF'}
        },
        legend: {textStyle: {color: 'white'}}

    };


    var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

    chart.draw(data, options);
}