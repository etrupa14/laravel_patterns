<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Lib\Sort\SortLib;
use Illuminate\Http\Request;
use Validator;


/**
 * Class SortController
 * @package App\Http\Controllers\Pages
 */
class SortController extends Controller
{
    public $sort_methods;

    public function __construct()
    {
        $this->sort_methods = SortLib::get_sort_methods();
    }

    public function index()
    {

        return view('sort', [
            'sortMethods' => $this->sort_methods
        ]);
    }

    public function sort(Request $request)
    {
        $errors = null;
        $sorted_string = null;

        $validator = Validator::make($request->all(), [
            'sort_method' => 'required',
            'sort_string' => 'required|alpha',
        ]);


        if($validator->fails()) {
            $errors = $validator->errors();
        } else {
            $sorting = new SortLib($request->get('sort_method'));
            $sorted_string = $sorting->get_sorted_string($request->get('sort_string'));
        }



        return view('sort', [
            'sortMethods' => $this->sort_methods,
            'errors' => $errors,
            'data' => $request->all(),
            'sorted_string' => $sorted_string
        ]);

    }

}