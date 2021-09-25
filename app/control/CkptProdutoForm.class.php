<?php
/**
 * CkptProdutoForm Form
 * @author  <your name here>
 */
class CkptProdutoForm extends TPage
{
    protected $form; // form
    
    /**
     * Form constructor
     * @param $param Request
     */
    public function __construct( $param )
    {
        parent::__construct();
        
        
        // creates the form
        $this->form = new BootstrapFormBuilder('form_CkptProduto');
        $this->form->setFormTitle('CkptProduto');
        

        // create the form fields
        $id = new TEntry('id');
        $estabelecimento = new TEntry('estabelecimento');
        $filial = new TEntry('filial');
        $codigo = new TEntry('codigo');
        $nome = new TEntry('nome');
        $preco = new TEntry('preco');
        $preco2 = new TEntry('preco2');
        $preco3 = new TEntry('preco3');
        $preco4 = new TEntry('preco4');
        $menew_preco = new TEntry('menew_preco');
        $aliq = new TEntry('aliq');
        $categ = new TEntry('categ');
        $tipo = new TEntry('tipo');
        $comanda = new TEntry('comanda');
        $impressora = new TEntry('impressora');
        $ponto = new TEntry('ponto');
        $taxa = new TEntry('taxa');
        $complemento = new TEntry('complemento');
        $observ = new TEntry('observ');
        $metodo = new TEntry('metodo');
        $fracao = new TEntry('fracao');
        $tam = new TEntry('tam');
        $destaque = new TEntry('destaque');
        $descricao = new TEntry('descricao');
        $email = new TEntry('email');
        $status = new TEntry('status');
        $site = new TEntry('site');
        $senha = new TEntry('senha');
        $antecipado = new TEntry('antecipado');
        $impressora2 = new TEntry('impressora2');
        $preco_custo = new TEntry('preco_custo');
        $nome_site = new TEntry('nome_site');
        $embalagem = new TEntry('embalagem');
        $und = new TEntry('und');
        $fab = new TEntry('fab');
        $indicador = new TEntry('indicador');
        $ean = new TEntry('ean');
        $cod_promo = new TEntry('cod_promo');
        $promocao = new TEntry('promocao');
        $cod_clube = new TEntry('cod_clube');
        $hash = new TEntry('hash');
        $semana = new TEntry('semana');
        $partes = new TEntry('partes');
        $ativo = new TEntry('ativo');
        $ncm = new TEntry('ncm');
        $impostos_totais = new TEntry('impostos_totais');
        $dt_atualizacao = new TDate('dt_atualizacao');
        $dt_atualizacao_foto = new TDate('dt_atualizacao_foto');
        $nome_site_idioma2 = new TEntry('nome_site_idioma2');
        $descricao_idioma2 = new TEntry('descricao_idioma2');
        $nome_site_idioma3 = new TEntry('nome_site_idioma3');
        $descricao_idioma3 = new TEntry('descricao_idioma3');
        $nome_site_idioma4 = new TEntry('nome_site_idioma4');
        $descricao_idioma4 = new TEntry('descricao_idioma4');
        $nome_site_idioma5 = new TEntry('nome_site_idioma5');
        $descricao_idioma5 = new TEntry('descricao_idioma5');
        $nome_site_idioma6 = new TEntry('nome_site_idioma6');
        $descricao_idioma6 = new TEntry('descricao_idioma6');
        $foto_nome_arquivo = new TEntry('foto_nome_arquivo');
        $cfop = new TEntry('cfop');
        $cst_icms_e = new TEntry('cst_icms_e');
        $cst_icms_s = new TEntry('cst_icms_s');
        $cst_ipi_e = new TEntry('cst_ipi_e');
        $cst_ipi_s = new TEntry('cst_ipi_s');
        $cst_pis_e = new TEntry('cst_pis_e');
        $cst_pis_s = new TEntry('cst_pis_s');
        $cst_cofins_e = new TEntry('cst_cofins_e');
        $cst_cofins_s = new TEntry('cst_cofins_s');
        $aliq_ipi = new TEntry('aliq_ipi');
        $bc_ipi = new TEntry('bc_ipi');
        $valor_ipi = new TEntry('valor_ipi');
        $aliq_pis = new TEntry('aliq_pis');
        $bc_pis = new TEntry('bc_pis');
        $valor_pis = new TEntry('valor_pis');
        $aliq_cofins = new TEntry('aliq_cofins');
        $bc_cofins = new TEntry('bc_cofins');
        $valor_cofins = new TEntry('valor_cofins');
        $aliq_icms = new TEntry('aliq_icms');
        $bc_icms = new TEntry('bc_icms');
        $valor_icms = new TEntry('valor_icms');
        $cardapio = new TEntry('cardapio');
        $texto_complem = new TText('texto_complem');
        $texto_complem_idioma2 = new TText('texto_complem_idioma2');
        $texto_complem_idioma3 = new TText('texto_complem_idioma3');
        $texto_complem_idioma4 = new TText('texto_complem_idioma4');
        $texto_complem_idioma5 = new TText('texto_complem_idioma5');
        $texto_complem_idioma6 = new TText('texto_complem_idioma6');
        $comissao = new TEntry('comissao');
        $bloqueio_ini = new TEntry('bloqueio_ini');
        $bloqueio_fim = new TEntry('bloqueio_fim');
        $voucher = new TEntry('voucher');
        $imp_total = new TEntry('imp_total');
        $tipo_balanca = new TEntry('tipo_balanca');
        $com_balanca = new TEntry('com_balanca');
        $obs_padrao = new TText('obs_padrao');
        $descri_comanda = new TEntry('descri_comanda');
        $desconto_padrao = new TEntry('desconto_padrao');
        $r_menor = new TEntry('r_menor');
        $cest = new TEntry('cest');
        $tem_promo = new TEntry('tem_promo');
        $data_sinc = new TDate('data_sinc');
        $ordem = new TEntry('ordem');
        $recebido_matriz = new TEntry('recebido_matriz');
        $ocultado = new TEntry('ocultado');
        $imp_est = new TEntry('imp_est');
        $imp_mun = new TEntry('imp_mun');
        $imp_fed = new TEntry('imp_fed');
        $unificar_sempre = new TEntry('unificar_sempre');
        $recebido_proprio = new TEntry('recebido_proprio');
        $codigo2 = new TEntry('codigo2');
        $estoque_critico = new TEntry('estoque_critico');
        $manipulado_produzido = new TEntry('manipulado_produzido');
        $plano_contas = new TEntry('plano_contas');
        $ficha_unit = new TEntry('ficha_unit');
        $insumo = new TEntry('insumo');
        $venda = new TEntry('venda');
        $composicao = new TEntry('composicao');
        $fator = new TEntry('fator');
        $regime_tributario = new TEntry('regime_tributario');
        $centro = new TEntry('centro');
        $indisponivel = new TEntry('indisponivel');
        $franquia_royalty = new TEntry('franquia_royalty');
        $franquia_mkt = new TEntry('franquia_mkt');
        $montagem_preco_fixo = new TEntry('montagem_preco_fixo');
        $horario_customizado = new TEntry('horario_customizado');
        $tempo = new TEntry('tempo');
        $comisssao = new TEntry('comisssao');
        $tempo_preparo = new TEntry('tempo_preparo');
        $tara = new TEntry('tara');
        $peso = new TEntry('peso');
        $valor_peso = new TEntry('valor_peso');
        $aliq_icms_reduc = new TEntry('aliq_icms_reduc');
        $tag = new TEntry('tag');
        $permite_desconto = new TEntry('permite_desconto');
        $integra_estoque = new TEntry('integra_estoque');
        $motivo_desoneracao = new TEntry('motivo_desoneracao');
        $balanca_1 = new TEntry('balanca_1');
        $balanca_2 = new TEntry('balanca_2');
        $aliq_red_bc_efetivo = new TEntry('aliq_red_bc_efetivo');
        $aliq_icms_efetivo = new TEntry('aliq_icms_efetivo');
        $aliq_fcp = new TEntry('aliq_fcp');
        $aliq_fcpst = new TEntry('aliq_fcpst');
        $cbenef = new TEntry('cbenef');
        $balanca_tela = new TEntry('balanca_tela');
        $ponto_peso = new TEntry('ponto_peso');
        $ponto_resgate = new TEntry('ponto_resgate');
        $tipo_peso = new TEntry('tipo_peso');
        $menew_site = new TEntry('menew_site');
        $menew_descricao = new TEntry('menew_descricao');
        $sinc_temp = new TDate('sinc_temp');


        // add the fields
        $this->form->addFields( [ new TLabel('Id') ], [ $id ] );
        $this->form->addFields( [ new TLabel('Estabelecimento') ], [ $estabelecimento ] );
        $this->form->addFields( [ new TLabel('Filial') ], [ $filial ] );
        $this->form->addFields( [ new TLabel('Codigo') ], [ $codigo ] );
        $this->form->addFields( [ new TLabel('Nome') ], [ $nome ] );
        $this->form->addFields( [ new TLabel('Preco') ], [ $preco ] );
        $this->form->addFields( [ new TLabel('Preco2') ], [ $preco2 ] );
        $this->form->addFields( [ new TLabel('Preco3') ], [ $preco3 ] );
        $this->form->addFields( [ new TLabel('Preco4') ], [ $preco4 ] );
        $this->form->addFields( [ new TLabel('Menew Preco') ], [ $menew_preco ] );
        $this->form->addFields( [ new TLabel('Aliq') ], [ $aliq ] );
        $this->form->addFields( [ new TLabel('Categ') ], [ $categ ] );
        $this->form->addFields( [ new TLabel('Tipo') ], [ $tipo ] );
        $this->form->addFields( [ new TLabel('Comanda') ], [ $comanda ] );
        $this->form->addFields( [ new TLabel('Impressora') ], [ $impressora ] );
        $this->form->addFields( [ new TLabel('Ponto') ], [ $ponto ] );
        $this->form->addFields( [ new TLabel('Taxa') ], [ $taxa ] );
        $this->form->addFields( [ new TLabel('Complemento') ], [ $complemento ] );
        $this->form->addFields( [ new TLabel('Observ') ], [ $observ ] );
        $this->form->addFields( [ new TLabel('Metodo') ], [ $metodo ] );
        $this->form->addFields( [ new TLabel('Fracao') ], [ $fracao ] );
        $this->form->addFields( [ new TLabel('Tam') ], [ $tam ] );
        $this->form->addFields( [ new TLabel('Destaque') ], [ $destaque ] );
        $this->form->addFields( [ new TLabel('Descricao') ], [ $descricao ] );
        $this->form->addFields( [ new TLabel('Email') ], [ $email ] );
        $this->form->addFields( [ new TLabel('Status') ], [ $status ] );
        $this->form->addFields( [ new TLabel('Site') ], [ $site ] );
        $this->form->addFields( [ new TLabel('Senha') ], [ $senha ] );
        $this->form->addFields( [ new TLabel('Antecipado') ], [ $antecipado ] );
        $this->form->addFields( [ new TLabel('Impressora2') ], [ $impressora2 ] );
        $this->form->addFields( [ new TLabel('Preco Custo') ], [ $preco_custo ] );
        $this->form->addFields( [ new TLabel('Nome Site') ], [ $nome_site ] );
        $this->form->addFields( [ new TLabel('Embalagem') ], [ $embalagem ] );
        $this->form->addFields( [ new TLabel('Und') ], [ $und ] );
        $this->form->addFields( [ new TLabel('Fab') ], [ $fab ] );
        $this->form->addFields( [ new TLabel('Indicador') ], [ $indicador ] );
        $this->form->addFields( [ new TLabel('Ean') ], [ $ean ] );
        $this->form->addFields( [ new TLabel('Cod Promo') ], [ $cod_promo ] );
        $this->form->addFields( [ new TLabel('Promocao') ], [ $promocao ] );
        $this->form->addFields( [ new TLabel('Cod Clube') ], [ $cod_clube ] );
        $this->form->addFields( [ new TLabel('Hash') ], [ $hash ] );
        $this->form->addFields( [ new TLabel('Semana') ], [ $semana ] );
        $this->form->addFields( [ new TLabel('Partes') ], [ $partes ] );
        $this->form->addFields( [ new TLabel('Ativo') ], [ $ativo ] );
        $this->form->addFields( [ new TLabel('Ncm') ], [ $ncm ] );
        $this->form->addFields( [ new TLabel('Impostos Totais') ], [ $impostos_totais ] );
        $this->form->addFields( [ new TLabel('Dt Atualizacao') ], [ $dt_atualizacao ] );
        $this->form->addFields( [ new TLabel('Dt Atualizacao Foto') ], [ $dt_atualizacao_foto ] );
        $this->form->addFields( [ new TLabel('Nome Site Idioma2') ], [ $nome_site_idioma2 ] );
        $this->form->addFields( [ new TLabel('Descricao Idioma2') ], [ $descricao_idioma2 ] );
        $this->form->addFields( [ new TLabel('Nome Site Idioma3') ], [ $nome_site_idioma3 ] );
        $this->form->addFields( [ new TLabel('Descricao Idioma3') ], [ $descricao_idioma3 ] );
        $this->form->addFields( [ new TLabel('Nome Site Idioma4') ], [ $nome_site_idioma4 ] );
        $this->form->addFields( [ new TLabel('Descricao Idioma4') ], [ $descricao_idioma4 ] );
        $this->form->addFields( [ new TLabel('Nome Site Idioma5') ], [ $nome_site_idioma5 ] );
        $this->form->addFields( [ new TLabel('Descricao Idioma5') ], [ $descricao_idioma5 ] );
        $this->form->addFields( [ new TLabel('Nome Site Idioma6') ], [ $nome_site_idioma6 ] );
        $this->form->addFields( [ new TLabel('Descricao Idioma6') ], [ $descricao_idioma6 ] );
        $this->form->addFields( [ new TLabel('Foto Nome Arquivo') ], [ $foto_nome_arquivo ] );
        $this->form->addFields( [ new TLabel('Cfop') ], [ $cfop ] );
        $this->form->addFields( [ new TLabel('Cst Icms E') ], [ $cst_icms_e ] );
        $this->form->addFields( [ new TLabel('Cst Icms S') ], [ $cst_icms_s ] );
        $this->form->addFields( [ new TLabel('Cst Ipi E') ], [ $cst_ipi_e ] );
        $this->form->addFields( [ new TLabel('Cst Ipi S') ], [ $cst_ipi_s ] );
        $this->form->addFields( [ new TLabel('Cst Pis E') ], [ $cst_pis_e ] );
        $this->form->addFields( [ new TLabel('Cst Pis S') ], [ $cst_pis_s ] );
        $this->form->addFields( [ new TLabel('Cst Cofins E') ], [ $cst_cofins_e ] );
        $this->form->addFields( [ new TLabel('Cst Cofins S') ], [ $cst_cofins_s ] );
        $this->form->addFields( [ new TLabel('Aliq Ipi') ], [ $aliq_ipi ] );
        $this->form->addFields( [ new TLabel('Bc Ipi') ], [ $bc_ipi ] );
        $this->form->addFields( [ new TLabel('Valor Ipi') ], [ $valor_ipi ] );
        $this->form->addFields( [ new TLabel('Aliq Pis') ], [ $aliq_pis ] );
        $this->form->addFields( [ new TLabel('Bc Pis') ], [ $bc_pis ] );
        $this->form->addFields( [ new TLabel('Valor Pis') ], [ $valor_pis ] );
        $this->form->addFields( [ new TLabel('Aliq Cofins') ], [ $aliq_cofins ] );
        $this->form->addFields( [ new TLabel('Bc Cofins') ], [ $bc_cofins ] );
        $this->form->addFields( [ new TLabel('Valor Cofins') ], [ $valor_cofins ] );
        $this->form->addFields( [ new TLabel('Aliq Icms') ], [ $aliq_icms ] );
        $this->form->addFields( [ new TLabel('Bc Icms') ], [ $bc_icms ] );
        $this->form->addFields( [ new TLabel('Valor Icms') ], [ $valor_icms ] );
        $this->form->addFields( [ new TLabel('Cardapio') ], [ $cardapio ] );
        $this->form->addFields( [ new TLabel('Texto Complem') ], [ $texto_complem ] );
        $this->form->addFields( [ new TLabel('Texto Complem Idioma2') ], [ $texto_complem_idioma2 ] );
        $this->form->addFields( [ new TLabel('Texto Complem Idioma3') ], [ $texto_complem_idioma3 ] );
        $this->form->addFields( [ new TLabel('Texto Complem Idioma4') ], [ $texto_complem_idioma4 ] );
        $this->form->addFields( [ new TLabel('Texto Complem Idioma5') ], [ $texto_complem_idioma5 ] );
        $this->form->addFields( [ new TLabel('Texto Complem Idioma6') ], [ $texto_complem_idioma6 ] );
        $this->form->addFields( [ new TLabel('Comissao') ], [ $comissao ] );
        $this->form->addFields( [ new TLabel('Bloqueio Ini') ], [ $bloqueio_ini ] );
        $this->form->addFields( [ new TLabel('Bloqueio Fim') ], [ $bloqueio_fim ] );
        $this->form->addFields( [ new TLabel('Voucher') ], [ $voucher ] );
        $this->form->addFields( [ new TLabel('Imp Total') ], [ $imp_total ] );
        $this->form->addFields( [ new TLabel('Tipo Balanca') ], [ $tipo_balanca ] );
        $this->form->addFields( [ new TLabel('Com Balanca') ], [ $com_balanca ] );
        $this->form->addFields( [ new TLabel('Obs Padrao') ], [ $obs_padrao ] );
        $this->form->addFields( [ new TLabel('Descri Comanda') ], [ $descri_comanda ] );
        $this->form->addFields( [ new TLabel('Desconto Padrao') ], [ $desconto_padrao ] );
        $this->form->addFields( [ new TLabel('R Menor') ], [ $r_menor ] );
        $this->form->addFields( [ new TLabel('Cest') ], [ $cest ] );
        $this->form->addFields( [ new TLabel('Tem Promo') ], [ $tem_promo ] );
        $this->form->addFields( [ new TLabel('Data Sinc') ], [ $data_sinc ] );
        $this->form->addFields( [ new TLabel('Ordem') ], [ $ordem ] );
        $this->form->addFields( [ new TLabel('Recebido Matriz') ], [ $recebido_matriz ] );
        $this->form->addFields( [ new TLabel('Ocultado') ], [ $ocultado ] );
        $this->form->addFields( [ new TLabel('Imp Est') ], [ $imp_est ] );
        $this->form->addFields( [ new TLabel('Imp Mun') ], [ $imp_mun ] );
        $this->form->addFields( [ new TLabel('Imp Fed') ], [ $imp_fed ] );
        $this->form->addFields( [ new TLabel('Unificar Sempre') ], [ $unificar_sempre ] );
        $this->form->addFields( [ new TLabel('Recebido Proprio') ], [ $recebido_proprio ] );
        $this->form->addFields( [ new TLabel('Codigo2') ], [ $codigo2 ] );
        $this->form->addFields( [ new TLabel('Estoque Critico') ], [ $estoque_critico ] );
        $this->form->addFields( [ new TLabel('Manipulado Produzido') ], [ $manipulado_produzido ] );
        $this->form->addFields( [ new TLabel('Plano Contas') ], [ $plano_contas ] );
        $this->form->addFields( [ new TLabel('Ficha Unit') ], [ $ficha_unit ] );
        $this->form->addFields( [ new TLabel('Insumo') ], [ $insumo ] );
        $this->form->addFields( [ new TLabel('Venda') ], [ $venda ] );
        $this->form->addFields( [ new TLabel('Composicao') ], [ $composicao ] );
        $this->form->addFields( [ new TLabel('Fator') ], [ $fator ] );
        $this->form->addFields( [ new TLabel('Regime Tributario') ], [ $regime_tributario ] );
        $this->form->addFields( [ new TLabel('Centro') ], [ $centro ] );
        $this->form->addFields( [ new TLabel('Indisponivel') ], [ $indisponivel ] );
        $this->form->addFields( [ new TLabel('Franquia Royalty') ], [ $franquia_royalty ] );
        $this->form->addFields( [ new TLabel('Franquia Mkt') ], [ $franquia_mkt ] );
        $this->form->addFields( [ new TLabel('Montagem Preco Fixo') ], [ $montagem_preco_fixo ] );
        $this->form->addFields( [ new TLabel('Horario Customizado') ], [ $horario_customizado ] );
        $this->form->addFields( [ new TLabel('Tempo') ], [ $tempo ] );
        $this->form->addFields( [ new TLabel('Comisssao') ], [ $comisssao ] );
        $this->form->addFields( [ new TLabel('Tempo Preparo') ], [ $tempo_preparo ] );
        $this->form->addFields( [ new TLabel('Tara') ], [ $tara ] );
        $this->form->addFields( [ new TLabel('Peso') ], [ $peso ] );
        $this->form->addFields( [ new TLabel('Valor Peso') ], [ $valor_peso ] );
        $this->form->addFields( [ new TLabel('Aliq Icms Reduc') ], [ $aliq_icms_reduc ] );
        $this->form->addFields( [ new TLabel('Tag') ], [ $tag ] );
        $this->form->addFields( [ new TLabel('Permite Desconto') ], [ $permite_desconto ] );
        $this->form->addFields( [ new TLabel('Integra Estoque') ], [ $integra_estoque ] );
        $this->form->addFields( [ new TLabel('Motivo Desoneracao') ], [ $motivo_desoneracao ] );
        $this->form->addFields( [ new TLabel('Balanca 1') ], [ $balanca_1 ] );
        $this->form->addFields( [ new TLabel('Balanca 2') ], [ $balanca_2 ] );
        $this->form->addFields( [ new TLabel('Aliq Red Bc Efetivo') ], [ $aliq_red_bc_efetivo ] );
        $this->form->addFields( [ new TLabel('Aliq Icms Efetivo') ], [ $aliq_icms_efetivo ] );
        $this->form->addFields( [ new TLabel('Aliq Fcp') ], [ $aliq_fcp ] );
        $this->form->addFields( [ new TLabel('Aliq Fcpst') ], [ $aliq_fcpst ] );
        $this->form->addFields( [ new TLabel('Cbenef') ], [ $cbenef ] );
        $this->form->addFields( [ new TLabel('Balanca Tela') ], [ $balanca_tela ] );
        $this->form->addFields( [ new TLabel('Ponto Peso') ], [ $ponto_peso ] );
        $this->form->addFields( [ new TLabel('Ponto Resgate') ], [ $ponto_resgate ] );
        $this->form->addFields( [ new TLabel('Tipo Peso') ], [ $tipo_peso ] );
        $this->form->addFields( [ new TLabel('Menew Site') ], [ $menew_site ] );
        $this->form->addFields( [ new TLabel('Menew Descricao') ], [ $menew_descricao ] );
        $this->form->addFields( [ new TLabel('Sinc Temp') ], [ $sinc_temp ] );



        // set sizes
        $id->setSize('100%');
        $estabelecimento->setSize('100%');
        $filial->setSize('100%');
        $codigo->setSize('100%');
        $nome->setSize('100%');
        $preco->setSize('100%');
        $preco2->setSize('100%');
        $preco3->setSize('100%');
        $preco4->setSize('100%');
        $menew_preco->setSize('100%');
        $aliq->setSize('100%');
        $categ->setSize('100%');
        $tipo->setSize('100%');
        $comanda->setSize('100%');
        $impressora->setSize('100%');
        $ponto->setSize('100%');
        $taxa->setSize('100%');
        $complemento->setSize('100%');
        $observ->setSize('100%');
        $metodo->setSize('100%');
        $fracao->setSize('100%');
        $tam->setSize('100%');
        $destaque->setSize('100%');
        $descricao->setSize('100%');
        $email->setSize('100%');
        $status->setSize('100%');
        $site->setSize('100%');
        $senha->setSize('100%');
        $antecipado->setSize('100%');
        $impressora2->setSize('100%');
        $preco_custo->setSize('100%');
        $nome_site->setSize('100%');
        $embalagem->setSize('100%');
        $und->setSize('100%');
        $fab->setSize('100%');
        $indicador->setSize('100%');
        $ean->setSize('100%');
        $cod_promo->setSize('100%');
        $promocao->setSize('100%');
        $cod_clube->setSize('100%');
        $hash->setSize('100%');
        $semana->setSize('100%');
        $partes->setSize('100%');
        $ativo->setSize('100%');
        $ncm->setSize('100%');
        $impostos_totais->setSize('100%');
        $dt_atualizacao->setSize('100%');
        $dt_atualizacao_foto->setSize('100%');
        $nome_site_idioma2->setSize('100%');
        $descricao_idioma2->setSize('100%');
        $nome_site_idioma3->setSize('100%');
        $descricao_idioma3->setSize('100%');
        $nome_site_idioma4->setSize('100%');
        $descricao_idioma4->setSize('100%');
        $nome_site_idioma5->setSize('100%');
        $descricao_idioma5->setSize('100%');
        $nome_site_idioma6->setSize('100%');
        $descricao_idioma6->setSize('100%');
        $foto_nome_arquivo->setSize('100%');
        $cfop->setSize('100%');
        $cst_icms_e->setSize('100%');
        $cst_icms_s->setSize('100%');
        $cst_ipi_e->setSize('100%');
        $cst_ipi_s->setSize('100%');
        $cst_pis_e->setSize('100%');
        $cst_pis_s->setSize('100%');
        $cst_cofins_e->setSize('100%');
        $cst_cofins_s->setSize('100%');
        $aliq_ipi->setSize('100%');
        $bc_ipi->setSize('100%');
        $valor_ipi->setSize('100%');
        $aliq_pis->setSize('100%');
        $bc_pis->setSize('100%');
        $valor_pis->setSize('100%');
        $aliq_cofins->setSize('100%');
        $bc_cofins->setSize('100%');
        $valor_cofins->setSize('100%');
        $aliq_icms->setSize('100%');
        $bc_icms->setSize('100%');
        $valor_icms->setSize('100%');
        $cardapio->setSize('100%');
        $texto_complem->setSize('100%');
        $texto_complem_idioma2->setSize('100%');
        $texto_complem_idioma3->setSize('100%');
        $texto_complem_idioma4->setSize('100%');
        $texto_complem_idioma5->setSize('100%');
        $texto_complem_idioma6->setSize('100%');
        $comissao->setSize('100%');
        $bloqueio_ini->setSize('100%');
        $bloqueio_fim->setSize('100%');
        $voucher->setSize('100%');
        $imp_total->setSize('100%');
        $tipo_balanca->setSize('100%');
        $com_balanca->setSize('100%');
        $obs_padrao->setSize('100%');
        $descri_comanda->setSize('100%');
        $desconto_padrao->setSize('100%');
        $r_menor->setSize('100%');
        $cest->setSize('100%');
        $tem_promo->setSize('100%');
        $data_sinc->setSize('100%');
        $ordem->setSize('100%');
        $recebido_matriz->setSize('100%');
        $ocultado->setSize('100%');
        $imp_est->setSize('100%');
        $imp_mun->setSize('100%');
        $imp_fed->setSize('100%');
        $unificar_sempre->setSize('100%');
        $recebido_proprio->setSize('100%');
        $codigo2->setSize('100%');
        $estoque_critico->setSize('100%');
        $manipulado_produzido->setSize('100%');
        $plano_contas->setSize('100%');
        $ficha_unit->setSize('100%');
        $insumo->setSize('100%');
        $venda->setSize('100%');
        $composicao->setSize('100%');
        $fator->setSize('100%');
        $regime_tributario->setSize('100%');
        $centro->setSize('100%');
        $indisponivel->setSize('100%');
        $franquia_royalty->setSize('100%');
        $franquia_mkt->setSize('100%');
        $montagem_preco_fixo->setSize('100%');
        $horario_customizado->setSize('100%');
        $tempo->setSize('100%');
        $comisssao->setSize('100%');
        $tempo_preparo->setSize('100%');
        $tara->setSize('100%');
        $peso->setSize('100%');
        $valor_peso->setSize('100%');
        $aliq_icms_reduc->setSize('100%');
        $tag->setSize('100%');
        $permite_desconto->setSize('100%');
        $integra_estoque->setSize('100%');
        $motivo_desoneracao->setSize('100%');
        $balanca_1->setSize('100%');
        $balanca_2->setSize('100%');
        $aliq_red_bc_efetivo->setSize('100%');
        $aliq_icms_efetivo->setSize('100%');
        $aliq_fcp->setSize('100%');
        $aliq_fcpst->setSize('100%');
        $cbenef->setSize('100%');
        $balanca_tela->setSize('100%');
        $ponto_peso->setSize('100%');
        $ponto_resgate->setSize('100%');
        $tipo_peso->setSize('100%');
        $menew_site->setSize('100%');
        $menew_descricao->setSize('100%');
        $sinc_temp->setSize('100%');



        if (!empty($id))
        {
            $id->setEditable(FALSE);
        }
        
        /** samples
         $fieldX->addValidation( 'Field X', new TRequiredValidator ); // add validation
         $fieldX->setSize( '100%' ); // set size
         **/
         
        // create the form actions
        $btn = $this->form->addAction(_t('Save'), new TAction([$this, 'onSave']), 'fa:save');
        $btn->class = 'btn btn-sm btn-primary';
        $this->form->addActionLink(_t('New'),  new TAction([$this, 'onEdit']), 'fa:eraser red');
        
        // vertical box container
        $container = new TVBox;
        $container->style = 'width: 100%';
        // $container->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
        $container->add($this->form);
        
        parent::add($container);
    }

    /**
     * Save form data
     * @param $param Request
     */
    public function onSave( $param )
    {
        try
        {
            TTransaction::open('portal'); // open a transaction
            
            /**
            // Enable Debug logger for SQL operations inside the transaction
            TTransaction::setLogger(new TLoggerSTD); // standard output
            TTransaction::setLogger(new TLoggerTXT('log.txt')); // file
            **/
            
            $this->form->validate(); // validate form data
            $data = $this->form->getData(); // get form data as array
            
            $object = new CkptProduto;  // create an empty object
            $object->fromArray( (array) $data); // load the object with data
            $object->store(); // save the object
            
            // get the generated id
            $data->id = $object->id;
            
            $this->form->setData($data); // fill form data
            TTransaction::close(); // close the transaction
            
            new TMessage('info', AdiantiCoreTranslator::translate('Record saved'));
        }
        catch (Exception $e) // in case of exception
        {
            new TMessage('error', $e->getMessage()); // shows the exception error message
            $this->form->setData( $this->form->getData() ); // keep form data
            TTransaction::rollback(); // undo all pending operations
        }
    }
    
    /**
     * Clear form data
     * @param $param Request
     */
    public function onClear( $param )
    {
        $this->form->clear(TRUE);
    }
    
    /**
     * Load object to form data
     * @param $param Request
     */
    public function onEdit( $param )
    {
        try
        {
            if (isset($param['key']))
            {
                $key = $param['key'];  // get the parameter $key
                TTransaction::open('portal'); // open a transaction
                $object = new CkptProduto($key); // instantiates the Active Record
                $this->form->setData($object); // fill the form
                TTransaction::close(); // close the transaction
            }
            else
            {
                $this->form->clear(TRUE);
            }
        }
        catch (Exception $e) // in case of exception
        {
            new TMessage('error', $e->getMessage()); // shows the exception error message
            TTransaction::rollback(); // undo all pending operations
        }
    }
}
