<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        $users = UserResource::collection(User::paginate(5));
        return  $users;
//      return response()->json($users,200);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'name' => 'required|string|max:50',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|max:6'
        ]);

        if ($validate->fails()){
            return response()->json([
                'success' => false,
                'message' => 'Bir hata oluştu',
                'errors' => $validate->errors()
            ],422); // girilen verilerin geçersiz olduğunu gösteren hata kodu
        }

        $data = $request->only('name','email','password');
        $data['password'] = bcrypt($data['password']);

        User::create($data);
        return response()->json([
            'success' => true,
            'message' => 'Kaydedildi'
        ]);

    }

    /**
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        $user = new UserResource(User::find($id));
        return response()->json($user,200);
    }

    /**
     * @param Request $request
     * @param User $user
     * @return JsonResponse
     */
    public function update(Request $request, User $user)
    {
        $validate = Validator::make($request->all(),[
            'name' => 'required|string|max:50',
            'email' => 'required|string|email|unique:users,email,' . $user->id,
            'password' => 'required|string|max:6'
        ]);

        if ($validate->fails()){
            return response()->json([
                'success' => false,
                'message' => 'Bir hata oluştu',
                'errors' => $validate->errors()
            ],422); // girilen verilerin geçersiz olduğunu gösteren hata kodu
        }

        $data = $request->only('name','email','password');
        $data['password'] = bcrypt($data['password']);

        $user->update($data);
        return response()->json([
            'success' => true,
            'message' => 'Güncellendi'
        ]);
    }

    /**
     * @param User $user
     * @return JsonResponse
     * @throws \Exception
     */
    public function destroy(User $user)
    {
        $user->delete();
        return response()->json([
            'success' => true,
            'message' => 'Silindi'
        ]);
    }
}
