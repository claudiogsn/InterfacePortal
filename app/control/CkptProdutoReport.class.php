<?php
/**
 * CkptProdutoReport Report
 * @author  <your name here>
 */
class CkptProdutoReport extends TPage
{
    protected $form; // form
    
    /**
     * Class constructor
     * Creates the page and the registration form
     */
    function __construct()
    {
        parent::__construct();
        
        // creates the form
        $this->form = new BootstrapFormBuilder('form_CkptProduto_report');
        $this->form->setFormTitle('Exportação de Produtos');
        

        // create the form fields
        $estabelecimento = new TEntry('estabelecimento');
        $output_type = new TRadioGroup('output_type');


        // add the fields
        $this->form->addFields( [ new TLabel('Estabelecimento') ], [ $estabelecimento ] );
        $this->form->addFields( [ new TLabel('Tipo') ], [ $output_type ] );

        $output_type->addValidation('Tipo', new TRequiredValidator);
        $estabelecimento->addValidation('Estabelecimento', new TRequiredValidator);


        // set sizes
        $estabelecimento->setSize('100%');
        $output_type->setSize('100%');


        
        $output_type->addItems(array('xls' => 'XLS'));
        $output_type->setLayout('horizontal');
        $output_type->setUseButton();
        $output_type->setValue('pdf');
        $output_type->setSize(70);
        
        // add the action button
        $btn = $this->form->addAction(('EXPORTAR'), new TAction(array($this, 'onGenerate')), 'fa:cog');
        $btn->class = 'btn btn-sm btn-primary';
        
        // vertical box container
        $container = new TVBox;
        $container->style = 'width: 100%';
        // $container->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
        $container->add($this->form);
        
        parent::add($container);
    }
    
    /**
     * Generate the report
     */
    function onGenerate()
    {
        try
        {
            // open a transaction with database 'portal'
            TTransaction::open('portal');
            
            // get the form data into an active record
            $data = $this->form->getData();
            
            $this->form->validate();
            
            $repository = new TRepository('CkptProduto');
            $criteria   = new TCriteria;
            
            if ($data->estabelecimento)
            {
                $criteria->add(new TFilter('estabelecimento', '=', "{$data->estabelecimento}"));
            }

           
            $objects = $repository->load($criteria, FALSE);
            $format  = $data->output_type;
            
            if ($objects)
            {
                $widths = array(100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,50,50,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,50,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,50);
                
                switch ($format)
                {
                    case 'html':
                        $tr = new TTableWriterHTML($widths);
                        break;
                    case 'pdf':
                        $tr = new TTableWriterPDF($widths);
                        break;
                    case 'xls':
                        $tr = new TTableWriterXLS($widths);
                        break;
                    case 'rtf':
                        $tr = new TTableWriterRTF($widths);
                        break;
                }
                
                // create the document styles
                $tr->addStyle('title', 'Arial', '10', 'B',   '#ffffff', '#9898EA');
                $tr->addStyle('datap', 'Arial', '10', '',    '#000000', '#EEEEEE');
                $tr->addStyle('datai', 'Arial', '10', '',    '#000000', '#ffffff');
                $tr->addStyle('header', 'Arial', '16', '',   '#ffffff', '#494D90');
                $tr->addStyle('footer', 'Times', '10', 'I',  '#000000', '#B1B1EA');
                
                // add a header row
                $tr->addRow();
                $tr->addCell('CkptProduto', 'center', 'header', 150);
                
                // add titles row
                $tr->addRow();
                $tr->addCell('Id', 'right', 'title');
                $tr->addCell('Estabelecimento', 'right', 'title');
                $tr->addCell('Filial', 'right', 'title');
                $tr->addCell('Codigo', 'left', 'title');
                $tr->addCell('Nome', 'left', 'title');
                $tr->addCell('Preco', 'right', 'title');
                $tr->addCell('Preco2', 'right', 'title');
                $tr->addCell('Preco3', 'right', 'title');
                $tr->addCell('Preco4', 'right', 'title');
                $tr->addCell('Menew Preco', 'right', 'title');
                $tr->addCell('Aliq', 'left', 'title');
                $tr->addCell('Categ', 'right', 'title');
                $tr->addCell('Tipo', 'right', 'title');
                $tr->addCell('Comanda', 'left', 'title');
                $tr->addCell('Impressora', 'right', 'title');
                $tr->addCell('Ponto', 'right', 'title');
                $tr->addCell('Taxa', 'left', 'title');
                $tr->addCell('Complemento', 'left', 'title');
                $tr->addCell('Observ', 'left', 'title');
                $tr->addCell('Metodo', 'left', 'title');
                $tr->addCell('Fracao', 'left', 'title');
                $tr->addCell('Tam', 'right', 'title');
                $tr->addCell('Destaque', 'left', 'title');
                $tr->addCell('Descricao', 'left', 'title');
                $tr->addCell('Email', 'left', 'title');
                $tr->addCell('Status', 'right', 'title');
                $tr->addCell('Site', 'left', 'title');
                $tr->addCell('Senha', 'left', 'title');
                $tr->addCell('Antecipado', 'left', 'title');
                $tr->addCell('Impressora2', 'right', 'title');
                $tr->addCell('Preco Custo', 'right', 'title');
                $tr->addCell('Nome Site', 'left', 'title');
                $tr->addCell('Embalagem', 'right', 'title');
                $tr->addCell('Und', 'left', 'title');
                $tr->addCell('Fab', 'left', 'title');
                $tr->addCell('Indicador', 'left', 'title');
                $tr->addCell('Ean', 'left', 'title');
                $tr->addCell('Cod Promo', 'right', 'title');
                $tr->addCell('Promocao', 'left', 'title');
                $tr->addCell('Cod Clube', 'right', 'title');
                $tr->addCell('Hash', 'left', 'title');
                $tr->addCell('Semana', 'left', 'title');
                $tr->addCell('Partes', 'left', 'title');
                $tr->addCell('Ativo', 'left', 'title');
                $tr->addCell('Ncm', 'left', 'title');
                $tr->addCell('Impostos Totais', 'right', 'title');
                $tr->addCell('Dt Atualizacao', 'left', 'title');
                $tr->addCell('Dt Atualizacao Foto', 'left', 'title');
                $tr->addCell('Nome Site Idioma2', 'left', 'title');
                $tr->addCell('Descricao Idioma2', 'left', 'title');
                $tr->addCell('Nome Site Idioma3', 'left', 'title');
                $tr->addCell('Descricao Idioma3', 'left', 'title');
                $tr->addCell('Nome Site Idioma4', 'left', 'title');
                $tr->addCell('Descricao Idioma4', 'left', 'title');
                $tr->addCell('Nome Site Idioma5', 'left', 'title');
                $tr->addCell('Descricao Idioma5', 'left', 'title');
                $tr->addCell('Nome Site Idioma6', 'left', 'title');
                $tr->addCell('Descricao Idioma6', 'left', 'title');
                $tr->addCell('Foto Nome Arquivo', 'left', 'title');
                $tr->addCell('Cfop', 'left', 'title');
                $tr->addCell('Cst Icms E', 'left', 'title');
                $tr->addCell('Cst Icms S', 'left', 'title');
                $tr->addCell('Cst Ipi E', 'left', 'title');
                $tr->addCell('Cst Ipi S', 'left', 'title');
                $tr->addCell('Cst Pis E', 'left', 'title');
                $tr->addCell('Cst Pis S', 'left', 'title');
                $tr->addCell('Cst Cofins E', 'left', 'title');
                $tr->addCell('Cst Cofins S', 'left', 'title');
                $tr->addCell('Aliq Ipi', 'right', 'title');
                $tr->addCell('Bc Ipi', 'right', 'title');
                $tr->addCell('Valor Ipi', 'right', 'title');
                $tr->addCell('Aliq Pis', 'right', 'title');
                $tr->addCell('Bc Pis', 'right', 'title');
                $tr->addCell('Valor Pis', 'right', 'title');
                $tr->addCell('Aliq Cofins', 'right', 'title');
                $tr->addCell('Bc Cofins', 'right', 'title');
                $tr->addCell('Valor Cofins', 'right', 'title');
                $tr->addCell('Aliq Icms', 'right', 'title');
                $tr->addCell('Bc Icms', 'right', 'title');
                $tr->addCell('Valor Icms', 'right', 'title');
                $tr->addCell('Cardapio', 'left', 'title');
                $tr->addCell('Texto Complem', 'left', 'title');
                $tr->addCell('Texto Complem Idioma2', 'left', 'title');
                $tr->addCell('Texto Complem Idioma3', 'left', 'title');
                $tr->addCell('Texto Complem Idioma4', 'left', 'title');
                $tr->addCell('Texto Complem Idioma5', 'left', 'title');
                $tr->addCell('Texto Complem Idioma6', 'left', 'title');
                $tr->addCell('Comissao', 'right', 'title');
                $tr->addCell('Bloqueio Ini', 'right', 'title');
                $tr->addCell('Bloqueio Fim', 'right', 'title');
                $tr->addCell('Voucher', 'left', 'title');
                $tr->addCell('Imp Total', 'right', 'title');
                $tr->addCell('Tipo Balanca', 'left', 'title');
                $tr->addCell('Com Balanca', 'right', 'title');
                $tr->addCell('Obs Padrao', 'left', 'title');
                $tr->addCell('Descri Comanda', 'left', 'title');
                $tr->addCell('Desconto Padrao', 'right', 'title');
                $tr->addCell('R Menor', 'left', 'title');
                $tr->addCell('Cest', 'left', 'title');
                $tr->addCell('Tem Promo', 'left', 'title');
                $tr->addCell('Data Sinc', 'left', 'title');
                $tr->addCell('Ordem', 'right', 'title');
                $tr->addCell('Recebido Matriz', 'left', 'title');
                $tr->addCell('Ocultado', 'left', 'title');
                $tr->addCell('Imp Est', 'right', 'title');
                $tr->addCell('Imp Mun', 'right', 'title');
                $tr->addCell('Imp Fed', 'right', 'title');
                $tr->addCell('Unificar Sempre', 'right', 'title');
                $tr->addCell('Recebido Proprio', 'left', 'title');
                $tr->addCell('Codigo2', 'right', 'title');
                $tr->addCell('Estoque Critico', 'right', 'title');
                $tr->addCell('Manipulado Produzido', 'left', 'title');
                $tr->addCell('Plano Contas', 'left', 'title');
                $tr->addCell('Ficha Unit', 'left', 'title');
                $tr->addCell('Insumo', 'right', 'title');
                $tr->addCell('Venda', 'right', 'title');
                $tr->addCell('Composicao', 'right', 'title');
                $tr->addCell('Fator', 'right', 'title');
                $tr->addCell('Regime Tributario', 'right', 'title');
                $tr->addCell('Centro', 'right', 'title');
                $tr->addCell('Indisponivel', 'left', 'title');
                $tr->addCell('Franquia Royalty', 'left', 'title');
                $tr->addCell('Franquia Mkt', 'left', 'title');
                $tr->addCell('Montagem Preco Fixo', 'right', 'title');
                $tr->addCell('Horario Customizado', 'right', 'title');
                $tr->addCell('Tempo', 'right', 'title');
                $tr->addCell('Comisssao', 'right', 'title');
                $tr->addCell('Tempo Preparo', 'right', 'title');
                $tr->addCell('Tara', 'right', 'title');
                $tr->addCell('Peso', 'right', 'title');
                $tr->addCell('Valor Peso', 'left', 'title');
                $tr->addCell('Aliq Icms Reduc', 'right', 'title');
                $tr->addCell('Tag', 'left', 'title');
                $tr->addCell('Permite Desconto', 'left', 'title');
                $tr->addCell('Integra Estoque', 'left', 'title');
                $tr->addCell('Motivo Desoneracao', 'left', 'title');
                $tr->addCell('Balanca 1', 'left', 'title');
                $tr->addCell('Balanca 2', 'left', 'title');
                $tr->addCell('Aliq Red Bc Efetivo', 'right', 'title');
                $tr->addCell('Aliq Icms Efetivo', 'right', 'title');
                $tr->addCell('Aliq Fcp', 'right', 'title');
                $tr->addCell('Aliq Fcpst', 'right', 'title');
                $tr->addCell('Cbenef', 'left', 'title');
                $tr->addCell('Balanca Tela', 'right', 'title');
                $tr->addCell('Ponto Peso', 'right', 'title');
                $tr->addCell('Ponto Resgate', 'right', 'title');
                $tr->addCell('Tipo Peso', 'left', 'title');
                $tr->addCell('Menew Site', 'left', 'title');
                $tr->addCell('Menew Descricao', 'left', 'title');
                $tr->addCell('Sinc Temp', 'left', 'title');

                
                // controls the background filling
                $colour= FALSE;
                
                // data rows
                foreach ($objects as $object)
                {
                    $style = $colour ? 'datap' : 'datai';
                    $tr->addRow();
                    $tr->addCell($object->id, 'right', $style);
                    $tr->addCell($object->estabelecimento, 'right', $style);
                    $tr->addCell($object->filial, 'right', $style);
                    $tr->addCell($object->codigo, 'left', $style);
                    $tr->addCell($object->nome, 'left', $style);
                    $tr->addCell($object->preco, 'right', $style);
                    $tr->addCell($object->preco2, 'right', $style);
                    $tr->addCell($object->preco3, 'right', $style);
                    $tr->addCell($object->preco4, 'right', $style);
                    $tr->addCell($object->menew_preco, 'right', $style);
                    $tr->addCell($object->aliq, 'left', $style);
                    $tr->addCell($object->categ, 'right', $style);
                    $tr->addCell($object->tipo, 'right', $style);
                    $tr->addCell($object->comanda, 'left', $style);
                    $tr->addCell($object->impressora, 'right', $style);
                    $tr->addCell($object->ponto, 'right', $style);
                    $tr->addCell($object->taxa, 'left', $style);
                    $tr->addCell($object->complemento, 'left', $style);
                    $tr->addCell($object->observ, 'left', $style);
                    $tr->addCell($object->metodo, 'left', $style);
                    $tr->addCell($object->fracao, 'left', $style);
                    $tr->addCell($object->tam, 'right', $style);
                    $tr->addCell($object->destaque, 'left', $style);
                    $tr->addCell($object->descricao, 'left', $style);
                    $tr->addCell($object->email, 'left', $style);
                    $tr->addCell($object->status, 'right', $style);
                    $tr->addCell($object->site, 'left', $style);
                    $tr->addCell($object->senha, 'left', $style);
                    $tr->addCell($object->antecipado, 'left', $style);
                    $tr->addCell($object->impressora2, 'right', $style);
                    $tr->addCell($object->preco_custo, 'right', $style);
                    $tr->addCell($object->nome_site, 'left', $style);
                    $tr->addCell($object->embalagem, 'right', $style);
                    $tr->addCell($object->und, 'left', $style);
                    $tr->addCell($object->fab, 'left', $style);
                    $tr->addCell($object->indicador, 'left', $style);
                    $tr->addCell($object->ean, 'left', $style);
                    $tr->addCell($object->cod_promo, 'right', $style);
                    $tr->addCell($object->promocao, 'left', $style);
                    $tr->addCell($object->cod_clube, 'right', $style);
                    $tr->addCell($object->hash, 'left', $style);
                    $tr->addCell($object->semana, 'left', $style);
                    $tr->addCell($object->partes, 'left', $style);
                    $tr->addCell($object->ativo, 'left', $style);
                    $tr->addCell($object->ncm, 'left', $style);
                    $tr->addCell($object->impostos_totais, 'right', $style);
                    $tr->addCell($object->dt_atualizacao, 'left', $style);
                    $tr->addCell($object->dt_atualizacao_foto, 'left', $style);
                    $tr->addCell($object->nome_site_idioma2, 'left', $style);
                    $tr->addCell($object->descricao_idioma2, 'left', $style);
                    $tr->addCell($object->nome_site_idioma3, 'left', $style);
                    $tr->addCell($object->descricao_idioma3, 'left', $style);
                    $tr->addCell($object->nome_site_idioma4, 'left', $style);
                    $tr->addCell($object->descricao_idioma4, 'left', $style);
                    $tr->addCell($object->nome_site_idioma5, 'left', $style);
                    $tr->addCell($object->descricao_idioma5, 'left', $style);
                    $tr->addCell($object->nome_site_idioma6, 'left', $style);
                    $tr->addCell($object->descricao_idioma6, 'left', $style);
                    $tr->addCell($object->foto_nome_arquivo, 'left', $style);
                    $tr->addCell($object->cfop, 'left', $style);
                    $tr->addCell($object->cst_icms_e, 'left', $style);
                    $tr->addCell($object->cst_icms_s, 'left', $style);
                    $tr->addCell($object->cst_ipi_e, 'left', $style);
                    $tr->addCell($object->cst_ipi_s, 'left', $style);
                    $tr->addCell($object->cst_pis_e, 'left', $style);
                    $tr->addCell($object->cst_pis_s, 'left', $style);
                    $tr->addCell($object->cst_cofins_e, 'left', $style);
                    $tr->addCell($object->cst_cofins_s, 'left', $style);
                    $tr->addCell($object->aliq_ipi, 'right', $style);
                    $tr->addCell($object->bc_ipi, 'right', $style);
                    $tr->addCell($object->valor_ipi, 'right', $style);
                    $tr->addCell($object->aliq_pis, 'right', $style);
                    $tr->addCell($object->bc_pis, 'right', $style);
                    $tr->addCell($object->valor_pis, 'right', $style);
                    $tr->addCell($object->aliq_cofins, 'right', $style);
                    $tr->addCell($object->bc_cofins, 'right', $style);
                    $tr->addCell($object->valor_cofins, 'right', $style);
                    $tr->addCell($object->aliq_icms, 'right', $style);
                    $tr->addCell($object->bc_icms, 'right', $style);
                    $tr->addCell($object->valor_icms, 'right', $style);
                    $tr->addCell($object->cardapio, 'left', $style);
                    $tr->addCell($object->texto_complem, 'left', $style);
                    $tr->addCell($object->texto_complem_idioma2, 'left', $style);
                    $tr->addCell($object->texto_complem_idioma3, 'left', $style);
                    $tr->addCell($object->texto_complem_idioma4, 'left', $style);
                    $tr->addCell($object->texto_complem_idioma5, 'left', $style);
                    $tr->addCell($object->texto_complem_idioma6, 'left', $style);
                    $tr->addCell($object->comissao, 'right', $style);
                    $tr->addCell($object->bloqueio_ini, 'right', $style);
                    $tr->addCell($object->bloqueio_fim, 'right', $style);
                    $tr->addCell($object->voucher, 'left', $style);
                    $tr->addCell($object->imp_total, 'right', $style);
                    $tr->addCell($object->tipo_balanca, 'left', $style);
                    $tr->addCell($object->com_balanca, 'right', $style);
                    $tr->addCell($object->obs_padrao, 'left', $style);
                    $tr->addCell($object->descri_comanda, 'left', $style);
                    $tr->addCell($object->desconto_padrao, 'right', $style);
                    $tr->addCell($object->r_menor, 'left', $style);
                    $tr->addCell($object->cest, 'left', $style);
                    $tr->addCell($object->tem_promo, 'left', $style);
                    $tr->addCell($object->data_sinc, 'left', $style);
                    $tr->addCell($object->ordem, 'right', $style);
                    $tr->addCell($object->recebido_matriz, 'left', $style);
                    $tr->addCell($object->ocultado, 'left', $style);
                    $tr->addCell($object->imp_est, 'right', $style);
                    $tr->addCell($object->imp_mun, 'right', $style);
                    $tr->addCell($object->imp_fed, 'right', $style);
                    $tr->addCell($object->unificar_sempre, 'right', $style);
                    $tr->addCell($object->recebido_proprio, 'left', $style);
                    $tr->addCell($object->codigo2, 'right', $style);
                    $tr->addCell($object->estoque_critico, 'right', $style);
                    $tr->addCell($object->manipulado_produzido, 'left', $style);
                    $tr->addCell($object->plano_contas, 'left', $style);
                    $tr->addCell($object->ficha_unit, 'left', $style);
                    $tr->addCell($object->insumo, 'right', $style);
                    $tr->addCell($object->venda, 'right', $style);
                    $tr->addCell($object->composicao, 'right', $style);
                    $tr->addCell($object->fator, 'right', $style);
                    $tr->addCell($object->regime_tributario, 'right', $style);
                    $tr->addCell($object->centro, 'right', $style);
                    $tr->addCell($object->indisponivel, 'left', $style);
                    $tr->addCell($object->franquia_royalty, 'left', $style);
                    $tr->addCell($object->franquia_mkt, 'left', $style);
                    $tr->addCell($object->montagem_preco_fixo, 'right', $style);
                    $tr->addCell($object->horario_customizado, 'right', $style);
                    $tr->addCell($object->tempo, 'right', $style);
                    $tr->addCell($object->comisssao, 'right', $style);
                    $tr->addCell($object->tempo_preparo, 'right', $style);
                    $tr->addCell($object->tara, 'right', $style);
                    $tr->addCell($object->peso, 'right', $style);
                    $tr->addCell($object->valor_peso, 'left', $style);
                    $tr->addCell($object->aliq_icms_reduc, 'right', $style);
                    $tr->addCell($object->tag, 'left', $style);
                    $tr->addCell($object->permite_desconto, 'left', $style);
                    $tr->addCell($object->integra_estoque, 'left', $style);
                    $tr->addCell($object->motivo_desoneracao, 'left', $style);
                    $tr->addCell($object->balanca_1, 'left', $style);
                    $tr->addCell($object->balanca_2, 'left', $style);
                    $tr->addCell($object->aliq_red_bc_efetivo, 'right', $style);
                    $tr->addCell($object->aliq_icms_efetivo, 'right', $style);
                    $tr->addCell($object->aliq_fcp, 'right', $style);
                    $tr->addCell($object->aliq_fcpst, 'right', $style);
                    $tr->addCell($object->cbenef, 'left', $style);
                    $tr->addCell($object->balanca_tela, 'right', $style);
                    $tr->addCell($object->ponto_peso, 'right', $style);
                    $tr->addCell($object->ponto_resgate, 'right', $style);
                    $tr->addCell($object->tipo_peso, 'left', $style);
                    $tr->addCell($object->menew_site, 'left', $style);
                    $tr->addCell($object->menew_descricao, 'left', $style);
                    $tr->addCell($object->sinc_temp, 'left', $style);

                    
                    $colour = !$colour;
                }
                
                // footer row
                $tr->addRow();
                $tr->addCell(date('Y-m-d h:i:s'), 'center', 'footer', 150);
                
                // stores the file
                if (!file_exists("app/output/CkptProduto.{$format}") OR is_writable("app/output/CkptProduto.{$format}"))
                {
                    $tr->save("app/output/CkptProduto.{$format}");
                }
                else
                {
                    throw new Exception(_t('Permission denied') . ': ' . "app/output/CkptProduto.{$format}");
                }
                
                // open the report file
                parent::openFile("app/output/CkptProduto.{$format}");
                
                // shows the success message
                new TMessage('info', 'Report generated. Please, enable popups.');
            }
            else
            {
                new TMessage('error', 'No records found');
            }
    
            // fill the form with the active record data
            $this->form->setData($data);
            
            // close the transaction
            TTransaction::close();
        }
        catch (Exception $e) // in case of exception
        {
            // shows the exception error message
            new TMessage('error', $e->getMessage());
            
            // undo all pending operations
            TTransaction::rollback();
        }
    }
}
