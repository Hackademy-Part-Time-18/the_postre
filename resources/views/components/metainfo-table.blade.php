<table class="table table-striped table-hover border">
    <thead class="table-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome Tag</th>
            <th scope="col">Quantità articoli collegati</th>
            <th scope="col">Aggiorna</th>
            <th scope="col">Cancella</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($metaInfos as $metaInfo)
        <tr>
            <th scope="row">{{ $metaInfo->id }}</th>
            <td>{{ $metaInfo->name}}</td>
            <td>{{ count($metaInfo->articles) }}</td>
            @if ($metaType == 'tags')
                <td>
                    <form action="" method=""></form>
                        @csrf 
                        @method('put')
                        <input type=" text" name="name" placeholder="Nuovo nome tag" class="form-control w-50 d-inline">
                        <button type="submit" class="btn btn-info text-white">Aggiorna</button>
                 </td>
                 <td>
                    <form action="" method=""></form>
                        @csrf 
                        @method('delete')
                         <button type="submit" class="btn btn-danger text-white">Cancella</button>
                 </td>
                @else
                <form action="" method=""></form>
                        @csrf 
                        @method('put')
                        <input type=" text" name="name" placeholder="Nuovo nome categoria" class="form-control w-50 d-inline">
                        <button type="submit" class="btn btn-info text-white">Aggiorna</button>
                 </td>
                 <td>
                    <form action="" method=""></form>
                        @csrf 
                        @method('delete')
                         <button type="submit" class="btn btn-danger text-white">Aggiorna</button>
             @endif
        </tr>
    </tbody>
</table>