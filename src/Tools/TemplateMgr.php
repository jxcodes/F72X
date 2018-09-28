<?php

namespace F72X\Tools;

use jDelta\StringMax;

class TemplateMgr {

    /**
     * 
     * @param string $tplName Nombre de archivo dentro del directorio templates/
     * @param array $data Data a ser remplazada en la plantilla
     * 
     * @return string
     */
    public static function getTpl($tplName, $data = null) {
        $tpl = file_get_contents(__DIR__ . "/../templates/$tplName");
        if ($data) {
            return StringMax::replaceTokens($tpl, $data);
        }
        return $tpl;
    }

}
