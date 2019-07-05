<?php

namespace App\Http\Controllers\Backend;

use App\MOdels\Carousel;
use App\Models\Category;
use App\Models\Media;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Models\Blog;


class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs=Blog::orderBy('id', 'DESC')->get();
        return view('Backend.includes.blog.blog-manage', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=[];
        $data['categories']=Category::orderBy('category_name', 'ASC')->get();
        $data['subcategories']=SubCategory::orderBy('subcategory_name', 'ASC')->get();

        return view('Backend.includes.blog.blog-create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator=Validator::make($request->all(), [
            'category_id' =>'required',
            'subcategory_id' =>'required',
            'blog_title' =>'required|min:5|max:120',
            'blog_short_description' =>'required|min:5|max:120',
            'blog_long_description' =>'required|min:5',
            'author_name' =>'required|min:2',
            'blog_image' =>'required',
            'publication_status' =>'required',
        ]);

        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }



        try{

            $blog = Blog::create([
                'admin_id'=>auth()->user()->id,
                'category_id'=>$request->input('category_id'),
                'sub_category_id'=>$request->input('subcategory_id'),
                'blog_title'=>$request->input('blog_title'),
                'blog_short_description'=>$request->input('blog_short_description'),
                'blog_long_description'=>$request->input('blog_long_description'),
                'author_name'=>$request->input('author_name'),
                'publication_status'=>$request->input('publication_status'),

            ]);


        }catch (\Exception $e){
            $this->setWarning('Please valid input');
        }


        $blog->addMedia($request->file('blog_image'))->toMediaCollection('blog');


        $this->setSuccess('Your Blog created successfully done');
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
        $data=[];
        $data['categories']=Category::orderBy('category_name', 'ASC')->get();
        $data['subcategories']=SubCategory::orderBy('subcategory_name', 'ASC')->get();
        $data['blog']=Blog::find($id);
        return view('Backend.includes.blog.blog-edit', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $validator=Validator::make($request->all(), [
            'category_id' =>'required',
            'subcategory_id' =>'required',
            'blog_title' =>'required|min:5|max:120',
            'blog_short_description' =>'required|min:5|max:120',
            'blog_long_description' =>'required|min:5',
            'author_name' =>'required|min:2',
            'publication_status' =>'required',
        ]);

        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }


        $blog=Blog::find($id);

        try{

            $blog->update([
                'admin_id'=>auth()->user()->id,
                'category_id'=>$request->input('category_id'),
                'sub_category_id'=>$request->input('subcategory_id'),
                'blog_title'=>$request->input('blog_title'),
                'blog_short_description'=>$request->input('blog_short_description'),
                'blog_long_description'=>$request->input('blog_long_description'),
                'author_name'=>$request->input('author_name'),
                'publication_status'=>$request->input('publication_status'),

            ]);


        }catch (\Exception $e){
            $this->setWarning('Please valid input');
        }


        if ($request->file('blog_image')){
            $existingImage=Media::where('model_id', $id)
                ->where('collection_name', 'blog')
                ->first();

            $newFile = $request->file('blog_image');
            $existingImage->updateFile($newFile);
        }



        $this->setSuccess('Your Blog updated successfully done');
        return redirect()->route('blog.index');
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


    public function publishedBlog($id){


        $blog=Blog::find($id);

        $blog->publication_status = 1 ;
        $blog->save();

        $this->setSuccess('Your blog Published successfully done');
        return redirect()->back();
    }
    public function unpublishedBlog($id){

        $blog=Blog::find($id);

        $blog->publication_status =0;
        $blog->save();

        $this->setSuccess('Your blog Published successfully done');
        return redirect()->back();
    }

    public function deleteBlog($id){
        $blog=Blog::find($id);

        $blog->delete();
        $this->setSuccess('Your blog deleted successfully done !');
        return redirect()->back();
    }


}
