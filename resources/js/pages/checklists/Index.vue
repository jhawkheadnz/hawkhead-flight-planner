<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { ChecklistGroup, type BreadcrumbItem } from '@/types';
import { Head, Link } from '@inertiajs/vue3';
import { ClipboardList } from 'lucide-vue-next';
import PlaceholderPattern from '../../components/PlaceholderPattern.vue';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Checklists',
        href: '/checklists',
    },
];

defineProps<{
    checklist_groups: Array<ChecklistGroup>
}>();

</script>

<template>
    <Head title="Checklists" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            
            <div>
                
                <div class="text-lg font-extrabold text-blue-800 pb-3">Checklists</div>
                
                <ul>
                    <li v-for="checklist_group in checklist_groups" 
                    v-bind:key="checklist_group.id"
                    class="rounded-lg flex cursor-pointer border p-3 hover:bg-blue-950 text-white bg-gray-800">
                        <Link :href="`/checklists/view/${checklist_group.tag_name}`">
                            <div class="flex">
                                <ClipboardList class=" mr-5"/> {{ checklist_group.name }}
                            </div>
                        </Link>
                    </li>
                </ul>

            </div>

        </div>
    </AppLayout>
</template>
