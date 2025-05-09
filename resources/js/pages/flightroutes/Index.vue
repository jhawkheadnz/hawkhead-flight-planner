<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { onMounted, ref } from 'vue';
import { columns  } from './columns';
import dataTable from './data-table.vue';
import { FlightPlan, FlightRoute, type BreadcrumbItem } from '@/types';
import { Head, Link } from '@inertiajs/vue3';
import { MinusCircle } from 'lucide-vue-next';
import Button from '@/components/ui/button/Button.vue';
import { RouteIcon } from 'lucide-vue-next';

const data = ref<FlightRoute[]>([]);

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Flight Plans',
        href: '/flightplans',
    },
];

const props = defineProps<{
        flightroutes: Array<FlightRoute>;
        flightplan: FlightPlan;
}>();

async function getData() : Promise<FlightRoute[]> {
    return props.flightroutes;
}

onMounted(async() => {
    data.value = await getData()
});

</script>

<!-- <style>
table {border-left:1px solid #c2c2c2;}
th {text-align: center; background: #020c2b; font-size: 11px; padding: 5px; color: #fff; }
td {text-align:center; border-bottom: 1px solid #c2c2c2; border-right: 1px solid #c2c2c2; padding:4px; font-size:12px; }
</style> -->

<template>
    <Head title="Flight Plans" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            
            <div>
                
                <div class="text-lg font-extrabold text-blue-800 pb-3 flex"><RouteIcon class="mr-3" /> Flight Plan - Route ({{ flightplan.name }})</div>
                <p class="text-sm mb-7"><span class="font-extrabold">About this flight:</span> {{ flightplan.description }}</p>

                <div class="mb-5">
                    <Button as-child>
                        <Link :href="`/flightplans/routes/${flightplan.id}/create`"> + Add Route Entry</Link>
                    </Button>
                </div>

                <!-- <table class="w-[100%]">
                    <tr>
                        <th>FROM</th>
                        <th>TO</th>
                        <th>CAS <span class="text-blue-400">kt</span></th>
                        <th>TEMP <span class="text-blue-400">°C</span></th>
                        <th>ALT <span class="text-blue-400">ft</span></th>
                        <th>TAS <span class="text-blue-400">kt</span></th>
                        <th>Track</th>
                        <th>Wind <span class="text-blue-400">°T</span></th>
                        <th>Wind <span class="text-blue-400">kt</span></th>
                        <th>HDG <span class="text-blue-400">°T</span></th>
                        <th>VAR</th>
                        <th>HDG <span class="text-blue-400">°M</span></th>
                        <th>DEV</th>
                        <th>HDG <span class="text-blue-400">°C</span></th>
                        <th>G/S <span class="text-blue-400">kt</span></th>
                        <th>Dist <span class="text-blue-400">(nm)</span></th>
                        <th>Time <span class="text-blue-400">(min)</span></th>
                        <th>ETA</th>
                        <th>Fuel Cons</th>
                        <th>Zone Fuel</th>
                        <th>Modify</th>
                    </tr>
                    <tr v-for="flightroute in flightroutes" v-bind:key="flightroute.id">
                        <td><Link :href="`/flightroute/${flightroute.id}`">{{ flightroute.from }}</Link></td>
                        <td><Link :href="`/flightroute/${flightroute.id}`">{{ flightroute.to }}</Link></td>
                        <td>{{ flightroute.airspeed_cas }} kt</td>
                        <td>{{ flightroute.temp_c }} °c</td>
                        <td>{{ flightroute.altitude.toLocaleString() }} ft</td>
                        <td>{{ flightroute.airspeed_tas }} kt</td>
                        <td>{{ flightroute.track }} °T</td>
                        <td class="bg-gray-200">{{ flightroute.wind_true }} °T</td>
                        <td class="bg-gray-200">{{ flightroute.wind_speed }} kt</td>
                        <td>{{ flightroute.heading_true }} °T</td>
                        <td>{{ flightroute.variation }}</td>
                        <td>{{ flightroute.heading_magnetic }} °M</td>
                        <td>{{ flightroute.deviation }}</td>
                        <td>{{ flightroute.heading_compass }} °C</td>
                        <td>{{ flightroute.ground_speed }} kt</td>
                        <td>{{ flightroute.distance }} nm</td>
                        <td>{{ flightroute.time }} min(s)</td>
                        <td style="font-family: 'Courier New', Courier, monospace;">{{ flightroute.eta }}Z</td>
                        <td>{{ flightroute.fuel_consumption }} L/hr</td>
                        <td>{{ flightroute.zone_fuel }}</td>
                        <td><Link class="cursor-pointer" method="delete" :href="route('flightroute.destroy', flightroute.id)"><MinusCircle height="15" color="red" /></Link></td>
                    </tr>
                </table> -->

                <div class="container ">
                    <dataTable :columns="columns" :data="data" />
                </div>

            </div>              

        </div>
    </AppLayout>
</template>
