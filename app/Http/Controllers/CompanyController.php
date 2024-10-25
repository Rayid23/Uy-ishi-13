<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyStoreRequest;
use App\Models\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function main()
    {
        $_SESSION['actived'] = 2;

        $companies = Company::leftJoin('users', 'companies.user_id', '=', 'users.id')->select('companies.*', 'users.name as user_name', 'users.id as user_id')->get();

        return view('companies.company', ['companies'=>$companies]);
    }

    public function store(CompanyStoreRequest $request){
        $data = $request->all();

        $data['is_active'] = 0;

        Company::create($data);

        return redirect('/companies')->with('check', ['Успешно добавлено данные', 'success']);
    }

    public function delete(Company $id){
        $id->delete();
        return redirect('/companies')->with('check', ['Успешно удалено данные', 'danger']);   
    }
}
