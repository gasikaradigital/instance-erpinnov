

    <div class="container mt-5">
        <h1 class="text-left  mb-4">Compte de Résultat</h1>

        <!-- Filtres (Année et Mois) -->
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="filterYear" class="form-label"><strong>Filtrer par Année :</strong></label>
                <select id="filterYear" class="form-select">
                    <option value="all">Toutes les années</option>
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                    <option value="2025">2025</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="filterMonth" class="form-label"><strong>Filtrer par Mois :</strong></label>
                <select id="filterMonth" class="form-select">
                    <option value="all">Tous les mois</option>
                    <option value="janvier">Janvier</option>
                    <option value="fevrier">Février</option>
                    <option value="mars">Mars</option>
                    <option value="avril">Avril</option>
                    <option value="mai">Mai</option>
                    <option value="juin">Juin</option>
                    <option value="juillet">Juillet</option>
                    <option value="aout">Août</option>
                    <option value="septembre">Septembre</option>
                    <option value="octobre">Octobre</option>
                    <option value="novembre">Novembre</option>
                    <option value="decembre">Décembre</option>
                </select>
            </div>
        </div>

        <!-- Tableau du Compte de Résultat -->
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow-sm border-success">
                    <div class="card-header bg-secondary py-0 text-white">
                        <h4 class="mb-0"><i class="fas fa-chart-line"></i> Compte de Résultat</h4>
                    </div>
                    <div class="card-body px-0">
                        <table class="table table-bordered table-striped">
                            <thead class="table-light">
                                <tr>
                                    <th>Année</th>
                                    <th>Mois</th>
                                    <th>Catégorie</th>
                                    <th>Montant (€)</th>
                                </tr>
                            </thead>
                            <tbody id="resultTable">
                                <tr data-year="2024" data-month="janvier">
                                    <td>2024</td><td>Janvier</td><td>Chiffre d'Affaires</td><td>50,000</td>
                                </tr>
                                <tr data-year="2024" data-month="janvier">
                                    <td>2024</td><td>Janvier</td><td>Coût des Ventes</td><td>-20,000</td>
                                </tr>
                                <tr data-year="2024" data-month="janvier" class="table-success">
                                    <td>2024</td><td>Janvier</td><td><strong>Résultat Net</strong></td><td><strong>30,000</strong></td>
                                </tr>
                                <tr data-year="2024" data-month="février">
                                    <td>2024</td><td>Février</td><td>Chiffre d'Affaires</td><td>55,000</td>
                                </tr>
                                <tr data-year="2024" data-month="février">
                                    <td>2024</td><td>Février</td><td>Coût des Ventes</td><td>-22,000</td>
                                </tr>
                                <tr data-year="2024" data-month="février" class="table-success">
                                    <td>2024</td><td>Février</td><td><strong>Résultat Net</strong></td><td><strong>33,000</strong></td>
                                </tr>
                                <tr data-year="2023" data-month="mars">
                                    <td>2023</td><td>Mars</td><td>Chiffre d'Affaires</td><td>40,000</td>
                                </tr>
                                <tr data-year="2023" data-month="mars">
                                    <td>2023</td><td>Mars</td><td>Coût des Ventes</td><td>-18,000</td>
                                </tr>
                                <tr data-year="2023" data-month="mars" class="table-success">
                                    <td>2023</td><td>Mars</td><td><strong>Résultat Net</strong></td><td><strong>22,000</strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Script pour filtrer les données -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const filterYear = document.getElementById("filterYear");
            const filterMonth = document.getElementById("filterMonth");
            const tableRows = document.querySelectorAll("#resultTable tr");

            function filterTable() {
                const selectedYear = filterYear.value;
                const selectedMonth = filterMonth.value;

                tableRows.forEach(row => {
                    const rowYear = row.getAttribute("data-year");
                    const rowMonth = row.getAttribute("data-month");

                    if ((selectedYear === "all" || rowYear === selectedYear) &&
                        (selectedMonth === "all" || rowMonth === selectedMonth)) {
                        row.style.display = "";
                    } else {
                        row.style.display = "none";
                    }
                });
            }

            filterYear.addEventListener("change", filterTable);
            filterMonth.addEventListener("change", filterTable);
        });
    </script>


