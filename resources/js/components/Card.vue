<script setup>
defineProps(['title', 'color', 'count'])
</script>

<template>
    <div :class="`bg-${color}-500`" class="text-white rounded-lg shadow-md p-6 w-[350px]">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-semibold">{{ title }}</h2>
                <p class="text-lg">Total Active</p>
            </div>
            <div class="text-4xl font-bold">{{ count }}</div>
        </div>
    </div>
</template>
