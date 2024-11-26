<?php

class Cliente extends TRecord
{
    const TABLENAME  = 'cliente';
    const PRIMARYKEY = 'id';
    const IDPOLICY  = 'max';

    public function __construct($id = null, $callObjectLoad = TRUE)
    {
        parent::__construct($id, $callObjectLoad);
        parent::addAttribute('nome');
        parent::addAttribute('endereco');
        parent::addAttribute('telefone');
        parent::addAttribute('nascimento');
        parent::addAttribute('situacao');
        parent::addAttribute('email');
        parent::addAttribute('genero');
        parent::addAttribute('categoria_id');
        parent::addAttribute('cidade_id');
    }

    public function get_cidade()
    {
        return new Cidade($this->cidade_id);
    }

    public function get_categoria()
    {
        return new Categoria($this->categoria_id);
    }
}