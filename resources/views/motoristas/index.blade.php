<x-layout></x-layout>


<div class="max-w-2xl mx-auto">
    <div class="card">
        <div class="card-body">
            <a class="btn btn-primary" href={{ route('motoristas.create') }}>Cadastrar Motorista</a>
        </div>
    </div>
</div>

<!-- Visualização dos motoristas cadastrados -->
    <div class="flex justify-center mt-6">
        <table class="table table-zebra max-w-3xl">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>CNH</th>
                    <th>Data de Nascimento</th>
                    <th>Ações</th>
                </tr>
            </thead>

        <tbody>
            @foreach($motoristas as $motorista)
                <tr>
                    <td>{{ $motorista->nome }}</td>
                    <td>{{ $motorista->numero_cnh }}</td>
                    <td>{{ $motorista->data_nascimento }}</td>
                    <td class="flex gap-2">
                        <a href="{{ route('motoristas.edit', $motorista->id) }}" class="btn btn-xs btn-primary">Editar</a>
                        <form method="POST" action="{{ route('motoristas.destroy', $motorista->id) }}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-xs btn-error" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

