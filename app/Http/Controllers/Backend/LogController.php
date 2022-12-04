<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\AdminLogDataTable;
use App\DataTables\LoginLogDataTable;
use App\Http\Controllers\Controller;

class LogController extends Controller
{
    public function adminLogActivity(AdminLogDataTable $adminLogDataTable)
    {

        return $adminLogDataTable->render('backend.log.admin_activity');
    }

    public function loginLogActivity(LoginLogDataTable $adminLogDataTable)
    {

        return $adminLogDataTable->render('backend.log.login_activity');
    }
}
