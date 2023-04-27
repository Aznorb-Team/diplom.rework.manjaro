@extends('layouts.layout')
@section('title', 'Edit Steps')
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
                            <h5>Панель редактирование этапов</h5>
                            <span></span>
                        </div>
                        <form>
                            <div class="card-body">
                                <div class="u-pearls-sm row mb-5">
                                    @foreach ($stages as $stage)
                                        <div class="u-pearl done col-6">
                                            <a href="#">
                                                <div class="u-pearl-icon">{{ $stage->order_num }}</div>
                                            </a><span class="u-pearl-title">{{ $stage->title }}</span>
                                        </div>
                                    @endforeach
                                </div>
                                <section class="cd-container" id="cd-timeline">
                                    @foreach ($stages as $stage)
                                        <div class="cd-timeline-block">
                                            <div class="cd-timeline-img cd-picture bg-primary">
                                                <i>{{ $stage->order_num }}</i>
                                            </div>
                                            <div class="cd-timeline-content">
                                                {{-- <h6>{{$stage->title}}</h6> --}}
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3">
                                                            <label class="form-label"
                                                                for="exampleFormControlInput1">Наименование</label>
                                                            <input class="form-control input-air-primary"
                                                                id="exampleFormControlInput1" type="text"
                                                                value="{{ $stage->title }}" style="min-width:100%;">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3">
                                                            <label class="form-label"
                                                                for="exampleFormControlInput1">Форма</label>
                                                            <select class="form-select input-air-primary w-auto"
                                                                id="mode" name="user[{{ $stage->id }}][form_id]"
                                                                required style="min-width:100%;">
                                                                <option value="-1" selected>1</option>
                                                                {{-- @foreach ($directions as $direction)
                                                @if ($user->direction == $direction->id)
                                                  <option value="{{$direction->id}}" selected>{{$direction->title}}</option>
                                                @else
                                                  <option value="{{$direction->id}}">{{$direction->title}}</option>
                                                @endif
                                            @endforeach --}}
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3">
                                                            <label class="form-label"
                                                                for="exampleFormControlInput1">Роль</label>
                                                            <select class="form-select input-air-primary w-auto"
                                                                id="mode" name="user[{{ $stage->id }}][role_id]"
                                                                required style="min-width:100%;">
                                                                <option value="-1" selected>1</option>
                                                                {{-- @foreach ($directions as $direction)
                                                @if ($user->direction == $direction->id)
                                                  <option value="{{$direction->id}}" selected>{{$direction->title}}</option>
                                                @else
                                                  <option value="{{$direction->id}}">{{$direction->title}}</option>
                                                @endif
                                            @endforeach --}}
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3">
                                                            <label class="form-label"
                                                                for="exampleFormControlInput1">Позиция</label>
                                                            <select class="form-select input-air-primary w-auto"
                                                                id="mode"
                                                                name="user[{{ $stage->id }}][order_num_id]" required
                                                                style="min-width:100%;">
                                                                <option value="-1" selected>1</option>
                                                                {{-- @foreach ($directions as $direction)
                                                @if ($user->direction == $direction->id)
                                                  <option value="{{$direction->id}}" selected>{{$direction->title}}</option>
                                                @else
                                                  <option value="{{$direction->id}}">{{$direction->title}}</option>
                                                @endif
                                            @endforeach --}}
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- <p class="m-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis qui ut.</p> --}}
                                                {{-- <span class="cd-date">Jan <span class="counter digits"> 14</span></span> --}}
                                            </div>
                                        </div>
                                    @endforeach
                                </section>

                                <div class="card-footer text-end">
                                    <button class="btn btn-primary" type="button" id="add_direction_button"
                                        data-bs-toggle="modal" data-bs-target="#exampleModalCenter"
                                        data-bs-original-title="" title="">Добавить этап</button>
                                    <button class="btn btn-primary" type="submit">Сохранить</button>

                                    <div class="modal fade" id="exampleModalCenter" tabindex="-1"
                                        aria-labelledby="exampleModalCenter" style="display: none;" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <form id="new_direction_form" method="post"
                                                    action="{{ route('direction.add') }}">
                                                    @csrf
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Добавить направление</h5>
                                                        <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                            aria-label="Close" data-bs-original-title=""
                                                            title=""></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="mb-3">
                                                                    <input class="form-control input-air-primary"
                                                                        id="new_direction" name="new_direction"
                                                                        type="text" value="" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary" type="button"
                                                            data-bs-dismiss="modal" data-bs-original-title=""
                                                            title="">Закрыть</button>
                                                        <button class="btn btn-primary" type="submit"
                                                            data-bs-original-title="" id="direction_save"
                                                            title="">Сохранить</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
