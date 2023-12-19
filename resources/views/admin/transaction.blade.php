@extends('admin.layout.main')
@section('title', 'Transaction')
@section('section')
<style>

    .btns{
        float:right;
        margin-bottom: 8px;
    }
    .btn{
        border-radius: 0px;
        
    }
</style>
<div class="col-lg-12">
    <div class="main-card mb-3 card">
    <div class="card-body">
        <div class="add" style="display: flex; align-items: center;">
            {{-- <h5 class="card-title">TRANSACTION</h5> --}}
            <div class="btns" style="margin-left: auto;">
              {{-- <button type="button" class="btn btn-secondary">Transaction</button> --}}
            </div>
          </div>
          

    <div class="table-responsive">
    <table class="mb-0 table">
    <thead>
    <tr>
    <th>S No</th>
    <th>Username</th>
    <th>Action</th>
    <th>Amount</th>
    <th>Balance</th>
    
    </tr>
    </thead>
    <tbody>
        @foreach($data as $user)
        <tr>
            <td>{{ $loop->index + 1 }}</td>
            <td>{{ $user->user->name }}</td>
            <td >
               <span class=" {{ $user->action === 'add' ? 'badge badge-success ml-2' : 'badge badge-danger ml-2' }}">{{ $user->action }}</span>  
            </td>

            <td>{{ $user->amount }}</td>
            {{-- <td><a class="btn " href="{{route('admin.resultedit',$user->id)}}"><i class="fa fa-edit" style="font-size:24px"></i></a></td> --}}
            {{-- <td><a class="btn btn-danger" href="{{route('admin.resultdelete',$user->id)}}">Delete</a></td> --}}
            <!-- Add more columns as needed -->
        </tr>
    @endforeach
 
    </tbody>
    </table>
    </div>
    </div>
    </div>
    </div>
    @endsection