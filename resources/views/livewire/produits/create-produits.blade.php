{{-- resources/views/products/create.blade.php --}}
<div>
    @section('vendor-style')
        @vite(['resources/assets/vendor/libs/bs-stepper/bs-stepper.scss'])
    @endsection

    @section('vendor-script')
        @vite(['resources/assets/vendor/libs/bs-stepper/bs-stepper.js'])
    @endsection

    <div class="container-xxl flex-grow-1">
        <!-- En-tête -->
        <h4 class="fw-bold py-3 mb-2"> <span class="text-muted fw-light">Produits /</span> Nouveau Produit</h4>
        <div class="card mb-4 col-12">
            <form wire:submit.prevent="save" class="modal-content" id="addNewProduitsForm">
                <!-- Corps Modal -->
                <div class="modal-body">
                    <div class="row">
                        <!-- Section : Informations générales -->
                        <div class="col-12">
                            <div class="card mb-4">
                                <div class="card-header p-3">
                                    <h6 class="card-title mb-0">1. Informations générales</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row g-3">
                                        <div class="col-md-3">
                                            <label class="form-label">Réf. produit</label>
                                            <input type="text" class="form-control" name="product_ref" />
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label">Libellé</label>
                                            <input type="text" class="form-control" name="label" />
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label">État (Vente)</label>
                                            <select class="form-select" name="sale_status">
                                                <option value="en_vente">En vente</option>
                                                <option value="non_disponible">Hors vente</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label">État (Achat)</label>
                                            <select class="form-select" name="purchase_status">
                                                <option value="en_achat">En achat</option>
                                                <option value="non_achete">Hors achat</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label">Utiliser les numéros de lots/série</label>
                                            <select class="form-select" name="lot_number">
                                                <option value="non">Non (lot/série non utilisé)</option>
                                                <option value="oui">Oui (lot/série requis)</option>
                                                <option value="">Oui (numéro de série unique requis)</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label">DLC ou DMD/DLUO est obligatoire</label>
                                            <select class="form-select" name="expiration_date">
                                                <option value="aucune">Aucune</option>
                                                <option value="dlc">DLC</option>
                                                <option value="">DMD/DLUO</option>
                                                <option value="">DLC et DMD/DLUO</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label">Type de code-barres</label>
                                            <select class="form-select" name="barcode_type">
                                                <option value="aucun">Aucun type de code-barres activé</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label">Valeur du code-barres</label>
                                            <input type="text" class="form-control" name="barcode_value" />
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label">Description</label>
                                            <input type="text" class="form-control" name="description" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Section : Stock et dimensions -->
                    <div class="row g-3 mt-4">
                        <div class="col-12">
                            <div class="card mb-4">
                                <div class="card-header p-3">
                                    <h6 class="card-title mb-0">2. Stock et dimensions</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row g-3">
                                        <div class="col-md-3">
                                            <label class="form-label">URL publique</label>
                                            <input type="url" class="form-control" name="public_url" />
                                        </div>
                                        <div class="col-md-3">
                                            <div class="d-flex justify-content-between ">
                                                <label class="form-label">Entrepôt par défaut</label>
                                                <button type="button" class="btn btn-link p-0" data-bs-toggle="tooltip" title="Nouveau entrepôt">
                                                    <i class="fas fa-plus-circle"></i> 
                                                </button>
                                            </div>
                                            <select class="select2 form-select" wire:model="entrepot" required>
                                                <option value=""></option>
                                                <option value=""></option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="d-flex justify-content-between ">
                                            <label class="form-label">Limite stock pour alerte</label>
                                            <i class="fas fa-info-circle"></i></div>
                                            <input type="text" class="form-control" name="stock_alert_limit" />
                                        </div>
                                        <div class="col-md-3">
                                            <div class="d-flex justify-content-between ">
                                            <label class="form-label">Stock désiré optimal</label>
                                            <i class="fas fa-info-circle"></i></div>
                                            <input type="number" class="form-control" name="optimal_stock" />
                                        </div>
                                        <div class="col-md-3">
                                            <div class="d-flex justify-content-between ">
                                            <label class="form-label">Nature de produit</label>
                                            <i class="fas fa-info-circle"></i></div>
                                            <select class="form-select" name="product_nature">
                                                <option value="matiere-premiere">Matière première</option>
                                                <option value="produi-manufacture">Produit manufacturé</option>
                                            </select>
                                        </div>
                                        
                                        <div class="col-md-3">
                                            <label class="form-label">Poids</label>
                                            <div class="d-flex gap-2">
                                                <input type="text" class="form-control" wire:model="poids" />
                                                <select class="select2 form-select">
                                                    <option value="" selected>Kg</option>
                                                    <option value="5">tonne</option>
                                                    <option value="6">g</option>
                                                    <option value="8">mg</option>
                                                    <option value="7">once</option>
                                                    <option value="10">livre</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label">Longueur x Largeur x Hauteur</label>
                                            <div class="d-flex gap-2">
                                            <input type="text" class="form-control" name="longeur" />
                                            <input type="text" class="form-control" name="largeur" />
                                            <select class="select2 form-select">
                                                <option value="" selected>m</option>
                                                <option value="">dm</option>
                                                <option value="">cm</option>
                                                <option value="">mm</option>
                                                <option value="">pied</option>
                                                <option value="">pouce</option>
                                            </select>
                                        </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label">Surface</label>
                                            <div class="d-flex gap-2">
                                            <input type="text" class="form-control" name="surface" />
                                            <select class="select2 form-select">
                                                <option value="" selected>m²</option>
                                                <option value="">dm²</option>
                                                <option value="">cm²</option>
                                                <option value="">mm²</option>
                                                <option value="">pied²</option>
                                                <option value="">pouce²</option>
                                            </select>
                                        </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label">Volume</label>
                                            <div class="d-flex gap-2">
                                            <input type="text" class="form-control" name="volume" />
                                            <select class="select2 form-select">
                                                <option value="" selected>m³</option>
                                                <option value="">dm³ (L)</option>
                                                <option value="">cm³ (ml)</option>
                                                <option value="">mm³ (µl)</option>
                                                <option value="">pied³</option>
                                                <option value="">pouce³</option>
                                                <option value="">once</option>
                                                <option value="">litre</option>
                                                <option value="">gallon</option>
                                            </select>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Section : Informations douanières et prix -->
                    <div class="row g-3 mt-4">
                        <div class="col-12">
                            <div class="card mb-4">
                                <div class="card-header p-3">
                                    <h6 class="card-title mb-0">3. Informations douanières et prix</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row g-3">
                                        <div class="col-md-3">
                                            <label class="form-label">Nomenclature douanière ou Code SH</label>
                                            <input type="text" class="form-control" name="custom_code" />
                                        </div>
                                        <div class="col-md-3">
                                            {{-- <i class="fas fa-globe"></i> --}}
                                            <div class="d-flex justify-content-between">
                                            <label class="form-label">Pays d'origine</label>
                                            <i class="fas fa-info-circle"></i></div>
                                            
                                            <select class="select2 form-select" wire:model="country_origin">
                                                <option value="">Sélectionner</option>
                                                <option value="1">France</option>
                                                <option value="2">Belgique</option>
                                                <option value="3">Suisse</option>
                                                <option value="143">Madagascar</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="d-flex justify-content-between">
                                            <label class="form-label">Etat/province d'origine</label>
                                            <i class="fas fa-info-circle"></i></div>
                                            <select class="select2 form-select" wire:model="state_origin">
                                                <option value="">Sélectionner</option>
                                                <option value=""></option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label">Note (non visible sur les factures, propals...)</label>
                                            <input type="text" class="form-control" name="note" />
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label">Tags/catégories</label>
                                            <input type="text" class="form-control" name="tags" />
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label">Prix de vente</label>
                                            <div class="d-flex gap-2">
                                            <input type="text" class="form-control" name="surface" />
                                            <select class="select2 form-select">
                                                <option value="" selected>HT</option>
                                                <option value="">TTC</option>
                                            </select>
                                        </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label">Prix de vente min.</label>
                                            <input type="text"  class="form-control" name="min_sale_price" />
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label">Taux TVA</label>
                                            {{-- <input type="text" class="form-control" name="vat_rate" /> --}}
                                            <div>Votre pays n'est pas défini. Accédez à Accueil-Configuration-Société/Institution et renvoyez le formulaire.</div>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label">Code comptable (vente).</label>
                                            <input type="text" class="form-control" name="code_vente" />
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label">Code comptable (vente à l'export)</label>
                                            <input type="text"  class="form-control" name="min_sale_price" />
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label">Code comptable (achat)</label>
                                            <input type="text" class="form-control" name="min_sale_price" />
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label">Code comptable (achat import)</label>
                                            <input type="text" class="form-control" name="min_sale_price" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Boutons -->
                    <div class="modal-footer py-4">
                        <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal">
                            <i class="ti ti-x ti-xs me-1"></i>
                            Annuler
                        </button>
                        <button type="submit" class="btn btn-primary ms-2">
                            <i class="ti ti-device-floppy ti-xs me-1"></i>
                            Enregistrer
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
