<?php
/**
 * Usuario Active Record
 * @author  <your-name-here>
 */
class Usuario extends TRecord
{
    const TABLENAME = 'usuario';
    const PRIMARYKEY= 'id';
    const IDPOLICY =  'max'; // {max, serial}
    
    
    /**
     * Constructor method
     */
    public function __construct($id = NULL, $callObjectLoad = TRUE)
    {
        parent::__construct($id, $callObjectLoad);
        parent::addAttribute('idusuario');
        parent::addAttribute('data_cadastro');
        parent::addAttribute('nome');
        parent::addAttribute('cpf');
        parent::addAttribute('data_nascimento');
        parent::addAttribute('email');
        parent::addAttribute('senha');
        parent::addAttribute('exp_senha');
        parent::addAttribute('telefone1');
        parent::addAttribute('telefone2');
        parent::addAttribute('tipo');
        parent::addAttribute('status_login');
        parent::addAttribute('ultimo_acesso');
        parent::addAttribute('modulo');
        parent::addAttribute('degustacao');
        parent::addAttribute('ultimo_estabelecimento');
        parent::addAttribute('ultimo_grupo_estabelecimento');
        parent::addAttribute('ultimo_tipo');
        parent::addAttribute('ordem');
        parent::addAttribute('novidade');
        parent::addAttribute('revenda');
        parent::addAttribute('idmovdesk');
        parent::addAttribute('remember_token');
        parent::addAttribute('delivery_menew');
        parent::addAttribute('representante');
        parent::addAttribute('access_token');
    }


}
