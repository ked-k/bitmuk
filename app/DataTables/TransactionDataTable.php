<?php

namespace App\DataTables;

use App\Models\Transaction;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class TransactionDataTable extends DataTable
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
            ->editColumn('trxid', '{{ strtoupper($trxid) }}')
            ->editColumn('created_at', 'backend.common.date')
            ->editColumn('status', 'backend.transaction.status')
            ->editColumn('payment_status', '{{ underscoreToCamelCase($payment_status) }}')
            ->editColumn('type', '{{ underscoreToCamelCase($type) }}')
            ->rawColumns(['status']);
    }

    /**
     * Get query source of dataTable. assets/images/avatar/avatar-1.png
     *
     * @param \App\Models\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Transaction $model)
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
            'trxid' => new Column(['title' => 'Transaction ID', 'data' => 'trxid']),
            'currency_amount' => new Column(['title' => 'Amount', 'data' => 'currency_amount']),
            'type' => new Column(['title' => 'Type', 'data' => 'type']),
            'gateway' => new Column(['title' => 'Gateway', 'data' => 'gateway']),
            'wallet_name' => new Column(['title' => 'Wallet Name', 'data' => 'wallet_name']),
            'payment_status' => new Column(['title' => 'Payment Status', 'data' => 'payment_status']),
            'created_at' => new Column(['title' => 'Created At', 'data' => 'created_at']),
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
        return 'transactions_datatable_' . time();
    }
}
