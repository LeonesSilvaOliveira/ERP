<?php

declare(strict_types = 1);

class pontoEletronico extends TPage
{
    protected $form;
    private $formFields = [];
    private static $database = '';
    private static $activeRecord = '';
    private static $primaryKey = '';
    private static $formName = 'form_pontoEletronico';

    private static $funcionario;
    private static $usuario;
    private static $indexHorarios;

    /**
     * Form constructor
     * @param $param Request
     */
    public function __construct( $param = null)
    {
        parent::__construct();

        if(!empty($param['target_container']))
        {
            $this->adianti_target_container = $param['target_container'];
        }

        // creates the form
        $this->form = new BootstrapFormBuilder(self::$formName);
        // define the form title
        $this->form->setFormTitle("");


        $horarioAtualHidden = new THidden('horarioAtualHidden');
        $horaRelogio = new TButton('horaRelogio');
        $button_1_entrar = new TButton('button_1_entrar');
        $button_2_pausa = new TButton('button_2_pausa');
        $button_3_retorno = new TButton('button_3_retorno');
        $button_4_saida = new TButton('button_4_saida');


        $horarioAtualHidden->setSize(200);
        $horaRelogio->setAction(new TAction([$this, 'onButton']), "");
        $button_2_pausa->setAction(new TAction([$this, 'onPausa']), "2 - Pausa");
        $button_4_saida->setAction(new TAction([$this, 'onSair']), "4 - Saída");
        $button_1_entrar->setAction(new TAction([$this, 'onEntrada']), "1 - Entrar");
        $button_3_retorno->setAction(new TAction([$this, 'onRetorno']), "3 - Retorno");

        $horaRelogio->addStyleClass('horario');
        $button_2_pausa->addStyleClass('btn-default');
        $button_4_saida->addStyleClass('btn-default');
        $button_1_entrar->addStyleClass('btn-default');
        $button_3_retorno->addStyleClass('btn-default');

        $horaRelogio->setImage(' #000000');
        $button_2_pausa->setImage('fas:coffee #000000');
        $button_3_retorno->setImage('fas:coffee #000000');
        $button_1_entrar->setImage('fas:door-open #000000');
        $button_4_saida->setImage('fas:door-closed #000000');


        $row1 = $this->form->addFields([new TLabel("Escolha o tipo de ponto: ", null, '14px', null, '100%')],[$horarioAtualHidden],[$horaRelogio]);
        $row1->layout = [' col-sm-6',' col-sm-6',' col-sm-9'];

        $row2 = $this->form->addFields([$button_1_entrar],[$button_2_pausa]);
        $row2->layout = ['col-sm-6','col-sm-6'];

        $row3 = $this->form->addFields([$button_3_retorno],[$button_4_saida]);
        $row3->layout = [' col-sm-6',' col-sm-6'];

        // create the form actions

        // vertical box container
        $container = new TVBox;
        $container->style = 'width: 100%';
        $container->class = 'form-container';
        if(empty($param['target_container']))
        {
            $container->add(TBreadCrumb::create(["Ponto","Ponto"]));
        }
        $container->add($this->form);

        TScript::create("

                var botaoHorario = $('button[name=\"horaRelogio\"]');
                function atualizarHoraBotao() {
                    var data = new Date();
                    var hours = (\"00\" + data.getHours()).slice(-2) + ':' + 
                                (\"00\" + data.getMinutes()).slice(-2) + ':' + 
                                (\"00\" + data.getSeconds()).slice(-2);

                    botaoHorario.text(hours);
                }
                setInterval(atualizarHoraBotao, 1000); // Atualiza a cada 1 segundo
            ");

TScript::create("var timeDisplay = $('input[name=\"horarioAtualHidden\"]'); function refreshTime() { var data = new Date(); var hours = (\"00\" + data.getHours()).slice(-2) + ':' + (\"00\" +data.getMinutes()).slice(-2) + ':' + (\"00\" +data.getSeconds()).slice(-2) ; timeDisplay.val(hours); }; relogio = setInterval(refreshTime, 100);");

TScript::create("$('#tbutton_horaRelogio').prop('disabled', true);");

        parent::add($container);

    }

    public  function onButton($param = null) 
    {
        try 
        {
            //code here

        }
        catch (Exception $e) 
        {
            new TMessage('error', $e->getMessage());    
        }
    }

    public  function onEntrada($param = null) 
    {
        try 
        {

           $data = $this->form->getData();

           if (!empty($data)) {
                // Desabilitar o botão 'Entrar'
                TScript::create("$('#tbutton_button_1_entrar').prop('disabled', true);");
            }

        TScript::create("$('#tbutton_button_3_retorno').prop('disabled', true);");
        TScript::create("$('#tbutton_button_4_saida').prop('disabled', true);");

        }
        catch (Exception $e) 
        {
            new TMessage('error', $e->getMessage());    
        }
    }

    public  function onPausa($param = null) 
    {
        try 
        {

        }
        catch (Exception $e) 
        {
            new TMessage('error', $e->getMessage());    
        }
    }

    public  function onRetorno($param = null) 
    {
        try 
        {
            //code here

        }
        catch (Exception $e) 
        {
            new TMessage('error', $e->getMessage());    
        }
    }

    public  function onSair($param = null) 
    {
        try 
        {

        }
        catch (Exception $e) 
        {
            new TMessage('error', $e->getMessage());    
        }
    }

    public function onShow($param = null)
    {               

        TScript::create("$('#tbutton_button_2_pausa').prop('disabled', true);");
        TScript::create("$('#tbutton_button_3_retorno').prop('disabled', true);");
        TScript::create("$('#tbutton_button_4_saida').prop('disabled', true);");
    } 

}

