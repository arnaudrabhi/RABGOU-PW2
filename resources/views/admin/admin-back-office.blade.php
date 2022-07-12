<div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Civ</th>
                <th>Nom</th>
                <th>Prénom</th>
            </tr>
        </thead>
        <tbody>
            @foreach($eleves as $eleve)
                <tr>
                    <td>{{ $eleve->id }}</td>
                    <td>{{ $eleve->civ }}</td>
                    <td>{{ $eleve->nom }}</td>
                    <td>{{ $eleve->prenom }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
