<?php

namespace Modules\Store\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Modules\Auth\Interfaces\UserInterface;
use Modules\Base\Http\Controllers\ApiBaseController;
use Modules\Store\Http\Requests\StoreStoreRequest;
use Modules\Store\Http\Requests\UpdateStoreRequest;
use Modules\Store\Interfaces\StoreInterface;

class ApiStoreController extends ApiBaseController
{
    protected $userRepository;
    protected $storeRepository;

    public function __construct(StoreInterface $storeRepository, UserInterface $userRepository)
    {
        parent::__construct($storeRepository);

        $this->userRepository = $userRepository;
        $this->storeRepository = $storeRepository;
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), (new StoreStoreRequest())->rules());

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = $validator->validated();

        try {
            // create user
            $userData = [
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
                'role' => 4,
            ];
            $user = $this->userRepository->store($userData);
            $user->assignRole('store');
            $user->save();

            // create store
            $storeData = [
                'user_id' => $user->id,
                'store_name' => $data['store_name'],
                'store_slug' => makeSlug($data['store_name']),
                'store_logo' => uploadFile($data['store_logo']),
                'store_banner' => uploadFile($data['store_banner']),
                'store_address' => $data['store_address'],
                'store_type' => $data['store_type'],
            ];
            $store = $this->storeRepository->store($storeData);

            return response()->json([
                'message' => 'Store created successfuly',
                'store' => $store,
            ], 200);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), (new UpdateStoreRequest())->rules());

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = $validator->validated();

        try {
            $store = $this->storeRepository->find($id);

            if (!$store) {
                return response()->json([
                    'message' => 'Store not found',
                ], 404);
            }

            $storeData = [
                'store_name' => $data['store_name'],
                'store_slug' => makeSlug($data['store_name']),
                'store_address' => $data['store_address'],
            ];

            if (isset($data['store_logo'])) {
                $storeData['store_logo'] = uploadFile($data['store_logo']);
            }

            if (isset($data['store_banner'])) {
                $storeData['store_banner'] = uploadFile($data['store_banner']);
            }

            $this->storeRepository->update($storeData, $id);

            $userData = [];

            if (!empty($data['password'])) {
                $userData['password'] = bcrypt($data['password']);
            }

            if (!empty($data['email'])) {
                $userData['email'] = $data['email'];
            }

            $this->userRepository->update($userData, $store->user_id);

            return response()->json([
                'message' => 'Store updated successfully',
                'store' => $store,
            ], 200);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
