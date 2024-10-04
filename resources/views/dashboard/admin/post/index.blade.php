@extends('dashboard.layout.admin')
@section('content')
   <div class="overflow-x-auto">
       <table class="table table-xs">
           <tr>
               <th>
                   ID
               </th>
               <th>
                   Users
               </th>
               <th>
                   Role
               </th>
               <th>
                   Post Count
               </th>
               <th>
                   Post Details
               </th>
           </tr>

           @foreach($users as $user)
               <tr>
                   <td>{{$user->id}}</td>
                   <td>
                       {{$user->name}}
                   </td>

                   <td>
                       @switch($user->role)
                           @case(0)
                               {{'Employer'}}
                               @break

                           @case(1)
                               {{'Employee'}}
                               @break

                           @case(2)
                               {{'Admin'}}
                               @break
                       @endswitch
                   </td>

                   <td>
                       {{$jobs->where('employer_id',$user->id)->count()}}
                   </td>

                   <td>
                       <a href="{{url('admin/posts/postdetails/'.$user->id)}}" class="btn btn-warning btn-sm" title="Press to look In Details">
                            For Details...
                       </a>

                   </td>
               </tr>
           @endforeach
       </table>
   </div>
@endsection
