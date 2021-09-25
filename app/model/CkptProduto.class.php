<?php
/**
 * CkptProduto Active Record
 * @author  <your-name-here>
 */
class CkptProduto extends TRecord
{
    const TABLENAME = 'ckpt_produto';
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
        parent::addAttribute('filial');
        parent::addAttribute('codigo');
        parent::addAttribute('nome');
        parent::addAttribute('preco');
        parent::addAttribute('preco2');
        parent::addAttribute('preco3');
        parent::addAttribute('preco4');
        parent::addAttribute('menew_preco');
        parent::addAttribute('aliq');
        parent::addAttribute('categ');
        parent::addAttribute('tipo');
        parent::addAttribute('comanda');
        parent::addAttribute('impressora');
        parent::addAttribute('ponto');
        parent::addAttribute('taxa');
        parent::addAttribute('complemento');
        parent::addAttribute('observ');
        parent::addAttribute('metodo');
        parent::addAttribute('fracao');
        parent::addAttribute('tam');
        parent::addAttribute('destaque');
        parent::addAttribute('descricao');
        parent::addAttribute('email');
        parent::addAttribute('status');
        parent::addAttribute('site');
        parent::addAttribute('senha');
        parent::addAttribute('antecipado');
        parent::addAttribute('impressora2');
        parent::addAttribute('preco_custo');
        parent::addAttribute('nome_site');
        parent::addAttribute('embalagem');
        parent::addAttribute('und');
        parent::addAttribute('fab');
        parent::addAttribute('indicador');
        parent::addAttribute('ean');
        parent::addAttribute('cod_promo');
        parent::addAttribute('promocao');
        parent::addAttribute('cod_clube');
        parent::addAttribute('hash');
        parent::addAttribute('semana');
        parent::addAttribute('partes');
        parent::addAttribute('ativo');
        parent::addAttribute('ncm');
        parent::addAttribute('impostos_totais');
        parent::addAttribute('dt_atualizacao');
        parent::addAttribute('dt_atualizacao_foto');
        parent::addAttribute('nome_site_idioma2');
        parent::addAttribute('descricao_idioma2');
        parent::addAttribute('nome_site_idioma3');
        parent::addAttribute('descricao_idioma3');
        parent::addAttribute('nome_site_idioma4');
        parent::addAttribute('descricao_idioma4');
        parent::addAttribute('nome_site_idioma5');
        parent::addAttribute('descricao_idioma5');
        parent::addAttribute('nome_site_idioma6');
        parent::addAttribute('descricao_idioma6');
        parent::addAttribute('foto_nome_arquivo');
        parent::addAttribute('cfop');
        parent::addAttribute('cst_icms_e');
        parent::addAttribute('cst_icms_s');
        parent::addAttribute('cst_ipi_e');
        parent::addAttribute('cst_ipi_s');
        parent::addAttribute('cst_pis_e');
        parent::addAttribute('cst_pis_s');
        parent::addAttribute('cst_cofins_e');
        parent::addAttribute('cst_cofins_s');
        parent::addAttribute('aliq_ipi');
        parent::addAttribute('bc_ipi');
        parent::addAttribute('valor_ipi');
        parent::addAttribute('aliq_pis');
        parent::addAttribute('bc_pis');
        parent::addAttribute('valor_pis');
        parent::addAttribute('aliq_cofins');
        parent::addAttribute('bc_cofins');
        parent::addAttribute('valor_cofins');
        parent::addAttribute('aliq_icms');
        parent::addAttribute('bc_icms');
        parent::addAttribute('valor_icms');
        parent::addAttribute('cardapio');
        parent::addAttribute('texto_complem');
        parent::addAttribute('texto_complem_idioma2');
        parent::addAttribute('texto_complem_idioma3');
        parent::addAttribute('texto_complem_idioma4');
        parent::addAttribute('texto_complem_idioma5');
        parent::addAttribute('texto_complem_idioma6');
        parent::addAttribute('comissao');
        parent::addAttribute('bloqueio_ini');
        parent::addAttribute('bloqueio_fim');
        parent::addAttribute('voucher');
        parent::addAttribute('imp_total');
        parent::addAttribute('tipo_balanca');
        parent::addAttribute('com_balanca');
        parent::addAttribute('obs_padrao');
        parent::addAttribute('descri_comanda');
        parent::addAttribute('desconto_padrao');
        parent::addAttribute('r_menor');
        parent::addAttribute('cest');
        parent::addAttribute('tem_promo');
        parent::addAttribute('data_sinc');
        parent::addAttribute('ordem');
        parent::addAttribute('recebido_matriz');
        parent::addAttribute('ocultado');
        parent::addAttribute('imp_est');
        parent::addAttribute('imp_mun');
        parent::addAttribute('imp_fed');
        parent::addAttribute('unificar_sempre');
        parent::addAttribute('recebido_proprio');
        parent::addAttribute('codigo2');
        parent::addAttribute('estoque_critico');
        parent::addAttribute('manipulado_produzido');
        parent::addAttribute('plano_contas');
        parent::addAttribute('ficha_unit');
        parent::addAttribute('insumo');
        parent::addAttribute('venda');
        parent::addAttribute('composicao');
        parent::addAttribute('fator');
        parent::addAttribute('regime_tributario');
        parent::addAttribute('centro');
        parent::addAttribute('indisponivel');
        parent::addAttribute('franquia_royalty');
        parent::addAttribute('franquia_mkt');
        parent::addAttribute('montagem_preco_fixo');
        parent::addAttribute('horario_customizado');
        parent::addAttribute('tempo');
        parent::addAttribute('comisssao');
        parent::addAttribute('tempo_preparo');
        parent::addAttribute('tara');
        parent::addAttribute('peso');
        parent::addAttribute('valor_peso');
        parent::addAttribute('aliq_icms_reduc');
        parent::addAttribute('tag');
        parent::addAttribute('permite_desconto');
        parent::addAttribute('integra_estoque');
        parent::addAttribute('motivo_desoneracao');
        parent::addAttribute('balanca_1');
        parent::addAttribute('balanca_2');
        parent::addAttribute('aliq_red_bc_efetivo');
        parent::addAttribute('aliq_icms_efetivo');
        parent::addAttribute('aliq_fcp');
        parent::addAttribute('aliq_fcpst');
        parent::addAttribute('cbenef');
        parent::addAttribute('balanca_tela');
        parent::addAttribute('ponto_peso');
        parent::addAttribute('ponto_resgate');
        parent::addAttribute('tipo_peso');
        parent::addAttribute('menew_site');
        parent::addAttribute('menew_descricao');
        parent::addAttribute('sinc_temp');
    }

    
    /**
     * Method addCkptEstabelecimento
     * Add a CkptEstabelecimento to the CkptProduto
     * @param $object Instance of CkptEstabelecimento
     */
    public function addCkptEstabelecimento(CkptEstabelecimento $object)
    {
        $this->ckpt_estabelecimentos[] = $object;
    }
    
    /**
     * Method getCkptEstabelecimentos
     * Return the CkptProduto' CkptEstabelecimento's
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
        $criteria->add(new TFilter('ckpt_produto_id', '=', $id));
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
        $criteria->add(new TFilter('ckpt_produto_id', '=', $this->id));
        $repository = new TRepository('CkptEstabelecimento');
        $repository->delete($criteria);
        // store the related CkptEstabelecimento objects
        if ($this->ckpt_estabelecimentos)
        {
            foreach ($this->ckpt_estabelecimentos as $ckpt_estabelecimento)
            {
                unset($ckpt_estabelecimento->id);
                $ckpt_estabelecimento->ckpt_produto_id = $this->id;
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
        $criteria->add(new TFilter('ckpt_produto_id', '=', $id));
        $repository->delete($criteria);
        
    
        // delete the object itself
        parent::delete($id);
    }


}
