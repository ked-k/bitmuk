<?php

namespace App\DataTables;

use App\Models\Withdraw;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class WithdrawDataTable extends DataTable
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
        return $dataTable->addColumn('full_name', 'backend.transaction.full_name')
            ->addColumn('account_info', 'backend.withdraw.account_info')
            ->addColumn('wallet_name', 'backend.withdraw.wallet_name')
            ->editColumn('created_at', 'backend.common.date')
            ->editColumn('status', 'backend.withdraw.status')
            ->rawColumns(['status', 'account_info']);
    }

    /**
     * Get query source of dataTable. assets/images/avatar/avatar-1.png
     *
     * @param \App\Models\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Withdraw $model)
    {
        return $model->latest()->newQuery();
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
//            ->addAction(['width' => '120px', 'printable' => false, 'title' => 'action' ])
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
            'full_name' => new Column(['title' => 'Full Name', 'data' => 'full_name']),
            'currency_amount' => new Column(['title' => 'Amount', 'data' => 'currency_amount']),
            'wallet_name' => new Column(['title' => 'Wallet Name', 'data' => 'wallet_name']),
            'created_at' => new Column(['title' => 'Created At', 'data' => 'created_at']),
            'account_info' => new Column(['title' => 'Account Info', 'data' => 'account_info']),
            'status' => new Column(['title' => 'Status', 'data' => 'status']),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'withdraws_datatable_' . time();
    }
}
