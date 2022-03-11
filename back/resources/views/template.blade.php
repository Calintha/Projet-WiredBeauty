<!DOCTYPE html>
<html>
    <head>
    <script src="//cdn.amcharts.com/lib/5/index.js"></script>
    <script src="//cdn.amcharts.com/lib/5/xy.js"></script>
    <script src="//cdn.amcharts.com/lib/5/radar.js"></script>
    <script src="//cdn.amcharts.com/lib/5/themes/Animated.js"></script>
    <script src="//cdn.amcharts.com/lib/5/plugins/exporting.js"></script>
    </head>
    <body>
        <header>
            <div class="d-flex justify-content-center">
                <img src="http://127.0.0.1/storage/logo_wired_beauty.png" class="img-responsive">
            </div>
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
        <div id="chartdiv_line_1" style="width: 100%; height: 500px"></div>
        @if($graph_1)
            @if($graph_1 == "line")
                <div id="chartdiv_line_1"></div>
            @elseif($graph_1 == "points")
                <div id="chartdiv_points_1"></div>
            @endif
        @endif
        @if($desc_1)
            <p>{{ $desc_1 }}</p>
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
            <p>{{ $desc_2 }}</p>
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
            <p>{{ $desc_3 }}</p>
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
    </body>
</html>
<script>
type="text/javascript"> try { this.print(); } catch (e) { window.onload = window.print; };
// Create root and chart
var root = am5.Root.new("chartdiv_line_1"); 

root.setThemes([
  am5themes_Animated.new(root)
]);

var chart = root.container.children.push( 
  am5xy.XYChart.new(root, {}) 
);

// Define data
var data = [{
  "category": "category 1",
  "value": 450
}, {
  "category": "category 2",
  "value": 1200
}, {
  "category": "category 3",
  "value": 1850
}];

// Create Y-axis
var yAxis = chart.yAxes.push(
  am5xy.ValueAxis.new(root, {
    extraTooltipPrecision: 1,
    renderer: am5xy.AxisRendererY.new(root, {
      minGridDistance: 30
    })
  })
);

// Create X-Axis
var xAxis = chart.xAxes.push(
  am5xy.CategoryAxis.new(root, {
    categoryField: "category",
    renderer: am5xy.AxisRendererX.new(root, {
      minGridDistance: 20,
      cellStartLocation: 0.2,
      cellEndLocation: 0.8
    })
  })
);

xAxis.data.setAll(data);

// Create series
var series = chart.series.push( 
  am5xy.ColumnSeries.new(root, { 
    xAxis: xAxis, 
    yAxis: yAxis, 
    valueYField: "value",
    categoryXField: "category"
  }) 
);

series.data.setAll(data);

var exporting = am5plugins_exporting.Exporting.new(root, {
  menu: am5plugins_exporting.ExportingMenu.new(root, {}),
  dataSource: data,
  title: "TEST",
  pdfOptions: {
    includeData: true,
    addURL: false,
  }
});
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