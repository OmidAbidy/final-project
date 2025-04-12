    new Chart(document.getElementById('userGrowthChart'), {
      type: 'line',
      data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr'],
        datasets: [{
          label: 'Users',
          data: [15, 30, 45, 60],
          borderColor: '#0d6efd',
          backgroundColor: 'rgba(13, 110, 253, 0.1)',
          fill: true,
          tension: 0.4
        }]
      }
    });
  
    new Chart(document.getElementById('revenueChart'), {
      type: 'bar',
      data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr'],
        datasets: [{
          label: 'Revenue',
          data: [200, 450, 300, 600],
          backgroundColor: '#20c997'
        }]
      }
    });
 