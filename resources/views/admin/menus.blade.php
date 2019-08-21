@extends('layouts.admin')

@section('title')     
<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0 text-dark">{{ trans('custom.menus') }}</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin') }}">{{ trans('custom.home') }}</a></li>
            <li class="breadcrumb-item active">{{ trans('custom.menus') }}</li>
        </ol>
    </div><!-- /.col -->
</div><!-- /.row -->
@endsection

@section('content')        
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header card-header-block">
                <div class="card-tools">
                    <a href="#" class="btn btn-tool btn-sm">
                        <button type="button" class="btn btn-block btn-primary btn-sm" onclick="addData()">{{ trans('custom.add') }}</button>
                    </a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-bordered table-striped table-hover data-table" id="list-data">
                    <thead>
                        <tr>
                            <th>{{ trans('custom.no') }}</th>
                            <th>{{ trans('custom.order') }}</th>
                            <th>{{ trans('custom.name') }}</th>
                            <th>{{ trans('custom.link') }}</th>
                            <th>{{ trans('custom.icon') }}</th>
                            <th>{{ trans('custom.parent_menu') }}</th>
                            <th>{{ trans('custom.language') }}</th>
                            <th>{{ trans('custom.created_date') }}</th>
                            <th>{{ trans('custom.action') }}</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>

<!-- The Modal -->
<div class="modal" id="formModal">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">{{ trans('custom.add_data') }}</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal Body -->
            <div class="modal-body">
                <form class="form-horizontal" id="form" action="javascript:void(0)" method="post" autocomplete="off">
                    <input type="hidden" name="id" value="" id="id">

                    <div class="card-body">
                        <div class="form-group">
                            <label for="order" class="col-sm-2 control-label">{{ trans('custom.order') }}<span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="order" name="order" placeholder="{{ trans('custom.order') }}" value="{{ old('order', $item->order) }}"/>
                            </div>
                            <span class="text-danger">{{ $errors->first('order') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">{{ trans('custom.name') }}<span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name" placeholder="{{ trans('custom.name') }}" value="{{ old('name', $item->name) }}"/>
                            </div>
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="link" class="col-sm-2 control-label">{{ trans('custom.link') }}<span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="link" name="link" placeholder="{{ trans('custom.link') }}" value="{{ old('link', $item->link) }}"/>
                            </div>
                            <span class="text-danger">{{ $errors->first('link') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="icon" class="col-sm-2 control-label">{{ trans('custom.icon') }}</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="icon" name="icon" placeholder="{{ trans('custom.icon') }}" value="{{ old('icon', $item->icon) }}"/>
                            </div>
                            <span class="text-danger">{{ $errors->first('icon') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="parent_id" class="col-sm-2 control-label">{{ trans('custom.parent_menu') }}</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="parent_id" name="parent_id">
                                    <option value="0">{{ trans('custom.parent_menu') }}</option>
                                    @foreach($menus as $row)
                                        <option value="{{ $row->id }}">{{ ucwords($row->name) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <span class="text-danger">{{ $errors->first('parent_id') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="language" class="col-sm-2 control-label">{{ trans('custom.language') }}<span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="language" name="language" placeholder="{{ trans('custom.language') }}" value="{{ old('language', $item->language) }}"/>
                            </div>
                            <span class="text-danger">{{ $errors->first('language') }}</span>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-danger">{{ trans('custom.save') }}</button>
                            <button type="reset" class="btn btn-default">{{ trans('custom.reset') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection


@section('add-on')
<script>
    $(function() {
        $('#list-data').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{!! route('api.admin.menus.list') !!}",
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                { data: 'order', name: 'order' },
                { data: 'name', name: 'name' },
                { data: 'link', name: 'link' },
                { data: 'icon', name: 'icon' },
                { data: 'parent_id', name: 'parent_id' },
                { data: 'language', name: 'language' },
                { data: 'created_at', name: 'created_at' },
                { data: 'action', name: 'action', orderable: false, searchable: false},
            ],
            columnDefs: [
                {
                    targets: [0, 1, 7, 8],
                    className: 'text-center'
                }
            ],
            order: [7, "desc"],
        });
    });

    // Pengaturan Form Validation 
    var form_validator = $("#form").validate({
        errorPlacement: function(error, element) {
            $(element).parent().closest('.form-group').append(error);
        },
        errorElement: "span",
        rules: {
            order: {
                required: true,
                maxlength: 3
            },
            name: {
                required: true,
                maxlength: 50
            },
            link: {
                required: true,
                maxlength: 50
            },
            icon: {
                maxlength: 50
            },
            language: {
                required: true,
                maxlength: 50
            },
        },
        messages: {
            order: {
                required: "Please enter {{ trans('custom.order') }}",
                maxlength: "{{ trans('custom.wrong_messages', ['field' => trans('custom.order'), 'length' => 3]) }}"
            },
            name: {
                required: "Please enter {{ trans('custom.name') }}",
                maxlength: "{{ trans('custom.wrong_messages', ['field' => trans('custom.name'), 'length' => 50]) }}"
            },
            link: {
                required: "Please enter {{ trans('custom.link') }}",
                maxlength: "{{ trans('custom.wrong_messages', ['field' => trans('custom.link'), 'length' => 50]) }}"
            },
            icon: {
                maxlength: "{{ trans('custom.wrong_messages', ['field' => trans('custom.icon'), 'length' => 50]) }}"
            },
            language: {
                required: "Please enter {{ trans('custom.language') }}",
                maxlength: "{{ trans('custom.wrong_messages', ['field' => trans('custom.language'), 'length' => 50]) }}"
            },
        },
        submitHandler : function(form){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({  
                url         : "{{ route('admin.menus.store') }}",
                type        : "post",
                data        : $('#form').serialize(),
                beforeSubmit: showRequest,
                success     : showResponse,
                clearForm   : true,
                resetForm   : true,
            }); 
            function showRequest(formData, jqForm, options) {
                var queryString = $.param(formData); 
                return true; 
            } 
            function showResponse(responseText, statusText, xhr, $form)  { 
                if(responseText.status == "success"){
                    toastr.success(responseText.message);
                }else if(responseText.status == "failed"){
                    toastr.error(responseText.message);
                }else if(responseText.status == "unique"){
                    toastr.error(responseText.message);
                }

                setTimeout(function(){
                    window.location.reload()
                },2000);
            } 
            return false;
        }
    });

    function addData(){
        $('#formModal').modal('show');
        $('#form')[0].reset(); 
        $('.modal-title').text("{{ trans('custom.add_data') }}"); 
    }

    function editData(value){   
        form_validator.resetForm();
        $("html, body").animate({
            scrollTop: 0
        }, 500);
        $.getJSON("{!! route('api.admin.menus.selectbyid') !!}", {id: value}, function(json, textStatus) {
            if(json.status == "success"){
                var row = json.data;
                $('#id').val(row.id);
                $('#order').val(row.order);
                $('#name').val(row.name);
                $('#link').val(row.link);
                $('#icon').val(row.icon);
                $('#parent_id').val(row.parent_id).change();
                $('#language').val(row.language);
                
                $('#formModal').modal('show');
                $('.modal-title').text("{{ trans('custom.edit_data') }}"); 
            }
            else if(json.status == "error"){
                toastr.error("{{ trans('custom.data_not_found') }}");
            }
       });
    }

    function deleteData(value){
        form_validator.resetForm();

        $("html, body").animate({
            scrollTop: 0
        }, 500);

        $.confirm({
            content : "{{ trans('custom.delete_this_data') }}",
            title : "{{ trans('custom.are_you_sure') }}",
            confirm: function() {
                $.getJSON("{!! route('api.admin.menus.delete') !!}", {id: value}, function(json, textStatus) {
                    if(json.status == "success"){
                        toastr.success('{{ trans("custom.deleted_succesfully") }}');
                    }else if(json.status == "error"){
                        toastr.error('{{ trans("custom.failed_to_delete") }}');
                    }
                    setTimeout(function(){
                        window.location.reload()
                    },1000);
               });
            },
            cancel: function(button) {
                // nothing to do
            },
            confirmButton: "Yes",
            cancelButton: "No",
            confirmButtonClass: "btn-danger",
            cancelButtonClass: "btn-success",
            dialogClass: "modal-dialog modal-lg" // Bootstrap classes for large modal
        });
    }
    
</script>
@endsection
        