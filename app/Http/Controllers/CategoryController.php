<?php

namespace App\Http\Controllers;

use App\Utility;
use App\ReturnMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Category\CategoryStoreRequest;
use App\Repository\Category\CategoryRepositoryInterface;
use Exception;

class CategoryController extends Controller
{
    private $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository) {
        DB::connection()->enableQueryLog();
        $this->categoryRepository = $categoryRepository;
    }

    public function categoryForm() {
        return view('backend.category.form');
    }

    public function categoryCreate(CategoryStoreRequest $request) {
        try{
            $result     = $this->categoryRepository->create($request->all());
            $logs = "Category Create Screen::";
            Utility::saveDebugLog($logs);
            if($result["softGuideStatusCode"] == ReturnMessage::OK) {
                return redirect()->route('categoryList')->with('successMsg','category create success.');
            }else{
                return redirect()->route('categoryList')->with('errorMsg','category create fail.');
            }
        }catch(Exception $e){
            Utility::saveErrorLog($logs);
            abort(500);
        }
    }

    public function categoryList() {
        return view('backend.category.list');
    }
}
