{{-- resources/views/products/create.blade.php --}}
<div>
    @section('vendor-style')
        @vite(['resources/assets/vendor/libs/bs-stepper/bs-stepper.scss'])
    @endsection

    @section('vendor-script')
        @vite(['resources/assets/vendor/libs/bs-stepper/bs-stepper.js'])
    @endsection

    <div class="container-flux p-6 flex-grow-1 px-4">
        <!-- En-tête -->
        <h4 class="fw-bold py-3 mb-2">Nouveau produit et service</h4>
        <div class="card mb-4 col-12">
            <form wire:submit.prevent="submit" class="modal-content" id="addNewProduitsForm">
                <!-- Corps Modal -->
                <div class="modal-body px-4 mt-4">
                    <div class="row">
                        <!-- Section : Informations générales -->
                        <div class="col-12">
                                    <div class="row g-3">
                                        <div class="col-md-3">
                                            <label class="form-label">Nature</label>
                                            <select class="form-select" name="nature" id="nature" wire:model="">
                                                <option value="" selected>Selectionner</option>
                                                <option value="produits">Produits</option>
                                                <option value="services">Services</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label">Réf produit</label>
                                            <input type="text" class="form-control" wire:model="ref-produit" />
                                        </div>

                                        <div class="col-md-3">
                                            <label class="form-label">Libellé</label>
                                            <input type="text" class="form-control" wire:model="label" />
                                        </div>

                                        
                                        <div class="col-md-3">
                                            <label class="form-label">État (Vente)</label>
                                            <select class="form-select" name="sale_status" wire:model="status" id="sale_status">
                                                <option value="">Selectionné</option>
                                                <option value="en_vente">En vente</option>
                                                <option value="non_disponible" selected>Hors vente</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label">État (Achat)</label>
                                            <select class="form-select" name="purchase_status" id="purchase_status">
                                                <option value="">Selectionné</option>
                                                <option value="en_achat">En achat</option>
                                                <option value="non_achete">Hors achat</option>
                                            </select>
                                        </div><div class="col-md-9">
                                            <label class="form-label">Description</label>
                                            <textarea class="form-control" name="description" rows="1"></textarea>
                                        </div>
                                        
                            </div>
                        </div>
                    </div>

                    <!-- Section : Stock et dimensions -->
                    <div class="row g-3 mt-3" id="stockSection">
                        <div class="col-12 ">
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
                                            <input type="number" class="form-control" name="optimal_stock" wire:model="desiredstock"/>
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

                                        <div class="col-md-3">
                                            <label class="form-label">Quantité</label>
                                            <div class="d-flex gap-2">
                                            <input type="text" class="form-control" name="volume" />
                                            <input type="text" class="form-control" value="Unité" readonly name="" />
                                        </div>
                                        </div>
                                        </div>
                                    </div>
                        </div>
                    </div>

                    <!-- Section : Informations douanières et prix -->
                    <div class="row g-3 mt-3 px-4">
                        <div class="col-12">
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
                                        <div class="col-md-3" id="prix_vente">
                                            <label class="form-label">Prix de vente</label>
                                            <div class="d-flex gap-2">
                                            <input type="text" class="form-control" name="sale" />
                                            <select class="select2 form-select">
                                                <option value="" selected>HT</option>
                                                <option value="">TTC</option>
                                            </select>
                                        </div>
                                        </div>
                                        <div class="col-md-3" id="prix_vente_min">
                                            <label class="form-label">Prix de vente min.</label>
                                            <input type="text" class="form-control" name="min_sale_price" />
                                        </div>
                                        <div class="col-md-3" id="prix_achat">
                                            <label class="form-label">Prix d'achat</label>
                                            <div class="d-flex gap-2">
                                                <input type="text" class="form-control" name="buy" />
                                                <select class="select2 form-select">
                                                    <option value="" selected>HT</option>
                                                    <option value="">TTC</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3" id="prix_achat_min">
                                            <label class="form-label">Prix d'achat min.</label>
                                            <input type="text" class="form-control" name="min_buy_price" />
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
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Existing code for sale/purchase status
        const saleStatus = document.getElementById("sale_status");
        const purchaseStatus = document.getElementById("purchase_status");
        const prix_achat = document.getElementById("prix_achat");
        const prix_achat_min = document.getElementById("prix_achat_min");
        const prix_vente = document.getElementById("prix_vente");
        const prix_vente_min = document.getElementById("prix_vente_min");
        
        // New code for nature selection
        const natureSelect = document.getElementById("nature");
        const stockSection = document.getElementById("stockSection");
    
        // Function to handle nature selection change
        natureSelect.addEventListener("change", function() {
            if (this.value === "services") {
                stockSection.style.display = "none";
            } else {
                stockSection.style.display = "block";
            }
        });
    
        // Existing code for sale/purchase status
        saleStatus.addEventListener("change", function(){
            const selectValueSale = saleStatus.value;
    
            if(selectValueSale === "en_vente") {
                prix_vente.style.display = "block";
                prix_vente_min.style.display = "block";
                prix_achat.style.display = "none";
                prix_achat_min.style.display = "none";
            }
        });
    
        purchaseStatus.addEventListener("change", function(){
            const selectValuePurchase = purchaseStatus.value;
    
            if(selectValuePurchase === "en_achat") {
                prix_achat.style.display = "block";
                prix_achat_min.style.display = "block";
                prix_vente.style.display = "none";
                prix_vente_min.style.display = "none";
            }
        });
    });
    </script>