<?php

namespace App\Http\Services;

class UploadService
{
    public function store($request){
        /*tu khoa tim kiem file upload laravel - document*/
        if($request->hasFile('file'))
        {
//            $path = $request->file('file')->store('public/uploads');
            try {
                $name = $request->file('file')->getClientOriginalName();
                $pathFull = 'uploads/'.date('Y/m/d');
                $path = $request->file('file')->storeAs(
                    'public/'.$pathFull,$name
                );
                return '/storage/'.$pathFull.'/'.$name;
            }catch (\Exception $error){
                return false;
            }

        }
    }
}
