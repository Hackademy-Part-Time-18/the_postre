<table class="table">
<thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">email</th>
        <th scope="col">action</th>
    </tr>
</thead>
<tbody>
    @foreach($roleRequests as $user)
    <tr>
        <th scope="row">{{  $user->id }}</th>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>
            @switch($role)
            @case('amministratore')
                <form action="{{ route('admin.setAdmin' , compact('user'))}}" method="post">
                    @csrf
                    @method('patch')

                    <button type="submit" class="btn btn-info text-white">Attiva {{ $role }}</a>
                </form>
                @break
            @case('revisore')
            <form action="{{ route('admin.setRevisor' , compact('user'))}}" method="post">
                    @csrf
                    @method('patch')

                    <button type="submit" class="btn btn-info text-white">Attiva {{ $role }}</a>
                </form>
                @break
            @case('scrittore')
            <form action="{{ route('admin.setWriter' , compact('user'))}}" method="post">
                    @csrf
                    @method('patch')

                    <button type="submit" class="btn btn-info text-white">Attiva {{ $role }}</a>
                </form>
                @break

            @endswitch
           
        </td>
    </tr>
@endforeach

</tbody>
</table>