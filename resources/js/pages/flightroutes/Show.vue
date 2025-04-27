<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { Checklist, ChecklistGroup, FlightRoute, type BreadcrumbItem } from '@/types';
import { Head, Link, useForm } from '@inertiajs/vue3';
import { Input } from '@/components/ui/input';
import Button from '@/components/ui/button/Button.vue';
import { LoaderCircle } from 'lucide-vue-next';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Flight Plan',
        href: '/flightplans',
    },{
        title: 'Flight Plan Route',
        href: '/flightroute',
    }
];

const props = defineProps<{
    flightroute: FlightRoute;
}>();

const form = useForm({
    
});

const submit = () => {

    //console.log(props.flightroute);

    form.post(route("flightroute.confirm"), {

    });
}

console.log(props.flightroute);

</script>

<style>
table {border-left:1px solid #c2c2c2;}
th {text-align: right; background: #020c2b; font-size: 11px; padding: 5px; color: #fff; }
td {text-align:center; border-bottom: 1px solid #c2c2c2; border-right: 1px solid #c2c2c2; padding:4px; font-size:12px; }
</style>

<template>
    <Head title="Checklists" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <div>
                <form @submit.prevent="submit">
                <table class="w-[300px]">
                    <tr>
                        <th>FROM</th>
                        <td><Input class="w-[120px] p-1 m-0" v-model="flightroute.from" id="from" required type="text" /></td>
                    </tr>
                    <tr>
                        <th>TO</th>
                        <td><Input class="w-[120px] p-1 m-0" v-model="flightroute.to" id="to" required type="text" /></td>
                    </tr><tr>
                        <th>CAS <span class="text-blue-400">kt</span></th>
                        <td><Input class="w-[120px] p-1 m-0" v-model="flightroute.airspeed_cas" id="airspeed_cas" required type="text" /></td>
                    </tr><tr>
                        <th>TEMP <span class="text-blue-400">°C</span></th>
                        <td><Input class="w-[120px] p-1 m-0" v-model="flightroute.temp_c" id="temp_c" required type="text" /></td>
                    </tr><tr>
                        <th>ALT <span class="text-blue-400">ft</span></th>
                        <td><Input class="w-[120px] p-1 m-0" v-model="flightroute.altitude" id="altitude" required type="text" /></td>
                    </tr><tr>                        
                        <th>TAS <span class="text-blue-400">kt</span></th>
                        <td><Input class="w-[120px] p-1 m-0" v-model="flightroute.airspeed_tas" id="airspeed_tas" required type="text" /></td>
                    </tr><tr>                        
                        <th>Track</th>
                        <td><Input class="w-[120px] p-1 m-0" v-model="flightroute.track" id="track" required type="text" /></td>
                    </tr><tr>
                        <th>Wind <span class="text-blue-400">°T</span></th>
                        <td class="bg-gray-200"><Input class="w-[120px] p-1 m-0" v-model="flightroute.wind_true" id="wind_true" required type="text" /></td>
                    </tr><tr>                        
                        <th>Wind <span class="text-blue-400">kt</span></th>
                        <td class="bg-gray-200"><Input class="w-[120px] p-1 m-0" v-model="flightroute.wind_speed" id="wind_speed" required type="text" /></td>
                    </tr><tr>                        
                        <th>HDG <span class="text-blue-400">°T</span></th>
                        <td><Input class="w-[120px] p-1 m-0" v-model="flightroute.heading_true" id="heading_true" required type="text" /></td>
                    </tr><tr>                        
                        <th>VAR</th>
                        <td><Input class="w-[120px] p-1 m-0" v-model="flightroute.variation" id="variation" required type="text" /></td>
                    </tr><tr>                        
                        <th>HDG <span class="text-blue-400">°M</span></th>
                        <td><Input class="w-[120px] p-1 m-0" v-model="flightroute.heading_magnetic" id="heading_magnetic" required type="text" /></td>
                    </tr><tr>                        
                        <th>DEV</th>
                        <td><Input class="w-[120px] p-1 m-0" v-model="flightroute.deviation" id="deviation" required type="text" /></td>
                    </tr><tr>                        
                        <th>HDG <span class="text-blue-400">°C</span></th>
                        <td><Input class="w-[120px] p-1 m-0" v-model="flightroute.heading_compass" id="heading_compass" required type="text" /></td>
                    </tr><tr>                        
                        <th>G/S <span class="text-blue-400">kt</span></th>
                        <td><Input class="w-[120px] p-1 m-0" v-model="flightroute.ground_speed" id="ground_speed" required type="text" /></td>
                    </tr><tr>                        
                        <th>Dist <span class="text-blue-400">(nm)</span></th>
                        <td><Input class="w-[120px] p-1 m-0" v-model="flightroute.distance" id="distance" required type="text" /></td>
                    </tr><tr>                        
                        <th>Time <span class="text-blue-400">(min)</span></th>
                        <td><Input class="w-[120px] p-1 m-0" v-model="flightroute.time" id="time" required type="text" /></td>
                    </tr><tr>                        
                        <th>ETA</th>
                        <td style="font-family: 'Courier New', Courier, monospace;"><Input class="w-[120px] p-1 m-0" v-model="flightroute.eta" id="eta" required type="text" /></td>
                    </tr><tr>                        
                        <th>Fuel Cons</th>
                        <td><Input class="w-[120px] p-1 m-0" v-model="flightroute.fuel_consumption" id="fuel_consumption" required type="text" /></td>
                    </tr><tr>                        
                        <th>Zone Fuel</th>
                        <td><Input class="w-[120px] p-1 m-0" v-model="flightroute.zone_fuel" id="zone_fuel" required type="text" /></td>
                    </tr>
                </table>

                <Button type="submit" class="my-5 bg-amber-500">
                    
                    <LoaderCircle v-if="form.processing" class="h-4 w-4 animate-spin" />
                    Update Route

                </Button>
                </form>                
            </div>
        </div>
    </AppLayout>
</template>
