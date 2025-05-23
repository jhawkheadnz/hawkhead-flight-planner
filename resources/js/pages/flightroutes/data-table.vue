<script setup lang="ts" generic="TData, TColumn">
    import type { ColumnDef, ExpandedState } from '@tanstack/vue-table';
    import { Table, TableBody, TableCell, TableHead, TableHeader, TableRow } from '@/components/ui/table';
    import { FlexRender, getCoreRowModel, getExpandedRowModel, useVueTable } from '@tanstack/vue-table';
    import { ref } from 'vue';
    import { valueUpdater } from '@/components/ui/table/utils';
import LeafletMap from './LeafletMap.vue';

    const props = defineProps<{
        columns: ColumnDef<TData, TColumn>[],
        data: Array<TData>;
    }>();

    const expanded = ref<ExpandedState>({});

    const table = useVueTable({
        get data(){ return props.data },
        get columns(){ return props.columns },
        getCoreRowModel: getCoreRowModel(),
        getExpandedRowModel: getExpandedRowModel(),
        onExpandedChange: updateOrValue => valueUpdater(updateOrValue, expanded),
        state: {
            get expanded(){ return expanded.value; }
        }
    })
</script>

<template>
    <div class="border rounded-md">
        <Table>
            <TableHeader>
                <TableRow v-for="headerGroup in table.getHeaderGroups()" :key="headerGroup.id">
                    <TableHead v-for="header in headerGroup.headers" :key="header.id">
                        <FlexRender
                            v-if="!header.isPlaceholder" :render="header.column.columnDef.header" 
                            :props="header.getContext()"/>
                    </TableHead>
                </TableRow>
            </TableHeader>

            <TableBody>
                <template v-if="table.getRowModel().rows?.length">
                    <template v-for="row in table.getRowModel().rows" :key="row.id">
                        <TableRow :data-state="row.getIsSelected() ? 'selected' : undefined">
                            <TableCell v-for="cell in row.getVisibleCells()" :key="cell.id">
                                <FlexRender :render="cell.column.columnDef.cell" :props="cell.getContext()" />
                            </TableCell>
                        </TableRow>
                        <TableRow v-if="row.getIsExpanded()">
                            <TableCell :colspan="row.getAllCells().length">
                                <LeafletMap></LeafletMap>
                            </TableCell>
                        </TableRow>
                    </template>
                </template>
                
                <template v-else>
                    <TableRow>
                        <TableCell :colspan="columns.length" class="h-24 text-center">
                            No results
                        </TableCell>
                    </TableRow>
                </template>

            </TableBody>
        </Table>
    </div>
</template>