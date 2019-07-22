<?php

namespace App\Http\Controllers;

use Artisan;
use Log;
use Illuminate\Http\Request;

class BackupController extends Controller
{
    public function backup()
    {
        try {
            Artisan::call('backup:run --only-db');
            $output = Artisan::output();
            Log::info("Backpack -- new backup started from admin interface \r\n" . $output);
            redirect('/')->with('status','New database backup created.');
        } catch (Exception $e) {
            Flash::error($e->getMessage());
            return redirect()->back();
        }
    }
}
