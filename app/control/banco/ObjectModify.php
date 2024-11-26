<?php

class ObjectModify extends TPage
{
    public function __construct()
    {
        parent::__construct();

        TTransaction::open('curso');
        
        $save = false;

        $produto = new Produto(6);
        print $produto->render("O produto <b>{descricao}</b> está com o preço de <b>{preco_venda}</b>");

        if($save)
        {
            new TMessage('info', 'Produto salvo com sucesso');
        }
       
        TTransaction::close();
    }
}