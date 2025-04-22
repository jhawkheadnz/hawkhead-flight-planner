<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import PlaceholderPattern from '../../components/PlaceholderPattern.vue';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/dashboard',
    },{
        title: 'Checklists',
        href: '/checklists'
    }
];

defineProps({ checklists: Array })
</script>

<template>
    <Head title="Checklists" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            
            <!-- <div class="grid auto-rows-min gap-4 md:grid-cols-3"> -->
            <div>
                
                <div>Checklists</div>
                
                <div>
                    <ul v-for="checklist in checklists">
                        <li>{{ checklist.name }}</li>
                    </ul>
                </div>

            </div>

        </div>
    </AppLayout>
</template>
