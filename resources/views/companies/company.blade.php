@extends('layouts.admin')

@section('title', 'Компания')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Компания</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/" style="color:grey">Пользователи</a></li>
                        <li class="breadcrumb-item active"><a href="/companies">Компания</a></li>
                        <li class="breadcrumb-item active"><a href="/products" style="color:grey">Продукты</a></li>
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
                            <!-- Кнопка добавление продукта -->
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
                                            <h1 class="modal-title fs-5 text-success" id="exampleModalLabel">Создать
                                                компанию</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="/create-company" method="POST">
                                                @csrf
                                                <div>
                                                    <label for="name" class="form-label"></label>
                                                    <input type="text" class="form-control text-center border-success"
                                                        id="name" name="name" placeholder="Название компании">
                                                </div>
                                                <div>
                                                    <label for="phone" class="form-label"></label>
                                                    <input type="number" class="form-control text-center border-success"
                                                        id="phone" name="phone" placeholder="Телефон номер">
                                                </div>
                                                <div>
                                                    <select name="user_id"
                                                        class="form-control text-center border-success mt-4">
                                                        @foreach ($companies as $company)
                                                            <option value="{{$company->user_id}}">{{$company->user_name}}
                                                            </option>
                                                        @endforeach
                                                    </select>
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
                                        <th class="text-success">PHONE</th>
                                        <th class="text-success">BOSS</th>
                                        <th class="text-success">ACTIVE</th>
                                        <th class="text-success">OPTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($companies as $company)
                                        <tr>
                                            <td class="text-primary">{{$company->id}}</td>
                                            <td class="text-primary">{{$company->name}}</td>
                                            <td class="text-primary">{{$company->phone}}</td>
                                            <td class="text-primary">{{$company->user_name}}</td>
                                            <td class="text-primary">{{$company->is_active}}</td>
                                            <td style="width:160px">
                                                <form action="/company/{{$company->id}}" method="POST"
                                                    style="display: inline-flex">
                                                    @csrf
                                                    @method("DELETE")
                                                    <button type="submit" class="btn btn-danger me-2"><i
                                                            class="bi bi-trash-fill"></i></button>
                                                    <a href="/company/{{$company->id}}" class="btn btn-info me-2"><i
                                                            class="bi bi-book-fill"></i></a>
                                                    <a href="/products" class="btn btn-primary">+</a>
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