@extends('layouts.admin')

@section('title', 'Продукты')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Продукты</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/" style="color:grey">Пользователи</a></li>
                        <li class="breadcrumb-item active"><a href="/companies" style="color:grey">Компания</a></li>
                        <li class="breadcrumb-item active"><a href="/products">Продукты</a></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card bg-dark text-center">
                        <div class="card-header">
                            <!-- Кнопка добавление компании -->
                            <button type="button" class="btn btn-primary card-title me-2" data-bs-toggle="modal"
                                data-bs-target="#CreateCompany">
                                Добавить
                            </button>

                            <!-- Внутренности -->
                            <div class="modal fade" id="CreateCompany" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5 text-success" id="exampleModalLabel">Добавить
                                                продукт</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="/create-product" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div>
                                                    <label for="name" class="form-label"></label>
                                                    <input type="text" class="form-control text-center border-success"
                                                        id="name" name="name" placeholder="Название продукта">
                                                </div>
                                                <div>
                                                    <select name="comp_id"
                                                        class="form-control text-center border-success mt-4">
                                                        @foreach ($products as $product)
                                                            <option value="{{$product->com_id}}">{{$product->com_name}}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div>
                                                    <label for="image" class="form-label"></label>
                                                    <input type="file" class="form-control text-center border-success"
                                                        id="image" name="image">
                                                </div>
                                                <div>
                                                    <label for="price" class="form-label"></label>
                                                    <input type="number" class="form-control text-center border-success"
                                                        id="price" name="price" placeholder="Стоимость">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Назад</button>
                                                    <button type="submit" class="btn btn-success">Сохранить</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="" class="btn btn-danger card-title me-2">Удалить все!</a>
                            <a href="" class="btn btn-warning card-title me-2">Очистить</a>
                        </div>
                        @if(session('check'))
                            <div class="alert alert-{{session('check')[1]}} mt-2 alert-dismissible"
                                style="width:96%; margin-left: 22px;" role="alert">
                                {{session('check')[0]}}<br>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered table-dark">
                                <thead class="text-success">
                                    <tr>
                                        <th class="text-success">ID</th>
                                        <th class="text-success">NAME</th>
                                        <th class="text-success">COMPANY</th>
                                        <th class="text-success">IMAGE</th>
                                        <th class="text-success">PRICE</th>
                                        <th class="text-success">OPTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td class="text-primary">{{$product->id}}</td>
                                            <td class="text-primary">{{$product->name}}</td>
                                            <td class="text-primary">{{$product->com_name}}</td>
                                            <!-- Bu xolatda rasm chiqadi! -->
                                            <!-- <td class="text-primary"><img src="{{$product->image}}" width="100px"></td> -->
                                            <!--Fake informatsiya uchun sekin ishlidi-->
                                            <td class="text-primary">{{$product->image}}</td>
                                            <td class="text-primary">{{$product->price}}</td>
                                            <td style="width:120px">
                                                <form action="/product/{{$product->id}}" method="POST"
                                                    style="display: inline-flex">
                                                    @csrf
                                                    @method("DELETE")
                                                    <button type="submit" class="btn btn-danger me-2"><i
                                                            class="bi bi-trash-fill"></i></button>
                                                    <a href="/product/{{$product->id}}" class="btn btn-info"><i
                                                            class="bi bi-book-fill"></i></a>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->

                    </div>
                </div>

            </div>

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection