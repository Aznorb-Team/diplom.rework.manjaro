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
                    <h5>Поданная заявка</h5>
                </div>
                  <div class="card-body">
                    <div class="default-according" id="accordion">
                      <div class="card">
                        <div class="card-header input-air-primary" id="headingOne">
                          <h5 class="mb-0">
                            <button class="btn btn-link" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Основные данные</button>
                          </h5>
                        </div>
                        <div class="collapse show" id="collapseOne" aria-labelledby="headingOne" data-bs-parent="#accordion" style="">
                          <div class="card-body input-air-primary">
                            <p>Название рукописи издания: {{$application->title}}</p>
                            <p>Автор рукописи издания: {{$application->user->surname}} {{$application->user->name}} @if($application->user->patronymic != null) {{$application->user->patronymic}} @endif</p>
                            <p>Название дисциплины: {{$application->direction->title}}</p>
                            <p>Название образовательной программы: </p>
                            <p>Предполагаемый контингент пользователей учебным изданием: </p>
                          </div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header input-air-primary" id="headingTwo">
                          <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Сведения об эксперте</button>
                          </h5>
                        </div>
                        <div class="collapse" id="collapseTwo" aria-labelledby="headingTwo" data-bs-parent="#accordion" style="">
                          <div class="card-body input-air-primary">
                            <p>ФИО эксперта РИС: {{$application->employee->surname}} {{$application->employee->name}} @if($application->employee->patronymic != null) {{$application->employee->patronymic}} @endif</p>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label text-end">Дата обработки заявки: </label>
                                <div class="col-xl-5 col-sm-9">
                                  <div class="input-group">
                                    <input class="datepicker-here form-control digits input-air-primary" type="text" data-language="en" data-bs-original-title="" title="" value="">
                                  </div>
                                </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header input-air-primary" id="headingThree">
                          <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Документы</button>
                          </h5>
                        </div>
                        <div class="collapse" id="collapseThree" aria-labelledby="headingThree" data-bs-parent="#accordion" style="">
                          <div class="card-body input-air-primary">

                            <label class="col-sm-3 col-form-label">Методический материал</label>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <input type="text" class="form-control" id="link_teach_mat" value="{{$application->teaching_materials->link}}" hidden/>
                                        <input type="button" class="btn btn-outline-primary" id="view_teach_mat" value="Показать методический материал"/><br>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <input type="button" name="download" id="download_teach_mat" class="btn btn-outline-primary" value="Скачать методический материал"/>
                                    </div>
                                </div>
                            </div>

                            <label class="col-sm-3 col-form-label">Выписка из заседания кафедры</label>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <input type="text" class="form-control" id="link_cert_dep" value="{{$application->certificate_of_departments->link}}" hidden/>
                                        <input type="button" class="btn btn-outline-primary" id="view_cert_dep" value="Показать выписку из заседания кафедры"/><br>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <input type="button" name="download" id="download_cert_dep" class="btn btn-outline-primary" value="Скачать выписку из заседания кафедры"/>
                                    </div>
                                </div>
                            </div>

                            <label class="col-sm-3 col-form-label">Заявление на проверку</label>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <input type="text" class="form-control" id="link_statement" value="{{$application->ris_statement->link}}" hidden/>
                                        <input type="button" class="btn btn-outline-primary" id="view_statement" value="Показать заявление на проверку"/><br>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <input type="button" name="download" id="download_statement" class="btn btn-outline-primary" value="Скачать заявление на проверку"/>
                                    </div>
                                </div>
                            </div>

                            {{-- <label class="col-sm-3 col-form-label">Рецензии</label>
                            @foreach()
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <input type="text" class="form-control" id="link_cert_dep" value="{{$application->certificate_of_departments->link}}" hidden/>
                                            <input type="button" class="btn btn-outline-primary" id="view_cert_dep" value="Показать выписку из заседания кафедры"/><br>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <input type="button" name="download" id="download_cert_dep" class="btn btn-outline-primary" value="Скачать выписку из заседания кафедры"/>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                             --}}

                            <label class="col-sm-3 col-form-label">Справка на антиплагиат</label>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <input type="text" class="form-control" id="link_antiplagiat" value="{{$application->anti_plagiarisms->link}}" hidden/>
                                        <input type="button" class="btn btn-outline-primary" id="view_antiplagiat" value="Показать справку на антиплагиат"/><br>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <input type="button" name="download" id="download_antiplagiat" class="btn btn-outline-primary" value="Скачать справку на антиплагиат"/>
                                    </div>
                                </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                <form class="form theme-form" action='{{route('expert_ris.success', ['id'=> $application->id, 'survey_id' => $survey->id])}}' method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <h4>{{$survey->title}}</h4>
                        <h3 hidden>{{$number = 1}}</h3>
                        @foreach($survey->questions as $question)
                        @switch($question->type)
                            @case(0)
                                <div class="form-outline border px-2 py-2 input-air-primary">
                                    <label class="col-form-label" for="typeNumber">{{$number}}) {{$question->title}}</label>
                                    <div class="form-check">
                                        <input type="radio" name="{{$question->id}}" id="{{$question->id}}" value="yes" required>
                                        <label class="col-form-label" for="{{$question->id}}" name="yes">
                                        Да
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" name="{{$question->id}}" id="{{$question->id}}" value="no" required>
                                        <label class="col-form-label" for="{{$question->id}}" name="no">
                                        Нет
                                        </label>
                                    </div>
                                </div>
                                <h3 hidden>{{$number = $number + 1}}</h3>
                                @break
                            @case(1)
                                <div class="form-outline border px-2 py-2 input-air-primary">
                                    <div class="form-floating">
                                        <textarea class="form-control input-air-primary" placeholder="Leave a comment here" name="{{$question->id}}" id="{{$question->id}}" required></textarea>
                                        <label class="col-form-label" for="floatingTextarea">{{$question->title}}</label>
                                    </div>
                                </div>
                                @break
                            @default
                                <div class="form-outline border px-2 py-2 input-air-primary">
                                    <label class="col-form-label" for="typeNumber">{{$number}}) {{$question->title}}</label>
                                    <div class="form-check">
                                        <input type="radio" name="{{$question->id}}" id="{{$question->id}}">
                                        <label class="col-form-label" for="flexRadioDefault1">
                                        Да
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" name="{{$question->id}}" id="{{$question->id}}">
                                        <label class="col-form-label" for="flexRadioDefault2">
                                        Нет
                                        </label>
                                    </div>
                                </div>
                                <h3 hidden>{{$number = $number + 1}}</h3>
                        @endswitch
                        @endforeach
                    </div>
                    <div class="card-footer text-end">
                        <button class="btn btn-primary" type="submit">Прошел</button>
                        <a href="{{route('expert_ris.unsuccess', ['id'=> $application->id])}}"><button class="btn btn-danger" type="button">Не прошел</button></a>
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
        window.open('http://127.0.0.1:8000/storage/'+link.value).focus();
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
    document.getElementById('download_teach_mat').onclick = function() {
        let link = document.getElementById('link_teach_mat');
        download('http://127.0.0.1:8000/storage/'+link.value, 'met_mat.doc');
    };

    document.getElementById('view_cert_dep').onclick = function() {
        let link = document.getElementById('link_cert_dep');
        window.open('http://127.0.0.1:8000/storage/'+link.value).focus();
    };
    document.getElementById('download_cert_dep').onclick = function() {
        let link = document.getElementById('link_cert_dep');
        download('http://127.0.0.1:8000/storage/'+link.value, 'cert_dep.pdf');
    };

    document.getElementById('view_antiplagiat').onclick = function() {
        let link = document.getElementById('link_antiplagiat');
        window.open('http://127.0.0.1:8000/storage/'+link.value).focus();
    };
    document.getElementById('download_antiplagiat').onclick = function() {
        let link = document.getElementById('link_antiplagiat');
        download('http://127.0.0.1:8000/storage/'+link.value, 'antiplagiat.pdf');
    };

    document.getElementById('download_statement').onclick = function() {
        let link = document.getElementById('link_statement');
        download('http://127.0.0.1:8000/storage/'+link.value, 'ris_statement.pdf');
    };

    document.getElementById('view_statement').onclick = function() {
        let link = document.getElementById('link_statement');
        window.open('http://127.0.0.1:8000/storage/'+link.value).focus();
    };
</script>
@endsection