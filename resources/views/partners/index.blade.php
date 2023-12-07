@extends('layouts.main')

@section('container')

<div class="mt-4 mb-6">
    <div class="flex flex-row p-2 gap-6">
        <div class="box-border rounded-lg basis-1/4 h-32 w-96 p-4 border-2 bg-slate-200 dark:bg-gray-700">
            <h6 class="text-lg font-bold dark:text-white">Customer Un-paid</h6>
            <p class="text-base text-gray-900 dark:text-white">{{ $unpaid }}</p>
          </div>
          <div class="box-border rounded-lg basis-1/4 h-32 w-96 p-4 border-2 bg-slate-200 dark:bg-gray-700">
            <h6 class="text-lg font-bold dark:text-white">Paid Today</h6>
            <p class="text-base text-gray-900 dark:text-white">{{ $paidToday }}</p>
          </div>
          <div class="box-border rounded-lg basis-1/4 h-32 w-96 p-4 border-2 bg-slate-200 dark:bg-gray-700">
            <h6 class="text-lg font-bold dark:text-white">Customer Active</h6>
            <p class="text-base text-gray-900 dark:text-white">{{ $active }}</p>
          </div>
          <div class="box-border rounded-lg basis-1/4 h-32 w-96 p-4 border-2 bg-slate-200 dark:bg-gray-700">
            <h6 class="text-lg font-bold dark:text-white">Customer Isolir</h6>
            <p class="text-base text-gray-900 dark:text-white">{{ $isolir }}</p>
          </div>
      </div>
</div>

<div class="max-w-full w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
    <div class="flex justify-between">
      <div>
        <h5 class="leading-none text-3xl font-bold text-gray-900 dark:text-white pb-2">{{ $chart[0]->aktif_count }}</h5>
        <p class="text-base font-normal text-gray-500 dark:text-gray-400">Customer this month</p>
      </div>
    </div>
    <div id="area-chart"></div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
  <script>

    var statics = JSON.parse('{!! $chart !!}');

    let statict = [];
    statics.forEach(static => {
        statict.push({
                month: static.bulan,
                aktif: static.aktif_count,
                // isolir: static.isolir_count,
            });
        });

    const bulan = statict.map(item => item.month);
    const aktif = statict.map(item => item.aktif);
    // const isolir = statict.map(item => item.isolir);

    // ApexCharts options and config
    window.addEventListener("load", function() {
      let options = {
        chart: {
          height: "100%",
          maxWidth: "100%",
          type: "area",
          fontFamily: "Inter, sans-serif",
          dropShadow: {
            enabled: false,
          },
          toolbar: {
            show: false,
          },
        },
        tooltip: {
          enabled: true,
          x: {
            show: false,
          },
        },
        fill: {
          type: "gradient",
          gradient: {
            opacityFrom: 0.55,
            opacityTo: 0,
            shade: "#1C64F2",
            gradientToColors: ["#1C64F2"],
          },
        },
        dataLabels: {
          enabled: false,
        },
        stroke: {
          width: 6,
        },
        grid: {
          show: false,
          strokeDashArray: 4,
          padding: {
            left: 2,
            right: 2,
            top: 0
          },
        },
        series: [
          {
            name: "New users",
            data: aktif,
            color: "#1A56DB",
          },
        ],
        xaxis: {
          categories: bulan,
          labels: {
            show: false,
          },
          axisBorder: {
            show: false,
          },
          axisTicks: {
            show: false,
          },
        },
        yaxis: {
          show: false,
        },
      }

      if (document.getElementById("area-chart") && typeof ApexCharts !== 'undefined') {
        const chart = new ApexCharts(document.getElementById("area-chart"), options);
        chart.render();
      }
    });
  </script>


@endsection
