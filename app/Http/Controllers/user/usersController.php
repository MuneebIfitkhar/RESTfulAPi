<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\User\usersController;
use App\Models\User;

class usersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return response()->json(['data'=> $users] ,200 );
        //return $users;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' =>'required|min:8|confirmed',
        ];
        $this->validate($request ,$rules);
        $data = $request->all();
        $data['password'] = bcsqrt($request->password);
        $data['verified'] =User::UNVERIFIED_USER ;
        $data['verification_token'] = User::genrateVerificationCode();
        $data['admin'] = User::REGULAR_USER;

        $user = User::create($data);

        return response()->json(['data' => $user] ,201);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findorfail($id);
        return response()->json(['data' => $user] ,200);
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
        $user = User::findorfail($id);
      $rules = 
      [
          'email' => 'email|unique:users ,email ,' . $user->id,
          'password' =>'min:8|confirmed',
          'admin' => 'in:' . User::ADMIN_USER . ',' . User::REGULAR_USER,
      ];
     
      $this->validate($request,$rules);

      if($request->has('name'))
      {
          $user->name = $request->name;
      }
      if($request->has('email') && $user->email != $request->email)
      {
          $user->verified = User::UNVERIFIED_USER;
          $user->verification_token = User::genrateVerificationCode();
          $user->email = $request->email;
      }

      if($request->has('password'))
      {
          $user->password = bcrypt($request->password);           
      }

      if($request->has('admin'))
      {
          if(!$user->isVerified()){
              return response()->json(['error' => 'Only verified users can modify the admin field' , 'code' => 409] , 409);
          }
          $user->admin = $request->admin;
      }
      if(!$user->isDirty())
      {
          return response()->json(['error' => 'You need to specify a different value to update' , 'code' => 422] , 422);
      }
      $user->save();

      return response()->json(['data' => $user]);



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findorfail($id);

        $user->delete();

        return response()->json(['data'=> $user] , 200);
    }
}
