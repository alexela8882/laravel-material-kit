@extends('layouts.app')

@section('content')
<div class="wrapper">
    <div class="main main-raised">
    	<div class="container">
    		<h3 class="title">Manage Users <i class="fa fa-users"></i></h3>
            <table id="fresh-table" class="table">
                <thead>
                    <th data-field="id">ID</th>
                	<th data-field="name" data-sortable="true">Name</th>
                	<th data-field="email" data-sortable="true">Email</th>
                	<th data-field="actions" data-formatter="operateFormatter" data-events="operateEvents">Actions</th>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    	<tr>
                    		<td>{{ $user->id }}</td>
                    		<td>{{ $user->name }}</td>
                    		<td>{{ $user->email }}</td>
                    		<td></td>
                    	</tr>
                    @endforeach
                </tbody>
            </table>
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
            'click .like': function (e, value, row, index) {
                alert('You click like icon, row: ' + JSON.stringify(row));
                console.log(value, row, index);
            },
            'click .edit': function (e, value, row, index) {
                alert('You click edit icon, row: ' + JSON.stringify(row));
                console.log(value, row, index);    
            },
            'click .remove': function (e, value, row, index) {
                $table.bootstrapTable('remove', {
                    field: 'id',
                    values: [row.id]
                });
        
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
            '<a data-toggle="tooltip" title="Like" class="table-actions like" href="javascript:void(0)">',
                '<i class="fa fa-heart"></i>',
            '</a>',
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