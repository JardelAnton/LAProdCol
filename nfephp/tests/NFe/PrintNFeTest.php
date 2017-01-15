<?php

/**
 * Class PrintNFeTest
 * @author Roberto L. Machado <linux.rlm at gmail dot com>
 */
use NFePHP\NFe\PrintNFe;

require_once 'PHPUnit/Autoload.php';

class PrintNFeTest extends PHPUnit_Framework_TestCase
{
    public $nfe;
    
    public function testeInstanciar()
    {
        $configJson = file_get_contents(dirname(dirname(__FILE__)) . 'nfephp/config/config.json');
        $json = json_decode($configJson);
        $aDocFormat = (array) $json->aDocFormat;
        $this->nfe = new PrintNFe($aDocFormat);
    }
}
