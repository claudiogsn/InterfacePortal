<?php
/**
 * CkptCategoria Active Record
 * @author  <your-name-here>
 */
class CkptCategoria extends TRecord
{
    const TABLENAME = 'ckpt_categoria';
    const PRIMARYKEY= 'id';
    const IDPOLICY =  'max'; // {max, serial}
    
    
    private $ckpt_estabelecimentos;

    /**
     * Constructor method
     */
    public function __construct($id = NULL, $callObjectLoad = TRUE)
    {
        parent::__construct($id, $callObjectLoad);
        parent::addAttribute('categoria_pai');
        parent::addAttribute('estabelecimento');
        parent::addAttribute('filial');
        parent::addAttribute('codigo');
        parent::addAttribute('nome');
        parent::addAttribute('peso');
        parent::addAttribute('pede_complemento');
        parent::addAttribute('pede_observ');
        parent::addAttribute('c_complemento');
        parent::addAttribute('e_complemento');
        parent::addAttribute('metodo');
        parent::addAttribute('fracao');
        parent::addAttribute('tipo');
        parent::addAttribute('oculto');
        parent::addAttribute('impostos_totais');
        parent::addAttribute('codigo_categ_coluna2');
        parent::addAttribute('codigo_categ_coluna3');
        parent::addAttribute('codigo_categ_coluna4');
        parent::addAttribute('codigo_categ_coluna5');
        parent::addAttribute('codigo_categ_coluna6');
        parent::addAttribute('titulo');
        parent::addAttribute('passo');
        parent::addAttribute('tmin');
        parent::addAttribute('tmax');
        parent::addAttribute('integra_estoque');
        parent::addAttribute('tipo_complemento');
        parent::addAttribute('nome_site_idioma2');
        parent::addAttribute('nome_site_idioma3');
        parent::addAttribute('nome_site_idioma4');
        parent::addAttribute('nome_site_idioma5');
        parent::addAttribute('nome_site_idioma6');
        parent::addAttribute('descri');
        parent::addAttribute('descri_idioma2');
        parent::addAttribute('descri_idioma3');
        parent::addAttribute('descri_idioma4');
        parent::addAttribute('descri_idioma5');
        parent::addAttribute('descri_idioma6');
        parent::addAttribute('periodo_venda');
        parent::addAttribute('data_sinc');
        parent::addAttribute('ordem');
        parent::addAttribute('baixa_rsinc');
        parent::addAttribute('recebido_matriz');
        parent::addAttribute('recebido_proprio');
        parent::addAttribute('e_pizza');
        parent::addAttribute('oculto_touch');
        parent::addAttribute('passo_1');
        parent::addAttribute('passo_1_tmin');
        parent::addAttribute('passo_1_tmax');
        parent::addAttribute('passo_2');
        parent::addAttribute('passo_2_tmin');
        parent::addAttribute('passo_2_tmax');
        parent::addAttribute('passo_3');
        parent::addAttribute('passo_3_tmin');
        parent::addAttribute('passo_3_tmax');
        parent::addAttribute('passo_4');
        parent::addAttribute('passo_4_tmin');
        parent::addAttribute('passo_4_tmax');
        parent::addAttribute('passo_5');
        parent::addAttribute('passo_5_tmin');
        parent::addAttribute('passo_5_tmax');
        parent::addAttribute('passo_6');
        parent::addAttribute('passo_6_tmin');
        parent::addAttribute('passo_6_tmax');
        parent::addAttribute('passo_7');
        parent::addAttribute('passo_7_tmin');
        parent::addAttribute('passo_7_tmax');
        parent::addAttribute('passo_8');
        parent::addAttribute('passo_8_tmin');
        parent::addAttribute('passo_8_tmax');
        parent::addAttribute('passo_9');
        parent::addAttribute('passo_9_tmin');
        parent::addAttribute('passo_9_tmax');
        parent::addAttribute('passo_10');
        parent::addAttribute('passo_10_tmin');
        parent::addAttribute('passo_10_tmax');
        parent::addAttribute('franquia_royalty');
        parent::addAttribute('franquia_mkt');
        parent::addAttribute('ativo');
        parent::addAttribute('tipo_auto');
        parent::addAttribute('montagem_qnt_padrao');
        parent::addAttribute('site');
        parent::addAttribute('menew_site');
        parent::addAttribute('mvdelivery_oculto');
        parent::addAttribute('sinc_temp');
    }

    
    /**
     * Method addCkptEstabelecimento
     * Add a CkptEstabelecimento to the CkptCategoria
     * @param $object Instance of CkptEstabelecimento
     */
    public function addCkptEstabelecimento(CkptEstabelecimento $object)
    {
        $this->ckpt_estabelecimentos[] = $object;
    }
    
    /**
     * Method getCkptEstabelecimentos
     * Return the CkptCategoria' CkptEstabelecimento's
     * @return Collection of CkptEstabelecimento
     */
    public function getCkptEstabelecimentos()
    {
        return $this->ckpt_estabelecimentos;
    }

    /**
     * Reset aggregates
     */
    public function clearParts()
    {
        $this->ckpt_estabelecimentos = array();
    }

    /**
     * Load the object and its aggregates
     * @param $id object ID
     */
    public function load($id)
    {
    
        // load the related CkptEstabelecimento objects
        $repository = new TRepository('CkptEstabelecimento');
        $criteria = new TCriteria;
        $criteria->add(new TFilter('ckpt_categoria_id', '=', $id));
        $this->ckpt_estabelecimentos = $repository->load($criteria);
    
        // load the object itself
        return parent::load($id);
    }

    /**
     * Store the object and its aggregates
     */
    public function store()
    {
        // store the object itself
        parent::store();
    
        // delete the related CkptEstabelecimento objects
        $criteria = new TCriteria;
        $criteria->add(new TFilter('ckpt_categoria_id', '=', $this->id));
        $repository = new TRepository('CkptEstabelecimento');
        $repository->delete($criteria);
        // store the related CkptEstabelecimento objects
        if ($this->ckpt_estabelecimentos)
        {
            foreach ($this->ckpt_estabelecimentos as $ckpt_estabelecimento)
            {
                unset($ckpt_estabelecimento->id);
                $ckpt_estabelecimento->ckpt_categoria_id = $this->id;
                $ckpt_estabelecimento->store();
            }
        }
    }

    /**
     * Delete the object and its aggregates
     * @param $id object ID
     */
    public function delete($id = NULL)
    {
        $id = isset($id) ? $id : $this->id;
        // delete the related CkptEstabelecimento objects
        $repository = new TRepository('CkptEstabelecimento');
        $criteria = new TCriteria;
        $criteria->add(new TFilter('ckpt_categoria_id', '=', $id));
        $repository->delete($criteria);
        
    
        // delete the object itself
        parent::delete($id);
    }


}
