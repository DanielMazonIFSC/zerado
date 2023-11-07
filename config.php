<?php 
// $THEME é definido antes desta página ser incluída e podemos definir configurações
// adicionando propriedades a este objeto global.
defined('MOODLE_INTERNAL') || die();

// A primeira configuração que precisamos é o nome do tema. 
// Esta deve ser a última parte do nome do componente e igual ao nome do diretório do nosso tema.
$THEME->name = 'zerado';

// Se quiser usar CSS: listar o nome do arquivos na pasta /style/ sem  extensão .css.   
$THEME->sheets = [];

// Ser usar CSS, para aparecer os estilos no editor de texto TinyMCE. Listar arquivos da pasta /style/.     
$THEME->editor_sheets = [];

// Herdar de theme_boost - podemos adicionar mais de um pai
$THEME->parents = ['boost'];

// Um ​​dock é uma forma de retirar blocos da página e colocá-los em uma área flutuante na lateral 
// da página. O tema Boost não suporta dock.
$THEME->enable_dock = false;

// Esta é uma configuração antiga usada para carregar CSS específico para alguns YUI JS. 
$THEME->yuicssmodules = array();

// Rendererfactory permite que o tema substitua qualquer outro renderizador.  
$THEME->rendererfactory = 'theme_overridden_renderer_factory';

// Esta é uma lista de blocos que devem existir em todas as páginas para que este tema.               
// O Boost não requer esses blocos porque fornece outras maneiras de navegar integradas ao tema.  
$THEME->requiredblocks = '';

// Este é um recurso que informa à biblioteca de blocos para não usar o bloco "Adicionar um bloco".
$THEME->addblockposition = BLOCK_ADDBLOCK_POSITION_FLATNAV;

$THEME->haseditswitch = true;


// $THEME->editor_scss = ['editor'];
// $THEME->usefallback = true;

// Configuração para pegar no lib.php a #function theme_zerado_get_main_scss_content($theme)
$THEME->scss = function($theme) {
    return theme_zerado_get_main_scss_content($theme);
};
