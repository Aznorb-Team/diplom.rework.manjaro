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
                            <h5>PHPWord Test</h5>
                        </div>
                        <form class="form theme-form" action="{{ route('phpword_test') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="title">Name</label>
                                            <input class="form-control input-air-primary" id="name" name="name"
                                                type="text" value="Павлов Сергей Дмитриевич" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="title">Job_title</label>
                                            <input class="form-control input-air-primary" id="job_title" name="job_title"
                                                type="text" value="Преподаватель" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="title">Chair</label>
                                            <input class="form-control input-air-primary" id="chair" name="chair"
                                                type="text" value="ИМИ" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="title">Mode</label>
                                            <input class="form-control input-air-primary" id="mode" name="mode"
                                                type="text" value="Учебная" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="title">Title</label>
                                            <input class="form-control input-air-primary" id="title" name="title"
                                                type="text" value="Методичка" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="title">Authors</label>
                                            <input class="form-control input-air-primary" id="authors" name="authors"
                                                type="text" value="Павлов С.Д., Валиев С.Д.." required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="title">Direction</label>
                                            <input class="form-control input-air-primary" id="direction" name="direction"
                                                type="text" value="Информатика" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="title">Pages</label>
                                            <input class="form-control input-air-primary" id="pages" name="pages"
                                                type="text" value="23" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="title">Date_of_issue</label>
                                            <input class="form-control input-air-primary" id="date_of_issue" name="date_of_issue"
                                                type="text" value="23.08.2002" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="title">Date_today</label>
                                            <input class="form-control input-air-primary" id="date_today" name="date_today"
                                                type="text" value="23.08.2002" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">File</label>
                                            <div class="col-sm-9">
                                                <input class="form-control input-air-primary" type="file" name="file">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <button class="btn btn-primary" type="submit">Download</button>
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