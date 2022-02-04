<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class BackupController extends Controller
{
    public function index()
    {
        return view('admin.settings.backups.index');
    }

    public function backupSimple()
    {
        Artisan::call('backup:run --only-db --disable-notifications');
        $output = Artisan::output();

        dd($output);
        return view('admin.settings.backups.index');
    }

    public function backupComplete()
    {
        Artisan::call('backup:run --disable-notifications');
        $output = Artisan::output();

        dd($output);
        
        flash('Backup Criado com Sucesso!')->success();
        return redirect()->route('admin.settings.backup.index');
        //return view('admin.settings.backups.index');
    }

}
