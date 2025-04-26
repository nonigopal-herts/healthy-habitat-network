<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\ProductServiceCategory;
use App\Models\ProductServiceSubcategory;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class RegisterController extends Controller
{
    // Role constants
    const ROLE_COUNCIL = 2;
    const ROLE_BUSINESS = 3;
    const ROLE_RESIDENT = 4;

    /**
     * Show the registration form with role selection
     */
    public function showRegistrationForm()
    {
        $areas = Area::all();
        $interests = ProductServiceCategory::all();
        return view('frontend.registration2', compact('areas', 'interests'));
    }

    /**
     * Handle a registration request
     */
    public function register(Request $request)
    {
        // Validate based on user type
        $validator = $this->validator($request->all());
        //dd($validator, $validator->fails());


        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Create user
        $user = $this->createUser($request->all());

        // Create user details
        $userDetails = $this->createUserDetails($user, $request->all());

        $result = event(new Registered($user));
        //auth()->login($user);
//        if (!$result) {
//            return redirect()->back()->withErrors(['msg' => 'Registration completed successfully!']);
//        }

        //return redirect()->back()->with('success', 'Registration completed successfully!');


        return redirect('login');
    }

    /**
     * Get a validator for registration data based on user type
     */
    protected function validator(array $data)
    {
        $baseRules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'contact_info' => 'required|string|max:255',
            'role_id' => 'required|in:2,3,4',
        ];

        // Role-specific validations
        switch ($data['role_id']) {
            case 2:
                $rules = [
                    'area_id' => 'required|exists:areas,id',
                ];
                break;

            case 3:
                $rules = [
                    'area_id' => 'required|exists:areas,id',
                    'address' => 'required|string|max:500',
                    'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                ];

                break;

            case 4:
                $rules = [
                    'age' => 'required|integer|min:18',
                    'gender' => 'required|in:male,female,other',
                    'area_id' => 'required|exists:areas,id',
                    'interests' => 'nullable|array', // Changed to array validation
                    'interests.*' => 'string|max:100', // Validate each interest item
                ];
                break;

            default:
                $rules = [];
                break;
        }

        //dd(array_merge($baseRules, $rules));
        return Validator::make($data, array_merge($baseRules, $rules));
    }

    /**
     * Create a new user instance
     */
    protected function createUser(array $data)
    {
        //dd("Create user data:", $data);
        // Safely get role ID with null coalescing operator
//        $roleId = [
//            'resident' => self::ROLE_RESIDENT,
//            'council' => self::ROLE_COUNCIL,
//            'business' => self::ROLE_BUSINESS,
//        ][$data['role_id']] ?? self::ROLE_RESIDENT; // Default to resident if not found
        //dd($roleId);

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role_id' => $data['role_id'],
            'area_id' => $data['area_id'],
        ]);
    }

    /**
     * Create user details based on role
     */
    protected function createUserDetails(User $user, array $data)
    {
        $details = ['user_id' => $user->id, 'contact_info' => $data['contact_info']];

        switch ($data['role_id']) {
//            case 2:
//                $details = array_merge($details, [
//                    'area_id' => $data['area_id'],
//                ]);
//
//                break;

            case 3:
                $details = array_merge($details, [
                    'address' => $data['address'],
                ]);

                if (isset($data['logo'])) {
                    $details['logo'] = $data['logo']->store('logos', 'public');
                }
                break;

            case 4:
                $details = array_merge($details, [
                    'age' => $data['age'],
                    'gender' => $data['gender'],
                    //'area_id' => $data['area_id'],
                    'interests' => isset($data['interests']) ?
                        json_encode($data['interests']) : null, // Store as JSON if array

                ]);
                break;
        }

        return UserDetail::create($details);
    }

    /**
     * Get the post-registration redirect path based on role
     */
    protected function redirectPath(User $user)
    {
        return match($user->role_id) {
            self::ROLE_RESIDENT => '/',
            self::ROLE_COUNCIL => 'dashboard.dashboard-council',
            self::ROLE_BUSINESS => 'dashboard.dashboard-business',
            default => 'dashboard.dashboard',
        };
    }
}
