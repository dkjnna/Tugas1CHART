@extends('layout.template')
@section('isi')
    <!-- Styles -->
<style>
    #chartdiv {
      width: 100%;
      height: 500px;
    }
    </style>

    <!-- Resources -->
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>

    <!-- Chart code -->
    <script>
    am5.ready(function() {

    // Create root element
    // https://www.amcharts.com/docs/v5/getting-started/#Root_element
    var root = am5.Root.new("chartdiv");

    // Set themes
    // https://www.amcharts.com/docs/v5/concepts/themes/
    root.setThemes([
      am5themes_Animated.new(root)
    ]);

    // Create chart
    // https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/
    var chart = root.container.children.push(
      am5percent.PieChart.new(root, {
        endAngle: 270
      })
    );

    // Create series
    // https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Series
    var series = chart.series.push(
      am5percent.PieSeries.new(root, {
        valueField: "value",
        categoryField: "category",
        endAngle: 270
      })
    );

    series.states.create("hidden", {
      endAngle: -90
    });

    // Set data
    // https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Setting_data
    series.data.setAll([{
      category: "Data Pasien Tanpa Rawat",
      value: {{ $dpt }}
    }, {
      category: "Data Pasien Dirawat",
      value: {{ $dr }}
    }, {
      category: "Data Pasien Pulang",
      value: {{ $dp }}
    }]);

    series.appear(1000, 100);

    }); // end am5.ready()
    </script>

    <!-- HTML -->
    <div id="chartdiv"></div>
@endsection
