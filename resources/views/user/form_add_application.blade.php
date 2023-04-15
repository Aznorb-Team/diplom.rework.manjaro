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
                <div class="card-header pb-0">
                    <h5>Заполнение заявки</h5>
                </div>
                <form class="form theme-form" action="{{route('add_application')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label" for="title">Наименование</label>
                                    <input class="form-control input-air-primary" id="title" name="title" type="text" value="" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                              <div class="mb-3">
                                <label class="form-label" for="mode">Вид</label>
                                <select class="form-select input-air-primary" id="mode" name="mode" required>
                                    @foreach($modes as $mode)
                                        <option value="{{$mode->id}}">{{$mode->title}}</option>
                                    @endforeach
                                </select>
                              </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                              <div class="mb-3">
                                <label class="form-label" for="type">Тип</label>
                                <select class="form-select input-air-primary" id="type" name="type" required>
                                    @foreach($types as $type)
                                        <option value="{{$type->id}}">{{$type->title}}</option>
                                    @endforeach
                                </select>
                              </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                              <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Методическое издание</label>
                                <div class="col-sm-9">
                                  <input class="form-control input-air-primary" type="file" name="teach_mat" required>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                              <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Рецензии</label>
                                <div class="col-sm-9">
                                  <input class="form-control input-air-primary" type="file" multiple name="recense[]" required>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                              <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Выписка из заседания кафедры</label>
                                <div class="col-sm-9">
                                  <input class="form-control input-air-primary" type="file" name="kafedra">
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                              <div class="mb-3">
                                <label class="form-label" for="direction">Направление</label>
                                <select class="form-select input-air-primary" id="direction" name="direction" required>
                                    @foreach($directions as $direction)
                                        <option value="{{$direction->id}}">{{$direction->title}}</option>
                                    @endforeach
                                </select>
                              </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="col-form-label">Авторы</label>
                                    <select class="form-select input-air-primary js-example-basic-multiple select2-hidden-accessible" multiple="" tabindex="-1" aria-hidden="true" name="authors[]" required>
                                        @foreach($authors as $author)
                                            @if($author->id == auth()->user()->id)
                                                <option value="{{$author->id}}" selected>{{$author->surname}} {{$author->name}} {{$author->patronymic}}</option>
                                            @else
                                            <option value="{{$author->id}}">{{$author->surname}} {{$author->name}} {{$author->patronymic}}</option>
                                            @endif    
                                        @endforeach
                                    </select>
                                    {{-- <span class="select2 select2-container select2-container--default select2-container--focus" dir="ltr" style="width: 1402px;"><span class="selection"><span class="select2-selection select2-selection--multiple" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1"><ul class="select2-selection__rendered"><li class="select2-search select2-search--inline"><input class="select2-search__field" type="search" tabindex="0" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" role="textbox" aria-autocomplete="list" placeholder="" style="width: 0.75em;"></li></ul></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span> --}}
                                  </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <button class="btn btn-primary" type="submit">Отправить на рассмотрение</button>
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