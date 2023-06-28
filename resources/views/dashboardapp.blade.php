@extends('layouts.global')
@section('title','Halaman Dashboard')
@section('content')
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Dashboard</h4>
                  {{-- angka  --}}
            
                             <div class="col-md-12">
                    <div class="d-flex justify-content-between traffic-status">
                      <div class="item">
                        <p class="mb-">Buku</p>
                        <h5 class="font-weight-bold mb-0">{{$books}}</h5>
                        <div class="color-border"></div>
                      </div>
                      <div class="item">
                        <p class="mb-">Kategori</p>
                        <h5 class="font-weight-bold mb-0">{{  $kategoris }}</h5>
                        <div class="color-border"></div>
                      </div>
                      <div class="item">
                        <p class="mb-">Peminjaman</p>
                        <h5 class="font-weight-bold mb-0">{{  $peminjamanans }}</h5>
                        <div class="color-border"></div>
                      </div>
                    </div>
                  </div>

                        {{-- grafik mahasiswa berdasarkan prodi --}}
 

                        {{-- html --}}
                        <script src="https://code.highcharts.com/highcharts.js"></script>
                        <script src="https://code.highcharts.com/modules/exporting.js"></script>
                        <script src="https://code.highcharts.com/modules/export-data.js"></script>
                        <script src="https://code.highcharts.com/modules/accessibility.js"></script>
                        
                        <figure class="highcharts-figure">
                            <div id="container"></div>
                      
                             
                            </p>
                        </figure>
                        

                        {{-- css --}}
                        <style>
                        .highcharts-figure,
                        .highcharts-data-table table {
                            min-width: 310px;
                            max-width: 800px;
                            margin: 1em auto;
                        }
                        
                        #container {
                            height: 400px;
                        }
                        
                        .highcharts-data-table table {
                            font-family: Verdana, sans-serif;
                            border-collapse: collapse;
                            border: 1px solid #ebebeb;
                            margin: 10px auto;
                            text-align: center;
                            width: 100%;
                            max-width: 500px;
                        }
                        
                        .highcharts-data-table caption {
                            padding: 1em 0;
                            font-size: 1.2em;
                            color: #555;
                        }
                        
                        .highcharts-data-table th {
                            font-weight: 600;
                            padding: 0.5em;
                        }
                        
                        .highcharts-data-table td,
                        .highcharts-data-table th,
                        .highcharts-data-table caption {
                            padding: 0.5em;
                        }
                        
                        .highcharts-data-table thead tr,
                        .highcharts-data-table tr:nth-child(even) {
                            background: #f8f8f8;
                        }
                        
                        .highcharts-data-table tr:hover {
                            background: #f1f7ff;
                        }
                    </style>
                        

                        {{-- js --}}

                        <script>
                        Highcharts.chart('container', {
                            chart: {
                                type: 'column'
                            },
                            title: {
                                text: 'Peminjaman Buku'
                            },
                       
                            xAxis: {
                              
                                categories: [
                                    @foreach($peminjamankategori as $item)
                                    '{{ $item ->judul }} - {{$item->kategori}} ',
                                

                                    @endforeach
                                ],
                                crosshair: true
                            },
                            yAxis: {
                                min: 0,
                                max: 10,
                                title: {
                                    text: 'Jumlah Peminjaman'
                                }
                            },
                            tooltip: {
                                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                                    '<td style="padding:0"><b>{point.y} </b></td></tr>',
                                footerFormat: '</table>',
                                shared: true,
                                useHTML: true
                            },
                            plotOptions: {
                                column: {
                                    pointPadding: 0.2,
                                    borderWidth: 0
                                }
                            },
                            series: [{
                                name: ' Jumlah Peminjaman',
                                data: [
                                    @foreach($peminjamankategori as $item)
                                    {{ $item->jumlah }},
                                    @endforeach
                                ]
                        
                            }]
                        });
                        </script>

                  


                   


                  </div>
                  </div>
                  </div>
                  </div>

            @endsection
      