<?php

namespace Modules\Auth\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Modules\Auth\Http\Requests\StoreUserRequest;
use Modules\Auth\Http\Requests\UpdateUserRequest;
use Modules\Auth\Interfaces\UserInterface;
use Modules\Base\Http\Controllers\ApiBaseController;

class ApiAuthController extends ApiBaseController
{
    protected $userRepository;

    public function __construct(UserInterface $userRepository)
    {
        parent::__construct($userRepository);

        $this->userRepository = $userRepository;
    }

    public function login()
    {
        $credentials = request(['email', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    public function me()
    {
        return response()->json(auth()->user());
    }

    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), (new StoreUserRequest())->rules());

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = $validator->validated();

        try {
            $data['password'] = bcrypt($data['password']);

            $this->userRepository->store($data);

            return response()->json([
                'message' => 'User created successfully',
                'user' => $data,
            ], 200);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), (new UpdateUserRequest())->rules());

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = $validator->validated();

        try {
            $data['password'] = bcrypt($data['password']);

            $this->userRepository->update($data, $id);

            return response()->json([
                'message' => 'User updated successfully',
                'user' => $data,
            ], 200);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
