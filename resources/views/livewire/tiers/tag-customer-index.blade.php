<div class="container-flux p-6">
    <div class="card">
        <div class="card-header py-2 bg-light d-flex justify-content-between align-items-center">
            <h5 class="mb-0"><i class="bi bi-tags"></i> Espace tags/catégories des clients</h5>
            <a href="{{ Route('create-tag-customer') }}" class="btn btn-primary mt-3" data-bs-toggle="tooltip"
                data-bs-placement="bottom" title="{{ __('Nouveau tags/catégories') }}"><i class="fas fa-add"></i></a>
        </div>
        <div class="card-body">
            <div class="mb-3 mt-md-4">
                <label for="search" class="form-label">Rechercher</label>
                <div class="row">
                    <div class="col-md-5">
                        <div class="input-group">
                            <input type="text" class="form-control form-control-sm" id="search"
                                placeholder="Nom...">
                            <button class="btn btn-primary btn-sm">RECHERCHER</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card mt-md-5">
        <div class="card-body">
            <h6>Tags/catégories</h6>
            @if (count($categories) === 0)
                <div class="alert alert-secondary" role="alert">
                    Aucun tag/catégorie de ce type n'a été créé
                </div>
            @endif

            @php
                dump($categories);
            @endphp
        </div>
    </div>
</div>
</div>
