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
                <form class="form theme-form" action='{{route('antiplagiat.success', ['id'=> $application->id])}}' method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlInput1">Персональный номер</label>
                                    <input class="form-control input-air-primary" id="exampleFormControlInput1" type="text" name="id" value="{{$application->id}}" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlInput1">Наименование</label>
                                    <input class="form-control input-air-primary" id="exampleFormControlInput1" type="text" value="{{$application->title}}" disabled>
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
                                <div class="mb-3">
                                    <input type="button" name="download" id="download" class="btn btn-outline-primary" value="Скачать методический материал"/>
                                </div>
                            </div>
                        </div>
                        <div class="card-header pb-0">
                            <h5>Результат проверки на антиплагиат</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlInput1">Заимствование</label>
                                        <input class="form-control input-air-primary" id="exampleFormControlInput1" type="number" name="borrowing" value="" >
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlInput1">Цитирование</label>
                                        <input class="form-control input-air-primary" id="exampleFormControlInput1" type="number" name="citation" value="" >
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlInput1">Оригинальность</label>
                                        <input class="form-control input-air-primary" id="exampleFormControlInput1" type="number" name="originality" value="" >
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                  <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Справка на антиплагиат</label>
                                    <div class="col-sm-9">
                                      <input class="form-control input-air-primary" type="file" name="antiplagiat" required>
                                    </div>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <button class="btn btn-primary" type="submit">Прошел</button>
                        <a href="{{route('antiplagiat.unsuccess', ['id'=> $application->id])}}"><button class="btn btn-danger" type="button">Не прошел</button></a>
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
        window.open('http://diplom.rework/storage/'+link.value).focus();
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
        download('http://diplom.rework/storage/'+link.value, 'met_mat.doc');
    };
</script>
@endsection