<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Models\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function main()
    {
        $_SESSION['actived'] = 3;

        $products = Product::leftJoin('companies', 'products.comp_id', '=', 'companies.id')->select('products.*', 'companies.name as com_name', 'companies.id as com_id')->get();

        return view('products.product', ['products' => $products]);
    }

    public function store(ProductStoreRequest $request)
    {
        $data = $request->all();

        if ($request->hasFile('image')) {
            $file = $request->file('image');

            $type = $file->getClientOriginalExtension();

            $fileName = date('Y-m-d') . '_' . time() . '.' . $type;

            $file->move('Images/', $fileName);

            $data['image'] = 'Images/' . $fileName;
        }


        Product::create($data);

        return redirect('/products')->with('check', ['Успешно добавлено данные', 'success']);
    }

    public function delete(Product $id){
        $id->delete();
        return redirect('/products')->with('check', ['Успешно удалено данные', 'danger']);   
    }
}
