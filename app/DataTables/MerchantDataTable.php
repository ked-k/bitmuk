<?php

namespace App\DataTables;

use App\Models\User;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class MerchantDataTable extends DataTable
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
        return $dataTable->addColumn('action', 'backend.users.datatables_actions')
            ->editColumn('created_at', 'backend.common.date')
            ->editColumn('avatar', '<figure class="avatar mr-2 avatar-l"><img src="{{ avatar($avatar) }}" ></figure>')
            ->rawColumns(['avatar', 'action']);
    }

    /**
     * Get query source of dataTable. assets/images/avatar/avatar-1.png
     *
     * @param \App\Models\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
    {
        return $model->where('role', 'merchant')->newQuery();
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
            'avatar' => new Column(['title' => 'Avatar', 'data' => 'avatar']),
            'first_name' => new Column(['title' => 'First Name', 'data' => 'first_name']),
            'last_name' => new Column(['title' => 'Last Name', 'data' => 'last_name']),
            'email' => new Column(['title' => 'Email', 'data' => 'email']),
            'phone' => new Column(['title' => 'Phone', 'data' => 'phone']),
            'city' => new Column(['title' => 'City', 'data' => 'city']),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'users_datatable_' . time();
    }
}
