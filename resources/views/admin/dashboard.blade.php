@extends('layouts.backend.app')

@section('title', 'Dashboard')

@push('css')


@endpush

@section('content')

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1>Dashboard</h1>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="#">Inicio</a></li>
							<li class="breadcrumb-item active">Dashboard</li>
						</ol>
					</div>
				</div>
			</div><!-- /.container-fluid -->
		</section>

		<!-- Main content -->
		<section class="content">
			<div class="container-fluid">
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box bg-info">
                            <span class="info-box-icon"><i class="fa fa-balance-scale"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Ventas del día</span>
                                <span class="info-box-number">{{ number_format($today->sum('total'),2 ) }} Quetzales</span>

                                @php

                                    if ($yesterday->sum('total') != 0)
                                    {
                                        $percentage = (($today->sum('total') - $yesterday->sum('total'))/ $yesterday->sum('total'))*100;
                                    } else {
                                        $percentage = 0;
                                    }

                                @endphp

                                <div class="progress">
                                    <div class="progress-bar" style="width: {{ abs($percentage), 2 }}%"></div>
                                </div>

                                <span class="progress-description {{ $percentage < 0 ? 'text-warning' : '' }}">
                                  {{ number_format(abs($percentage), 2) }} % {{ $percentage > 0 ? 'Incremento' : 'Decremento' }} De {{ date('l', strtotime('-1 day')) }}
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box bg-info">
                            <span class="info-box-icon"><i class="fa fa-balance-scale"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Venta de este Mes</span>
                                <span class="info-box-number">{{ number_format($month->sum('total'), 2)  }} Quetzales</span>
                                @php

                                    if ($previous_month->sum('total') != 0)
                                    {
                                        $percentage = (($month->sum('total') - $previous_month->sum('total'))/ $previous_month->sum('total'))*100;
                                    } else {
                                        $percentage = 0;
                                    }

                                @endphp

                                <div class="progress">
                                    <div class="progress-bar" style="width: {{ abs($percentage), 2 }}%"></div>
                                </div>
                                <span class="progress-description {{ $percentage < 0 ? 'text-warning' : '' }}">
                                  {{ number_format(abs($percentage), 2) }} % {{ $percentage > 0 ? 'Incremento' : 'Decremento' }} De {{ date('F', strtotime('-1 month')) }}
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box bg-info">
                            <span class="info-box-icon"><i class="fa fa-balance-scale"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Ventas de este año</span>
                                <span class="info-box-number">{{ number_format($year->sum('total'), 2)  }} Quetzales</span>
                                @php

                                    if($previous_year->sum('total') != 0)
                                    {
                                        $percentage = (($year->sum('total') - $previous_year->sum('total'))/ $previous_year->sum('total'))*100;
                                    } else {
                                        $percentage = 0;
                                    }
                                @endphp

                                <div class="progress">
                                    <div class="progress-bar" style="width: {{ abs($percentage), 2 }}%"></div>
                                </div>
                                <span class="progress-description {{ $percentage < 0 ? 'text-warning' : '' }}">
                                  {{ number_format(abs($percentage), 2) }} % {{ $percentage > 0 ? 'Incremento' : 'Decremento' }} De {{ date('Y', strtotime('-1 year')) }}
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box bg-info">
                            <span class="info-box-icon"><i class="fa fa-balance-scale"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text mt-3 pb-1">Venta Total</span>
                                <span class="info-box-number mb-3">{{ number_format($sales->sum('total'), 2) }} Quetzales</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box bg-success">
                            <span class="info-box-icon"><i class="fa fa-money"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Pagos del día</span>
                                <span class="info-box-number">{{ number_format($today->sum('pay'), 2) }} Quetzales</span>
                                @php

                                    if($yesterday->sum('pay') != 0)
                                    {
                                        $percentage = (($today->sum('pay') - $yesterday->sum('pay'))/ $yesterday->sum('pay'))*100;
                                    } else {
                                        $percentage = 0;
                                    }

                                @endphp

                                <div class="progress">
                                    <div class="progress-bar" style="width: {{ abs($percentage), 2 }}%"></div>
                                </div>

                                <span class="progress-description {{ $percentage < 0 ? 'text-warning' : '' }}">
                                  {{ number_format(abs($percentage), 2) }} % {{ $percentage > 0 ? 'Incremento' : 'Decremento' }} De {{ date('l', strtotime('-1 day')) }}
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box bg-success">
                            <span class="info-box-icon"><i class="fa fa-money"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Pagos de este mes</span>
                                <span class="info-box-number">{{ number_format($month->sum('pay'), 2)  }} Quetzales</span>
                                @php
                                    if($previous_month->sum('pay') != 0)
                                    {
                                        $percentage = (($month->sum('pay') - $previous_month->sum('pay'))/ $previous_month->sum('pay'))*100;
                                    } else {
                                        $percentage = 0;
                                    }

                                @endphp

                                <div class="progress">
                                    <div class="progress-bar" style="width: {{ number_format(abs($percentage), 2) }}%"></div>
                                </div>

                                <span class="progress-description {{ $percentage < 0 ? 'text-warning' : '' }}">
                                  {{ number_format(abs($percentage), 2) }} % {{ $percentage > 0 ? 'Incremento' : 'Decremento' }} De {{ date('F', strtotime('-1 month')) }}
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box bg-success">
                            <span class="info-box-icon"><i class="fa fa-money"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Pagos de este año</span>
                                <span class="info-box-number">{{ number_format($year->sum('pay'),2 ) }} Quetzales</span>
                                @php

                                    if($previous_month->sum('pay') != 0)
                                    {
                                        $percentage = (($year->sum('pay') - $previous_year->sum('pay'))/ $previous_year->sum('pay'))*100;
                                    } else {
                                        $percentage = 0;
                                    }


                                @endphp

                                <div class="progress">
                                    <div class="progress-bar" style="width: {{ abs($percentage), 2 }}%"></div>
                                </div>

                                <span class="progress-description {{ $percentage < 0 ? 'text-warning' : '' }}">
                                  {{ number_format(abs($percentage), 2) }} % {{ $percentage > 0 ? 'Incremento' : 'Decremento' }} De {{ date('Y', strtotime('-1 year')) }}
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box bg-success">
                            <span class="info-box-icon"><i class="fa fa-money"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text mt-3 pb-1">Pago Total</span>
                                <span class="info-box-number mb-3">{{ number_format($sales->sum('pay'),2 ) }} Quetzales</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box bg-warning">
                            <span class="info-box-icon"><i class="fa fa-bell-o"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Vencimientos de hoy</span>
                                <span class="info-box-number">{{ number_format($today->sum('due'), 2)  }} Quetzales</span>
                                @php

                                    if($yesterday->sum('due') != 0)
                                    {
                                        $percentage = (($today->sum('due') - $yesterday->sum('due'))/ $yesterday->sum('due'))*100;
                                    } else {
                                        $percentage = 0;
                                    }

                                @endphp

                                <div class="progress">
                                    <div class="progress-bar" style="width: {{ number_format(abs($percentage), 2) }}%"></div>
                                </div>

                                <span class="progress-description {{ $percentage < 0 ? 'text-success' : '' }}">
                                  {{ number_format(abs($percentage), 2) }} % {{ $percentage > 0 ? 'Incremento' : 'Decremento' }} De {{ date('l', strtotime('-1 day')) }}
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box bg-warning">
                            <span class="info-box-icon"><i class="fa fa-bell-o"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Vencimientos del mes</span>
                                <span class="info-box-number">{{ number_format($month->sum('due'), 2)  }} Quetzales</span>
                                @php

                                    if($previous_month->sum('due') != 0)
                                    {
                                        $percentage = (($month->sum('due') - $previous_month->sum('due'))/ $previous_month->sum('due'))*100;
                                    } else {
                                        $percentage = 0;
                                    }


                                @endphp

                                <div class="progress">
                                    <div class="progress-bar" style="width: {{ number_format(abs($percentage), 2) }}%"></div>
                                </div>

                                <span class="progress-description {{ $percentage < 0 ? 'text-success' : '' }}">
                                  {{ number_format(abs($percentage), 2) }} % {{ $percentage > 0 ? 'Incremento' : 'Decremento' }} De {{ date('F', strtotime('-1 month')) }}
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box bg-warning">
                            <span class="info-box-icon"><i class="fa fa-bell-o"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Vencimientos del año</span>
                                <span class="info-box-number">{{ number_format($year->sum('due'),2) }} Quetzales</span>
                                @php
                                    if($previous_year->sum('due') != 0)
                                    {
                                        $percentage = (($year->sum('due') - $previous_year->sum('due'))/ $previous_year->sum('due'))*100;
                                    } else {
                                        $percentage = 0;
                                    }
                                @endphp

                                <div class="progress">
                                    <div class="progress-bar" style="width: {{ number_format(abs($percentage), 2) }}%"></div>
                                </div>

                                <span class="progress-description {{ $percentage < 0 ? 'text-success' : '' }}">
                                  {{ number_format(abs($percentage), 2) }} % {{ $percentage > 0 ? 'Incremento' : 'Decremento' }} De {{ date('Y', strtotime('-1 year')) }}
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box bg-warning">
                            <span class="info-box-icon"><i class="fa fa-bell-o"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text mt-3 pb-1">Total Vencidos</span>
                                <span class="info-box-number mb-3">{{ number_format($sales->sum('due'), 2) }} Quetzales</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box bg-danger">
                            <span class="info-box-icon"><i class="fa fa-minus-square"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Gastos del día</span>
                                <span class="info-box-number">{{ $today_expenses->sum('amount') }} Quetzales</span>

                                @php

                                    if($yesterday_expenses->sum('amount') != 0)
                                    {
                                        $percentage = (($today_expenses->sum('amount') - $yesterday_expenses->sum('amount'))/ $yesterday_expenses->sum('amount'))*100;
                                    } else {
                                        $percentage = 0;
                                    }
                                @endphp

                                <div class="progress">
                                    <div class="progress-bar" style="width: {{  number_format(abs($percentage), 2) }}%"></div>
                                </div>

                                <span class="progress-description {{ $percentage < 0 ? 'text-success' : '' }}">
                                  {{ number_format(abs($percentage), 2) }} % {{ $percentage > 0 ? 'Incremento' : 'Decremento' }} De {{ date('l', strtotime('-1 day')) }}
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box bg-danger">
                            <span class="info-box-icon"><i class="fa fa-minus-square"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Gastos del mes</span>
                                <span class="info-box-number">{{ number_format($month_expenses->sum('amount'), 2) }} Quetzales</span>
                                @php
                                    if($yesterday_expenses->sum('amount') != 0)
                                    {
                                        $percentage = (($today_expenses->sum('amount') - $yesterday_expenses->sum('amount'))/ $yesterday_expenses->sum('amount'))*100;
                                    } else {
                                        $percentage = 0;
                                    }


                                @endphp

                                <div class="progress">
                                    <div class="progress-bar" style="width: {{ number_format(abs($percentage), 2) }}%"></div>
                                </div>

                                <span class="progress-description {{ $percentage < 0 ? 'text-success' : '' }}">
                                  {{ number_format(abs($percentage), 2) }} % {{ $percentage > 0 ? 'Incremento' : 'Decremento' }} De {{ date('F', strtotime('-1 month')) }}
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box bg-danger">
                            <span class="info-box-icon"><i class="fa fa-minus-square"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Gasto Anual</span>
                                <span class="info-box-number">{{ number_format($year_expenses->sum('amount'), 2) }} Quetzales</span>
                                @php
                                    if($previous_year_expenses->sum('amount') != 0)
                                    {
                                        $percentage = (($year_expenses->sum('amount') - $previous_year_expenses->sum('amount'))/ $previous_year_expenses->sum('amount'))*100;
                                    } else {
                                        $percentage = 0;
                                    }
                                @endphp

                                <div class="progress">
                                    <div class="progress-bar" style="width: {{ number_format(abs($percentage), 2) }}%"></div>
                                </div>

                                <span class="progress-description {{ $percentage > 0 ? 'text-warning' : '' }}">
                                  {{ number_format(abs($percentage), 2) }} % {{ $percentage > 0 ? 'Incremento' : 'Decremento' }} De {{ date('Y', strtotime('-1 year')) }}
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box bg-danger">
                            <span class="info-box-icon"><i class="fa fa-minus-square"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text mt-3 pb-1">Total Gastos</span>
                                <span class="info-box-number mb-3">{{ number_format($expenses->sum('amount'), 2)  }} Quetzales</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                </div>
				<div class="row">
					<div class="col-md-6">
						<!-- AREA CHART -->
						<div class="card card-primary">
							<div class="card-header">
								<h3 class="card-title">Reporte de Ventas</h3>
							</div>
							<div class="card-body">
								<div class="chart">
									<div id="barchart_material" style="width: 900px; height: 500px;"></div>
								</div>
							</div>
							<!-- /.card-body -->
						</div>
						<!-- /.card -->
					</div>
					<div class="col-md-6">
						<!-- AREA CHART -->
						<div class="card card-primary">
							<div class="card-header">
								<h3 class="card-title">Reporte de Gastos</h3>
							</div>
							<div class="card-body">
								<div class="chart">
									<div id="barchart_material2" style="width: 900px; height: 500px;"></div>
								</div>
							</div>
							<!-- /.card-body -->
						</div>
						<!-- /.card -->
					</div>
				</div>
				<!-- /.row -->
			</div><!-- /.container-fluid -->
		</section>
		<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->

@endsection

@push('js')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script type="text/javascript">
        google.charts.load('current', {'packages':['bar']});
        google.charts.setOnLoadCallback(drawStuff);

        function drawStuff() {
            var data = new google.visualization.arrayToDataTable([
                ['Mes', 'Ventas {{ date('Y') }}'],
                @foreach($current_sales as $sale)
                    ["{{ date('M', mktime('0', 0, 0, $sale['months'], 10)) }}", {{ $sale['sums'] }}],
                @endforeach
			]);

            var options = {
                title: 'Reporte Mensual de Ventas',
                width: 700,
                legend: { position: 'none' },
                chart: { title: 'Reporte Mensual de Ventas {{ date('Y') }}',
                    subtitle: 'Reporte Mensual de Ventas' },
                bars: 'vertical', // Required for Material Bar Charts.
                axes: {
                    x: {
                        0: { side: 'bottom', label: 'Mes'} // Top x-axis.
                    }
                },
                bar: { groupWidth: "90%" }
            };

            var chart = new google.charts.Bar(document.getElementById('barchart_material'));
            chart.draw(data, options);
		}
	</script>

	<script type="text/javascript">
        google.charts.load('current', {'packages':['bar']});
        google.charts.setOnLoadCallback(drawStuff);

        function drawStuff() {
            var data = new google.visualization.arrayToDataTable([
                ['Month', 'Sales {{ date('Y') }}'],
                @foreach($current_expenses as $expense)
                    ["{{ date('M', mktime('0', 0, 0, $expense['months'], 10)) }}", {{ $expense['sums'] }}],
                @endforeach
            ]);

            var options = {
                title: 'Reporte Mensual de Gastos',
                width: 700,
                legend: { position: 'none' },
                chart: { title: 'Reporte Mensual de Gastos {{ date('Y') }}',
                    subtitle: 'Reporte Mensual de Gastos' },
                bars: 'vertical', // Required for Material Bar Charts.
                axes: {
                    x: {
                        0: { side: 'bottom', label: 'Mes'} // Top x-axis.
                    }
                },
                bar: { groupWidth: "90%" }
            };

            var chart = new google.charts.Bar(document.getElementById('barchart_material2'));
            chart.draw(data, options);
        }


	</script>


@endpush
