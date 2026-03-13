<script setup lang="ts">
import { onMounted } from 'vue'
import Chart from 'chart.js/auto'

const props = defineProps({
  prices: Array
})

onMounted(() => {

  const labels = props.prices.map(p => p.created_at)
  const data = props.prices.map(p => p.price)

  new Chart(document.getElementById('priceChart'), {
    type: 'line',
    data: {
      labels: labels,
      datasets: [{
        label: 'E10 Preis',
        data: data
      }]
    }
  })

})
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
      <td>{{ price.price }}</td>
      <td>{{ price.created_at }}</td>
    </tr>
  </tbody>
</table>
</template>