<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { FlightPlan, type BreadcrumbItem } from '@/types';
import { Head, Link } from '@inertiajs/vue3';
import { ClipboardList } from 'lucide-vue-next';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Flight Plans',
        href: '/flightplans',
    },
];



//defineProps({ "flightplans" : Array });
defineProps<{
    flightplans: Array<FlightPlan>;
}>();

</script>

<template>
    <Head title="Flight Plans" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            
            <div>
                
                <div class="text-lg font-extrabold text-blue-800 pb-3">Flight Plans</div>
                
                <ul>
                    <li v-for="flightplan in flightplans" 
                    v-bind:key="flightplan.id"
                    class="rounded-lg flex cursor-pointer border p-3 hover:bg-blue-950 text-white bg-gray-800">
                        <Link :href="`/flightplans/routes/${flightplan.id}`">
                            <div class="flex">
                                <ClipboardList class=" mr-5"/> {{ flightplan.name }}
                            </div>
                        </Link>
                    </li>
                </ul>
                
            </div>

        </div>
    </AppLayout>
</template>
