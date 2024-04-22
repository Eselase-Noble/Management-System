<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    // use PasswordValidationRules;
    function login(Request $request){
        $user = User::where('email', $request->email)->first();

        if(! Hash::check($request->password, $user->password)){
            return response()->json([
                'error' => 'The password is incorrect',
            ], 422);
        }

        $device = substr($request->userAgent() ?? '', 0, 255);

        return response()->json([
            'token' => $user->createToken($device)->plainTextToken,
            'surname' => $user->surname,
        ]);
    }

    public function getALlUsers(){
        $users = User::all();
        return response()->json($users);
    }

    public function getUserByID($id){
        $user = User::find($id);
        if(!$user){
            return response()->json(['error' => 'User not found'], 404);
        }
        return response()->json($user);
    }


    public function register(Request $request){
        $input = $request->all();
        $validator =  Validator::make($input, [
            'surname' => ['required', 'string', 'max:255'],
            'othernames' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255','unique:users'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            // 'terms' => 
            // Jetstream::hasTermsAndPrivacyFeature() ? ['accpeted', 'required']: '', 

        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }
            //New user instance
        $user = new User();
        $user->surname = $input['surname'];
        $user->othernames = $input['othernames'];
        $user->email = $input['email'];
        $user->username = $input['username'];
        $user->password = Hash::make($input['password']);

        //save the user to the users table
        $user->save();

        return response()->json([
            'message' => 'User registered successfully',
             'token' => $user->remember_token,
             'surname' => $user->surname,
    ], 201);
    }

    public function update(Request $request, $id){
        $user = User::find($id);

        if(!$user){
            return response()->json(['error' => 'User not found'], 404);

        }

        $validator = Validator::make($request->all(), [
            'surname' => ['required', 'string', 'max:255'],
            'othernames' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255','unique:users,email,' .$id],
            'username' => ['required', 'string', 'max:255', 'unique:users,username,' .$id],
            'password' => $this->passwordRules(),
        ]);

        //check if it did not validate 
        if($validator->fails()){
            return response()->json(['error' => $validator->errors()], 422);
        }

        //Edit the user data to be updated
        $user->surname = $request->surname;
        $user->othernames = $request->othernames;
        $user->email = $request->email;
        $user->username = $request->username;

        if($request->has('password')){
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return response()->json(['message' => 'User updated successfully']);
        }


      //delete user from users where id = {$id}
        public function delete($id){
            $user =User::find($id);

            //Find the user by ID;
            if(!$user){
                return respose()->json(['message' => 'User not found'], 404);
            }

            //delete the user
            $user->delete();

            return response()->json(['message' => 'User deleted successfully']);
        }

    protected function passwordRules()
    {
        return [
            'required',
            'string',
           // 'confirmed', // Ensure password_confirmation field is present and matches password
            //Password::min(8) // Minimum length of 8 characters
                // ->letters() // At least one letter
                // ->mixedCase() // Contains both uppercase and lowercase letters
                // ->numbers() // Contains at least one number
                // ->symbols(), // Contains at least one symbol
        ];
    }
}
