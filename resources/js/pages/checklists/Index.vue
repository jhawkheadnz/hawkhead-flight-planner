<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head, Link } from '@inertiajs/vue3';
import { ClipboardList } from 'lucide-vue-next';
import PlaceholderPattern from '../../components/PlaceholderPattern.vue';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Checklists',
        href: '/checklists',
    },
];

defineProps({ checklists: Array })
</script>

<template>
    <Head title="Checklists" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            
            <div>
                
                <div class="text-lg font-extrabold text-blue-800 pb-3">Checklists</div>
                
                <ul>
                    <li v-for="checklist in checklists" :key="checklist.id"  class="flex cursor-pointer border p-3 hover:bg-blue-950 text-white bg-gray-800"><Link :href="`/checklists/${checklist.id}`">
                       <div class="flex">
                           <ClipboardList class=" mr-5"/> {{ checklist.group_name }}
                       </div>
                    </Link></li>
                </ul>

            </div>

        </div>
    </AppLayout>
</template>
