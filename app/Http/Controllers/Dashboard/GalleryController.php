<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\StoreGalleryRequest;
use App\Models\Gallery;
use App\Services\UploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{

    public function saveImg(Request $request){

        $image=$request->file('dzfile');
        $filename=UploadService::store($image, 'gallery');

        return response()->json([
            'name'=>$filename,
            'original_name'=>$image->getClientOriginalName(),
        ]);

    }


    public function save(StoreGalleryRequest $request)
    {
            if($request->has('images') && count($request->images)>0){
                foreach ($request->images as $image){
                    Gallery::create([
                        'parent_id' => $request->parent_id,
                        'file'=>$image,
                        'type' => $request->type,
                    ]);
                }
            }

            return redirect()->back()->with([
                'message' => trans('dashboard.files_updated_successfully'),
            ]);

    }

    public function destroy($id)
    {
        $gallery = Gallery::find($id);
        if ($gallery) {
            DB::beginTransaction();
            try {
                if (Storage::disk('public')->exists($gallery->file)) {
                    Storage::disk('public')->delete($gallery->file);
                }

                $gallery->delete();
                DB::commit();
                return redirect()->back()->with([
                    'message' => trans('dashboard.files_deleted_successfully'),
                ]);
            } catch (\Exception $e) {
                DB::rollBack();
                return unKnownError($e->getMessage());
            }
        }
        return unKnownError(trans('dashboard.file_not_found'));
    }
}
