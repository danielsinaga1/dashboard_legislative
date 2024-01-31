@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Dashboard Incident Reports
                </div>
                <div class="panel-body">
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="col-lg-3">
                        <!-- small box -->
                        <div class="small-box bg-aqua">
                            <div class="inner">

                                <h3><strong>{{$totalReport}}</h3>

                                <p>{{ trans('panel.total_report') }}</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-tasks"></i>
                            </div>
                            <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-5">
                        <!-- small box -->
                        <div class="small-box bg-green">
                            <div class="inner">
                                <h3><strong>{{$totalReportApprovedAccumulative}}</h3>

                                <p>{{ trans('panel.status.approved') }}</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-check"></i>
                            </div>
                            <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
                        </div>
                    </div>

                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-blue">
                            <div class="inner">
                                <h3><strong>{{$totalReportInProgressAccumulative}}</h3>

                                <p>{{ trans('panel.status.inprogress') }}</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-hand-paper-o"></i>
                            </div>
                            <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
                        </div>
                    </div>

                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-teal">
                            <div class="inner">
                                <h3><strong>{{$totalCloseReport}}</h3>

                                <p>{{ trans('panel.status.close') }}</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-thumbs-up"></i>
                            </div>
                            <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
                        </div>
                    </div>

                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-orange">
                            <div class="inner">
                                <h3><strong>{{$totalInvestigationRequired}}</h3>
                                <h6><strong>{{ trans('panel.investigasi_detail') }}</strong></h6>
                                <p>{{ trans('panel.investigation.required') }}</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-exclamation-circle"></i>
                            </div>
                            <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
                        </div>
                    </div>

                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-lime">
                            <div class="inner">
                                <h3><strong>{{$totalInvestigationDone}}</h3>
                                <h6><strong>{{ trans('panel.investigasi_detail') }}</strong></h6>
                                <p>{{ trans('panel.investigation.done') }}</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
                        </div>
                    </div>

                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-gray">
                            <div class="inner">
                                <h3><strong>{{$totalInvestigationPending}}</h3>
                                <h6><strong>{{ trans('panel.investigasi_detail') }}</strong></h6>
                                <p>{{ trans('panel.investigation.pending') }}</p>

                            </div>

                            <div class="icon">
                                <i class="fas fa-minus-circle"></i>
                            </div>
                            <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><b>{{ trans('panel.dashboard_ncr') }}</b></h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
        <br>
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="small-box bg-aqua">
                        <div class="inner">

                            <h3><strong>{{"0"}}</h3>

                            <p>{{ trans('panel.total_report') }}</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-tasks"></i>
                        </div>
                        <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">

                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3><strong>{{"0"}}</h3>

                            <p>{{ trans('panel.status.approved') }}</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-check"></i>
                        </div>
                        <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
                    </div>



                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="small-box bg-blue">
                        <div class="inner">
                            <h3><strong>{{"0"}}</h3>

                            <p>{{ trans('panel.status.inprogress') }}</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-hand-paper-o"></i>
                        </div>
                        <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">

                    <div class="small-box bg-teal">
                        <div class="inner">
                            <h3><strong>{{"0"}}</h3>

                            <p>{{ trans('panel.status.close') }}</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-thumbs-up"></i>
                        </div>
                        <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
                    </div>

                </div>

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="small-box bg-orange">
                        <div class="inner">
                            <h3><strong>{{"0"}}</h3>
                            <h6><strong>{{ trans('panel.status.overdue') }}</strong></h6>

                        </div>
                        <div class="icon">
                            <i class="fas fa-exclamation-circle"></i>
                        </div>
                        <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
                    </div>

                </div>

                 <div class="col-md-3 col-sm-6 col-xs-12">

                    <div class="small-box bg-lime">
                        <div class="inner">
                            <h3><strong>{{"0"}}</h3>
                            <h6><strong>{{ trans('panel.investigasi_detail') }}</strong></h6>
                            <p>{{ trans('panel.investigation.done') }}</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
                    </div>

                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">

                    <div class="small-box bg-gray">
                        <div class="inner">
                            <h3><strong>{{"0"}}</h3>
                            <h6><strong>{{ trans('panel.investigasi_detail') }}</strong></h6>
                            <p>{{ trans('panel.investigation.pending') }}</p>

                        </div>

                        <div class="icon">
                            <i class="fas fa-minus-circle"></i>
                        </div>
                        <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
                    </div>
                </div>

            </div>
        </div>

    </div>

    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title"><b>CORPORATE VALUE</b></h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
        <br>
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-green">
                        <span class="info-box-icon">B</span>
                        <div class="info-box-content">
                            <span class="info-box-text"><b>Berpengetahuan</b></span>
                            <span >Menjadi ahli di bidangnya</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-aqua">
                        <span class="info-box-icon">A</span>
                        <div class="info-box-content">
                            <span class="info-box-text"><b>Akuntabilitas</b></span>
                            <span>Memahami dan bertanggung jawab untuk melaksanakan pekerjaan dengan benar</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-teal">
                        <span class="info-box-icon">I</span>
                        <div class="info-box-content">
                            <span class="info-box-text"><b>Integritas dan Etika</b></span>
                            <span>Melakukan hal yang benar, dengan cara yang jujur, adil, dan bertanggung jawab</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange">
                        <span class="info-box-icon">K</span>
                        <div class="info-box-content">
                            <span class="info-box-text"><b>Kerja Tim</b></span>
                            <span>Bekerja secara kolaboratif, penuh keharmonisan dan saling menghormati</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>





    <div class="row">
		<div class="col-md-6">
            <div class="small-box bg-blue">
				<div class="inner">
					<h3>VISION</h3>
					<h2>Perusahaan penghasil amoniak terefisien di dunia</h2> <br><br>
				</div>
				<div class="icon">
					<i class="fa fa-eye"></i>
				</div>
            </div>
		</div>
		<div class="col-md-6">
			<div class="small-box bg-red">
				<div class="inner">
					<h3>MISSION</h3>
					<p>1. Peduli akan kualitas, keselamatan, kesehatan dan lingkungan (QSHE) <br> 2. Fokus pada produktifitas dan kehandalan pabrik <br>
					3. Menjadi perusahaan terbaik, dimana setiap karyawan bangga menjadi bagian dari Perusahaan.</p>
				</div>
				<div class="icon">
					<i class="fa fa-rocket"></i>
				</div>
            </div>
		</div>
	</div>
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Table Matrix Incident Report</h3>
        </div>
        <div class="box-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th><!-- Empty for the left top corner of the table --></th>
                        @foreach($columns as $column)
                        <th>{{ $column }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                @foreach($rows as $category_id => $columns)
                    <tr>
                        <td><strong>{{ $category_id }}</strong></td>
                        @foreach($columns as $classification_id => $description)
                        <td>{!! $description !!}</td>
                        @endforeach
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="box box-danger">
        <div class="box-header with-border">
          <h3 class="box-title">Kategori Insiden</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
            <figure class="highcharts-figure">
                <div id="pieChart"></div>
            </figure>
        </div>
        <!-- /.box-body -->
      </div>
      {{-- <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Preventive dan Corrective</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
            <figure class="highcharts-figure">
                <div id="stackBar"></div>
            </figure>

        </div>
        <!-- /.box-body -->
      </div> --}}

      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Preventive dan Corrective</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
            <figure class="highcharts-figure">
                <div id="container-precortive"></div>
            </figure>

        </div>
        <!-- /.box-body -->
      </div>
{{--
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Tindak Lanjut Temuan Tiap Divisi</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
            <figure class="highcharts-figure">
                <div id="container"></div>
            </figure>

        </div>
        <!-- /.box-body -->
      </div> --}}

      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Tindak Lanjut Temuan Tiap Divisi</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
            <figure class="highcharts-figure">
                <div id="container-temuan"></div>
            </figure>

        </div>
        <!-- /.box-body -->
      </div>


      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Status Investigasi</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
            <figure class="highcharts-figure">
                <div id="container-investigasi"></div>
            </figure>

        </div>
        <!-- /.box-body -->
      </div>

</div>
@endsection
@section('scripts')
@parent
<script>
    Highcharts.chart('pieChart', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
            },
            title: {
                text: 'Kategori Insiden'
                },
                subtitle: {
                    text: 'Per Tahun'
                },
                credits: {
                    enabled: false
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                },
                accessibility: {
                    point: {
                     valueSuffix: '%'
                 }
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                            connectorColor: 'red'
                        },
                        showInLegend: true,
                    }
                },

                series: [{
                    type: 'pie',
                    name: 'Persentase',

                    data: {!!json_encode($dataCategory)!!},
                }]
            });
</script>
{{-- <script>

    Highcharts.chart('stackBar', {
        chart: {
            type: 'bar'
        },
        title: {
            text: 'Follow up Rekomendasi'
        },
        colors: ['#2f7ed8', '#0d233a', '#8bbc21'],
        xAxis: {
            categories: ['Close', 'Open', 'Total']
        },
        credits: {
            enabled: false
        },
        yAxis: {
            min: 1,
            title: {
                text: 'Per Bulan'
            }
        },
        legend: {
            reversed: true
        },
        plotOptions: {
            series: {
                stacking: 'normal'
            }
        },
        series: [{
            name: 'Grand Total',
            data: [{{ $countCloseCorrectivePreventive }}, {{ $countOpenCorrectivePreventive }}, {{ $countCorrectivePreventive }}]
        }, {
            name: 'Preventive',
            data: [{{$countClosePreventive}}, {{$countOpenPreventive}}, {{$countPreventive}}]
        }, {
            name: 'Corrective',
            data: [{{$countCloseCorrective}}, {{$countOpenCorrective}}, {{$countCorrective}}]
        }]
    });
</script> --}}
{{-- <script>

    Highcharts.chart('container', {
        chart: {
            type: 'bar'
        },
        title: {
            text: 'Departemen Terkait'
        },
        credits: {
            enabled: false
        },
        xAxis: {
            // categories: ["Total", "GA&IT", "HRD", "MECH", "OPR", "FIN&ACC", "LOG&SHP", "QSHE", "TSP", "TECH"]
            categories: {!!json_encode($arrayOrigins)!!}
            // categories: series
        },
        yAxis: {
            min: 0,
            title: {
                text: ''
            }
        },
        legend: {
            reversed: true
        },
        plotOptions: {
            series: {
                stacking: 'normal'
            }
        },
        series: [{
            name: 'Close',

            data: {!!json_encode($countCloseDeptDesignations,JSON_NUMERIC_CHECK)!!},
            // 'Total', 'GA&IT', 'HRD', 'MECH', 'OPR', 'FIN&ACC', 'LOG&SHP', 'QSHE', 'TSP', 'TECH'
            color: "#62EB06"
        }, {
            name: 'Open',
            // data: [2, 3, 2, 1, 7, 2, 7, 8, 10, 8],
            data: {!!json_encode($countOpenDeptDesignations,JSON_NUMERIC_CHECK)!!},
            color: "#F2340C"
            // 'Total', 'GA&IT', 'HRD', 'MECH', 'OPR', 'FIN&ACC', 'LOG&SHP', 'QSHE', 'TSP', 'TECH'
        }]
    });

</script> --}}
<script>
    Highcharts.chart('container-precortive', {
  chart: {
    type: 'bar'
  },
  title: {
    text: 'Follow up Rekomendasi'
  },
  xAxis: {
    categories: ['Close', 'Open', 'Total'],
    title: {
      text: null
    }
  },
  yAxis: {
    min: 0,
    labels: {
      overflow: 'justify'
    }
  },
  plotOptions: {
    bar: {
      dataLabels: {
        enabled: true
      }
    }
  },
  legend: {
    layout: 'vertical',
    align: 'right',
    verticalAlign: 'top',
    x: -40,
    y: 80,
    floating: true,
    borderWidth: 1,
    backgroundColor:
      Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
    shadow: true
  },
  credits: {
    enabled: false
  },
  series: [{
    name: 'Preventive',
    data: [{{$countClosePreventive}}, {{$countOpenPreventive}}, {{$countPreventive}}]
  }, {
    name: 'Corrective',
    data: [{{$countCloseCorrective}}, {{$countOpenCorrective}}, {{$countCorrective}}]
  }, {
    name: 'Grand Total',
    data: [{{ $countCloseCorrectivePreventive }}, {{ $countOpenCorrectivePreventive }}, {{ $countCorrectivePreventive }}]
  }]
});
</script>

<script>
    Highcharts.chart('container-temuan', {
        chart: {
            type: 'bar'
        },
        title: {
            text: ''
        },
        xAxis: {
            categories: ['GA&IT', 'HRD', 'MECH', 'OPR', 'FIN&ACC', 'LOG&SHIP', 'QSHE', 'TSP', 'TECH', 'TOTAL'],
            title: {
                text: null
            }
        },
        yAxis: {
            min: 0,
            labels: {
                overflow: 'justify'
            }
        },
        plotOptions: {
            bar: {
                dataLabels: {
                    enabled: true
                }
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'top',
            x: -40,
            y: 80,
            floating: true,
            borderWidth: 1,
            backgroundColor: Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
            shadow: true
        },
        credits: {
            enabled: false
        },
        series: [{
            name: 'Close',
            data: {!!json_encode($countCloseDeptDesignations, JSON_NUMERIC_CHECK) !!},
            color: "#62EB06"
        }, {

            name: 'Open',
            data: {!!json_encode($countOpenDeptDesignations, JSON_NUMERIC_CHECK) !!},
            color: "#F2340C"
        }]
    });
</script>



<script>
    Highcharts.chart('container-investigasi', {
        chart: {
            type: 'bar'
        },
        title: {
            text: ''
        },
        xAxis: {
            categories: {!!json_encode($arrayCategories)!!},
            title: {
                text: null
            }
        },
        yAxis: {
            min: 0,
            labels: {
                overflow: 'justify'
            }
        },
        plotOptions: {
            bar: {
                dataLabels: {
                    enabled: true
                }
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'top',
            x: -40,
            y: 80,
            floating: true,
            borderWidth: 1,
            backgroundColor: Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
            shadow: true
        },
        credits: {
            enabled: false
        },
        series: [{
            name: 'Wajib',
            data: {!!json_encode($countObligatoryInvestigations, JSON_NUMERIC_CHECK) !!},
            color: "#62EB06"
        }, {

            name: 'Sudah Dilakukan',
            data: {!!json_encode($countAlreadyInvestigations, JSON_NUMERIC_CHECK) !!},
            color: "#F2340C"
        },
        {

            name: 'Belum Dilakukan',
            data: {!!json_encode($countNotFinishedInvestigations, JSON_NUMERIC_CHECK) !!},
            color: "#808080"
        },
        ]
    });
</script>

@endsection
