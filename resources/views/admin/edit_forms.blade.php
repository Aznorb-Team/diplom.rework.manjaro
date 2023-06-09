@extends('layouts.layout')
@section('title', 'Edit Steps')
@section('content')
    @include('layouts.navigations.admin_nav')
    <!-- Page Sidebar Ends-->
    <div class="page-body">
        <!-- Container-fluid starts-->
        <div class="container-fluid dashboard-default-sec">
            <div class="row">
            <div class="build-wrap"></div>
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Панель редактирование форм</h5>
                            <span></span>
                            <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="col-form-label">Формы</label>
                                            <select
                                                class="form-select input-air-primary"
                                                tabindex="-1" aria-hidden="true" name="form" id="form_select" required>
                                                @foreach ($stages as $stage)
                                                        <option value="{{ $stage->id }}">{{ $stage->form->title }}
                                                            </option>
                                                @endforeach
                                            </select>
                                            {{-- <span class="select2 select2-container select2-container--default select2-container--focus" dir="ltr" style="width: 1402px;"><span class="selection"><span class="select2-selection select2-selection--multiple" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1"><ul class="select2-selection__rendered"><li class="select2-search select2-search--inline"><input class="select2-search__field" type="search" tabindex="0" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" role="textbox" aria-autocomplete="list" placeholder="" style="width: 0.75em;"></li></ul></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span> --}}
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <form action="{{ route('save.form') }}" method="post">
                        @csrf
                            <div class="card-body form-builder">
                                <div class="form-builder-column">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-builder-2-header">
                                                <div>
                                                    <ul class="nav nav-primary" id="pills-tab" role="tablist">
                                                        <li class="nav-item"><a class="nav-link active" id="pills-input-tab"
                                                                data-bs-toggle="pill" href="#pills-input" role="tab"
                                                                aria-controls="pills-input" aria-selected="true"
                                                                data-bs-original-title="" title="">Input</a></li>
                                                        <li class="nav-item"><a class="nav-link" id="pills-radcheck-tab"
                                                                data-bs-toggle="pill" href="#pills-radcheck" role="tab"
                                                                aria-controls="pills-radcheck" aria-selected="false"
                                                                data-bs-original-title="" title="">Radio/Checkbox</a>
                                                        </li>
                                                        <li class="nav-item"><a class="nav-link" id="pills-select-tab"
                                                                data-bs-toggle="pill" href="#pills-select" role="tab"
                                                                aria-controls="pills-select" aria-selected="false"
                                                                data-bs-original-title="" title="">Select</a></li>
                                                        <li class="nav-item"><a class="nav-link" id="pills-button-tab"
                                                                data-bs-toggle="pill" href="#pills-button" role="tab"
                                                                aria-controls="pills-button" aria-selected="false"
                                                                data-bs-original-title="" title="">Buttons</a></li>
                                                    </ul>
                                                </div>
                                                <div>
                                                    <nav class="navbar navbar-expand-md p-0">
                                                        <div class="form-inline">
                                                            <div class="me-2">
                                                                <select class="btn form-control b-light" id="n-columns">
                                                                    <option value="1">1 Column</option>
                                                                    <option value="2">2 Columns</option>
                                                                </select>
                                                            </div>
                                                            <button class="btn btn-primary copy-btn" id="copy-to-clipboard"
                                                                type="submit" data-clipboard-text="testing"
                                                                data-bs-original-title="" title="">Copy HTML</button>
                                                        </div>
                                                    </nav>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-xl-6">
                                            <div class="tab-content" id="pills-tabContent">
                                                <div class="tab-pane fade active show" id="pills-input" role="tabpanel"
                                                    aria-labelledby="pills-input-tab">
                                                    <div class="theme-form">
                                                        <div class="mb-3 draggable ui-draggable ui-draggable-handle">
                                                            <label for="input-text-2">Text Input</label>
                                                            <input class="form-control btn-square" id="input-text-2"
                                                                type="email" placeholder="Enter email"
                                                                data-bs-original-title="" title="">
                                                            <p class="help-block">Haha block-level help text here.</p>
                                                        </div>
                                                        <hr>
                                                        <div class="mb-3 draggable ui-draggable ui-draggable-handle">
                                                            <label for="input-password-1">Password</label>
                                                            <input class="form-control btn-square" id="input-password-1"
                                                                type="password" placeholder="Password"
                                                                data-bs-original-title="" title="">
                                                            <p class="help-block">Example block-level help text here.</p>
                                                        </div>
                                                        <hr>
                                                        <div class="mb-3 draggable ui-draggable ui-draggable-handle">
                                                            <label for="select-1">Select</label>
                                                            <select class="form-control btn-square" id="select-1">
                                                                <option value="Option 1">Option 1</option>
                                                                <option value="Option 2">Option 2</option>
                                                                <option value="Option 3">Option 3</option>
                                                            </select>
                                                            <p class="help-block">Example block-level help text here.</p>
                                                        </div>
                                                        <hr>
                                                        <div class="mb-3 draggable ui-draggable ui-draggable-handle">
                                                            <label for="input-file-1">File input</label>
                                                            <input id="input-file-1" type="file"
                                                                data-bs-original-title="" title="">
                                                            <p class="help-block">Example block-level help text here.</p>
                                                        </div>
                                                        <hr>
                                                        <div class="mb-3 draggable ui-draggable ui-draggable-handle">
                                                            <label for="prependedcheckbox">Appended Checkbox</label>
                                                            <div class="input-group"><span class="input-group-text">
                                                                    <input class="me-0" type="checkbox"
                                                                        data-bs-original-title="" title=""></span>
                                                                <input class="form-control btn-square"
                                                                    id="prependedcheckbox" name="prependedcheckbox"
                                                                    type="text" placeholder="Placeholder"
                                                                    data-bs-original-title="" title="">
                                                            </div>
                                                            <p class="help-block">Example block-level help text here.</p>
                                                        </div>
                                                        <hr>
                                                        <div class="mb-3 draggable ui-draggable ui-draggable-handle">
                                                            <label for="prependedcheckbox">Button DropDown</label>
                                                            <div class="input-group">
                                                                <input class="form-control btn-square" id="buttondropdown"
                                                                    name="buttondropdown" placeholder="Placeholder"
                                                                    type="text" data-bs-original-title=""
                                                                    title="">
                                                                <div class="input-group-btn btn btn-square p-0">
                                                                    <button
                                                                        class="btn btn-primary dropdown-toggle btn-square"
                                                                        type="button" data-bs-toggle="dropdown"
                                                                        data-bs-original-title=""
                                                                        title="">Action<span
                                                                            class="caret"></span></button>
                                                                    <ul class="dropdown-menu pull-right">
                                                                        <li><a class="dropdown-item" href="#"
                                                                                data-bs-original-title=""
                                                                                title="">Option one</a></li>
                                                                        <li><a class="dropdown-item" href="#"
                                                                                data-bs-original-title=""
                                                                                title="">Option two</a></li>
                                                                        <li><a class="dropdown-item" href="#"
                                                                                data-bs-original-title=""
                                                                                title="">Option three</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <p class="help-block">Example block-level help text here.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="pills-radcheck" role="tabpanel"
                                                    aria-labelledby="pills-radcheck-tab">
                                                    <div class="theme-form">
                                                        <div class="mb-3 draggable ui-draggable ui-draggable-handle">
                                                            <label>Inline checkbox</label>
                                                            <div class="col">
                                                                <div class="m-checkbox-inline">
                                                                    <div class="checkbox">
                                                                        <input id="checkbox1" type="checkbox"
                                                                            data-bs-original-title="" title="">
                                                                        <label for="checkbox1">Default 1</label>
                                                                    </div>
                                                                    <div class="checkbox">
                                                                        <input id="checkbox2" type="checkbox"
                                                                            data-bs-original-title="" title="">
                                                                        <label for="checkbox2">Default 2</label>
                                                                    </div>
                                                                    <div class="checkbox">
                                                                        <input id="checkbox3" type="checkbox"
                                                                            data-bs-original-title="" title="">
                                                                        <label for="checkbox3">Default 3</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <p class="help-block m-t-help-block">Example block-level help
                                                                text here.</p>
                                                        </div>
                                                        <hr>
                                                        <div class="mb-3 draggable ui-draggable ui-draggable-handle">
                                                            <label>Inline Radiobox</label>
                                                            <div class="col">
                                                                <div class="m-checkbox-inline">
                                                                    <div class="radio radio-theme">
                                                                        <input id="radioinline1" type="radio"
                                                                            name="radio1" value="option1"
                                                                            data-bs-original-title="" title="">
                                                                        <label for="radioinline1">Option 1</label>
                                                                    </div>
                                                                    <div class="radio radio-theme">
                                                                        <input id="radioinline2" type="radio"
                                                                            name="radio1" value="option2"
                                                                            data-bs-original-title="" title="">
                                                                        <label for="radioinline2">Option 2</label>
                                                                    </div>
                                                                    <div class="radio radio-theme">
                                                                        <input id="radioinline3" type="radio"
                                                                            name="radio1" value="option3"
                                                                            data-bs-original-title="" title="">
                                                                        <label for="radioinline3">Option 3</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <p class="help-block m-t-help-block">Example block-level help
                                                                text here.</p>
                                                        </div>
                                                        <hr>
                                                        <div class="mb-3 draggable ui-draggable ui-draggable-handle">
                                                            <label>Custom checkbox</label>
                                                            <div class="col">
                                                                <div class="checkbox">
                                                                    <input id="checkbox-def" type="checkbox"
                                                                        data-bs-original-title="" title="">
                                                                    <label for="checkbox-def">Default</label>
                                                                </div>
                                                                <div class="checkbox">
                                                                    <input id="checkbox-dis" type="checkbox"
                                                                        disabled="" data-bs-original-title=""
                                                                        title="">
                                                                    <label for="checkbox-dis">Disabled</label>
                                                                </div>
                                                                <div class="checkbox">
                                                                    <input id="checkbox-chk" type="checkbox"
                                                                        checked="" data-bs-original-title=""
                                                                        title="">
                                                                    <label for="checkbox-chk">Checked</label>
                                                                </div>
                                                            </div>
                                                            <p class="help-block">Example block-level help text here.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="pills-select" role="tabpanel"
                                                    aria-labelledby="pills-select-tab">
                                                    <div class="theme-form">
                                                        <div class="mb-3 draggable ui-draggable ui-draggable-handle">
                                                            <label for="formcontrol-select1">Example select</label>
                                                            <select class="form-control btn-square"
                                                                id="formcontrol-select1">
                                                                <option>1</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                                <option>5</option>
                                                            </select>
                                                            <p class="help-block">Example block-level help text here.</p>
                                                        </div>
                                                        <hr>
                                                        <div class="mb-3 draggable ui-draggable ui-draggable-handle">
                                                            <label for="formcontrol-select2">Example multiple
                                                                select</label>
                                                            <select class="form-control btn-square"
                                                                id="formcontrol-select2" multiple="">
                                                                <option>1</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                                <option>5</option>
                                                            </select>
                                                            <p class="help-block">Example block-level help text here.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="pills-button" role="tabpanel"
                                                    aria-labelledby="pills-button-tab">
                                                    <div class="theme-form">
                                                        <div class="mb-3 draggable ui-draggable ui-draggable-handle">
                                                            <label class="m-r-10">Single Button</label><br>
                                                            <button class="btn btn-primary active" type="button"
                                                                data-original-title="btn btn-dark active" title=""
                                                                data-bs-original-title="">Button</button>
                                                            <p class="help-block">Example block-level help text here.</p>
                                                        </div>
                                                        <hr>
                                                        <div class="mb-3 draggable ui-draggable ui-draggable-handle">
                                                            <label class="m-r-10">Double Button</label><br>
                                                            <button class="btn btn-primary" type="button"
                                                                data-original-title="btn btn-primary-gradien"
                                                                title="" data-bs-original-title="">Primary</button>
                                                            <button class="btn btn-secondary" type="button"
                                                                data-original-title="btn btn-primary-gradien"
                                                                title=""
                                                                data-bs-original-title="">Secondary</button>
                                                            <p class="help-block">Example block-level help text here.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-xl-6 lg-mt">
                                            <!-- Form builder column wise start-->
                                            <div class="drag-bx card-body">

                                                <div class="form-body row form-builder-2">
                                                    <div class="col-md-12 droppable sortable ui-droppable ui-sortable">
                                                        
                                                    </div>
                                                    <div class="col-md-6 droppable sortable ui-droppable ui-sortable"
                                                        style="display: none;"></div>
                                                    <div class="col-md-6 droppable sortable ui-droppable ui-sortable"
                                                        style="display: none;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input name="form_id" id="form_id" value="{{$stages[0]->id}}" hidden>
                            <input name="html_code" id="html-code" value="" hidden>
                            <div class="card-footer text-end">
                                <button class="btn btn-primary" type="submit" id="save_but" disabled>Сохранить</button>
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
        document.getElementById("copy-to-clipboard").onclick = function() {document.getElementById("save_but").disabled = false;};

        var select = document.getElementById('form_select');
        input = document.getElementById('form_id');
        select.addEventListener('change',function(){
            input.value = select.value;



        });
    </script>
@endsection
