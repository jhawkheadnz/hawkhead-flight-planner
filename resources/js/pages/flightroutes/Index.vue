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
        total_distance: Float;
        distance_km: Float;
        from: String;
        to: String;
}>();

//var distance_km = (total_distance * 1.185);

async function getData() : Promise<FlightRoute[]> {
    return props.flightroutes;
}

onMounted(async() => {
    data.value = await getData()
});

</script>

<template>
    <Head title="Flight Plans" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            
            <div>
                
                <div class="text-lg font-extrabold text-blue-800 pb-3 flex"><RouteIcon class="mr-3" /> Flight Plan - Route ({{ flightplan.name }})</div>
                <p class="text-sm mb-7"><span class="font-extrabold">
                    About this flight:</span> {{ flightplan.description }}
                    <br/><br/>
                    <hr />
                    <br/>
                    <strong>Total distance:</strong> {{ total_distance }} nm ({{ distance_km }} km) <br/>
                    <strong>From:</strong> {{ from }} (first waypoint)<br/> 
                    <strong>To:</strong> {{ to }} (last waypoint)
                </p>

                <div class="mb-5">
                    <Button as-child>
                        <Link :href="`/flightplans/routes/${flightplan.id}/create`"> + Add Route Entry</Link>
                    </Button>
                </div>

                <div class="container ">
                    <dataTable :columns="columns" :data="data" />
                </div>

            </div>              

        </div>
    </AppLayout>
</template>
