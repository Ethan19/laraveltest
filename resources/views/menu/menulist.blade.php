@include("public.top")
<style type="text/css">
    .point{
        cursor:pointer;
    }

</style>
		<div id="page-inner"> 
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        	菜单列表 <a href="/admin/menu/add" class="btn btn-primary">新增菜单</a>
                        </div>
                            @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                            @endif
                            @if (session('fails'))
                            <div class="alert alert-danger">
                                {{ session('fails') }}
                            </div>
                            @endif
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>菜单名称</th>
                                            <th>控制器(s)</th>
                                            <th>方法名</th>
                                            <th>父级名称</th>
                                            <th>图标</th>
                                            <th>增加时间</th>
                                            <th class="text-center">修改</th>
                                            <th class="text-center">删除</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($result as $menu)
                                        <tr class="odd gradeX">
                                            <td class="text-left">{{$menu->id}}</td>
                                            <td class="text-left">{{$menu->name}}</td>
                                            <td class="text-left">{{$menu->controller}}</td>
                                            <td class="text-left">{{$menu->action}}</td>
                                            <td class="text-left"><?php if($menu->parent_id == 0){ }else{ echo $menu->parent_id;}?></td>
                                            <td class="text-left">{{$menu->icon}}</td>
                                            <td class="text-left">{{date("Y-m-d H:i:s",$menu->add_time)}}</td>
                                            <td class="text-center fa fa-edit edit point" data="{{$menu->id}}"></td>
                                            <td class="text-center fa fa-trash-o delete point" data="{{$menu->id}}"></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="pager">
                                {!! $result->render() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@include("public.footer")
<script type="text/javascript">

$(document).on('click', '.edit', function() {
    id = $(this).attr('data');
    window.location.href="/admin/menu/edit/"+id;
    /* Act on the event */
});

$(document).on('click', '.delete', function() {
    id = $(this).attr('data');
    $this = $(this);
    $('.alert').remove();
    // console.log(id);return false;
    $.ajax({
        url: '/admin/menu/delete',
        type: 'get',
        dataType: 'json',
        data: {id: id},
        success:function(data){
            if(data.status=='success'){
                $('.panel-heading').after("<div class='alert alert-success'>刪除成功</div>");
            }else{
                $('.panel-heading').after("<div class='alert alert-danger'>刪除失敗</div>");                
            }
            $this.parent().remove();


        }
    })
    
});

</script>