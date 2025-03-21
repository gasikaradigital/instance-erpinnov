<div class="container-flux p-6">
    <a href="#" class="text-primary">
        <i class="bi bi-file-earmark"></i> Créer tag/catégorie
    </a>

    <div class="card mt-3">
        <div class="card-body">
            <div class="row">
                <!-- Référence -->
                <div class="col-md-6 mb-3">
                    <label for="reference" class="fw-bold text-primary">Réf.</label>
                    <input type="text" wire:model="tagRef" class="form-control" id="reference" name="reference">
                    @error('tagRef')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Position -->
                <div class="col-md-6 mb-3">
                    <label for="position">Position</label>
                    <input type="number" wire:model="tagPosition" class="form-control" id="position" name="position">
                    @error('tagPosition')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="row">
                <!-- Description -->
                <div class="col-md-12 mb-3">
                    <label for="description">Description</label>
                    <textarea class="form-control" wire:model="tagDescription" id="description" name="description"></textarea>
                    @error('tagDescription')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="row">
                <!-- Couleur -->
                <div class="col-md-1 mb-3">
                    <label for="color">Couleur</label>
                    <input type="color" wire:model="tagColor" class="form-control form-control-color" id="color"
                        name="color">
                    @error('tagColor')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Catégorie -->
                <div class="col-md-5 mb-3">
                    <label for="category">Ajouter dans</label>
                    <select class="form-control" id="category" name="category" wire:model="tagParentId">
                        <option value="0">Sélectionner une catégorie</option>
                        @foreach ($categoriesList as $categorie)
                            @php
                                $iconColor = $categorie['color'] ?? 'black';
                                $iconColor = str_replace('#', '', $iconColor);
                            @endphp

                            <option value="{{ $categorie['id'] }}">
                                <i class="fas fa-tag" style="color: #{{ $iconColor }};"></i>
                                <!-- Icône FontAwesome -->
                                {{ $this->buildCategoryPath($categorie, $categoriesList) }}
                            </option>
                        @endforeach
                    </select>
                    @error('tagParentId')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Boutons -->
            <div class="d-flex justify-content-end gap-2">
                <button wire:click.prevent="executeCustomerTagCreation" class="btn btn-primary">Créer
                    tag/catégorie</button>
                <a href="#" class="btn btn-secondary">Annuler</a>
            </div>
        </div>
    </div>
</div>
