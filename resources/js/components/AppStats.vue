<script setup>
import { onMounted, onUnmounted } from 'vue';
import { useStats } from '../composables/useStats'
import Card from './Card.vue';
const { stats, getStats } = useStats();

await getStats();

let intervalId;

onMounted(() => intervalId = setInterval(async () => await getStats(), 3000))
onUnmounted(() => clearInterval(intervalId));

</script>

<template>
    <div class="stats-container">

        <div class="w-[900px] flex space-x-3">
            <Card title="Autobot" color="blue" :count="stats.autobot_count" />
            <Card title="Posts" color="yellow" :count="stats.post_count" />
            <Card title="Comments" color="purple" :count="stats.comment_count" />
        </div>
    </div>
</template>

<style scoped>
.stats-container {
    @apply h-full w-full flex items-center justify-center;
}
</style>
