<script setup lang="ts">
import Button from '@/components/ui/button/Button.vue';
import { Input } from '@/components/ui/input';
import AppLayout from '@/layouts/AppLayout.vue';
import { FlightPlan, type BreadcrumbItem } from '@/types';
import { Head, Link, useForm } from '@inertiajs/vue3';
import { ClipboardList, Pencil, Trash } from 'lucide-vue-next';

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

    console.log(form.flight_plan_id);

    if(confirm("You are about to delete this flight plan")){
        console.log("delete the flight plan");
    }else{
        console.log("keep the flight plan");
    }

    // form.delete(route("flightroute.delete"), {

    // });

}

</script>

<template>
    <Head title="Flight Plans" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            
            <div>
                
                <div class="mb-5 text-lg font-extrabold text-blue-800 pb-3">Flight Plans
                    <Link class="p-3 bg-blue-800 text-sm ml-5 rounded-lg text-white" :href="`/flightplans/create`">Add New Flight Plan</Link>
                </div>

                <ul>
                    <li v-for="flightplan in flightplans" 
                        v-bind:key="flightplan.id"
                        class=" rounded-lg flex cursor-pointer border p-3 hover:bg-blue-950 text-white bg-gray-800">
                       
                        <div class="flex w-[100%] text-sm items-center">
                            <div><ClipboardList width="15" class="mr-4" /></div>
                            <div class="flex-1"><Link :href="`/flightplans/routes/${flightplan.id}`">{{ flightplan.name }} <span class="text-gray-500"> - {{ flightplan.description }}</span></Link></div>
                            
                            <div class="inline-flex items-center text-base align-items mr-2">
                                <Link class="cursor-pointer" :href="route('flightplan.edit', flightplan.id)">
                                    <div class="px-2 py-1 items-center gap-x-2 bg-orange-900 text-xs rounded-sm flex hover:bg-orange-600"><Pencil width="15"/> Edit</div>
                                </Link>
                            </div>
                            <div class="inline-flex items-center text-base align-items">
                                <Link class="cursor-pointer " method="delete" :href="route('flightplan.destroy', flightplan.id)">
                                    <div class="px-2 py-1 items-center gap-x-2 bg-red-900 text-xs rounded-sm flex hover:bg-red-600"><Trash width="15"/> Delete</div>
                                </Link>
                            </div>
                        </div>
                    </li>
                </ul>
                
            </div>

            
        </div>
    </AppLayout>

</template>
