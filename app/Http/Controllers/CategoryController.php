<?php

namespace App\Http\Controllers;

use App\ReturnMessage;
use Illuminate\Http\Request;
use App\Http\Requests\Category\CategoryStoreRequest;
use App\Repository\Category\CategoryRepositoryInterface;

class CategoryController extends Controller
{
    private $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository) {
        $this->categoryRepository = $categoryRepository;
    }

    public function categoryForm() {

        return view('backend.category.form');
    }

    public function categoryCreate(CategoryStoreRequest $request) {
        $result     = $this->categoryRepository->create($request->all());
        if($result["softGuideStatusCode"] == ReturnMessage::OK) {
            return redirect()->route('categoryList')->with('successMsg','category create success.');
        }else{
            return redirect()->route('categoryList')->with('errorMsg','category create fail.');
        }
        return true;
    }

    public function categoryList() {
        return view('backend.category.list');
    }
}
