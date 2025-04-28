<script setup lang="ts">
import Button from '@/components/ui/button/Button.vue';
import Input from '@/components/ui/input/Input.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { FlightPlan, type BreadcrumbItem } from '@/types';
import { Head, Link, useForm } from '@inertiajs/vue3';
import { ClipboardList, LoaderCircle } from 'lucide-vue-next';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Flight Plans',
        href: '/flightplans',
    },{
        title: 'Create Flight Plan',
        href: '/flightplans/create'
    }
];

defineProps<{
    flightplans: Array<FlightPlan>;
}>();

const form = useForm({
    name: '',
    description: ''
});

const createFlightPlan = () => {

    form.post(route("flightplan.create"), {

    });

}

</script>

<template>
    <Head title="Create Flight Plan" />

    
    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            
            <div>
                
                <div class="text-lg font-extrabold text-blue-800 pb-3">Flight Plans</div>
                
                <form @submit.prevent="createFlightPlan">

                    Name: <Input v-model="form.name" id="name" required /><br/>
                    Description: <br/>
                    <Input v-model="form.description" id="description" required />

                    <Button type="submit" class="my-5 bg-gray-500">
                        <LoaderCircle v-if="form.processing" class="h-4 w-4 animate-spin" />
                        Create Flight Plan
                    </Button>

                </form>
                
            </div>

        </div>
    </AppLayout>

</template>
