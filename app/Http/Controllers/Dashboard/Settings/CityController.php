<?php

namespace App\Http\Controllers\Dashboard\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Settings\CityRequest;
use App\Models\City;
use App\Models\Region;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CityController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['auth']);
        $this->middleware('permission:read-city', ['only' => ['index']]);
        $this->middleware('permission:create-city', ['only' => ['create', 'store']]);
        $this->middleware('permission:update-city', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete-city', ['only' => ['destroy']]);
    }

    public function index(): View
    {
        return view('dashboard.settings.cities.index', [
            'title'  => trans('dashboard.cities'),
            'cities' => City::all(),
        ]);
    }

    public function create(): View
    {
        return view('dashboard.settings.cities.create', [
            'title'   => __('dashboard.create_city'),
            'regions' => Region::all(),
        ]);
    }

    public function store(CityRequest $request)
    {
        try {
            $data = $request->validated();

            City::create($data);

            return redirect(route('dashboard.cities.index'))->with([
                'message' => trans('dashboard.city_added_successfully'),
            ]);

        } catch (Exception $e) {
            return unKnownError($e->getMessage());
        }
    }

    public function edit(City $city)
    {
        return view('dashboard.settings.cities.edit', [
            'title'   => __('dashboard.edit_city'),
            'city'    => $city,
            'regions' => Region::all(),

        ]);
    }

    public function update(CityRequest $request, City $city)
    {
        $data = $request->validated();

        $city->update($data);

        return redirect(route('dashboard.cities.index'))->with([
            'message' => trans('dashboard.city_updated_successfully'),
        ]);
    }

    public function destroy(City $city): JsonResponse
    {
        $city->delete();

        return response()->json([
            'message' => trans('dashboard.city_delete_successfully'),
        ]);
    }

    public function getCities(Request $request) {
        $cities = City::where('region_id',$request->region_id)->get();
        return view('dashboard.settings.cities.options',['cities' => $cities]);
    }
}
