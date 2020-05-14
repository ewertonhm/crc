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

    public function GraficoNumeroDeAtendimentos($numeroDeMeses,$idDoCampo,$bgColor1 = 'rgba(63, 191, 63, 0.2)',$bgColor2 = 'rgba(63, 191, 191, 0.2)',$borderColor1 = 'rgba(63, 191, 63, 1)', $borderColor2 = 'rgba(63, 191, 191, 1)'){
        echo "<script>var ctx = document.getElementById('".$idDoCampo."'); var myChart = new Chart(ctx, {type: 'bar', data: { labels: [";
                // nomes campos
                echo "'";
                for ($i=0;$i<$numeroDeMeses;$i++){
                    echo \Carbon\Carbon::parse(\Carbon\Carbon::now()->subMonth(($numeroDeMeses-$i))->toDateTimeString())->isoFormat('MMM/Y');
                    echo "','";
                }
                echo \Carbon\Carbon::parse(\Carbon\Carbon::now()->toDateTimeString())->isoFormat('MMM/Y');
                echo "'],datasets: [{label: 'número de atendimentos',data: [";
                // dados dos campos
                for ($i=0;$i<$numeroDeMeses;$i++){
                    echo $this->getTotalAtendimentosMesAnterior(($numeroDeMeses-$i));
                    echo ",";
                }
                    echo $this->getTotalAtendimentosMesAnterior();
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
}