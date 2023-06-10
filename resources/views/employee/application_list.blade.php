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
                <span></span>
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
                          <th class="sorting" tabindex="0" aria-controls="basic-1" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" >Этап</th>
                          <th class="sorting" tabindex="0" aria-controls="basic-1" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" >Автор</th>
                          <th class="sorting" tabindex="0" aria-controls="basic-1" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" >Действия</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($applications as $application)
                          <tr role="row" class="odd">
                            <td class="sorting_1">{{$application->id}}</td>
                            <td>{{$application->title}}</td>
                            <td>{{$application->status_application->title}}</td>
                            @if($application->user_id === auth()->user()->id)
                              <td>Вы</td>
                            @else
                              <td>{{$application->user->surname}} {{$application->user->name}} @if($application->user->patronymic != null) {{$application->user->patronymic}} @endif</td>
                            @endif
                            @if(auth()->user()->role->contains(2))
                              <td><a href="{{route('antiplagiat.check', ['id' => $application->id])}}"><button class="btn @if($application->employee_id != auth()->user()->id) btn-primary @else btn-warning @endif" type="button">@if($application->employee_id == auth()->user()->id) Доработать @else Взять в работу @endif</button></a></td>
                            @endif

                            @if(auth()->user()->role->contains(3))
                              <td><a href="{{route('expert_ris.check', ['id' => $application->id])}}"><button class="btn @if($application->employee_id != auth()->user()->id) btn-primary @else btn-warning @endif" type="button">@if($application->employee_id == auth()->user()->id) Доработать @else Взять в работу @endif</button></a></td>
                            @endif

                            @if(auth()->user()->role->contains(4))
                              @if($application)
                              <td><a href="{{route('session_ris.check', ['id' => $application->id])}}"><button class="btn @if($application->employee_id != auth()->user()->id) btn-primary @else btn-warning @endif" type="button">@if($application->employee_id == auth()->user()->id) Доработать @else Взять в работу @endif</button></a></td>
                              @endif()
                            @endif

                            @if(auth()->user()->role->contains(5))
                              <td><a href="{{route('expert_ums.check', ['id' => $application->id])}}"><button class="btn @if($application->employee_id != auth()->user()->id) btn-primary @else btn-warning @endif" type="button">@if($application->employee_id == auth()->user()->id) Доработать @else Взять в работу @endif</button></a></td>
                            @endif

                            @if(auth()->user()->role->contains(6))
                              <td><a href="{{route('session_ums.check', ['id' => $application->id])}}"><button class="btn @if($application->employee_id != auth()->user()->id) btn-primary @else btn-warning @endif" type="button">@if($application->employee_id == auth()->user()->id) Доработать @else Взять в работу @endif</button></a></td>
                            @endif

                            @if(auth()->user()->role->contains(7))
                              <td><a href="#"><button class="btn @if($application->employee_id == auth()->user()->id) btn-primary @else btn-warning @endif" type="button">@if($application->employee_id != auth()->user()->id) Доработать @else Взять в работу @endif</button></a></td>
                            @endif


                            {{-- @switch(auth()->user()->role_id)
                                @case(2)
                                    <td><a href="{{route('antiplagiat.check', ['id' => $application->id])}}"><button class="btn btn-primary" type="button">Взять в работу</button></a></td>
                                    @break
                                @case(3)
                                    <td><a href="{{route('expert_ris.check', ['id' => $application->id])}}"><button class="btn btn-primary" type="button">Взять в работу</button></a></td>
                                    @break
                                @case(4)
                                    <td><a href="{{route('session_ris.check', ['id' => $application->id])}}"><button class="btn btn-primary" type="button">Взять в работу</button></a></td>
                                    @break
                                @case(5)
                                    <td><a href="{{route('expert_ums.check', ['id' => $application->id])}}"><button class="btn btn-primary" type="button">Взять в работу</button></a></td>
                                    @break
                                @case(6)
                                    <td><a href="{{route('session_ums.check', ['id' => $application->id])}}"><button class="btn btn-primary" type="button">Взять в работу</button></a></td>
                                    @break
                                @case(7)
                                    <td><a href="#"><button class="btn btn-primary" type="button">Взять в работу</button></a></td>
                                    @break
                                @default
                                    
                            @endswitch --}}
                            
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                    {{-- {{ $applications->links() }} --}}
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