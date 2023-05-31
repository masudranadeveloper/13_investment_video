<?php

namespace App\Http\Controllers\frontend\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\user_package;
use App\Models\task_ads;

class frontend_admin_tools_controller extends Controller
{
    // daynamic_task
    public function daynamic_task(Request $req)
    {
        return view('admin.pages.tools.dynamin_task');
    }

    // dynamic_package
    public function dynamic_package(Request $req)
    {
        $user_account = user_package::orderBy('id', 'ASC') -> paginate(10);
        $compact = compact('user_account');
        return view('admin.pages.tools.dynamic_package') -> with($compact);
    }

    // dynamic_package_add
    public function dynamic_package_add(Request $req)
    {
        return view('admin.pages.tools.dynamic_package_add');
    }

    // dynamic_package_update
    public function dynamic_package_update($id)
    {
        $user_account = user_package::findOrFail($id);
        $compact = compact('user_account', 'id');
        return view('admin.pages.tools.dynamic_package_update') -> with($compact);
    }
    // ----------
    // ads

    // tools_ads_show
    public function tools_ads_show(Request $req)
    {
        $user_account = task_ads::orderBy('id', 'DESC') -> paginate(10);
        $compact = compact('user_account');
        return view('admin.pages.tools.task_ads.show') -> with($compact);
    }

    // tools_ads_add
    public function tools_ads_add(Request $req)
    {
        return view('admin.pages.tools.task_ads.add');
    }

    // tools_ads_update
    public function tools_ads_update($id)
    {
        $user_account = task_ads::findOrFail($id);
        $compact = compact('user_account', 'id');
        return view('admin.pages.tools.task_ads.update') -> with($compact);
    }
}
