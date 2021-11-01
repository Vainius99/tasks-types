<table>
    <tr>
        <th> ID </th>
        <th>Title</th>
        <th>Owner</th>
        <th>Description</th>
        <th>Type</th>
        <th>Start</th>
        <th>End</th>
        <th>Logo</th>
    </tr>
    @foreach ($tasks as $task)
    <tr>
        <td>{{ $task->id }}</td>
        <td>{{ $task->title }}</td>
        <td>
            {{$task->taskOwners->name}}
            {{$task->taskOwners->surname}}
        </td>
        <td>{!! $task->description !!}</td>
        <td>{{$task->taskTypes->title}}</td>
        <td>{{ $task->start_date }}</td>
        <td>{{ $task->end_date }}</td>
        <td>{{ $task->logo }}</td>
    </tr>
    @endforeach
</table>
