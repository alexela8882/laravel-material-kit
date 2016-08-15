@extends('layouts.app')

@section('content')
{!! Toastr::render() !!}
<div class="main main-raised">
    <div class="container">
        <div class="section-classic">
            <h3 class="title">Manage Users <i class="material-icons">verified_user</i></h3>
            <div class="toolbar">
                <a href="{{ url('users/create') }}" class="btn btn-primary btn-sm"><i class="material-icons">add</i> Register new user</a>
            </div>
            <table id="fresh-table" class="table">
                <thead>
                    <th data-field="id">ID</th>
                    <th data-field="name" data-sortable="true" data-visible="false">Name</th>
                    <th data-field="email" data-sortable="true">Email</th>
                    <th data-field="role" data-sortable="true">Role</th>
                    <th data-field="actions" data-formatter="operateFormatter" data-events="operateEvents">Actions</th>
                </thead>
                <tbody>
                    @foreach ($users as $index => $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role == 0 ? 'User' : ($user->role == 1 ? 'Administrator' : 'Super Admin') }}</td>
                            <td></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Modal Core -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-warning"></i> Confirm your action!</h4>
      </div>
      <div class="modal-body"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-simple" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@stop

@push('scripts')
<script type="text/javascript">
    var $table = $('#fresh-table'),
        full_screen = false;
        
    $().ready(function(){

    	// Arrangement is important for the actions to work
    	window.operateEvents = {
            'click .edit': function (e, value, row, index) {
                var url = 'users/' + row.id + '/edit';
                window.location = url;
                // alert('You click edit icon, row: ' + JSON.stringify(row.id));
                // console.log(value, row, index);    
            },
            'click .remove': function (e, value, row, index) {
                $('.el').remove();
                var url = window.location.href + '/' + row.id + '/delete';
                var el = '<p class="el">You are about to delete a user with ID #' + row.id + '.</p>';
                var el2 = '<a class="el btn btn-danger btn-simple" href="' + url + '">Confirm</a>';
                $('#myModal').modal('show');
                $('.modal-body').prepend(el);
                $('.modal-footer').prepend(el2);
            }
        };

        $table.bootstrapTable({
            toolbar: ".toolbar",

            showRefresh: false,
            search: true,
            showToggle: true,
            showColumns: true,
            pagination: true,
            striped: true,
            pageSize: 8,
            pageList: [8,10,25,50,100],
            
            formatShowingRows: function(pageFrom, pageTo, totalRows){
                //do nothing here, we don't want to show the text "showing x of y from..." 
            },
            formatRecordsPerPage: function(pageNumber){
                return pageNumber + " rows visible";
            },
            icons: {
                refresh: 'fa fa-refresh',
                toggle: 'fa fa-th-list',
                columns: 'fa fa-columns',
                detailOpen: 'fa fa-plus-circle',
                detailClose: 'fa fa-minus-circle'
            }
        });         
        
        $(window).resize(function () {
            $table.bootstrapTable('resetView');
        });
        
    });
        

    function operateFormatter(value, row, index) {
        return [
            '<a data-toggle="tooltip" title="Edit" class="table-actions edit" href="javascript:void(0)">',
                '<i class="fa fa-edit"></i>',
            '</a>',
            '<a data-toggle="tooltip" title="Remove" class="table-actions remove" href="javascript:void(0)">',
                '<i class="fa fa-remove"></i>',
            '</a>'
        ].join('');
    }

        
</script>
@endpush