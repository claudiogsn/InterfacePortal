<?php
/**
 * CkptTipoAliq Active Record
 * @author  <your-name-here>
 */
class CkptTipoAliq extends TRecord
{
    const TABLENAME = 'ckpt_tipo_aliq';
    const PRIMARYKEY= 'id';
    const IDPOLICY =  'max'; // {max, serial}
    
    
    private $ckpt_estabelecimentos;

    /**
     * Constructor method
     */
    public function __construct($id = NULL, $callObjectLoad = TRUE)
    {
        parent::__construct($id, $callObjectLoad);
        parent::addAttribute('estabelecimento');
        parent::addAttribute('cod');
        parent::addAttribute('tipo');
        parent::addAttribute('descri');
        parent::addAttribute('ncm');
        parent::addAttribute('cst_icms_normal');
        parent::addAttribute('aliq_icms_normal');
        parent::addAttribute('cfop');
        parent::addAttribute('cst_icms_simples');
        parent::addAttribute('aliq_icms_simples');
        parent::addAttribute('cst_pis');
        parent::addAttribute('cst_cofins');
        parent::addAttribute('aliq_fcp');
        parent::addAttribute('aliq_fcpst');
        parent::addAttribute('aliq_pis');
        parent::addAttribute('aliq_cofins');
        parent::addAttribute('cest');
        parent::addAttribute('aliq_icms_reduc');
        parent::addAttribute('aliq_red_bc_efetivo');
        parent::addAttribute('aliq_icms_efetivo');
        parent::addAttribute('cbenef');
        parent::addAttribute('motivo_desoneracao');
        parent::addAttribute('sinc_temp');
    }

    
    /**
     * Method addCkptEstabelecimento
     * Add a CkptEstabelecimento to the CkptTipoAliq
     * @param $object Instance of CkptEstabelecimento
     */
    public function addCkptEstabelecimento(CkptEstabelecimento $object)
    {
        $this->ckpt_estabelecimentos[] = $object;
    }
    
    /**
     * Method getCkptEstabelecimentos
     * Return the CkptTipoAliq' CkptEstabelecimento's
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
        $criteria->add(new TFilter('ckpt_tipo_aliq_id', '=', $id));
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
        $criteria->add(new TFilter('ckpt_tipo_aliq_id', '=', $this->id));
        $repository = new TRepository('CkptEstabelecimento');
        $repository->delete($criteria);
        // store the related CkptEstabelecimento objects
        if ($this->ckpt_estabelecimentos)
        {
            foreach ($this->ckpt_estabelecimentos as $ckpt_estabelecimento)
            {
                unset($ckpt_estabelecimento->id);
                $ckpt_estabelecimento->ckpt_tipo_aliq_id = $this->id;
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
        $criteria->add(new TFilter('ckpt_tipo_aliq_id', '=', $id));
        $repository->delete($criteria);
        
    
        // delete the object itself
        parent::delete($id);
    }


}
