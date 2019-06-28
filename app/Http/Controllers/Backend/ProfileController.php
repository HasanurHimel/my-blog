<?php

namespace App\Http\Controllers\Backend;

use App\Models\Profile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Storage;
use App\Http\Controllers\Controller;
use mysql_xdevapi\Exception;
use File;
use App\Models\Media;
use Validator;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Backend.includes.profile.create-profile');


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        return $request->file('image');
        $validator=Validator::make($request->all(), [

            'designation' =>'required|min:5|max:100',
            'experience' =>'required|min:6',

            'publication_status' =>'required',
        ]);

        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }



        try{

            $profile=Profile::create([
                'name'=>$request->input('name'),
                'email'=>$request->input('email'),
                'designation'=>trim($request->input('designation')),
                'experience'=>trim($request->input('experience')),
                'publication_status'=>$request->input('publication_status')
            ]);


        }catch (\Exception $e){
            $this->setWarning('Please valid input');
        }




        $profile->addMedia($request->file('image'))->toMediaCollection('profile');


        $this->setSuccess('Your profile Updated successfully done');
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profile=Profile::find(1);

        return view('Backend.includes.profile.edit-profile', ['profile'=>$profile]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)

    {

//
//        $existingImage=Media::where('model_id', $id)->first();
//
//        return $existingImage;

//        $existingImage=Media::where('model_id', $id)->first();
//return $existingImage->id;
//
//        Storage::deleteDirectory(public_path('4'));
//        $existingImage->delete();
//        return 'ok';
//
//
//        $existingImage=Media::where('model_id', $id)->first();
//
//        return $existingImage->id;

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


            $existingImage=Media::where('model_id', $id)->first();

            $newFile = $request->file('image');
            $existingImage->updateFile($newFile);



//            $existingImage=Media::where('model_id', $id)->first();
//            if ($existingImage){
//
//                Storage::deleteDirectory(storage_path('app/public/$existingImage->id'));
//                $existingImage->delete();
//            }
//
//            $profile_data->addMedia($request->file('image'))->toMediaCollection('profile');


        }


        $this->setSuccess('Your profile Updated successfully done');
        return redirect()->back();





    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
