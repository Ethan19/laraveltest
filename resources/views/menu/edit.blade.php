@include('public.top')
            <div id="page-inner"> 
              <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">表单信息</div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="/admin/menu/editinfo" method="post">
                                        <input type="hidden" name="id" value="{{$info->id}}" />

                                        <div class="form-group">
                                            <label><span style="color:red">*</span>菜单名称</label>
                                            <input type="text" class="form-control" name="name" value="{{$info->name}}"/>
                                        </div>
                                        <div class="form-group">
                                            <label><span style="color:red">*</span>CONTROLLER</label>
                                            <input type="text" name="controller" class="form-control" value="{{$info->controller}}" />
                                        </div>
                                        <div class="form-group">
                                            <label>ACTION</label>
                                            <input type="text" name="action" class="form-control" value="{{$info->action}}" />
                                        </div>
                                        <div class="form-group">
                                            <label>图标</label>
                                            <input type="text" name="icon" class="form-control" value="{{$info->icon}}">
                                        </div>
                                        <div class="form-group">
                                            <label>父级菜单</label>
                                            <select class="form-control" name="parent_id">
                                                <option value="0">无父级</option>
                                                @foreach($list as $val)
                                                <option value="{{$val->id}}" <?php if($info->parent_id == $val->id){echo "selected='selected'";}?> >{{$val->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-default">Submit Button</button>
                                        <button type="reset" class="btn btn-default">Reset Button</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@include('public.footer')
