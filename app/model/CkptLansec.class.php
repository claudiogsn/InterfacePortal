<?php
/**
 * CkptLansec Active Record
 * @author  <your-name-here>
 */
class CkptLansec extends TRecord
{
    const TABLENAME = 'ckpt_lansec';
    const PRIMARYKEY= 'codigo';
    const IDPOLICY =  'max'; // {max, serial}
    
    
    private $ckpt_estabelecimentos;

    /**
     * Constructor method
     */
    public function __construct($id = NULL, $callObjectLoad = TRUE)
    {
        parent::__construct($id, $callObjectLoad);
        parent::addAttribute('estabelecimento');
        parent::addAttribute('posicao');
        parent::addAttribute('titulo');
        parent::addAttribute('descricao');
        parent::addAttribute('categ');
        parent::addAttribute('produto');
        parent::addAttribute('minimo');
        parent::addAttribute('maximo');
        parent::addAttribute('tabela');
        parent::addAttribute('metodo');
        parent::addAttribute('adic_categ');
        parent::addAttribute('adic_produto');
        parent::addAttribute('obs');
        parent::addAttribute('cor');
        parent::addAttribute('id_sinc');
        parent::addAttribute('mostra_cabeca');
        parent::addAttribute('individual');
        parent::addAttribute('sinc_on');
        parent::addAttribute('sinc_temp');
    }

    
    /**
     * Method addCkptEstabelecimento
     * Add a CkptEstabelecimento to the CkptLansec
     * @param $object Instance of CkptEstabelecimento
     */
    public function addCkptEstabelecimento(CkptEstabelecimento $object)
    {
        $this->ckpt_estabelecimentos[] = $object;
    }
    
    /**
     * Method getCkptEstabelecimentos
     * Return the CkptLansec' CkptEstabelecimento's
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
        $criteria->add(new TFilter('ckpt_lansec_id', '=', $id));
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
        $criteria->add(new TFilter('ckpt_lansec_id', '=', $this->id));
        $repository = new TRepository('CkptEstabelecimento');
        $repository->delete($criteria);
        // store the related CkptEstabelecimento objects
        if ($this->ckpt_estabelecimentos)
        {
            foreach ($this->ckpt_estabelecimentos as $ckpt_estabelecimento)
            {
                unset($ckpt_estabelecimento->id);
                $ckpt_estabelecimento->ckpt_lansec_id = $this->id;
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
        $criteria->add(new TFilter('ckpt_lansec_id', '=', $id));
        $repository->delete($criteria);
        
    
        // delete the object itself
        parent::delete($id);
    }


}
