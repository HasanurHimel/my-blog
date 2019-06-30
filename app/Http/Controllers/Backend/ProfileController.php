<?php

namespace App\Http\Controllers\Backend;

use App\Models\Profile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use mysql_xdevapi\Exception;
use App\Models\Media;
use Validator;

class ProfileController extends Controller
{

    public function index()
    {
        return view('Backend.includes.profile.create-profile');


    }


    public function create()
    {

    }

    public function store(Request $request)
    {

//        $validator=Validator::make($request->all(), [
//
//            'designation' =>'required|min:5|max:100',
//            'experience' =>'required|min:6',
//
//            'publication_status' =>'required',
//        ]);
//
//        if ($validator->fails()){
//            return redirect()->back()->withErrors($validator)->withInput();
//        }
//
//
//
//        try{
//
//            $profile=Profile::create([
//                'name'=>$request->input('name'),
//                'email'=>$request->input('email'),
//                'designation'=>trim($request->input('designation')),
//                'experience'=>trim($request->input('experience')),
//                'publication_status'=>$request->input('publication_status')
//            ]);
//
//
//        }catch (\Exception $e){
//            $this->setWarning('Please valid input');
//        }
//
//
//
//
//        $profile->addMedia($request->file('image'))->toMediaCollection('profile');
//
//
//        $this->setSuccess('Your profile Updated successfully done');
//        return redirect()->back();

    }


    public function show($id)
    {
        $profile=Profile::find($id);

        return view('Backend.includes.profile.edit-profile', ['profile'=>$profile]);
    }



    public function edit($id)
    {

    }



    public function update(Request $request, $id)

    {

        $validator=Validator::make($request->all(), [

            'designation' =>'required|min:5|max:100',
            'experience' =>'required|min:6',

            'publication_status' =>'required',
        ]);

        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $profile_data=Profile::find($id);

        try{

            $profile_data->update([
                'name'=>$request->input('name'),
                'email'=>$request->input('email'),
                'designation'=>trim($request->input('designation')),
                'experience'=>trim($request->input('experience')),
                'publication_status'=>$request->input('publication_status')
            ]);


        }catch (\Exception $e){
            $this->setWarning('Please valid input');
        }

        if ($request->hasFile('image')){

            $existingImage=Media::where('model_id', $id)
                ->where('collection_name', 'profile')
                ->first();

            $newFile = $request->file('image');
            if ($existingImage){
                $existingImage->updateFile($newFile);
            }else{
                $profile_data->addMedia($request->file('image'))->toMediaCollection('profile');
            }



        }


        $this->setSuccess('Your profile Updated successfully done');
        return redirect()->back();





    }

    public function destroy($id)
    {
        //
    }
}
