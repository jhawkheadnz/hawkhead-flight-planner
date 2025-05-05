<script setup lang="ts">
import DropdownMenu from '@/components/ui/dropdown-menu/DropdownMenu.vue';
import DropdownMenuContent from '@/components/ui/dropdown-menu/DropdownMenuContent.vue';
import DropdownMenuItem from '@/components/ui/dropdown-menu/DropdownMenuItem.vue';
import DropdownMenuLabel from '@/components/ui/dropdown-menu/DropdownMenuLabel.vue';
import DropdownMenuTrigger from '@/components/ui/dropdown-menu/DropdownMenuTrigger.vue';
import { FlightRoute } from '@/types';
import { ChevronsLeft, ChevronsRight, Clipboard, EditIcon, MoreHorizontal, Newspaper, Trash } from 'lucide-vue-next';

defineProps<{
    flightroute: FlightRoute
}>();

defineEmits<{
    (e: 'expand'): void
}>();

function copy(id : any){
    console.log("Tred to copy: " + id);
    //navigator.clipboard.writeText(id);
}

function route_delete(id : string){
    console.log("Delete this flight route: " + id);
}
</script>

<template>
    <DropdownMenu>
        <DropdownMenuTrigger as-child>
            <Button variant="ghost" class="w-8 h-8 p-0">
                <span class="sr-only">Open menu</span>
                <MoreHorizontal class="w-4 h-4" />
            </Button>
        </DropdownMenuTrigger>
        <DropdownMenuContent align="end">
            <DropdownMenuLabel class="flex font-extrabold text-center">Actions</DropdownMenuLabel>
            <DropdownMenuItem>
                <EditIcon /> Edit route
            </DropdownMenuItem>
            <DropdownMenuItem @click="$emit('expand')">
                <Newspaper /> Detailed Overview
            </DropdownMenuItem>
            <DropdownMenuItem @click="route_delete(flightroute.id.toString())">
                <Trash />
                Delete Route
            </DropdownMenuItem>
            <DropdownMenuItem @click="copy(flightroute.id.toString())">
                <Clipboard/> Copy flightroute ID
            </DropdownMenuItem>
        </DropdownMenuContent>
    </DropdownMenu>
</template>