<?php

namespace App\Http\Controllers\seller;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Country;




class ProfileController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //r
    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function showProfile()
    {

        $user = auth()->user();
        $countries = Country::all();
        $selected = auth()->user()->location;

        return view('seller_account.profile', compact('user','countries', 'selected'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function updateProfileData(Request $request)
    {
        $user = auth()->user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->about_me = $request->about_me;
        $user->location = $request->location;
        $user->updated_at = now();
        $user->update();
        return redirect()->back();
    }


    public function deleteUser(){
        $user = auth()->user();
        $user->delete();
        return redirect('/signup');
    }



    public function updatePassword(Request $request)
    {
        # Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);


        #Match The Old Password
        if(!Hash::check($request->old_password, auth()->user()->password)){
            return back()->with("error", "Old Password Doesn't match!");
        }


        $user = Auth::user();
        $user->password = Hash::make($request->new_password);
        $user->save();

        return back()->with("status", "Password changed successfully!");
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */


    public function profileImageUpload(Request $request)
    {


        $request->validate([
            'image' => 'mimes:jpeg,bmp,png' // Only allow .jpg, .bmp and .png file types.
        ]);

        $this->deleteOldImage();

        // Save the file locally in the storage/public/ folder under a new folder named /product
        $request->file->store('image', 'public');


        // Store the record, using the new file hashname which will be it's new filename identity.
        $user = auth()->user();
        $user->image = $request->file->hashName();
        $user->update();


        return redirect()->back();
    }



    protected function deleteOldImage()
    {
        $fileName = auth()->user()->image;
        if ($fileName){
            Storage::delete('public/image/'.$fileName);
        }
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
