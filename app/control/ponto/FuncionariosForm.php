<?php

class FuncionariosForm extends TPage
{
    protected $form;
    private $formFields = [];
    private static $database = 'erpbase';
    private static $activeRecord = 'Funcionario';
    private static $primaryKey = 'id';
    private static $formName = 'form_FuncionariosForm';

    use Adianti\Base\AdiantiFileSaveTrait;

    /**
     * Form constructor
     * @param $param Request
     */
    public function __construct( $param )
    {
        parent::__construct();

        if(!empty($param['target_container']))
        {
            $this->adianti_target_container = $param['target_container'];
        }

        // creates the form
        $this->form = new BootstrapFormBuilder(self::$formName);
        // define the form title
        $this->form->setFormTitle("Cadastro de Funcionarios");

        $criteria_user_id = new TCriteria();

        $id = new THidden('id');
        $nome = new TEntry('nome');
        $email = new TEntry('email');
        $senha = new TEntry('senha');
        $cargo = new TEntry('cargo');
        $telefone = new TEntry('telefone');
        $user_id = new TDBCombo('user_id', 'permission', 'SystemUsers', 'id', '{name}','name asc' , $criteria_user_id );
        $imagem = new TImageCropper('imagem');

        $nome->addValidation("Nome", new TRequiredValidator()); 
        $email->addValidation("Email", new TRequiredValidator()); 
        $senha->addValidation("Senha", new TRequiredValidator()); 
        $user_id->addValidation("Usuário", new TRequiredValidator()); 

        $user_id->enableSearch();
        $imagem->enableFileHandling();
        $imagem->setAllowedExtensions(["jpg","jpeg","png","gif"]);
        $imagem->setWindowTitle("Imagem Funcioário");
        $imagem->setButtonLabel("Enviar");
        $imagem->setCropSize('500', '500');
        $imagem->setAspectRatio(TimageCropper::CROPPER_RATIO_1_1);
        $imagem->setImagePlaceholder(new TImage("fas:file-upload #dde5ec"));
        $nome->setMaxLength(100);
        $cargo->setMaxLength(50);
        $email->setMaxLength(100);
        $senha->setMaxLength(255);
        $telefone->setMaxLength(20);

        $id->setSize(200);
        $nome->setSize('100%');
        $email->setSize('100%');
        $senha->setSize('100%');
        $cargo->setSize('100%');
        $user_id->setSize('100%');
        $telefone->setSize('100%');
        $imagem->setSize(200, 100);

        $row1 = $this->form->addFields([$id]);
        $row1->layout = ['col-sm-6'];

        $row2 = $this->form->addFields([new TLabel("Nome:", '#000000', '14px', null, '100%'),$nome],[new TLabel("Email:", '#000000', '14px', null, '100%'),$email]);
        $row2->layout = ['col-sm-6','col-sm-6'];

        $row3 = $this->form->addFields([new TLabel("Senha:", '#000000', '14px', null, '100%'),$senha],[new TLabel("Cargo:", null, '14px', null, '100%'),$cargo]);
        $row3->layout = ['col-sm-6','col-sm-6'];

        $row4 = $this->form->addFields([new TLabel("Telefone:", null, '14px', null, '100%'),$telefone],[new TLabel("Usuário:", '#000000', '14px', null, '100%'),$user_id]);
        $row4->layout = ['col-sm-6','col-sm-6'];

        $row5 = $this->form->addFields([$imagem]);
        $row5->layout = ['col-sm-6'];

        // create the form actions
        $btn_onsave = $this->form->addAction("Salvar", new TAction([$this, 'onSave']), 'fas:save #ffffff');
        $this->btn_onsave = $btn_onsave;
        $btn_onsave->addStyleClass('btn-primary'); 

        $btn_onclear = $this->form->addAction("Limpar formulário", new TAction([$this, 'onClear']), 'fas:eraser #dd5a43');
        $this->btn_onclear = $btn_onclear;

        $btn_onshow = $this->form->addAction("Voltar", new TAction(['FuncionariosHeaderList', 'onShow']), 'fas:arrow-left #000000');
        $this->btn_onshow = $btn_onshow;

        // vertical box container
        $container = new TVBox;
        $container->style = 'width: 100%';
        $container->class = 'form-container';
        if(empty($param['target_container']))
        {
            $container->add(TBreadCrumb::create(["Ponto","Cadastro de Funcionarios"]));
        }
        $container->add($this->form);

        parent::add($container);

    }

    public function onSave($param = null) 
    {
        try
        {
            TTransaction::open(self::$database); // open a transaction

            $messageAction = null;

            $this->form->validate(); // validate form data

            $object = new Funcionario(); // create an empty object 

            $data = $this->form->getData(); // get form data as array
            $object->fromArray( (array) $data); // load the object with data

            $imagem_dir = 'imagem/funcionarios'; 

            $object->store(); // save the object 

            $this->saveFile($object, $data, 'imagem', $imagem_dir);
            $loadPageParam = [];

            if(!empty($param['target_container']))
            {
                $loadPageParam['target_container'] = $param['target_container'];
            }

            // get the generated {PRIMARY_KEY}
            $data->id = $object->id; 

            $this->form->setData($data); // fill form data
            TTransaction::close(); // close the transaction

            TToast::show('success', "Registro salvo", 'topRight', 'far:check-circle');
            TApplication::loadPage('FuncionariosHeaderList', 'onShow', $loadPageParam); 

        }
        catch (Exception $e) // in case of exception
        {

            new TMessage('error', $e->getMessage()); // shows the exception error message
            $this->form->setData( $this->form->getData() ); // keep form data
            TTransaction::rollback(); // undo all pending operations
        }
    }

    public function onEdit( $param )
    {
        try
        {
            if (isset($param['key']))
            {
                $key = $param['key'];  // get the parameter $key
                TTransaction::open(self::$database); // open a transaction

                $object = new Funcionario($key); // instantiates the Active Record 

                $this->form->setData($object); // fill the form 

                TTransaction::close(); // close the transaction 
            }
            else
            {
                $this->form->clear();
            }
        }
        catch (Exception $e) // in case of exception
        {
            new TMessage('error', $e->getMessage()); // shows the exception error message
            TTransaction::rollback(); // undo all pending operations
        }
    }

    /**
     * Clear form data
     * @param $param Request
     */
    public function onClear( $param )
    {
        $this->form->clear(true);

    }

    public function onShow($param = null)
    {

    } 

    public static function getFormName()
    {
        return self::$formName;
    }

}

