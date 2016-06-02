@include('public.top')
            <div id="page-inner"> 
              <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">角色信息</div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="/admin/roles/editinfo" method="post">
                                        <input type="hidden" name="id" value="{{$info->id}}" />
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                                        <div class="form-group">
                                            <label><span style="color:red">*</span>角色名称</label>
                                            <input type="text" class="form-control" name="name" value="@if($info->name) {{$info->name}} @endif"/>
                                        </div>
                                         @if($errors->first('name'))
                                        <div class="alert alert-danger">
                                            {{ $errors->first('name') }}
                                        </div>
                                         @endif
                                        <div class="form-group">
                                            @if(session('fails'))
                                            <div class="alert alert-danger">
                                                {{session('fails')}}
                                            </div>
                                            @endif
                                        </div>
                                        <button type="submit" class="btn btn-default">提交</button>
                                        <button type="reset" class="btn btn-default">恢复表单</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@include('public.footer')
