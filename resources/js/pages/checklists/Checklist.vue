<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { ChecklistItem, type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import { CircleCheck } from 'lucide-vue-next';

defineProps<{
    checklist_items: Array<ChecklistItem>;
    checklist_title: string;
}>();

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Checklists',
        href: '/checklists',
    }
];

</script>

<template>
    <Head title="Checklists" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            
            <div>
                
                <div class="text-lg font-extrabold text-blue-800 pb-3">{{ checklist_title }}</div>
                
                <ul >
                    <li class="rounded-lg flex cursor-pointer border p-3 hover:bg-blue-950 text-white bg-gray-800" 
                        v-for="checklist_item in checklist_items"
                        v-bind:key="checklist_item.id">
                        <CircleCheck class="mr-3"/> <span>{{ checklist_item.title }}</span> <span class="text-gray-500">- {{ checklist_item.description }}</span>
                    </li> 
                </ul>

            </div>

        </div>
    </AppLayout>
</template>
