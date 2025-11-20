<?php

namespace App\Http\Controllers\CommandCenter;

use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;

class CommandCenterController extends Controller
{

    public function index(){
        return view('command-center.command-center');
    }

    public function commandCenter(Request $request){
        $response = '';
        if($request->isMethod('post')){
            $command = $request->command;
            $args = $request->args;
            $args = (isset($args)) ? ' '.$args : '';
            try{
                Artisan::call($command.$args);
                $response = Artisan::output();
            }catch(Exception $e){ abort($e->getCode(), $e->getMessage()); }
        }else{ abort(405, $request->method().' method not allowed!'); }
        return response()->json(['response' => $response]);
    }
}
