<?php
/**
 * AuditoriaPortalSeek Record selection
 * @author  <your name here>
 */
class AuditoriaPortalSeek extends TPage
{
    protected $form;     // search form
    protected $datagrid; // listing
    protected $pageNavigation;
    
    use Adianti\base\AdiantiStandardListTrait;
    
    /**
     * Page constructor
     */
    public function __construct()
    {
        parent::__construct();
        
        $this->setDatabase('portal');            // defines the database
        $this->setActiveRecord('AuditoriaPortal');   // defines the active record
        $this->setDefaultOrder('id', 'asc');         // defines the default order
        // $this->setCriteria($criteria) // define a standard filter

        $this->addFilterField('usuario', '=', 'usuario'); // filterField, operator, formField
        $this->addFilterField('metodo', 'like', 'metodo'); // filterField, operator, formField
        $this->addFilterField('parametros', 'like', 'parametros'); // filterField, operator, formField
        
        // creates the form
        $this->form = new BootstrapFormBuilder('form_search_AuditoriaPortal');
        $this->form->setFormTitle('AuditoriaPortal');
        

        // create the form fields
        $usuario = new TDBUniqueSearch('usuario', 'portal', 'Usuario', 'id', 'idusuario');
        $metodo = new TEntry('metodo');
        $parametros = new TEntry('parametros');


        // add the fields
        $this->form->addFields( [ new TLabel('Usuario') ], [ $usuario ] );
        $this->form->addFields( [ new TLabel('Metodo') ], [ $metodo ] );
        $this->form->addFields( [ new TLabel('Parametros') ], [ $parametros ] );


        // set sizes
        $usuario->setSize('100%');
        $metodo->setSize('100%');
        $parametros->setSize('100%');

        
        // keep the form filled during navigation with session data
        $this->form->setData( TSession::getValue(__CLASS__ . '_filter_data') );
        
        $btn = $this->form->addAction(_t('Find'), new TAction([$this, 'onSearch']), 'fa:search');
        $btn->class = 'btn btn-sm btn-primary';
        
        // creates a DataGrid
        $this->datagrid = new BootstrapDatagridWrapper(new TDataGrid);
        $this->datagrid->style = 'width: 100%';
        $this->datagrid->datatable = 'true';
        // $this->datagrid->enablePopover('Popover', 'Hi <b> {name} </b>');
        

        // creates the datagrid columns
        $column_id = new TDataGridColumn('id', 'Id', 'right');
        $column_usuario = new TDataGridColumn('usuario', 'Usuario', 'right');
        $column_metodo = new TDataGridColumn('metodo', 'Metodo', 'left');
        $column_parametros = new TDataGridColumn('parametros', 'Parametros', 'left');
        $column_migrated = new TDataGridColumn('migrated', 'Migrated', 'right');


        // add the columns to the DataGrid
        $this->datagrid->addColumn($column_id);
        $this->datagrid->addColumn($column_usuario);
        $this->datagrid->addColumn($column_metodo);
        $this->datagrid->addColumn($column_parametros);
        $this->datagrid->addColumn($column_migrated);

        $column_id->setTransformer([$this, 'formatRow'] );
        
        // creates the datagrid actions
        $action1 = new TDataGridAction([$this, 'onSelect'], ['id' => '{id}', 'register_state' => 'false']);
        //$action1->setUseButton(TRUE);
        $action1->setButtonClass('btn btn-default');
                
        // add the actions to the datagrid
        $this->datagrid->addAction($action1, 'Select', 'far:square fa-fw black');
        
        // create the datagrid model
        $this->datagrid->createModel();
        
        // create the page navigation
        $this->pageNavigation = new TPageNavigation;
        $this->pageNavigation->setAction(new TAction([$this, 'onReload']));
        
        $panel = new TPanelGroup;
        $panel->add($this->datagrid);
        $panel->addFooter($this->pageNavigation);
        $panel->addHeaderActionLink( 'Show results', new TAction([$this, 'showResults']), 'far:check-circle' );
        
        // vertical box container
        $container = new TVBox;
        $container->style = 'width: 100%';
        // $container->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
        $container->add($this->form);
        $container->add($panel);
        
        parent::add($container);
    }
    
    /**
     * Save the object reference in session
     */
    public function onSelect($param)
    {
        // get the selected objects from session 
        $selected_objects = TSession::getValue(__CLASS__.'_selected_objects');
        
        TTransaction::open('portal');
        $object = new AuditoriaPortal($param['key']); // load the object
        if (isset($selected_objects[$object->id]))
        {
            unset($selected_objects[$object->id]);
        }
        else
        {
            $selected_objects[$object->id] = $object->toArray(); // add the object inside the array
        }
        TSession::setValue(__CLASS__.'_selected_objects', $selected_objects); // put the array back to the session
        TTransaction::close();
        
        // reload datagrids
        $this->onReload( func_get_arg(0) );
    }
    
    /**
     * Highlight the selected rows
     */
    public function formatRow($value, $object, $row)
    {
        $selected_objects = TSession::getValue(__CLASS__.'_selected_objects');
        
        if ($selected_objects)
        {
            if (in_array( (int) $value, array_keys( $selected_objects ) ) )
            {
                $row->style = "background: #abdef9";
                
                $button = $row->find('i', ['class'=>'far fa-square fa-fw black'])[0];
                if ($button)
                {
                    $button->class = 'far fa-check-square fa-fw black';
                }
            }
        }
        
        return $value;
    }
    
    /**
     * Show selected records
     */
    public function showResults()
    {
        $datagrid = new BootstrapDatagridWrapper(new TDataGrid);
        $datagrid->width = '100%';
        $datagrid->addColumn( new TDataGridColumn('id',  'Id',  'right') );
        $datagrid->addColumn( new TDataGridColumn('usuario',  'Usuario',  'right') );
        $datagrid->addColumn( new TDataGridColumn('metodo',  'Metodo',  'left') );
        $datagrid->addColumn( new TDataGridColumn('parametros',  'Parametros',  'left') );
        $datagrid->addColumn( new TDataGridColumn('migrated',  'Migrated',  'right') );
        
        // create the datagrid model
        $datagrid->createModel();
        
        $selected_objects = TSession::getValue(__CLASS__.'_selected_objects');
        ksort($selected_objects);
        if ($selected_objects)
        {
            $datagrid->clear();
            foreach ($selected_objects as $selected_object)
            {
                $datagrid->addItem( (object) $selected_object );
            }
        }
        
        $win = TWindow::create('Results', 0.6, 0.6);
        $win->add($datagrid);
        $win->show();
    }
}
