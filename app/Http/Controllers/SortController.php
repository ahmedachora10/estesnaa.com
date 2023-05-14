<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Service;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SortController extends Controller
{
    public function sort(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'old_place' => 'required|integer',
            'current_place' => 'required|integer',
            'model' => 'required|string'
        ]);

        if($validator->fails()) {
            return response()->json(
                $validator->errors()->all(),
                404
            );
        }

        if($request->model == 'slider') {
            $record_two = Slider::find($request->input('current_place'));
            $record_one = Slider::find($request->input('old_place'));

        }elseif($request->model == 'service') {
            $record_two = Service::find($request->input('current_place'));
            $record_one = Service::find($request->input('old_place'));
        }elseif($request->model == 'category') {
            $record_two = Category::find($request->input('current_place'));
            $record_one = Category::find($request->input('old_place'));
        }


        $sort = $record_one->sort ?? $record_one->id;

        $record_one->update(['sort' => $record_two->sort ?? $record_two->id]);
        $record_two->update(['sort' => $sort]);


        return response()->json(
            [
                'status' => true,
                'message' => 'Sortable item has been successfly'
            ]
        );
    }
}