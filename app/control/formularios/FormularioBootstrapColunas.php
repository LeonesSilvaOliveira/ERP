<?php

class FormularioBootstrapColunas extends TPage
{
    public function __construct()
    {
        parent::__construct();

        $this->form = new BootstrapFormBuilder('meu_form');
        $this->form->setFormTitle('Formulário Bootstrap');

        $this->form->appendPage('Colunas automáticas');
        $this->form->addFields([new TLabel('2 campos')], [new TEntry('campo1')]);

        $this->form->addFields(
            [new TLabel('4 campos')], 
            [new TEntry('campo2a')],
            [new TEntry('campo2b')],
            [new TEntry('campo2c')],
            [new TEntry('campo2d')]);
        
        parent::add($this->form);
    }
}

