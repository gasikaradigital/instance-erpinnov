<div class="col-md-8">
    <div class="card">
        <div class="card-header bg-light fw-bold">📊 Statistiques</div>
        <div class="card-body text-center">
            <div style="width: 300px; margin: auto;">
                <canvas id="tierChart"></canvas>
            </div>
            <p class="mt-3 fw-bold">Nombre total des tiers : <span
                    class="badge bg-primary">{{ $tiers }}</span></p>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
    const ctx = document.getElementById('tierChart').getContext('2d');
    const myChart = new Chart(ctx, {
      type: 'doughnut',
      data: {
        labels: [
          'Prospect', 
          'Fournisseurs', 
          'Client',
          'Autres',
        ],
        datasets: [{
          data: [{{ $total_prospect }}, {{ $total_client }}, {{ $total_fournisseur }}, {{$total_autres}}],
          backgroundColor: [
            '#9c27b0',
            '#009688',
            '#ffc107',
            '#4caf50'
          ],
          borderWidth: 0,
          hoverOffset: 4
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: true,
        cutout: '60%',
        plugins: {
          legend: {
            position: 'right',
            labels: {
              boxWidth: 15,
              padding: 15,
              font: {
                size: 12
              }
            }
          }
        }
      }
    });
  });
</script>