@extends('layout.main')

@push('style-section')
@endpush

@section('title')
    Users List
@endsection

@section('page_title')
    Users List
@endsection

@section('body')

    {{--Start Content--}}
    <div class="section-wrapper">
        <div class="row justify-content-end">
            <div class="col-md-2 col-lg-2 col-sm-12">
                <a href="{{route('admin.user.add')}}" class="btn btn-primary active btn-block mg-b-10">Add User</a>
            </div>
        </div>
        <div class="table-responsive">
            @if(count($users) > 0)
                <table class="table table-striped">
                    <thead>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Action</th>
                    </thead>
                    <tbody>
                    @foreach($users as $row)
                        <tr>
                            <td>{{$row->fname}}</td>
                            <td>{{$row->lname}}</td>
                            <td>{{$row->email}}</td>
                            <td>{{$row->role}}</td>
                            <td>
                                @if($row->status == 1)
                                    <span class="text-success">Active</span>
                                @else
                                    <span class="text-danger">Active</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{route('admin.user.view', encrypt($row->id))}}" title="View detail"
                                   class="mr-1">
                                    <i class="fa fa-eye text-info"></i>
                                </a>
                                <a href="{{route('admin.user.edit',encrypt($row->id))}}" title="Edit record"
                                   class="mr-1">
                                    <i class="fa fa-pencil text-success"></i>
                                </a>
                                @if(auth()->user()->id != $row->id)
                                    <a onclick="return confirm('Are you sure?')" href="{{route('admin.user.delete', encrypt($row->id))}}" title="Delete record"
                                       class="mr-1">
                                        <i class="fa fa-trash text-danger"></i>
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                No Record found.
            @endif
        </div>
        @include('include.pagination',['paginator' => $users])
    </div>
    {{--End Content--}}
@endsection

@push('script-section')
    <script>

    </script>
@endpush
