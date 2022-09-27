@extends('main')

@section('main')
    {{-- MAIN SATRT --}}
    <div class="w-full sm:h-[70px] h-[50px] bg-white flex items-center px-4 justify-between text-sm">
        <p class="sm:text-xl font-bold">Dashboard Keuangan</p>
    </div>
    <div class="w-full p-4">
        <div class="p-2 bg-black bg-opacity-10 rounded-xl w-full flex items-center flex-col shadow-sm">
            <p class="font-medium text-xl">Dashboard Pemasukan/Pengeluaran</p>

            <div class="row">
                <div class="col">
                    <div class="border-2 border-black my-3">
                        <div id="curve_chart" class="w-[900px] h-[500px]"></div>
                    </div>
                </div>
                <div class="col">
                    <p class="font-medium text-xl">Pemasukan Cash Bulan Ini</p>
                    <p class="font-medium text-2xl text-white">{{ $cash }}</p>
                    <p class="font-medium text-xl">Pemasukan Cashless Bulan Ini</p>
                    <p class="font-medium text-2xl text-white">{{ $cashless }}</p>
                    _______________________________________
                    <p class="font-medium text-xl">Pemasukan Cash Hari Ini</p>
                    <p class="font-medium text-2xl text-white">{{ $cashd }}</p>
                    <p class="font-medium text-xl">Pemasukan Cashless Hari Ini</p>
                    <p class="font-medium text-2xl text-white">{{ $cashlessd }}</p>
                    
                </div>
            </div>

            <div>
                <button onclick="filtersatu()" class="px-3 border-2 bg-slate-400">Pemasukan</button>
                <button onclick="filterdua()" class="px-3 border-2 bg-slate-400">Pengeluaran</button>
            </div>
            <div class="justify-between w-full flex items-center pt-3 ">
                <form action="/kusearch" method="POST" class="flex w-[200px]" role="search">
                    @csrf
                    <input class="form-control rounded-tl-md" type="month" name="month" placeholder="Search"
                        aria-label="Search">
                    <button class="bg-slate-500 rounded-tr-md text-white px-2 font-medium hover:bg-opacity-80"
                        type="submit"><i class='bx bx-search'></i></button>
                </form>
            </div>
            <div class="w-full h-[300px] sm:h-auto overflow-auto">
                <table class="table">
                    <thead id="thsatu" class="text-white bg-tabelsatu">
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Tahun</th>
                            <th scope="col">Bulan</th>
                            <th scope="col">Nominal</th>
                            <th scope="col">Pajak</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <thead id="thdua" class="text-white bg-tabelsatu hidden">
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Tahun</th>
                            <th scope="col">Bulan</th>
                            <th scope="col">Nominal</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    {{-- TABLE START --}}
                    <tbody id="tsatu" class="text-black bg-white">
                        @php
                            $count = 1;
                        @endphp
                        @foreach ($transin as $transaction)
                            <tr>
                                @php
                                    setlocale(LC_TIME, 'id_ID');
                                    $monthNum = explode('-', $transaction->month_year)['0'];
                                    $monthName = DateTime::createFromFormat('!m', $monthNum)->format('F');
                                @endphp
                                <th scope="row">{{ $count }}</th>
                                <td>{{ explode('-', $transaction->month_year)['1'] }}</td>
                                <td>{{ $monthName }}</td>
                                <td>Rp{{ number_format($transaction->total_income, 2) }}</td>
                                <td>Rp{{ number_format($transaction->total_pajak, 2) }}</td>
                                <td>
                                    <a href="/kumonthindexin/{{ $transaction->month_year }}">
                                        <button class="btn btn-primary flex items-center">
                                            <i class='bx bx-search-alt-2 mr-1'></i>Detail
                                        </button>
                                    </a>
                                </td>
                            </tr>
                            @php
                                $count++;
                            @endphp
                        @endforeach
                    </tbody>
                    <tbody id="tdua" class="text-black bg-white hidden">
                        @php
                            $count = 1;
                        @endphp
                        @foreach ($transout as $transaction)
                            <tr>
                                @php
                                    $monthNum = explode('-', $transaction->month_year)['0'];
                                    $monthName = DateTime::createFromFormat('!m', $monthNum)->format('F');
                                @endphp
                                <th scope="row">{{ $count }}</th>
                                <td>{{ explode('-', $transaction->month_year)['1'] }}</td>
                                <td>{{ $monthName }}</td>
                                {{-- <td>{{ strftime('%B', DateTime::createFromFormat('!m', $monthNum)->format('F')) }}</td> --}}
                                <td>Rp{{ number_format($transaction->total_nominal, 2) }}</td>

                                <td>
                                    <a href="/kumonthindexout/{{ $transaction->month_year }}">
                                        <button class="btn btn-primary flex items-center">
                                            <i class='bx bx-search-alt-2 mr-1'></i>Detail
                                        </button>
                                    </a>
                                </td>
                            </tr>
                            @php
                                $count++;
                            @endphp
                        @endforeach
                    </tbody>
                    {{-- TABLE START --}}
                </table>
            </div>
            <nav class="mt-3 md:hidden">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link text-black" href="#">Previous</a></li>
                    <li class="page-item"><a class="page-link text-black" href="#">1</a></li>
                    <li class="page-item"><a class="page-link text-black" href="#">2</a></li>
                    <li class="page-item"><a class="page-link text-black" href="#">3</a></li>
                    <li class="page-item"><a class="page-link text-black" href="#">Next</a></li>
                </ul>
            </nav>
        </div>
    </div>
    {{-- MAIN END --}}
@endsection

@section('js')
    <script src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="{{ URL::asset('/assets/js/ku.js') }}"></script>

    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([

                ['Bulan', 'Pemasukan', 'Pengeluaran'],
                @foreach ($transchart as $transaction)
                    @php
                        setlocale(LC_TIME, 'id_ID');
                        $monthNum = explode('-', $transaction->month_year)['0'];
                        $monthName = DateTime::createFromFormat('!m', $monthNum)->format('F');
                    @endphp

                        ['{{ $monthName }}', {{ $transaction->total_income }},
                            {{ $transaction->total_expense }}],
                @endforeach
            ]);

            var options = {
                title: 'Grafik Pemasukan dan Pengeeluaran',
                legend: {
                    position: 'bottom'
                }
            };
            var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
            chart.draw(data, options);

        }
    </script>
@endsection
