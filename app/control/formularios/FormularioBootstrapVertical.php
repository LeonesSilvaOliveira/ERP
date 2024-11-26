<?php

use Adianti\Control\TAction;
use Adianti\Widget\Form\TCombo;
use Adianti\Widget\Form\TDate;
use Adianti\Widget\Form\TEntry;
use Adianti\Widget\Form\TLabel;

class FormularioBootstrapVertical extends TPage
{
    public function __construct()
    {
        parent::__construct();

        $this->form = new BootstrapFormBuilder('meu_form');
        $this->form->setFormTitle('Fomulário Vertical');
        $this->form->setFieldSizes('100%');
        $id = new TEntry('id');
        $id->setEditable(false);
        $id->setValue(1);
        $nome = new TEntry('nome');
        $genero = new TCombo('genero');
        $status = new TCombo('status');

        $cnh = new TEntry('cnh');
        $documento = new TEntry('documento');
        $dt_nascimento = new TDate('dt_nascimento');
        $fone_residencial = new TEntry('fone_residencial');
        $fone_celular = new TEntry('fone_celular');
        

        $row = $this->form->addFields(
            [new TLabel('Id'), $id],
            [new TLabel('Nome'), $nome],
            [new TLabel('Gênero'), $genero],
            [new TLabel('Status'), $status]
        );
        
        $row->layout = ['col-sm-2', 'col-sm-6', 'col-sm-2', 'col-sm-2'];


       $row =  $this->form->addFields(
            [new TLabel('Cnh: '), $cnh],
            [new TLabel('Documento: '), $documento],
            [new TLabel('Data Nascimento: '), $dt_nascimento],
            [new TLabel('Telefone Residencial'), $fone_residencial],
            [new TLabel('Telefone Celular'), $fone_celular]
        );

        $row->layout = ['col-sm-2', 'col-sm-3', 'col-sm-3', 'col-sm-2', 'col-sm-2'];
        $this->form->addAction('Enviar', new TAction([$this, 'onSave']), 'fa:save');
        parent::add($this->form);
    }


    public function onSave($param)
    {
        $data = $this->form->getData();

        
        dump($data);
        new TMessage('info', 'Formulário enviado com sucesso');

        
    }
}
