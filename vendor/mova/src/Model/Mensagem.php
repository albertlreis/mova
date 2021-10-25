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
            "1/1" => "Ano Novo",
            "21/4" => "Tiradentes",
            "1/5" => "Dia do Trabalho",
            "7/9" => "Indepência do Brasil",
            "12/10" => "Nossa Senhora Aparecida",
            "2/11" => "Finados",
            "15/11" => "Proclamação da República",
            "25/12" => "Natal"
        ];

        if (array_key_exists($diaMes,$vFeriado))
            return $vFeriado[$diaMes];
    }
}