<?php

namespace Mova\Model;

use Cassandra\Date;
use DateTime;
use IntlDateFormatter;

class Mensagem {
    public function geraMensagem($data)
    {
        $data = DateTime::createFromFormat("d/m/Y",$data);
        $diaMes = $data->format("d/m");

        return strftime("Hoje é %A, %e de %B de %Y. {$this->feriado($diaMes)}", strtotime($data->format("Y-m-d")));
    }

    public function feriado($diaMes)
    {
        $vFeriado = [
            "01/01" => "Ano Novo",
            "21/04" => "Tiradentes",
            "01/05" => "Dia do Trabalho",
            "07/09" => "Indepência do Brasil",
            "12/10" => "Nossa Senhora Aparecida",
            "02/11" => "Finados",
            "15/11" => "Proclamação da República",
            "25/12" => "Natal"
        ];

        if (array_key_exists($diaMes,$vFeriado))
            return $vFeriado[$diaMes];
    }
}