<?php

namespace App\Http\Controllers;
use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use App\Models\Article;
use Auth;
class ArticleController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
       $posts= Article::with('user')->get();
            return view('home',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('post.createpost');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
      try{
        $path= uploud_file('images',$request->photo->hashName(),$request->photo);
        Article::create([
            'title'=>$request->title,
            'content'=>$request->content,
            'highlight'=>$request->highlight,
            'photo'=>"storage/".$path,
            'user_id'=>Auth::user()->id
        ]);
      }
      catch(Expection $ex){
        return \redirect('/posts')->withErrors(["err"=>$ex]);
      }
      return \redirect('/posts')->withErrors(["suc"=>"تم  بنجاح"]);
        //
       

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
    $post=Article::find($id);
    if(isset($post)){
        $canupdate=false;
    if(Auth::user()->id==$post->user_id){
        $canupdate=true;
    }
   
        return \view('post.singlePost',\compact('post','canupdate')); 
    }
    else{
        return \redirect('/posts');
    }
    
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
        $post=Article::find($id);
        if(isset($post))
        return \view('post.edit',\compact('post'));
    return \redirect('/posts')->withErrors(["err"=>"هذا العنصر غير موجود"]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        //
       
        try{
            $post= Article::find($id);
            if(isset($post)){
                 if($request->request->has('photo')){
                 $path= uploud_file('images',$request->photo->hashName(),$request->photo);
            $post->update([
                'title'=>$request->title,
                'content'=>$request->content,
                'highlight'=>$request->highlight,
                'photo'=>"storage/".$path,
                'user_id'=>Auth::user()->id
            ]); 
            }
            else{
                $post->update([
                    'title'=>$request->title,
                    'content'=>$request->content,
                    'highlight'=>$request->highlight, 
                    'user_id'=>Auth::user()->id
                ]);   
            }
            return \redirect('/posts')->withErrors(["suc"=>"تم بنجاح"]);
            }
           
          
          }
          catch(Expection $ex){
            return \redirect('/posts')->withErrors(["error"=>$ex]);
          }
        
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
        $post= Article::find($id);
        if(isset($post)){
        $post->delete();
        return \redirect('/posts')->withErrors(["suc"=>"sucess"]);
        }
        return \redirect('/posts')->withErrors(["error"=>"error"]);
    }
}
