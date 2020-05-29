<?php


namespace controller;


use AtendimentoQuery;

class Grafico
{
    public function getTotalAtendimentosMesAnterior($quantosMesesAntes = 0){
        return count(AtendimentoQuery::create()->where('atendimento.data like ?', \Carbon\Carbon::parse(\Carbon\Carbon::now()->subMonth($quantosMesesAntes)->toDateTimeString())->isoFormat('%MM/YYYY'))->find());
    }

    public function getTotalAtendimentosPorClasseMes($arrayClasse,$getter,$filter,$quantosMesesAntes = 0){
        // recebe
        // Array de objetos da classe a ser filtrada
        // getter do nome da classe, por exemplo getNome
        // filter da classe, por exemplo FilterByCidade
        // int com a quantidade de meses antes a ser pesquisado, em branco ou zero para mes atual

        $q = [];
        $nome = [];
        foreach ($arrayClasse as $a){
            $nome[] = $a->{$getter}();
            $q[] = count(\Base\AtendimentoQuery::create()->where('atendimento.data like ?', \Carbon\Carbon::parse(\Carbon\Carbon::now()->subMonth($quantosMesesAntes)->toDateTimeString())->isoFormat('%MM/YYYY'))->{$filter}($a)->find());
        }
        $array['nome'] = $nome;
        $array['quantidade'] = $q;

        return $array;

        // Retorna um array bidimensional com nome e quantidade
    }

    public function GraficoNumeroDeAtendimentos($numeroDeMeses,$mesesAntes,$idDoCampo,$bgColor1 = 'rgba(63, 191, 63, 0.2)',$bgColor2 = 'rgba(63, 191, 191, 0.2)',$borderColor1 = 'rgba(63, 191, 63, 1)', $borderColor2 = 'rgba(63, 191, 191, 1)'){
        echo "<script>var ctx = document.getElementById('".$idDoCampo."'); var myChart = new Chart(ctx, {type: 'bar', data: { labels: [";
                // nomes campos
                echo "'";
                for ($i=0;$i<$numeroDeMeses;$i++){
                    echo \Carbon\Carbon::parse(\Carbon\Carbon::now()->subMonth(($numeroDeMeses-1-$i+$mesesAntes))->toDateTimeString())->isoFormat('MMM/Y');
                    echo "'";
                    if($i != $numeroDeMeses-1){
                        echo ",'";
                    }
                }
                echo "],datasets: [{label: 'número de atendimentos',data: [";
                // dados dos campos
                for ($i=0;$i<$numeroDeMeses;$i++){
                    echo $this->getTotalAtendimentosMesAnterior(($numeroDeMeses-1-$i+$mesesAntes));
                    if($i != $numeroDeMeses-1){
                        echo ",";
                    }
                }
                echo "],backgroundColor: [";
                for($i=0;$i<$numeroDeMeses;$i++){
                    if($i % 2 == 0){
                        echo "'".$bgColor1."'";
                    } else {
                        echo "'".$bgColor2."'";
                    }
                    echo ",";
                }
                if($numeroDeMeses % 2 == 0){
                    echo "'".$bgColor1."'";
                } else {
                    echo "'".$bgColor2."'";
                }
                echo "],borderColor: [";
                for ($i=0;$i<$numeroDeMeses;$i++){
                    if($i % 2 == 0){
                        echo "'".$borderColor1."'";
                    } else {
                        echo "'".$borderColor2."'";
                    }
                    echo ",";
                }
                if($numeroDeMeses % 2 == 0){
                    echo "'".$borderColor1."'";
                } else {
                    echo "'".$borderColor2."'";
                }
                echo <<<TAG
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>
TAG;


    }

    public function GraficoTipoDeCliente($numeroDeMesesAntes = 0,$idDoCampo,$bgColor1 = 'rgba(63, 191, 63, 0.2)',$bgColor2 = 'rgba(63, 191, 191, 0.2)',$borderColor1 = 'rgba(63, 191, 63, 1)', $borderColor2 = 'rgba(63, 191, 191, 1)'){
        echo "<script>var ctx = document.getElementById('".$idDoCampo."'); var myChart = new Chart(ctx, {type: 'pie', data: { labels: [";
        // nomes campos
        $tipos = $this->getTotalAtendimentosPorClasseMes(\TipoQuery::create()->find(),'getTipo','FilterByTipo',$numeroDeMesesAntes);
        $n = count($tipos['nome']);
        $counter = 0;
        foreach($tipos['nome'] as $t){
            echo "'".$t."'";
            if($counter < $n-1){
                echo ",";
            }
            $counter++;
        }
        echo "],datasets: [{label: 'Atendimentos por tipo de cliente',data: [";
        // dados dos campos
        $counter = 0;
        foreach($tipos['quantidade'] as $q){
            echo $q;
            if($counter < $n-1){
                echo ",";
            }
            $counter++;
        }
        echo "],backgroundColor: [";
        for($i=0;$i<$n;$i++){
            if($i % 2 == 0){
                echo "'".$bgColor1."'";
            } else {
                echo "'".$bgColor2."'";
            }
            echo ",";
        }
        if($n % 2 == 0){
            echo "'".$bgColor1."'";
        } else {
            echo "'".$bgColor2."'";
        }
        echo "],borderColor: [";
        for ($i=0;$i<$n;$i++){
            if($i % 2 == 0){
                echo "'".$borderColor1."'";
            } else {
                echo "'".$borderColor2."'";
            }
            echo ",";
        }
        if($n % 2 == 0){
            echo "'".$borderColor1."'";
        } else {
            echo "'".$borderColor2."'";
        }
        echo <<<TAG
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>
TAG;


    }

    public function GraficoTodos($arrayClasse,$getter,$filter,$numeroDeMesesAntes = 0,$idDoCampo,$label = 'Título do Gráfico',$tipo = 'bar',$bgColor1 = 'rgba(63, 191, 63, 0.2)',$bgColor2 = 'rgba(63, 191, 191, 0.2)',$borderColor1 = 'rgba(63, 191, 63, 1)', $borderColor2 = 'rgba(63, 191, 191, 1)'){
        echo "<script>var ctx = document.getElementById('".$idDoCampo."'); var myChart = new Chart(ctx, {type: '".$tipo."', data: { labels: [";
        // nomes campos
        $data = $this->getTotalAtendimentosPorClasseMes($arrayClasse,$getter,$filter,$numeroDeMesesAntes);
        $n = count($data['nome']);
        $counter = 0;
        foreach($data['nome'] as $t){
            echo "'".$t."'";
            if($counter < $n-1){
                echo ",";
            }
            $counter++;
        }
        echo "],datasets: [{label: '".$label."',data: [";
        // dados dos campos
        $counter = 0;
        foreach($data['quantidade'] as $q){
            echo $q;
            if($counter < $n-1){
                echo ",";
            }
            $counter++;
        }
        echo "],backgroundColor: [";
        for($i=0;$i<$n;$i++){
            if($i % 2 == 0){
                echo "'".$bgColor1."'";
            } else {
                echo "'".$bgColor2."'";
            }
            echo ",";
        }
        if($n % 2 == 0){
            echo "'".$bgColor1."'";
        } else {
            echo "'".$bgColor2."'";
        }
        echo "],borderColor: [";
        for ($i=0;$i<$n;$i++){
            if($i % 2 == 0){
                echo "'".$borderColor1."'";
            } else {
                echo "'".$borderColor2."'";
            }
            echo ",";
        }
        if($n % 2 == 0){
            echo "'".$borderColor1."'";
        } else {
            echo "'".$borderColor2."'";
        }
        echo <<<TAG
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>
TAG;


    }

    public function chartDiv($id)
    {
        echo "div class='ct-chart ct-golden-section' id='$id'></div>'";
    }

    public function chartScript($chartId,$arrayDados,$getter,$filter, $periodo = '%12/1999')
    {
        // variavel periodo
        if($periodo == '12/1999'){
            $periodo =  \Carbon\Carbon::parse(\Carbon\Carbon::now()->toDateTimeString())->isoFormat('%MM/YYYY');
        }




        //open script
        echo "<cript>";

        //data
        echo "data = {";
        //lables
        echo "labels: [";

        $counter = 0;
        foreach ($arrayDados as $a){
            // labels
            echo "'".$a->{$getter}()."'";

            // virgulas
            if (count($arrayDados)-1 > $counter){
                echo ",";
            }
            $counter++;
        }

        echo "],";
        //series
        echo "series: [";

        $counter = 0;
        foreach ($arrayDados as $a){
            echo AtendimentoQuery::create()->{$filter}($a)->where('atendimento.data like ?',$periodo)->find()->count();
        }



        echo "]]};";
        //options
        echo "var options = {distributeSeries: true}";

        //responsiveOptions
        echo "var responsiveOptions = [";
        echo "['screen and (min-width: 641px) and (max-width: 1024px)', {";
        echo "seriesBarDistance: 10,";
        echo "axisX: {";
        echo "labelInterpolationFnc: function (value) {";
        echo "return value;";
        echo "}}}],";
        echo "['screen and (max-width: 640px)', {";
        echo "seriesBarDistance: 5,";
        echo "axisX: {";
        echo "labelInterpolationFnc: function (value) {";
        echo "return value[0];";
        echo "}}}]];";

        //start chart
        echo "new Chartlist.Bar('#".$chartId."', data, options, responsiveOptions);";

        //close script
        echo "</script>";
    }
}