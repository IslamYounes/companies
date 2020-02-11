@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-5">
            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        {{$error}}<br>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-md-5">
            <h3>Companies</h3>
            <!-- Button trigger modal -->
            <a class="btn btn-success" data-toggle="modal" data-target="#exampleModalScrollable" href="/companies/store">Add Company</a>
            <!-- Modal -->
            <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalScrollableTitle">Add Company</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('companiesStore') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="logo">Logo</label>
                                    <input type="file" name="logo" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control" required>

                                    <label for="email">Email</label>
                                    <input type="text" name="email" class="form-control">

                                    <label for="website">Website</label>
                                    <input type="text" name="website" class="form-control">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Add</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-hover table-sm table-striped mt-4">
                <tr>
                    <th>Logo</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>website</th>
                    <th colspan="3">Actions</th>
                </tr>
                @foreach($companies as $index => $company)
                    <tr>
                        <td><img src="{{asset('storage/logos/'.$company->logo)}}" style="width: 40px;height:40px;"></td>
                        <td>{{$company->name}}</td>
                        <td>{{$company->email}}</td>
                        <td>{{$company->website}}</td>
                        <td>
                            <!-- Button trigger modal -->
                            <a class="btn btn-warning" data-toggle="modal" data-target="#exampleModalScrollableeditcompany{{$index}}" >Edit</a>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalScrollableeditcompany{{$index}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalScrollableTitle">Edit Company</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('companiesEdit') }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="logo">Logo</label>
                                                    <img src="{{asset('storage/logos/'.$company->logo)}}" style="width: 40px;height:40px;">
                                                    <input type="file" name="logo" class="form-control">
                                                    <input type="hidden" name="old_logo" value="{{$company->logo}}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="name">Name</label>
                                                    <input type="text" name="name" class="form-control" value="{{$company->name}}" required>

                                                    <label for="email">Email</label>
                                                    <input type="text" name="email" class="form-control" value="{{$company->email}}">

                                                    <label for="website">Website</label>
                                                    <input type="text" name="website" class="form-control" value="{{$company->website}}">
                                                </div>
                                                <div class="form-group">
                                                    <input type="hidden" name="id" value="{{$company->id}}">
                                                    <button type="submit" class="btn btn-success">Edit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td><a class="btn btn-danger" href="/companies/delete/{{$company->id}}">Delete</a></td>
                    </tr>
                @endforeach
            </table>
            {{$companies->links()}}
        </div>
        <div class="col-md-7">
            <h3>Employees</h3>
            <!-- Button trigger modal -->
            <a class="btn btn-success" data-toggle="modal" data-target="#exampleModalScrollableemployee" href="/employees/store">Add Employee</a>
            <!-- Modal -->
            <div class="modal fade" id="exampleModalScrollableemployee" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitleemployee" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalScrollableTitle">Add Company</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('employeeStore') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="f_name">First Name</label>
                                    <input type="text" name="f_name" id="f_name"  class="form-control" required>

                                    <label for="l_name">Last Name</label>
                                    <input type="text" name="l_name" id="l_name"  class="form-control" required>

                                    <label for="email">Email</label>
                                    <input type="text" name="email"  id="email" class="form-control">

                                    <label for="phone">Phone</label>
                                    <input type="text" name="phone"  id="phone" class="form-control">

                                    <label for="company_id">Company</label>
                                    <select name="company_id" class="form-control">
                                        @foreach($companies as $company)
                                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Add</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-hover table-sm table-striped mt-4">
                <tr>
                    <th>#</th>
                    <th>firstName</th>
                    <th>lastName</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Company</th>
                    <th colspan="3">Actions</th>
                </tr>
                @foreach($employees as $index => $employee)
                    <tr>
                        <td>{{$index+1}}</td>
                        <td>{{$employee->f_name}}</td>
                        <td>{{$employee->l_name}}</td>
                        <td>{{$employee->email}}</td>
                        <td>{{$employee->phone}}</td>
                        <td>{{$employee->company->name}}</td>
                        <td>
                            <!-- Button trigger modal -->
                            <a class="btn btn-warning" data-toggle="modal" data-target="#exampleModalScrollableeditemployee{{$index}}" >Edit</a>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalScrollableeditemployee{{$index}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalScrollableTitle">Edit Company</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('employeeEdit') }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="f_name">First Name</label>
                                                    <input type="text" name="f_name" class="form-control" value="{{$employee->f_name}}" required>

                                                    <label for="l_name">Last Name</label>
                                                    <input type="text" name="l_name" class="form-control" value="{{$employee->l_name}}" required>

                                                    <label for="email">Email</label>
                                                    <input type="text" name="email" class="form-control" value="{{$employee->email}}">

                                                    <label for="phone">Phone</label>
                                                    <input type="text" name="phone" class="form-control" value="{{$employee->phone}}">

                                                    <label for="company_id">Company</label>
                                                    <select name="company_id" class="form-control">
                                                        @foreach($companies as $company)
                                                            <option value="{{ $company->id }}" {{$company->id == $employee->company->id ? "selected" : " "}} >{{ $company->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <input type="hidden" name="id" value="{{$employee->id}}">
                                                    <button type="submit" class="btn btn-success">Edit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td><a class="btn btn-danger" href="/employee/delete/{{$employee->id}}">Delete</a></td>
                    </tr>
                @endforeach
            </table>
            {{$employees->links()}}
        </div>
    </div>
</div>
@endsection