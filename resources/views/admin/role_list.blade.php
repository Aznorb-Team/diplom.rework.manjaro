@extends('layouts.layout')
@section('title', 'role_list')
@section('content')
@include('layouts.navigations.admin_nav')
<!-- Page Sidebar Ends-->
<div class="page-body">
    <!-- Container-fluid starts-->
    <div class="container-fluid dashboard-default-sec">
      <div class="row">
        <div class="col-sm-12">
          <div class="card">
            <div class="card-header">
              <h5>Список пользователей</h5>
              <span>На данной панели можно увидеть список данных всех пользователей нашей системы, с которыми можно взаимодействовать.</span>
            </div>
              <div class="card-body">
                <div class="table-responsive">
                  <div id="basic-1_wrapper" class="dataTables_wrapper no-footer">
                    <div id="basic-1_filter" class="dataTables_filter">
                      <label>Поиск:
                        <input type="search" class="input-air-primary" placeholder="" aria-controls="basic-1" data-bs-original-title="" title="">
                      </label>
                    </div>
                    <table class="display dataTable no-footer" id="basic-1" role="grid" aria-describedby="basic-1_info">
                      <thead>
                        <tr role="row">
                          <th class="sorting_asc" tabindex="0" aria-controls="basic-1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending">№</th>
                          <th class="sorting" tabindex="0" aria-controls="basic-1" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" >Наименование</th>
                          <th class="sorting" tabindex="0" aria-controls="basic-1" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" >Действия</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($roles as $role)
                          <tr role="row" class="odd">
                              <td class="sorting_1">{{$role->id}}</td>
                              <td>{{$role->title}}</td>
                              <td><a href="#"><button class="btn btn-danger" type="button">Удалить</button></a></td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                    {{ $roles->links() }}
                  </div>
                </div>
              </div>
              <div class="card-footer text-end">
                <button class="btn btn-primary" type="button">Добавить</button>
              </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Container-fluid Ends-->
  </div>
  <!-- footer start-->
  <footer class="footer">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6 footer-copyright">
          <p class="mb-0">Copyright 2022-23 © Quadronic All rights reserved.</p>
        </div>
      </div>
    </div>
  </footer>
</div>
</div>
@endsection