@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="text center my-4">
                <h3>Big Data</h3>
            </div>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Table NO</th>
                            <th>Keyword name</th>
                            <th>Location</th>
                            <th>Address</th>
                            <th>Created at</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($queueSearch as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->table_no }}</td>
                                <td>{{ $item->keyword_name }}</td>
                                <td>{{ $item->location }}</td>
                                <td>{{ $item->address }}</td>
                                <th>{{ $item->created_at->format('Y-m-d H:i:s') }}</th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-3 d-flex justify-content-center">
                {{ $queueSearch->links() }}
            </div>
        </div>
    </div>
@endsection
