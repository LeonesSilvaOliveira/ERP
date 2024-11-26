<?php

class ConexaoManual extends TPage
{
    public function __construct()
    {
        parent::__construct();

        try 
        {
            TTransaction::open('curso');
            
            $conn = TTransaction::get();
            $result = $conn->query('SELECT * FROM cliente');
           
            foreach ($result as $row)
            {
                print $row['id'] . " - " . $row['nome'] . " Endereço - " . $row['endereco'] .  "<br>";
            }
            
            TTransaction::close();

            
        } catch (Exception $e) {
            new TMessage('error', $e->getMessage());
        }

    }
}

