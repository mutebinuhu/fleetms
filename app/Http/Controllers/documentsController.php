<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\repairrequest;
use  App\Document;
use Auth;

class documentsController extends Controller
{
    //
    public function store(repairrequest $request,Request $getData )
    {
    	$getData->validate([
    		'file_name'=>'required',
    		'file'=>'required',
    	]);
        $getFile = $getData->file('file');
        $getFileName = $getFile->getClientOriginalName();
        $getFile->move(public_path('/images'), $getFileName);


    	$formData = array(
    		'user_id' => Auth::id(),
    		'file_name'=>$getData->file_name,
    		'file'=>$getFileName,
    		'repairrequest_id' => $request->id,	
    	);
               
    	Document::create($formData);
    
    	return back();
    }
}
