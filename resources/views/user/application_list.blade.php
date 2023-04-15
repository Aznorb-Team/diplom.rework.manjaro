@extends('layouts.layout')
@section('title', 'user')
@section('content')
@include('layouts.navigations.user_nav')
<!-- Page Sidebar Ends-->
<div class="page-body">
    <!-- Container-fluid starts-->
    <div class="container-fluid dashboard-default-sec">
      <div class="row">
        <div class="col-sm-12">
            <div class="card">
              <div class="card-header">
                <h5>Список поданных заявок</h5>
                <span>На данной панели можно увидеть список поданных вами заявок, здесь можно отслеживать их статус, а также редактировать и отменять.</span>
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
                          <th class="sorting_asc" tabindex="0" aria-controls="basic-1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" >№</th>
                          <th class="sorting" tabindex="0" aria-controls="basic-1" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" >Наименование</th>
                          <th class="sorting" tabindex="0" aria-controls="basic-1" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" >Эксперт</th>
                          <th class="sorting" tabindex="0" aria-controls="basic-1" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" >Статус этапа заявки</th>
                          <th class="sorting" tabindex="0" aria-controls="basic-1" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" >Статус занятости заявки</th>
                          <th class="sorting" tabindex="0" aria-controls="basic-1" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" >Действия</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($applications as $application)
                          <tr role="row" class="odd">
                            <td class="sorting_1">{{$application->id}}</td>
                            <td>{{$application->title}}</td>
                            <td>@if($application->employee != null){{$application->employee->surname}} {{$application->employee->name}} {{$application->employee->patronymic}}@endif</td>
                            <td>{{$application->status_application->title}}</td>
                            <td>{{$application->status_work->title}}</td>
                            <td>
                              <a href="#"><button class="btn btn-warning" type="button">Редактировать</button></a>
                              <a href="#"><button class="btn btn-danger" type="button">Отменить</button></a>
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                    {{ $applications->links() }}
                  </div>
                </div>
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