<?php

class FormularioBoostrap extends TPage
{
    public function __construct()
    {
        parent::__construct();

        $this->form = new BootstrapFormBuilder('form_bootstrap');
        $this->form->setFormTitle('Formulário Bootstrap');
        $this->form->setFieldSizes('100%');

        $id = new TEntry('id');
        $descricao = new TEntry('descricao');
        $senha = new TPassword('senha');
        $dt_criacao = new TDateTime('dt_criacao');
        $dt_Exp = new TDateTime('dt_exp');
        $valor = new TEntry('valor');
        $cor = new TColor('cor');
        $peso = new TSpinner('peso');
        $tipo = new TCombo('tipo');
        $texto = new TText('texto');

        $texto->setSize('100%');
        $dt_criacao->setSize('100%');
        $id->setEditable(false);

        $this->form->addFields([new TLabel('Id'), $id]);
        $this->form->addFields([new TLabel('Descrição'), $descricao]);
        $this->form->addFields([new TLabel('Senha'), $senha]);
        $this->form->addFields([new TLabel('Data Criação'), $dt_criacao], [new TLabel('Data Expiração')], [$dt_Exp]);
        $this->form->addFields([new TLabel('Valor'), $valor], [new TLabel('Cor')], [$cor]);
        $this->form->addFields([new TLabel('Peso'), $peso], [new TLabel('Tipo')], [$tipo]);
        $this->form->addFields([new TLabel('Texto'), $texto]);
        $this->form->addAction('Salvar', new TAction([$this, 'onSave']), 'fa:save');

        parent::add($this->form);
    }

    public function onSave($param)
    {
        new TMessage('info', 'Formulário enviado com sucesso');
        echo '<pre>';
        var_dump($param);
        echo '</pre>';
    }
}