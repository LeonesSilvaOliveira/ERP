<?php


            // unset($moviment);
            

            $vestoq = ($quanent - $quansai);
            $vprcusto = ($quanent != 0) ? round($tprecoto / $quanent, 2) : $tprecoto;
            $tcme = round($xprecoto, 2) * $vestoq;

            if(round($vestoq, 2) <= 0)
            {
                 continue;
            }
            
           unset($produtos);

            $rinventa = Rinventa::where('sr_deleted', '<>', 'T')
                            ->where('codipro', '<>', $codipro)
                            ->load();

            foreach($rinventa as $inv)
            {
                $inv->codipro = $codipro;
                $inv->nomepro = $nomepro;
                $inv->unidade = $unidade;
                $inv->marcapd = $marcapd;
                $inv->prcusto = $prcusto;
                $inv->situtri = $situtri;
                $inv->codincm = $codincm;
                $inv->aliqu03 = $aliqu03;
                $inv->datafim = $dataf;
                $inv->sr_deleted = 'F';
                $inv->store();
            }
            
            unset($rinventa);