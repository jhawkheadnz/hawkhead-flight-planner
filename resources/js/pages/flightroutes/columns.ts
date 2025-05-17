import { FlightRoute } from '@/types'
import { ColumnDef } from '@tanstack/vue-table';
import { h } from 'vue'
import DataTableDropDown from './DataTableDropDown.vue';

export const columns: ColumnDef<FlightRoute>[] = [
    {
        accessorKey: 'from',
        //accessorFn: row => `${row.from} - ${row.latlng_from}`,
        header: () => h('div', { class: 'text-center' }, 'From'),
        cell: ({ row }) => {
            const from = row.getValue('from');
            const formatted = String(from);

            //console.log(row);

            return h('div', { class: 'text-center font-medium' }, formatted)
        }
    },{
        accessorKey: 'to',
        header: () => h('div', { class: 'text-center' }, 'To'),
        cell: ({ row }) => h('div', {class: 'text-center'}, row.getValue('to'))
    },{
        accessorKey: 'airspeed_cas',
        header: () => h('div', { class: 'text-right' }, 'kt CAS'),
        cell: ({ row }) => h('div', {class: 'text-right'}, row.getValue('airspeed_cas'))
    },{
        accessorKey: 'temp_c',
        header: () => h('div', { class: 'text-right' }, 'Temp °C'),
        cell: ({ row }) => h('div', {class: 'text-right'}, row.getValue('temp_c'))
    },{
        accessorKey: 'altitude',
        header: () => h('div', { class: 'text-right' }, 'Alt (ft)'),
        cell: ({ row }) => h('div', {class: 'text-right'}, row.getValue('altitude'))
    },{
        accessorKey: 'airspeed_tas',
        header: () => h('div', { class: 'text-right' }, 'kt TAS'),
        cell: ({ row }) => h('div', {class: 'text-right'}, row.getValue('airspeed_tas'))
    },{
        accessorKey: 'track',
        header: () => h('div', { class: 'text-right' }, 'Track °T'),
        cell: ({ row }) => h('div', {class: 'text-right'}, row.getValue('track'))
    },{
        accessorKey: 'wind_true',
        header: () => h('div', { class: 'text-right' }, 'Wind °T'),
        cell: ({ row }) => h('div', {class: 'text-right'}, row.getValue('wind_true'))
    },{
        accessorKey: 'wind_speed',
        header: () => h('div', { class: 'text-right' }, 'kt Wind'),
        cell: ({ row }) => h('div', {class: 'text-right'}, row.getValue('wind_speed'))
    },{
        accessorKey: 'heading_true',
        header: () => h('div', { class: 'text-right' }, 'HDG °T'),
        cell: ({ row }) => h('div', {class: 'text-right'}, row.getValue('heading_true'))
    },{
        accessorKey: 'variation',
        header: () => h('div', { class: 'text-right' }, 'Var'),
        cell: ({ row }) => h('div', {class: 'text-right'}, row.getValue('variation'))
    },{
        accessorKey: 'heading_magnetic',
        header: () => h('div', { class: 'text-right' }, 'HDG °M'),
        cell: ({ row }) => h('div', {class: 'text-right'}, row.getValue('temp_c'))
    },{
        accessorKey: 'ground_speed',
        header: () => h('div', { class: 'text-right' }, 'G/S kt'),
        cell: ({ row }) => h('div', {class: 'text-right'}, row.getValue('ground_speed'))
    },{
        accessorKey: 'distance',
        header: () => h('div', { class: 'text-right' }, 'Dist'),
        cell: ({ row }) => h('div', {class: 'text-right'}, row.getValue('distance'))
    },{
        accessorKey: 'time',
        header: () => h('div', { class: 'text-right' }, 'Time'),
        cell: ({ row }) => h('div', {class: 'text-right'}, row.getValue('time'))
    },{
        accessorKey: 'eta',
        header: () => h('div', { class: 'text-right' }, 'Temp °C'),
        cell: ({ row }) => h('div', {class: 'text-right'}, row.getValue('temp_c'))
    },{
        accessorKey: 'fuel_consumption',
        header: () => h('div', { class: 'text-right' }, 'Fuel Con.'),
        cell: ({ row }) => h('div', {class: 'text-right'}, row.getValue('fuel_consumption'))
    },{
        accessorKey: 'zone_fuel',
        header: () => h('div', { class: 'text-right' }, 'Zone Fuel'),
        cell: ({ row }) => h('div', {class: 'text-right'}, row.getValue('zone_fuel'))
    },{
        id: 'actions',
        enableHiding: false,
        cell: ({ row }) => {
            const flightroute =  row.original;

            return h('div', { class: 'relative' }, h(DataTableDropDown, {
                flightroute,
                onExpand: row.toggleExpanded,
            }))
        }
    }
];