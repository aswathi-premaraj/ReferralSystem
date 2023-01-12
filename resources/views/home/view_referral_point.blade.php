@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
        @auth
        <h1>Referral Points</h1>
        <div class="ms-panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover thead-primary table w-100" id="DataTable">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Point</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($referalList as $list)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $list->username }}</td>
                                                <td>@if($list->referral_point!="")
                                                    {{ $list->referral_point }}
                                                    @else
                                                    0.00
                                                    @endif
                                                </td>
                                               
                                                
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                               
                                    
                                
                            </div>
                        </div>
        
        @endauth

       
    </div>
@endsection