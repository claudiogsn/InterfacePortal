<?php
/**
 * AuditoriaPortal Active Record
 * @author  <your-name-here>
 */
class AuditoriaPortal extends TRecord
{
    const TABLENAME = 'auditoria_portal';
    const PRIMARYKEY= 'id';
    const IDPOLICY =  'max'; // {max, serial}
    
    
    /**
     * Constructor method
     */
    public function __construct($id = NULL, $callObjectLoad = TRUE)
    {
        parent::__construct($id, $callObjectLoad);
        parent::addAttribute('usuario');
        parent::addAttribute('metodo');
        parent::addAttribute('parametros');
        //parent::addAttribute('data');
        parent::addAttribute('migrated');
    }


}
