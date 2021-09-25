<?php
/**
 * CkptProdutoList Listing
 * @author  <your name here>
 */
class CkptProdutoList extends TPage
{
    protected $form;     // registration form
    protected $datagrid; // listing
    protected $pageNavigation;
    protected $formgrid;
    protected $deleteButton;
    
    use Adianti\base\AdiantiStandardListTrait;
    
    /**
     * Page constructor
     */
    public function __construct()
    {
        parent::__construct();
        
        $this->setDatabase('portal');            // defines the database
        $this->setActiveRecord('CkptProduto');   // defines the active record
        $this->setDefaultOrder('id', 'asc');         // defines the default order
        $this->setLimit(20);
        // $this->setCriteria($criteria) // define a standard filter

        $this->addFilterField('estabelecimento', '=', 'estabelecimento'); // filterField, operator, formField
        $this->addFilterField('codigo', 'like', 'codigo'); // filterField, operator, formField
        $this->addFilterField('nome', 'like', 'nome'); // filterField, operator, formField
        
        // creates the form
        $this->form = new BootstrapFormBuilder('form_search_CkptProduto');
        $this->form->setFormTitle('Lista de Produtos');
        

        // create the form fields
        $estabelecimento = new TEntry('estabelecimento');
        $codigo = new TEntry('codigo');
        $nome = new TEntry('nome');


        // add the fields
        $this->form->addFields( [ new TLabel('Estabelecimento') ], [ $estabelecimento ] );
        $this->form->addFields( [ new TLabel('Codigo') ], [ $codigo ] );
        $this->form->addFields( [ new TLabel('Nome') ], [ $nome ] );

        $estabelecimento->addValidation('Estabelecimento', new TRequiredValidator);


        // set sizes
        $estabelecimento->setSize('100%');
        $codigo->setSize('100%');
        $nome->setSize('100%');

        
        
        // keep the form filled during navigation with session data
        $this->form->setData( TSession::getValue(__CLASS__.'_filter_data') );
        
        // add the search form actions
        $btn = $this->form->addAction(_t('Find'), new TAction([$this, 'onSearch']), 'fa:search');
        $btn->class = 'btn btn-sm btn-primary';
        $this->form->addActionLink(_t('New'), new TAction(['CkptProdutoForm', 'onEdit']), 'fa:plus green');
        
        // creates a Datagrid
        $this->datagrid = new BootstrapDatagridWrapper(new TDataGrid);
        $this->datagrid->style = 'width: 100%';
        $this->datagrid->datatable = 'true';
        // $this->datagrid->enablePopover('Popover', 'Hi <b> {name} </b>');
        

        // creates the datagrid columns
        $column_codigo = new TDataGridColumn('codigo', 'Codigo', 'left');
        $column_nome = new TDataGridColumn('nome', 'Nome', 'left');
        $column_preco = new TDataGridColumn('preco', 'Preco', 'left');
        $column_tipo = new TDataGridColumn('tipo', 'Tipo', 'left');
        $column_ = new TDataGridColumn('', '', '');


        // add the columns to the DataGrid
        $this->datagrid->addColumn($column_codigo);
        $this->datagrid->addColumn($column_nome);
        $this->datagrid->addColumn($column_preco);
        $this->datagrid->addColumn($column_tipo);
        $this->datagrid->addColumn($column_);


        // creates the datagrid column actions
        $column_codigo->setAction(new TAction([$this, 'onReload']), ['order' => 'codigo']);
        $column_nome->setAction(new TAction([$this, 'onReload']), ['order' => 'nome']);

        // define the transformer method over image
        $column_preco->setTransformer( function($value, $object, $row) {
            if (is_numeric($value))
            {
                return 'R$ ' . number_format($value, 2, ',', '.');
            }
            return $value;
        });


        
        $action1 = new TDataGridAction(['CkptProdutoForm', 'onEdit'], ['id'=>'{id}']);
        $action2 = new TDataGridAction([$this, 'onDelete'], ['id'=>'{id}']);
        
        $this->datagrid->addAction($action1, _t('Edit'),   'far:edit blue');
        $this->datagrid->addAction($action2 ,_t('Delete'), 'far:trash-alt red');
        
        // create the datagrid model
        $this->datagrid->createModel();
        
        // creates the page navigation
        $this->pageNavigation = new TPageNavigation;
        $this->pageNavigation->setAction(new TAction([$this, 'onReload']));
        
        $panel = new TPanelGroup('', 'white');
        $panel->add($this->datagrid);
        $panel->addFooter($this->pageNavigation);
        
        // header actions
        $dropdown = new TDropDown(_t('Export'), 'fa:list');
        $dropdown->setPullSide('right');
        $dropdown->setButtonClass('btn btn-default waves-effect dropdown-toggle');
        $dropdown->addAction( _t('Save as CSV'), new TAction([$this, 'onExportCSV'], ['register_state' => 'false', 'static'=>'1']), 'fa:table blue' );
        $dropdown->addAction( _t('Save as PDF'), new TAction([$this, 'onExportPDF'], ['register_state' => 'false', 'static'=>'1']), 'far:file-pdf red' );
        $panel->addHeaderWidget( $dropdown );
        
        // vertical box container
        $container = new TVBox;
        $container->style = 'width: 100%';
        // $container->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
        $container->add($this->form);
        $container->add($panel);
        
        parent::add($container);
    }
}
