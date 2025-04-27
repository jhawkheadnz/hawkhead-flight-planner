<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { Checklist, ChecklistGroup, type BreadcrumbItem } from '@/types';
import { Head, Link } from '@inertiajs/vue3';
import { ClipboardList } from 'lucide-vue-next';
import PlaceholderPattern from '../../components/PlaceholderPattern.vue';

defineProps<{
    checklists: Array<Checklist>;
    checklist_group: ChecklistGroup;
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
                
                <div class="text-lg font-extrabold text-blue-800 pb-3">{{ checklist_group.name }}</div>
                <p>{{  }}</p>
                
                <ul v-for="checklist in checklists" class="rounded-lg flex cursor-pointer border p-3 hover:bg-blue-950 text-white bg-gray-800">
                    <Link  :href="`/checklists/view/${checklist_group.tag_name}/${checklist.id}`">
                        <li>
                            <span>{{ checklist.name }}</span> <span class="text-gray-500"> - {{  checklist.description }}</span>
                        </li> 
                    </Link>
                </ul>
            </div>
        </div>
    </AppLayout>
</template>
