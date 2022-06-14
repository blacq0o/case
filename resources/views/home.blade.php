@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Task Level</th>
                                <th scope="col">Task Time</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $totalHours = $allTotal = 0;
                                $weekHours = 45;
                                $totalDevWeekHours = 15*45;
                            @endphp
                            @foreach($tasksGroup as $taskLevel => $tasks)
                                @php
                                    $hours = $tasks->sum('task_time');
                                    $totalHours += $hours;
                                    $allTotal +=($hours*$taskLevel);
                                @endphp
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$taskLevel}}</td>
                                    <td>Total Hours Level: {{$hours.' - 1xlik süresi: '.($hours*$taskLevel)}}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td>1x'lik Toplam Saat</td>
                                <td>{{$allTotal}}</td>
                            </tr>
                            <tr>
                                <td>Toplam Bitirilecek Hafta</td>
                                <td>{{round($allTotal/$totalDevWeekHours,2)}}</td>
                            </tr>
                            <tr>
                                <td>{{round($allTotal/$totalDevWeekHours,2)}} Haftada Çalışalıcak 1x Saat</td>
                                <td>{{round($allTotal/$totalDevWeekHours,2)*$weekHours}}</td>
                            </tr>
                            @foreach($developers as $dev => $level)
                                <tr>
                                    <td>{{$dev}}</td>
                                    <td>1x'lik Toplam: {{($level*(round($allTotal/$totalDevWeekHours,2)*$weekHours))}} İş</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
