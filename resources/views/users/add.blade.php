@include('public.top')
            <div id="page-inner"> 
              <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">表单信息</div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="/admin/roles/addinfo" method="post">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                                        <div class="form-group">
                                            <label><span style="color:red">*</span>菜单名称</label>
                                            <input type="text" class="form-control" name="name" value=""/>
                                        </div>
                                         @if($errors->first('name'))
                                        <div class="alert alert-danger">
                                            {{ $errors->first('name') }}
                                        </div>
                                         @endif
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
