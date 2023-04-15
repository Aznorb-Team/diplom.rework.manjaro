@extends('layouts.layout')
@section('title', 'direction_list')
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
                          <th class="sorting_asc" tabindex="0" aria-controls="basic-1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" >№</th>
                          <th class="sorting" tabindex="0" aria-controls="basic-1" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" >Наименование</th>
                          <th class="sorting" tabindex="0" aria-controls="basic-1" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" >Действия</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($directions as $direction)
                          <tr role="row" class="odd">
                              <td class="sorting_1">{{$direction->id}}</td>
                              <td>{{$direction->title}}</td>
                              <td><a href="{{route('direction.delete', ['id'=>$direction->id])}}"><button class="btn btn-danger" type="button">Удалить</button></a></td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                    {{ $directions->links() }}
                  </div>
                </div>
              </div>
              <div class="card-footer text-end">
                <button class="btn btn-primary" type="button" id="add_direction_button" data-bs-toggle="modal" data-bs-target="#exampleModalCenter" data-bs-original-title="" title="">Добавить</button>
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" aria-labelledby="exampleModalCenter" style="display: none;" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <form id="new_direction_form" method="post" action="{{route('direction.add')}}">
                        @csrf
                        <div class="modal-header">
                          <h5 class="modal-title">Добавить направление</h5>
                          <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close" data-bs-original-title="" title=""></button>
                        </div>
                        <div class="modal-body">
                          <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <input class="form-control input-air-primary" id="new_direction" name="new_direction" type="text" value="" required>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="modal-footer">
                          <button class="btn btn-secondary" type="button" data-bs-dismiss="modal" data-bs-original-title="" title="">Закрыть</button>
                          <button class="btn btn-primary" type="submit" data-bs-original-title="" id="direction_save" title="">Сохранить</button>
                        </div>
                      </form>
                    </div>
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
<script>
    document.getElementById('add_direction_button').onclick = function() {
        
    };
    // $(document).ready(function() {
    // $('#new_direction_form').submit(function(e) {
    //     e.preventDefault();
    //     $.ajax({
    //         type: "POST",
    //         url: "{{route('direction.add')}}",
    //         data: $(this).serialize(),
    //         headers: {

    //         'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')

    //         },

    //         success: function (data) {

    //           alert("Success");

    //         },

    //         error: function (msg) {

    //           alert("Error");

    //         }
    //    });
    //  });
    // });
</script>
@endsection