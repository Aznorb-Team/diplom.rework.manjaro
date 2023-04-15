@extends('layouts.layout')
@section('title', 'Sign Up')
@section('content')
<!-- Loader starts-->
<div class="loader-wrapper">
    <div class="theme-loader">    
      <div class="loader-p"></div>
    </div>
  </div>
  <!-- Loader ends-->
  <!-- page-wrapper Start-->
  <section>         
    <div class="container-fluid p-0"> 
      <div class="row m-0">
        <div class="col-xl-5 p-0"><img class="bg-img-cover bg-center" src="../assets/images/login/1.jpg" alt="looginpage"></div>
        <div class="col-xl-7 p-0"> 
          <div class="login-card">
            <form class="theme-form login-form" action="{{route('sign_up.store')}}" method="post">
              @csrf
              <h5>Создайте свой личный аккаунт</h5>
              <h6>Необходимо ввести некоторые данные для создания нового аккаунта</h6>
              <div class="form-group">
                <label>Ваше ФИО</label>
                <div class="small-group">
                  <div class="input-group">
                    <input class="form-control" name="surname" type="text" required="" placeholder="Фамилия">
                  </div>
                  <div class="input-group">
                    <input class="form-control" type="text" name="name" required="" placeholder="Имя">
                  </div>
                  
                </div>
              </div>
              <div class="form-group">
                <div class="input-group">
                    <input class="form-control" type="text" name="patronymic" required="" placeholder="Отчество">
                </div>
              </div>
              <div class="form-group">
                <div class="input-group">
                    <input class="checkbox_animated" id="chk-ani" type="checkbox" checked="">                                                
                    Отчество отсутствует
                </div>
              </div>
              <div class="form-group">
                <label>Электронная почта</label>
                <div class="input-group">
                  <input class="form-control" type="email" name="email" required="" placeholder="test@gmail.com">
                </div>
              </div>
              <div class="form-group">
                <label>Пароль</label>
                <div class="input-group">
                  <input class="form-control" type="password" name="password" required="" placeholder="*********">
                  <div class="show-hide"><span class="show">                         </span></div>
                </div>
              </div>
              <div class="form-group">
                <label>Необходимо согласие</label>
                <div class="input-group">
                    <input class="checkbox_animated" id="chk-ani_2" type="checkbox" checked="">
                    <a href="#">Политика конфиденциальности</a>
                </div>
              </div>
              <div class="form-group">
                <button class="btn btn-primary btn-block" type="submit">Создать аккаунт</button>
              </div>
              <div class="login-social-title">                
                <h5>Войти с помощью</h5>
              </div>
              <div class="form-group">
                <ul class="login-social">
                  <li><a href="#" target="_blank"><i data-feather="linkedin"></i></a></li>
                  <li><a href="#" target="_blank"><i data-feather="twitter"></i></a></li>
                  <li><a href="#" target="_blank"><i data-feather="facebook"></i></a></li>
                  <li><a href="#" target="_blank"><i data-feather="instagram"> </i></a></li>
                </ul>
              </div>
              <p>У вас уже есть аккаунт?<a class="ms-2" href="{{route('log_in')}}">Вход</a></p>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  @endsection