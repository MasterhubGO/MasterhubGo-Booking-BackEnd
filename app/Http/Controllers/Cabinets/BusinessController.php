<?php

namespace App\Http\Controllers\Cabinets;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cabinets\BusinessCreateRequest;
use App\Http\Requests\Cabinets\BusinessUpdateRequest;
use App\Http\Resources\Cabinets\BusinessResource;
use App\Models\BusinessProfile;
use App\Models\BusinessService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class BusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return BusinessResource::collection(BusinessProfile::where('user_id', Auth::id())->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BusinessCreateRequest $request)
    {
        try {
            $validatedData = $request->validated();
            $businessProfile = BusinessProfile::create([
                'user_id' => $validatedData['user_id'],
                'role_id' => $validatedData['role_id'],
                'photo' => $validatedData['photo'],
                'banner' => $validatedData['banner'],
                'phone' => $validatedData['phone'],
                'personal_site' => $validatedData['personal_site'],
            ]);

            foreach ($validatedData['services'] as $service) {
                BusinessService::create([
                    'business_id' => $businessProfile->id,
                    'service' => $service,
                ]);
            }
        } catch (\Exception $e) {
            // Handle any exceptions that may occur during database operations
            return response()->json(['error' => $e->getMessage()], 500);
        }

        return response()->json(['message' => 'Business profile created successfully']);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return new BusinessResource(BusinessProfile::find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BusinessUpdateRequest $request, string $id)
    {
        try {
            $validatedData = $request->validated();
            $business = BusinessProfile::find($id);
            $business->update([
                'user_id' => $validatedData['user_id'],
                'role_id' => $validatedData['role_id'],
                'photo' => $validatedData['photo'],
                'banner' => $validatedData['banner'],
                'phone' => $validatedData['phone'],
                'personal_site' => $validatedData['personal_site'],
            ]);

            foreach ($validatedData['services'] as $service) {
                BusinessService::updateOrCreate([
                    'business_id' => $business->id,
                    'service' => $service,
                ]);
            }
        } catch (\Exception $e) {
            // Handle any exceptions that may occur during database operations
            return response()->json(['error' => $e->getMessage()], 500);
        }

        return response()->json(['message' => 'Business profile updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $business = BusinessProfile::find($id);
        $business->delete();
    }
}
