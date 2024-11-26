<?php

class Produto extends TRecord
{
    const TABLENAME = 'produto';
    const PRIMARYKEY = 'id';
    const IDPOLICY = 'max';

    public function __construct($id = null, $callObjectLoad = TRUE)
    {
        parent::__construct($id, $callObjectLoad);
        parent::addAttribute('descricao');
        parent::addAttribute('estoque');
        parent::addAttribute('preco_venda');
        parent::addAttribute('unidade');
        parent::addAttribute('local_foto');
    }
}