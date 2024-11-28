<?php

class RegistroPonto extends TRecord
{
    const TABLENAME  = 'registro_ponto';
    const PRIMARYKEY = 'id';
    const IDPOLICY   =  'serial'; // {max, serial}

    const DELETEDAT  = 'deleted_at';
    const CREATEDAT  = 'created_at';
    const UPDATEDAT  = 'updated_at';

    private $fk_id;

    

    /**
     * Constructor method
     */
    public function __construct($id = NULL, $callObjectLoad = TRUE)
    {
        parent::__construct($id, $callObjectLoad);
        parent::addAttribute('created_at');
        parent::addAttribute('deleted_at');
        parent::addAttribute('updated_at');
        parent::addAttribute('data');
        parent::addAttribute('hora_entrada');
        parent::addAttribute('hora_volta_almoco');
        parent::addAttribute('hora_saida');
        parent::addAttribute('total_horas');
        parent::addAttribute('imagem');
        parent::addAttribute('user_id');
            
    }

    /**
     * Method set_funcionarios
     * Sample of usage: $var->funcionarios = $object;
     * @param $object Instance of Funcionarios
     */
    public function set_fk_id(Funcionarios $object)
    {
        $this->fk_id = $object;
        $this->id = $object->id;
    }

    /**
     * Method get_fk_id
     * Sample of usage: $var->fk_id->attribute;
     * @returns Funcionarios instance
     */
    public function get_fk_id()
    {
    
        // loads the associated object
        if (empty($this->fk_id))
            $this->fk_id = new Funcionarios($this->id);
    
        // returns the associated object
        return $this->fk_id;
    }

    
}

