<?php
// Esta linha protege o arquivo de ser acessado diretamente por uma URL.
defined('MOODLE_INTERNAL') || die();              

// Esta é a versão do plugin.
$plugin->version = 2017022000;

// Esta é a versão do Moodle que este plugin requer.   
$plugin->requires = 2016112900.00;

// Este é o nome do componente do plugin - sempre começa com 'theme_'                    
// para temas e deve ser igual ao nome da pasta.                              
$plugin->component = 'theme_zerado';                       

// Esta é uma lista de plugins dos quais este plugin depende (e suas versões).    
$plugin->dependencies = [                                 
    'theme_boost' => 2016102100
];

// This is a stable release.
$plugin->maturity = MATURITY_STABLE;

// This is the named version.
$plugin->release = 1.0;
