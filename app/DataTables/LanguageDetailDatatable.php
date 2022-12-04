<?php

namespace App\DataTables;

use App\Models\LanguageDetails;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class LanguageDetailDataTable extends DataTable
{


    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {


        $dataTable = new EloquentDataTable($query);
        return $dataTable
            ->addColumn('action', 'backend.language.language_details.datatables_actions');


    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\LanguageDetails $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(LanguageDetails $model)
    {

        return $model->where('language_id', $this->id);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false, 'title' => 'action'])
            ->parameters([
                'dom' => 'Bfrtip',
                'stateSave' => true,
                'order' => [[0, 'desc']],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'key' => new Column(['title' => 'Key', 'data' => 'key']),
            'value' => new Column(['title' => 'Hindi', 'data' => 'value']),

        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'languages_details_datatable_' . time();
    }
}
