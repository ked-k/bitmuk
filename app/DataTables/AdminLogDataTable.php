<?php

namespace App\DataTables;

use Spatie\Activitylog\Models\Activity;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class AdminLogDataTable extends DataTable
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
        return $dataTable->editColumn('created_at', 'backend.common.date')
            ->editColumn('properties', 'backend.log.properties')
            ->rawColumns(['properties']);
    }

    /**
     * Get query source of dataTable. assets/images/avatar/avatar-1.png
     *
     * @param \App\Models\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Activity $model)
    {
        return $model->where('causer_type', 'App\Models\admin')->newQuery();
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
            'log_name' => new Column(['title' => 'Log Name', 'data' => 'log_name']),
            'description' => new Column(['title' => 'Description', 'data' => 'description']),
            'subject_type ' => new Column(['title' => 'Subject Type', 'data' => 'subject_type']),
            'causer_type ' => new Column(['title' => 'Causer Type', 'data' => 'causer_type']),
            'properties ' => new Column(['title' => 'Properties', 'data' => 'properties']),
            'created_at ' => new Column(['title' => 'Created At', 'data' => 'created_at']),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'admin_logs_datatable_' . time();
    }
}
