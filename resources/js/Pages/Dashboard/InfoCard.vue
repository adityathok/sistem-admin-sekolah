<template>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <div v-for="info in infoCard" class="relative border border-slate-300 hover:border-slate-500 shadow hover:shadow-lg transition-shadow p-5 pe-9">
            <div class="text-sm">{{ info.label }}</div>
            <div class="text-xl group-hover:text-blue-600 font-bold mt-3">{{ info.value }}</div>
            <div class="text-sm opacity-50">{{ info.caption }}</div>

            <div class="absolute top-0 end-0 p-5 opacity-50">
                <i :class="info.icon"></i>
            </div>
        </div>
    </div>
</template>

<script setup>
const infoCard = [
    {
        label: 'Tagihan dibayar',
        value: 'Rp 25.000.000',
        caption: 'bulan ini',
        icon: 'pi pi-chart-pie'
    },
    { 
        label: 'Tagihan tunggakan',
        value: 'Rp 125.000.000',
        caption: 'bulan ini',
        icon: 'pi pi-chart-bar',
    },
    { 
        label: 'Tagihan tunggakan',
        value: 'Rp 125.000.000',
        caption: 'bulan ini',
        icon: 'pi pi-chart-bar',
    },
    { 
        label: 'Tagihan tunggakan',
        value: 'Rp 125.000.000',
        caption: 'bulan ini',
        icon: 'pi pi-chart-bar',
    }
];
</script>