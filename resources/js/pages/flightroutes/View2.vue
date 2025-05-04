<script setup lang="ts">
import { onMounted, ref } from 'vue';
import { columns  } from './columns';
import dataTable from './data-table.vue';
import { FlightRoute } from '@/types';

const data = ref<FlightRoute[]>([]);

async function getData() : Promise<FlightRoute[]> {
    return [
        {
            id: 1,
            airspeed_cas: 20,
            airspeed_tas: 20,
            altitude: 3000,
            deviation: '22E',
            distance: 25,
            eta: '30',
            flight_plan_id: 1,
            from: 'NZHS',
            to: 'NZYP',
            fuel_consumption: 25,
            ground_speed: 70,
            heading_compass: 330,
            heading_magnetic: 240,
            heading_true: 120,
            temp_c: 20,
            time: '1300',
            track: 240,
            user_id: 1,
            variation: '22E',
            wind_speed: 20,
            wind_true: 300,
            zone_fuel: '11',
            created_at: '',
            updated_at: ''
        }
    ];
}

onMounted(async() => {
    data.value = await getData()
});

</script>

<template>
    <div class="container py-10 mx-auto">
        <dataTable :columns="columns" :data="data" />
    </div>
</template>