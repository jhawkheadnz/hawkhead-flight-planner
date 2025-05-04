<script setup lang="ts">
import DropdownMenu from '@/components/ui/dropdown-menu/DropdownMenu.vue';
import DropdownMenuContent from '@/components/ui/dropdown-menu/DropdownMenuContent.vue';
import DropdownMenuItem from '@/components/ui/dropdown-menu/DropdownMenuItem.vue';
import DropdownMenuLabel from '@/components/ui/dropdown-menu/DropdownMenuLabel.vue';
import DropdownMenuTrigger from '@/components/ui/dropdown-menu/DropdownMenuTrigger.vue';
import { FlightRoute } from '@/types';
import { MoreHorizontal } from 'lucide-vue-next';

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
    console.log("Delete this flight route");
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
            <DropdownMenuLabel>Actions</DropdownMenuLabel>
            <DropdownMenuItem @click="copy(flightroute.id.toString())">
                Copy flightroute ID
            </DropdownMenuItem>
            <DropdownMenuItem @click="$emit('expand')">
                Summerize
            </DropdownMenuItem>
            <DropdownMenuItem @click="route_delete(flightroute.id.toString())">
                Delete Route
            </DropdownMenuItem>
        </DropdownMenuContent>
    </DropdownMenu>
</template>