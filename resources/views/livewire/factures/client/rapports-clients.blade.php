<div class="container">
    <div class="card shadow-lg p-4">
        <h4 class="mb-4">Rapports de règlements pour 2025</h4>
        <form method="POST" action="#">
            @csrf
            <div class="d-flex align-items-center gap-2">
                <!-- Select pour les mois -->
                <select class="form-select w-auto" name="month">
                    @foreach(['Janv.', 'Fév.', 'Mars', 'Avr.', 'Mai', 'Juin', 'Juil.', 'Août', 'Sept.', 'Oct.', 'Nov.', 'Déc.'] as $index => $month)
                        <option value="{{ $index + 1 }}">{{ $month }}</option>
                    @endforeach
                </select>

                <!-- Select pour les années -->
                <select class="form-select w-auto" name="year">
                    @for ($year = 2015; $year <= 2030; $year++)
                        <option value="{{ $year }}" {{ $year == date('Y') ? 'selected' : '' }}>{{ $year }}</option>
                    @endfor
                </select>

                <!-- Bouton -->
                <button type="submit" class="btn btn-primary">CRÉER</button>
            </div>
        </form>

    </div>
</div>