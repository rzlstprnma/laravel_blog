<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Profile;
use App\Skill;
use App\SocialMedia;
use App\Portfolio;

class userController extends Controller
{
    /**
     * Profile Data 
     */

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.profile_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $profile = Profile::create($request->all());
        if($request->hasFile('photo'))
        {
            $request->file('photo')->move('images/user_images/', $request->file('photo')->getClientOriginalName());
            $profile->photo = $request->file('photo')->getClientOriginalName();
            $profile->save();
        }
        return redirect('/admin/user_profile');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profile = Profile::find($id);
        return view('admin.profile_edit', compact('profile'));
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
        $profile = Profile::find($id);
        $profile->update($request->all());
        if($request->hasFile('photo'))
        {
            $request->file('photo')->move('images/user_images/', $request->file('photo')->getClientOriginalName());
            $profile->photo = $request->file('photo')->getClientOriginalName();
            $profile->update();
        }

        return redirect('/admin/user_profile');
    }

    public function profileDestroy($id){
        Profile::destroy($id);

        return redirect()->back();
    }  

    /**
     * End of Profile data
     */



    /**
     * Skill CRUD
     */


    public function skillStore(Request $request){
        $skill = Skill::create($request->all());
        
        return redirect('/admin/user_profile');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function skillDestroy($id)
    {
        Skill::destroy($id);
        return redirect()->back();
    }

    /**
     * End of Skill CRUD
     */


     /**
      * Social Media Crud
      */

    public function socialMediaStore(Request $request){
        SocialMedia::create($request->all());
        return redirect()->back();
    }

    public function socialMediaDestroy($id){
        SocialMedia::destroy($id);
        return redirect()->back();
    }

      /**
       * End of Social Media CRUD
       */




    /**
     * Portfolio CRUD 
     */ 

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function portfolioCreate()
    {
        return view('admin.portfolio_create');
    }

    public function portfolioStore(Request $request){
        $portfolio = Portfolio::create($request->all());
        if($request->hasFile('photo'))
        {
            $request->file('photo')->move('images/portfolio_images/', $request->file('photo')->getClientOriginalName());
            $portfolio->photo = $request->file('photo')->getClientOriginalName();
            $portfolio->save();
        }
        return redirect('/admin/user_profile');
    }

    public function portfolioDestroy($id){
        Portfolio::destroy($id);
        return redirect()->back();
    }

    /**
     * End of Portfolio CRUD
     */
}
