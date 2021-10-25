<?php

namespace Mova;

use Rain\Tpl;

class Page {

    private $tpl;
    private $options;
    private $defaults = [
        "header"=>true,
        "footer"=>true,
        "data"=>[]
    ];

    public function __construct($opts = array(), $tpl_dir = "/views/")
    {
        setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
        date_default_timezone_set('America/Sao_Paulo');

        $this->options = array_merge($this->defaults, $opts);

        $config = array(
            "base_url"      => null,
            "tpl_dir"       => $_SERVER['DOCUMENT_ROOT'].$tpl_dir,
            "cache_dir"     => $_SERVER['DOCUMENT_ROOT']."/views-cache/",
            "debug"         => true // set to false to improve the speed
        );

        Tpl::configure( $config );

        $this->tpl = new Tpl();

        if ($this->options['data']) $this->setData($this->options['data']);

        if ($this->options['header'] === true) $this->tpl->draw("header", false);

    }

    private function setData($data = array())
    {

        foreach ($data as $key => $value) {
            $this->tpl->assign($key, $value);
        }

    }

    public function setTpl($name, $data = array(), $returnHTML = false)
    {

        $this->setData($data);

        return $this->tpl->draw($name, $returnHTML);

    }

    public function __destruct()
    {

        if ($this->options['footer'] === true)
            $this->tpl->draw("footer", false);

    }
}