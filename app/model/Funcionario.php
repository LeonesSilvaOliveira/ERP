<?php

class Funcionario extends TRecord
{
    const TABLENAME  = 'funcionarios';
    const PRIMARYKEY = 'id';
    const IDPOLICY   =  'serial'; // {max, serial}

    const DELETEDAT  = 'deleted_at';
    const CREATEDAT  = 'created_at';
    const UPDATEDAT  = 'updated_at';

    private $user;

    

    /**
     * Constructor method
     */
    public function __construct($id = NULL, $callObjectLoad = TRUE)
    {
        parent::__construct($id, $callObjectLoad);
        parent::addAttribute('created_at');
        parent::addAttribute('deleted_at');
        parent::addAttribute('updated_at');
        parent::addAttribute('nome');
        parent::addAttribute('email');
        parent::addAttribute('senha');
        parent::addAttribute('cargo');
        parent::addAttribute('telefone');
        parent::addAttribute('user_id');
        parent::addAttribute('imagem');
            
    }

    /**
     * Method set_system_users
     * Sample of usage: $var->system_users = $object;
     * @param $object Instance of SystemUsers
     */
    public function set_user(SystemUsers $object)
    {
        $this->user = $object;
        $this->user_id = $object->id;
    }

    /**
     * Method get_user
     * Sample of usage: $var->user->attribute;
     * @returns SystemUsers instance
     */
    public function get_user()
    {
        try{
        TTransaction::openFake('permission');
        // loads the associated object
        if (empty($this->user))
            $this->user = new SystemUsers($this->user_id);
        TTransaction::close();
        }catch(Exception $e){
            TTransaction::close();
        }
        // returns the associated object
        return $this->user;
    }

    /**
     * Method getRegistroPontos
     */
    public function getRegistroPontos()
    {
        $criteria = new TCriteria;
        $criteria->add(new TFilter('id', '=', $this->id));
        return RegistroPonto::getObjects( $criteria );
    }

    public function set_registro_ponto_fk_id_to_string($registro_ponto_fk_id_to_string)
    {
        if(is_array($registro_ponto_fk_id_to_string))
        {
            $values = Funcionarios::where('id', 'in', $registro_ponto_fk_id_to_string)->getIndexedArray('id', 'id');
            $this->registro_ponto_fk_id_to_string = implode(', ', $values);
        }
        else
        {
            $this->registro_ponto_fk_id_to_string = $registro_ponto_fk_id_to_string;
        }

        $this->vdata['registro_ponto_fk_id_to_string'] = $this->registro_ponto_fk_id_to_string;
    }

    public function get_registro_ponto_fk_id_to_string()
    {
        if(!empty($this->registro_ponto_fk_id_to_string))
        {
            return $this->registro_ponto_fk_id_to_string;
        }
    
        $values = RegistroPonto::where('id', '=', $this->id)->getIndexedArray('id','{fk_id->id}');
        return implode(', ', $values);
    }

    /**
     * Method onBeforeDelete
     */
    public function onBeforeDelete()
    {
            

        if(RegistroPonto::where('id', '=', $this->id)->first())
        {
            throw new Exception("Não é possível deletar este registro pois ele está sendo utilizado em outra parte do sistema");
        }
    
    }

    
}

