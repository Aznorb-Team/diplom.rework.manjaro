@extends('layouts.layout')
@section('title', 'Login')
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
      <div class="container-fluid">
        <div class="row">
          <div class="col-xl-5"><img class="bg-img-cover bg-center" src="../assets/images/login/3.jpg" alt="looginpage"></div>
          <div class="col-xl-7 p-0">    
            <div class="login-card">
              <form class="theme-form login-form" action="{{route('log_in.store')}}" method="post">
                @csrf
                <h5>Вход</h5>
                <h6>С возвращением! Войдите в свой аккаунт, чтобы продолжить!</h6>
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
                    <div class="input-group">
                        <input class="checkbox_animated" id="chk-ani_2" type="checkbox" checked="">
                        Запомнить пароль
                    </div>
                </div>
                <div class="form-group">
                    <a href="#">Забыли пароль?</a>
                </div>
                <div class="form-group">
                  <button class="btn btn-primary btn-block" type="submit">Войти</button>
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
                <p>У вас все еще нет аккаунта?<a class="ms-2" href="{{route('sign_up')}}">Создать аккаунт</a></p>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>

    @endsection