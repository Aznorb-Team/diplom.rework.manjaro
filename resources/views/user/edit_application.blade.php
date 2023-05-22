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
                            <h5>Редактирование заявки</h5>
                        </div>
                        <form class="form theme-form" action="{{ route('add_application') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="title">Наименование</label>
                                            <input class="form-control input-air-primary" id="title" name="title"
                                                type="text" value="{{$application->title}}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="mode">Вид</label>
                                            <select class="form-select input-air-primary" id="mode" name="mode"
                                                required>
                                                @foreach ($modes as $mode)
                                                    @if($mode->id == $application->mode->id)
                                                        <option value="{{ $mode->id }}" selected="selected">{{ $mode->title }}</option>
                                                    @else
                                                        <option value="{{ $mode->id }}">{{ $mode->title }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="type">Тип</label>
                                            <select class="form-select input-air-primary" id="type" name="type"
                                                required>
                                                @foreach ($types as $type)
                                                    @if($type->id == $application->type->id)
                                                        <option value="{{ $type->id }}" selected="selected">{{ $type->title }}</option>
                                                    @else
                                                        <option value="{{ $type->id }}">{{ $type->title }}</option>
                                                    @endif
                                                    
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
                                                <input class="form-control input-air-primary" type="file"
                                                    name="teach_mat" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <input type="text" class="form-control" id="link_teach_mat" value="{{$application->teaching_materials->link}}" hidden/>
                                            <input type="button" class="btn btn-outline-primary " id="view_teach_mat" value="Показать методический материал"/><br>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Рецензии</label>
                                            <div class="col-sm-9">
                                                <input class="form-control input-air-primary" type="file" multiple
                                                    name="recense[]" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @if(!$application->reviews->isEmpty())
                                    @foreach($application->reviews as $review)
                                        <div class="row">
                                            <div class="col">
                                                <div class="mb-3">
                                                    <input type="text" class="form-control" id="link_certificate" value="{{$review->link}}" hidden/>
                                                    <input type="button" class="btn btn-outline-primary " id="view_certificate" value="Показать рецензию {{$review->id}}"/><br>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
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
                                            <input type="text" class="form-control" id="link_certificate" value="{{$application->certificate_of_departments->link}}" hidden/>
                                            <input type="button" class="btn btn-outline-primary " id="view_certificate" value="Показать выписку из заседания кафедры"/><br>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="direction">Направление</label>
                                            <select class="form-select input-air-primary" id="direction" name="direction"
                                                required>
                                                @foreach ($directions as $direction)
                                                    @if($direction->id == $application->direction->id)
                                                        <option value="{{ $direction->id }}" selected="selected">{{ $direction->title }}</option>
                                                    @else
                                                        <option value="{{ $direction->id }}">{{ $direction->title }}</option>
                                                    @endif
                                                    
                                                    
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="col-form-label">Авторы</label>
                                            <select
                                                class="form-select input-air-primary js-example-basic-multiple select2-hidden-accessible"
                                                multiple="" tabindex="-1" aria-hidden="true" name="authors[]" required>
                                                @foreach ($authors as $author)
                                                    @if ($author->id == auth()->user()->id || $application->authors->contains($author->id))
                                                        <option value="{{ $author->id }}" selected>{{ $author->surname }}
                                                            {{ $author->name }} {{ $author->patronymic }}</option>
                                                    @else
                                                        <option value="{{ $author->id }}">{{ $author->surname }}
                                                            {{ $author->name }} {{ $author->patronymic }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            {{-- <span class="select2 select2-container select2-container--default select2-container--focus" dir="ltr" style="width: 1402px;"><span class="selection"><span class="select2-selection select2-selection--multiple" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1"><ul class="select2-selection__rendered"><li class="select2-search select2-search--inline"><input class="select2-search__field" type="search" tabindex="0" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" role="textbox" aria-autocomplete="list" placeholder="" style="width: 0.75em;"></li></ul></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-start">
                                <label class="col-form-label" >! Если вы не хотите сохранять изменения, то просто перейдите в другие вкладки !</label>
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
<script>
    document.getElementById('view_teach_mat').onclick = function() {
        let link = document.getElementById('link_teach_mat');
        window.open('http://127.0.0.1:8000/storage/'+link.value.substr(7)).focus();
    };
    const download = (path, filename) => {
        // Create a new link
        const anchor = document.createElement('a');
        anchor.href = path;
        anchor.download = filename;

        // Append to the DOM
        document.body.appendChild(anchor);

        // Trigger `click` event
        anchor.click();

        // Remove element from DOM
        document.body.removeChild(anchor);
    }; 
    document.getElementById('download').onclick = function() {
        let link = document.getElementById('link_teach_mat');
        download('http://127.0.0.1:8000/storage/'+link.value.substr(7), 'met_mat.doc');
    };
    document.getElementById('view_сertificate').onclick = function() {
        let link = document.getElementById('link_certificate');
        window.open('http://127.0.0.1:8000/storage/'+link.value.substr(7)).focus();
    };
</script>
@endsection
