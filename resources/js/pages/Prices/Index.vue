<script setup lang="ts">
import { onMounted } from 'vue'
import Chart from 'chart.js/auto'

const props = defineProps({
  prices: Array
})

onMounted(() => {

  const labels = props.prices.map(p => 
  new Date(p.created_at).toLocaleString('de-DE', {
    year: 'numeric',
    month: '2-digit',
    day: '2-digit',
    hour: '2-digit',
    minute: '2-digit'
  })
)
  const data = props.prices.map(p => p.price)

  new Chart(document.getElementById('priceChart'), {
    type: 'line',
    data: {
      labels: labels,
      datasets: [{
        label: 'E10 Preis',
        data: data,
        fill: false,
        tension: 0.1,
      }]
    }
  })

})

function formatDate(dateString) {
  return new Date(dateString).toLocaleString('de-DE', {
    day: '2-digit',
    month: '2-digit',
    year: 'numeric',
    hour: '2-digit',
    minute: '2-digit'
  })
}
</script>

<template>

<canvas id="priceChart"></canvas>

<table>
  <thead>
    <tr>
      <th>Kraftstoff</th>
      <th>Preis</th>
      <th>Zeit</th>
    </tr>
  </thead>

  <tbody>
    <tr v-for="price in prices" :key="price.id">
      <td>{{ price.type }}</td>
      <td>{{ price.price }} EUR</td>
      <td>{{ formatDate(price.created_at) }}</td>
    </tr>
  </tbody>
</table>
</template>