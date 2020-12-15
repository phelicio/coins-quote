<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>

<div class="min-w-screen min-h-screen bg-gray-900 flex items-center justify-center px-5 py-5">
    <div class="rounded shadow-xl overflow-hidden w-full md:flex" style="max-width:900px" x-data="{stockTicker:stockTicker()}" x-init="stockTicker.renderChart()">
        <div class="flex w-full md:w-1/2 px-5 pb-4 pt-8 bg-indigo-500 text-white items-center">
            <canvas id="chart" class="w-full"></canvas>
        </div>
        <div class="flex w-full md:w-1/2 p-10 bg-gray-100 text-gray-600 items-center">
            <div class="w-full">
                <h3 class="text-lg font-semibold leading-tight text-gray-800" x-text="stockTicker.stockFullName"></h3>
                <h6 class="text-sm leading-tight mb-2"><span x-text="stockTicker.stockShortName"></span>&nbsp;&nbsp;-&nbsp;&nbsp;Aug 2nd 4:00pm AEST</h6>
                <div class="flex w-full items-end mb-6">
                    <span class="block leading-none text-3xl text-gray-800" x-text="stockTicker.price.current.toFixed(3)">0</span>
                    <span class="block leading-5 text-sm ml-4 text-green-500" x-text="`${stockTicker.price.high-stockTicker.price.low<0?'▼':'▲'} ${(stockTicker.price.high-stockTicker.price.low).toFixed(3)} (${(((stockTicker.price.high/stockTicker.price.low)*100)-100).toFixed(3)}%)`"></span>
                </div>
                <div class="flex w-full text-xs">
                    <div class="flex w-5/12">
                        <div class="flex-1 pr-3 text-left font-semibold">Open</div>
                        <div class="flex-1 px-3 text-right" x-text="stockTicker.price.open.toFixed(3)">0</div>
                    </div>
                    <div class="flex w-7/12">
                        <div class="flex-1 px-3 text-left font-semibold">Market Cap</div>
                        <div class="flex-1 pl-3 text-right" x-text="stockTicker.price.cap.m_formatter()">0</div>
                    </div>
                </div>
                <div class="flex w-full text-xs">
                    <div class="flex w-5/12">
                        <div class="flex-1 pr-3 text-left font-semibold">High</div>
                        <div class="px-3 text-right" x-text="stockTicker.price.high.toFixed(3)">0</div>
                    </div>
                    <div class="flex w-7/12">
                        <div class="flex-1 px-3 text-left font-semibold">P/E ratio</div>
                        <div class="pl-3 text-right" x-text="stockTicker.price.ratio.toFixed(2)">0</div>
                    </div>
                </div>
                <div class="flex w-full text-xs">
                    <div class="flex w-5/12">
                        <div class="flex-1 pr-3 text-left font-semibold">Low</div>
                        <div class="px-3 text-right" x-text="stockTicker.price.low.toFixed(3)">0</div>
                    </div>
                    <div class="flex w-7/12">
                        <div class="flex-1 px-3 text-left font-semibold">Dividend yield</div>
                        <div class="pl-3 text-right" x-text="`${stockTicker.price.dividend}%`">0%</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="absolute bottom-0 pb-2 text-gray-700 text-xs w-full text-center">
  See more: <a href="https://codepen.io/ScottWindon" class="underline hover:text-gray-500" target="_blank">https://codepen.io/ScottWindon</a>
</div>

<script>
Number.prototype.m_formatter = function() {
    return this > 999999 ? (this / 1000000).toFixed(1) + 'M' : this
};
let stockTicker = function(){
    return {
        stockFullName: 'SW Limited.',
        stockShortName: 'ASX:SFW',
        price: {
            current: 2.320,
            open: 2.230,
            low: 2.215,
            high: 2.325,
            cap: 93765011,
            ratio: 20.10,
            dividend: 1.67
        },
        chartData: {
            labels: ['10:00','','','','12:00','','','','2:00','','','','4:00'],
            data: [2.23,2.215,2.22,2.25,2.245,2.27,2.28,2.29,2.3,2.29,2.325,2.325,2.32],
        },
        renderChart: function(){
            let c = false;

            Chart.helpers.each(Chart.instances, function(instance) {
                if (instance.chart.canvas.id == 'chart') {
                    c = instance;
                }
            });

            if(c) {
                c.destroy();
            }

            let ctx = document.getElementById('chart').getContext('2d');

            let chart = new Chart(ctx, {
                type: "line",
                data: {
                    labels: this.chartData.labels,
                    datasets: [
                        {
                            label: '',
                            backgroundColor: "rgba(255, 255, 255, 0.1)",
                            borderColor: "rgba(255, 255, 255, 1)",
                            pointBackgroundColor: "rgba(255, 255, 255, 1)",
                            data: this.chartData.data,
                        },
                    ],
                },
                layout: {
                    padding: {
                        right: 10
                    }
                },
                options: {
                    legend: {
                        display: false,
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                                fontColor: "rgba(255, 255, 255, 1)",
                            },
                            gridLines: {
                                display: false,
                            },
                        }],
                        xAxes: [{
                            ticks: {
                                fontColor: "rgba(255, 255, 255, 1)",
                            },
                            gridLines: {
                                color: "rgba(255, 255, 255, .2)",
                                borderDash: [5, 5],
                                zeroLineColor: "rgba(255, 255, 255, .2)",
                                zeroLineBorderDash: [5, 5]
                            },
                        }]
                    }
                }
            });
        }
    }
}
</script>