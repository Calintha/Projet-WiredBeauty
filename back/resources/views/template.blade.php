<!DOCTYPE html>
<html>
    <head>
        <title>{{ $title }}</title>
        <script src="//cdn.amcharts.com/lib/5/index.js"></script>
        <script src="//cdn.amcharts.com/lib/5/xy.js"></script>
        <script src="//cdn.amcharts.com/lib/5/themes/Animated.js"></script>
    </head>
    <body>
        <header>
            <div class="logo"><h1>DATA REPORT</h1></div>
            <div class="hero">
                <div class="left">WIRED BEAUTY SAS<br/>beauty-fablab@wired-beauty.com</div>
                <div class="right">{{ $company_name }}<br/>{{ $company_address }}, {{ $company_postalcode }}, {{ $company_city }}<br/>{{ $company_email }}<br/>{{ $company_telephone }}</div>
            </div>
        </header>
        <h3>{{ $date }}</h3>
        @if($title_1)
            <h2>{{ $title_1 }}</h2>
        @endif
        @if($graph_1)
            @if($graph_1 == "line")
                <div id="chartdiv_line_1"></div>
            @elseif($graph_1 == "points")
                <div id="chartdiv_points_1"></div>
            @endif
        @endif
        @if($desc_1)
            <h2>{{ $desc_1 }}</h2>
        @endif

        @if($title_2)
            <h2>{{ $title_2 }}</h2>
        @endif
        @if($graph_2)
            @if($graph_2 == "line")
                <div id="chartdiv_line_2"></div>
            @elseif($graph_1 == "points")
                <div id="chartdiv_points_2"></div>
            @endif
        @endif
        @if($desc_2)
            <h2>{{ $desc_2 }}</h2>
        @endif

        @if($title_3)
            <h2>{{ $title_3 }}</h2>
        @endif
        @if($graph_3)
            @if($graph_3 == "line")
                <div id="chartdiv_line_3"></div>
            @elseif($graph_1 == "points")
                <div id="chartdiv_points_3"></div>
            @endif
        @endif
        @if($desc_3)
            <h2>{{ $desc_3 }}</h2>
        @endif

        @if($title_4)
            <h2>{{ $title_4 }}</h2>
        @endif
        @if($graph_4)
            @if($graph_4 == "line")
                <div id="chartdiv_line_4"></div>
            @elseif($graph_1 == "points")
                <div id="chartdiv_points_4"></div>
            @endif
        @endif
        @if($desc_4)
            <h2>{{ $desc_4 }}</h2>
        @endif
    </body>
</html>
<script>
    var values = JSON.parse("{{ json_encode($values) }}");
    var root = am5.Root.new("chartdiv");

    // Set themes
    // https://www.amcharts.com/docs/v5/concepts/themes/
    root.setThemes([
    am5themes_Animated.new(root)
    ]);

    var data = [{
    date: new Date(2012, 1, 1).getTime(),
    value: values[0]
    }, {
    date: new Date(2012, 1, 2).getTime(),
    value: values[1]
    }, {
    date: new Date(2012, 1, 3).getTime(),
    value: 12,
    strokeSettings: {
        stroke: am5.color(0x990000),
        strokeDasharray: [3, 3]
    }
    }, {
    date: new Date(2012, 1, 4).getTime(),
    value: 14
    }, {
    date: new Date(2012, 1, 5).getTime(),
    value: 11
    }];

    // Create chart
    // https://www.amcharts.com/docs/v5/charts/xy-chart/
    var chart = root.container.children.push(
    am5xy.XYChart.new(root, {
        focusable: true,
        panX: true,
        panY: true,
        wheelX: "panX",
        wheelY: "zoomX"
    })
    );

    var easing = am5.ease.linear;

    // Create axes
    // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
    var xAxis = chart.xAxes.push(
    am5xy.DateAxis.new(root, {
        maxDeviation: 0.1,
        groupData: false,
        baseInterval: {
        timeUnit: "day",
        count: 1
        },
        renderer: am5xy.AxisRendererX.new(root, {
        minGridDistance: 50
        }),
        tooltip: am5.Tooltip.new(root, {})
    })
    );

    var yAxis = chart.yAxes.push(
    am5xy.ValueAxis.new(root, {
        maxDeviation: 0.1,
        renderer: am5xy.AxisRendererY.new(root, {})
    })
    );

    // Add series
    // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
    var series = chart.series.push(
    am5xy.LineSeries.new(root, {
        minBulletDistance: 10,
        xAxis: xAxis,
        yAxis: yAxis,
        valueYField: "value",
        valueXField: "date",
        tooltip: am5.Tooltip.new(root, {
        pointerOrientation: "horizontal",
        labelText: "{valueY}"
        })
    })
    );

    series.strokes.template.setAll({
    strokeWidth: 3,
    templateField: "strokeSettings"
    });

    series.data.setAll(data);

    // Add cursor
    // https://www.amcharts.com/docs/v5/charts/xy-chart/cursor/
    var cursor = chart.set("cursor", am5xy.XYCursor.new(root, {
    xAxis: xAxis
    }));
    cursor.lineY.set("visible", false);

    // add scrollbar
    chart.set("scrollbarX", am5.Scrollbar.new(root, {
    orientation: "horizontal"
    }));

    // Make stuff animate on load
    // https://www.amcharts.com/docs/v5/concepts/animations/
    series.appear(1000, 100);
    chart.appear(1000, 100);
</script>
<style>
    body{
	    background: transparent radial-gradient(closest-side at 50% 50%, #E8E8E8 0%, #D9D9D9 100%) 0% 0% no-repeat padding-box;
        color: #A3A3A3;
    }
    header.hero{
        padding: 40px 0;
        display: flex;
        flex-direction: row;
        justify-content: space-between;
    }
</style>