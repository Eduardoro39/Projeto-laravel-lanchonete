@extends('layouts/app')
@section('title', 'Dashboard')

@section('content')

    <div class="container-fluid">
        <div class="row">
            @include('layouts.menu_funcionario')

            <div class="col-md-9 py-4">
                <h1 class="mb-4"> Dashboard </h1>
                
                <div class="row justify-content-center">
                    <div class="col-4 card bg-light py-5 w-25 mx-3 mb-4">
                        <img src="{{ asset('storage/ImagemPadraoUsuario.png') }}" class="card-img-top w-50 mx-auto d-block" alt="Imagem padrão do usuário">
                        <div class="card-body">
                            <h5 class="card-title text-center fw-bold"> Usuários cadastrados hoje: {{ $usuariosCadastradosHoje->count() }}  </h5>
                            
                            <div class="card-text text-center">
                                @for ($i = 0; $i < 5; $i++)
                                    @isset($usuariosCadastradosHoje[$i])
                                        <a href="{{ route('user.usuarios.show', $usuariosCadastradosHoje[$i]->id) }}" class="text-info mx-2"> {{ $usuariosCadastradosHoje[$i]->pessoa->nome }} </a>
                                    @endisset
                                @endfor
                                @if ($usuariosCadastradosHoje->count() > 5) {{-- Quando tiver mais de 5 registros vai mostrar "..." no final para a pessoa saber que tem mais, só não mostrou --}}
                                    <span class="h4 fw-bold"> ... </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="col-4 card bg-light py-5 w-25 mx-3 mb-4">
                        <img src="{{ asset('storage/ImagemPadraoComida.png') }}" class="card-img-top w-50 mx-auto d-block" alt="Imagem padrão do usuário">
                        <div class="card-body">
                            <h5 class="card-title text-center fw-bold"> Comidas cadastradas hoje: {{ $comidasCadastradasHoje->count() }}  </h5>
                            
                            <div class="card-text text-center">
                                @for ($i = 0; $i < 5; $i++)
                                    @isset($comidasCadastradasHoje[$i])
                                        <span class="text-decoration-underline mx-1"> {{ $comidasCadastradasHoje[$i]->nome }} </span>
                                    @endisset
                                @endfor
                                @if ($comidasCadastradasHoje->count() > 5) {{-- Quando tiver mais de 5 registros vai mostrar "..." no final para a pessoa saber que tem mais, só não mostrou --}}
                                    <span class="h4 fw-bold"> ... </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="col-4 card bg-light py-5 w-25 mx-3 mb-4">
                        <img src="{{ asset('storage/ImagemPadraoBebida.png') }}" class="card-img-top w-50 mx-auto d-block" alt="Imagem padrão do usuário">
                        <div class="card-body">
                            <h5 class="card-title text-center fw-bold"> Bebidas cadastradas hoje: {{ $bebidasCadastradasHoje->count() }}  </h5>
                            
                            <div class="card-text text-center">
                                @for ($i = 0; $i < 5; $i++)
                                    @isset($bebidasCadastradasHoje[$i])
                                        <span class="text-decoration-underline mx-1"> {{ $bebidasCadastradasHoje[$i]->nome }} </span>
                                    @endisset
                                @endfor
                                @if ($bebidasCadastradasHoje->count() > 5) {{-- Quando tiver mais de 5 registros vai mostrar "..." no final para a pessoa saber que tem mais, só não mostrou --}}
                                    <span class="h4 fw-bold"> ... </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="col-4 card bg-light py-2 w-25 mx-3 mb-4">
                        <div class="card-body">
                            <h5 class="card-title text-center fw-bold"> Funcionários cadastrados hoje: {{ $funcionariosCadastradosHoje->count() }}  </h5>
                            
                            <div class="card-text text-center">
                                @for ($i = 0; $i < 5; $i++)
                                    @isset($funcionariosCadastradosHoje[$i])
                                        <span class="text-decoration-underline mx-1"> {{ $funcionariosCadastradosHoje[$i]->pessoa->nome }} </span>
                                    @endisset
                                @endfor
                                @if ($funcionariosCadastradosHoje->count() > 5) {{-- Quando tiver mais de 5 registros vai mostrar "..." no final para a pessoa saber que tem mais, só não mostrou --}}
                                    <span class="h4 fw-bold"> ... </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="col-4 card bg-light py-2 w-25 mx-3 mb-4">
                        <div class="card-body">
                            <h5 class="card-title text-center fw-bold"> Ingredientes cadastrados hoje: {{ $ingredientesCadastradosHoje->count() }}  </h5>
                            
                            <div class="card-text text-center">
                                @for ($i = 0; $i < 5; $i++)
                                    @isset($ingredientesCadastradosHoje[$i])
                                        <span class="text-decoration-underline mx-1"> {{ $ingredientesCadastradosHoje[$i]->nome }} </span>
                                    @endisset
                                @endfor
                                @if ($ingredientesCadastradosHoje->count() > 5) {{-- Quando tiver mais de 5 registros vai mostrar "..." no final para a pessoa saber que tem mais, só não mostrou --}}
                                    <span class="h4 fw-bold"> ... </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="col-4 card bg-light py-2 w-25 mx-3 mb-4">
                        <div class="card-body">
                            <h5 class="card-title text-center fw-bold"> Medidas cadastradas hoje: {{ $medidasCadastradasHoje->count() }}  </h5>
                            
                            <div class="card-text text-center">
                                @for ($i = 0; $i < 5; $i++)
                                    @isset($medidasCadastradasHoje[$i])
                                        <span class="text-decoration-underline mx-1"> {{ $medidasCadastradasHoje[$i]->nome }} </span>
                                    @endisset
                                @endfor
                                @if ($medidasCadastradasHoje->count() > 5) {{-- Quando tiver mais de 5 registros vai mostrar "..." no final para a pessoa saber que tem mais, só não mostrou --}}
                                    <span class="h4 fw-bold"> ... </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="col-4 card bg-light py-2 w-25 mx-3 mb-4">
                        <div class="card-body">
                            <h5 class="card-title text-center fw-bold"> Cidades cadastradas hoje: {{ $cidadesCadastradasHoje->count() }}  </h5>
                            
                            <div class="card-text text-center">
                                @for ($i = 0; $i < 5; $i++)
                                    @isset($cidadesCadastradasHoje[$i])
                                        <span class="text-decoration-underline mx-1"> {{ $cidadesCadastradasHoje[$i]->nome }} </span>
                                    @endisset
                                @endfor
                                @if ($cidadesCadastradasHoje->count() > 5) {{-- Quando tiver mais de 5 registros vai mostrar "..." no final para a pessoa saber que tem mais, só não mostrou --}}
                                    <span class="h4 fw-bold"> ... </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <hr>
                
                {{-- Gráficos --}}
                <h2 class="my-4 text-center"> Gráficos </h2>
                <div class="row">
                    <div class="col-sm-12 col-lg-6">
                        <div id="piechart" style="width: 450px; height: 400px;"></div>
                    </div>
                    <div class="col-sm-12 col-lg-6">
                        <div id="columnchart" style="width: 450px; height: 400px;"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    {{-- Script dos Graficos --}}
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawPieChart);
        google.charts.setOnLoadCallback(drawColumnChart);
        var dados = <?php echo $dadosProChart; ?>

        function drawPieChart() {
            var data = google.visualization.arrayToDataTable(dados);

            var options = {
                title: 'Quantidade de cadastros',
                legend: 'none'
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);
        }

        function drawColumnChart() {
            var data = google.visualization.arrayToDataTable(dados);

            var options = {
                title: 'Quantidade de cadastros',
                legend: 'none'
            };

            var chart = new google.visualization.ColumnChart(document.getElementById('columnchart'));

            chart.draw(data, options);
        }
    </script>

@endsection