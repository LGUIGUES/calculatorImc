<?php

require('models/Imc.php');

class HomeController
{   
    public function controlForm()
    {
        if (isset($_POST['submit'])) {

            $imc = new Imc;
            $weight = floatval($_POST['weight']);
            $size = intval($_POST['size']);
            $imc -> setWeight($weight);
            $imc -> setSize($size);
        
            $resultImc = $imc -> calculatorImc();            
            $resultCorpulence = $imc -> checkingCorpulence($resultImc);
            
            $corpulence = $resultCorpulence[0];
            $textCorpulence = $resultCorpulence[1];
            
            $template = 'www/views/home/home';
            require('www/views/template/layout.phtml');
    
        } else {
    
            $template = 'www/views/home/home';
            require('www/views/template/layout.phtml');
        }
    }    
}