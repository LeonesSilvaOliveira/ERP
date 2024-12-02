<?php

class Cliente extends TPage
{
    public function __construct()
    { 
        parent::__construct();

        try 
        {
            TTransaction::open('erpbase');
            
            $criteria = new TCriteria;
            $criteria->add = new TFilter('id', '=', '2');
            $criteria->add = new TFilter('cargo', '=', 'repositor');

            $repository = new TRepository('Funcionario');
            $objetos = $repository->load($criteria);


            if($objetos)
            {
                foreach ($objetos as $objeto)
                {
                    echo "<pre>";
                    print_r( $objeto->nome . '  - ' . $objeto->email);
                    echo "</pre>";
                }
            }

            TTransaction::close();

        } catch (Exception $e) {
            new TMessage('error', $e->getMessage());
        }
    }
}