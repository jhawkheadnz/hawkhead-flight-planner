<script setup lang="ts">
import Button from '@/components/ui/button/Button.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { FlightPlan, type BreadcrumbItem } from '@/types';
import { Head, Link, useForm } from '@inertiajs/vue3';
import { ClipboardList, Trash } from 'lucide-vue-next';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Flight Plans',
        href: '/flightplans',
    },
];

defineProps<{
    flightplans: Array<FlightPlan>;
}>();

const form = useForm({
    flight_plan_id: -1,
});

const removeFlightPlan = () => {

    form.delete(route("flightroute.delete"), {

    });

}

</script>

<template>
    <Head title="Flight Plans" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            
            <div>
                
                <div class="text-lg font-extrabold text-blue-800 pb-3">Flight Plans
                    <Link class="p-3 bg-blue-800 text-sm ml-5 rounded-lg text-white" :href="`/flightplans/create`">Add New Flight Plan</Link>
                </div>

                <ul>
                    <li v-for="flightplan in flightplans" 
                        v-bind:key="flightplan.id"
                        class="rounded-lg flex cursor-pointer border p-3 hover:bg-blue-950 text-white bg-gray-800">
                        <div class="flex">
                            <ClipboardList class=" mr-5"/>
                            <Link :href="`/flightplans/routes/${flightplan.id}`">
                                    {{ flightplan.name }}
                            </Link>
                            
                            <form @submit.prevent="removeFlightPlan">
                                <Trash class="ml-5" color="#9900cc" />
                                <input type="hidden" v-model="form.flight_plan_id" />
                            </form>
                        </div>
                    </li>
                </ul>
                
            </div>

        </div>
    </AppLayout>

</template>
