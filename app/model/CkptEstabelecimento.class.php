<?php
/**
 * CkptEstabelecimento Active Record
 * @author  <your-name-here>
 */
class CkptEstabelecimento extends TRecord
{
    const TABLENAME = 'ckpt_estabelecimento';
    const PRIMARYKEY= 'id';
    const IDPOLICY =  'max'; // {max, serial}
    
    
    private $ckpt_produto;

    /**
     * Constructor method
     */
    public function __construct($id = NULL, $callObjectLoad = TRUE)
    {
        parent::__construct($id, $callObjectLoad);
        parent::addAttribute('estabelecimento');
        parent::addAttribute('codigo');
        parent::addAttribute('razao');
        parent::addAttribute('fantasia');
        parent::addAttribute('endereco');
        parent::addAttribute('numero');
        parent::addAttribute('complemento');
        parent::addAttribute('cep');
        parent::addAttribute('bairro');
        parent::addAttribute('cidade');
        parent::addAttribute('cidibge');
        parent::addAttribute('uf');
        parent::addAttribute('ufibge');
        parent::addAttribute('paiscod');
        parent::addAttribute('paisnome');
        parent::addAttribute('cnpj');
        parent::addAttribute('insc_est');
        parent::addAttribute('fone');
        parent::addAttribute('fax');
        parent::addAttribute('email');
        parent::addAttribute('certificado');
        parent::addAttribute('ambiente_nfe');
        parent::addAttribute('uf_sefaz');
        parent::addAttribute('regime_tributario');
        parent::addAttribute('codigo_simples_nacional');
        parent::addAttribute('cnae_fiscal');
        parent::addAttribute('ufibge_sefaz');
        parent::addAttribute('tipo_danfe');
        parent::addAttribute('id_csc');
        parent::addAttribute('csc');
        parent::addAttribute('cod_tipo_credito');
        parent::addAttribute('ws_matriz');
        parent::addAttribute('codigo_f');
        parent::addAttribute('hash');
        parent::addAttribute('insc_mun');
        parent::addAttribute('tipo_emissao');
        parent::addAttribute('ac_key');
        parent::addAttribute('url_consulta');
        parent::addAttribute('produtos_matriz');
        parent::addAttribute('sinc_temp');
    }

    
    /**
     * Method set_ckpt_produto
     * Sample of usage: $ckpt_estabelecimento->ckpt_produto = $object;
     * @param $object Instance of CkptProduto
     */
    public function set_ckpt_produto(CkptProduto $object)
    {
        $this->ckpt_produto = $object;
        $this->ckpt_produto_id = $object->id;
    }
    
    /**
     * Method get_ckpt_produto
     * Sample of usage: $ckpt_estabelecimento->ckpt_produto->attribute;
     * @returns CkptProduto instance
     */
    public function get_ckpt_produto()
    {
        // loads the associated object
        if (empty($this->ckpt_produto))
            $this->ckpt_produto = new CkptProduto($this->ckpt_produto_id);
    
        // returns the associated object
        return $this->ckpt_produto;
    }
    


}
