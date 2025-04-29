<script setup lang="ts">
import Button from '@/components/ui/button/Button.vue';
import Input from '@/components/ui/input/Input.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { FlightPlan, type BreadcrumbItem } from '@/types';
import { Head, useForm } from '@inertiajs/vue3';
import { LoaderCircle } from 'lucide-vue-next';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Flight Plans',
        href: '/flightplans',
    },{
        title: 'Edit Flight Plan',
        href: '/flightplans/view'
    }
];

const props = defineProps<{
    flightplan: FlightPlan;
}>();

const form = useForm({
    flightplan_id: props.flightplan.id,
    name: props.flightplan.name,
    description: props.flightplan.description
});

const createFlightPlan = () => {

    console.log(form.flightplan_id);

    form.put(route("flightplan.update", props.flightplan.id), {

    });

}

</script>

<template>
    <Head title="Update Flight Plan Info" />

    
    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            
            <div>
                
                <div class="text-lg font-extrabold text-blue-800 pb-3">Flight Plans</div>
                
                <form @submit.prevent="createFlightPlan">

                    Name: <Input v-model="form.name" id="name" required /><br/>
                    Description: <br/>
                    <Input v-model="form.description" id="description" required />
                    <Input v-model="form.flightplan_id" id="flightplan_id" type="hidden" />

                    <Button type="submit" class="my-5 bg-gray-500">
                        <LoaderCircle v-if="form.processing" class="h-4 w-4 animate-spin" />
                        Update
                    </Button>

                </form>
                
            </div>

        </div>
    </AppLayout>

</template>
