@extends('layouts.layout')
@section('title', 'user_list')
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
            <form action="{{route('save.user_list')}}" method="post">
              @csrf
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
                          <th class="sorting" tabindex="0" aria-controls="basic-1" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" >ФИО</th>
                          <th class="sorting" tabindex="0" aria-controls="basic-1" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" >Электронная почта</th>
                          <th class="sorting" tabindex="0" aria-controls="basic-1" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" >Роль</th>
                          <th class="sorting" tabindex="0" aria-controls="basic-1" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" >Направление</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($users as $user)
                          <tr role="row" class="odd">
                            <td class="sorting_1">{{$user->id}} <input name="user[{{$user->id}}][id]" value="{{$user->id}}" hidden></td>
                            <td>{{$user->surname}} {{$user->name}} {{$user->patronymic}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                              <div class="mb-3">
                                  <select class="form-select input-air-primary w-auto" id="mode" name="user[{{$user->id}}][role_id]" required>
                                      @foreach($roles as $role)
                                          @if($user->role->id == $role->id)
                                            <option value="{{$role->id}}" selected>{{$role->title}}</option>
                                          @else
                                            <option value="{{$role->id}}">{{$role->title}}</option>
                                          @endif
                                      @endforeach
                                      
                                  </select>
                                  <a class="" href="#">
                                    <i data-feather="delete"></i>
                                  </a>
                              </div>
                              <a href="#">
                                Добавить
                              </a>
                            </td>
                            <td>
                              <div class="mb-3">
                                <select class="form-select input-air-primary w-auto" id="mode" name="user[{{$user->id}}][direction_id]" required>
                                    <option value="-1" selected></option>
                                    @foreach($directions as $direction)
                                        @if($user->direction == $direction->id)
                                          <option value="{{$direction->id}}" selected>{{$direction->title}}</option>
                                        @else
                                          <option value="{{$direction->id}}">{{$direction->title}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <a class="" href="#">
                                  <i data-feather="delete"></i>
                                </a>
                            </div>
                            <a href="#">
                              Добавить
                            </a>
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                    {{ $users->links() }}
                  </div>
                </div>
              </div>
              <div class="card-footer text-end">
                <button class="btn btn-primary" type="submit">Сохранить</button>
              </div>
            </form>
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