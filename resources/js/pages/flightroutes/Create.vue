<script setup lang="ts">
import Button from '@/components/ui/button/Button.vue';
import Input from '@/components/ui/input/Input.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { FlightPlan, FlightRoute, type BreadcrumbItem } from '@/types';
import { Head, useForm } from '@inertiajs/vue3';
import { LoaderCircle } from 'lucide-vue-next';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Flight Plans',
        href: '/flightplans',
    },{
        title: 'Create Flight Plan',
        href: '/flightplans/create'
    }
];

const props = defineProps<{
    flightplan: FlightPlan
}>();

const form = useForm({
    flight_plan_id: props.flightplan.id,
    from: 'NZHS',
    to: 'NZYP',
    airspeed_cas: 0,
    temp_c: 0,
    altitude: 0,
    airspeed_tas: 0,
    track: 0,
    wind_true: 0,
    wind_speed: 0,
    heading_true: 0,
    variation: '2E',
    heading_magnetic: 0,
    deviation: '1W',
    heading_compass: 0,
    ground_speed: 0,
    distance: 0,
    time: '180',
    eta: '12:55',
    fuel_consumption: '25',
    zone_fuel: '11'
});

const submit = () => {

    form.post(route("flightroute.store"), {

    });

}

</script>

<template>
    <Head title="Add Route to Flight Plan" />

    
    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            
            <div>
                
                <div class="text-lg font-extrabold text-blue-800 pb-3">Route Info</div>
                                
                <form @submit.prevent="submit">
                <table class="w-[300px]">
                    <tr>
                        <th>FROM</th>
                        <td><Input class="w-[120px] p-1 m-0" v-model="form.from" id="from" required type="text" /></td>
                    </tr>
                    <tr>
                        <th>TO</th>
                        <td><Input class="w-[120px] p-1 m-0" v-model="form.to" id="to" required type="text" /></td>
                    </tr><tr>
                        <th>CAS <span class="text-blue-400">kt</span></th>
                        <td><Input class="w-[120px] p-1 m-0"v-model="form.airspeed_cas" id="airspeed_cas" required type="text" /></td>
                    </tr><tr>
                        <th>TEMP <span class="text-blue-400">°C</span></th>
                        <td><Input class="w-[120px] p-1 m-0"v-model="form.temp_c" id="temp_c" required type="text" /></td>
                    </tr><tr>
                        <th>ALT <span class="text-blue-400">ft</span></th>
                        <td><Input class="w-[120px] p-1 m-0"v-model="form.altitude" id="altitude" required type="text" /></td>
                    </tr><tr>                        
                        <th>TAS <span class="text-blue-400">kt</span></th>
                        <td><Input class="w-[120px] p-1 m-0"v-model="form.airspeed_tas" id="airspeed_tas" required type="text" /></td>
                    </tr><tr>                        
                        <th>Track</th>
                        <td><Input class="w-[120px] p-1 m-0"v-model="form.track" id="track" required type="text" /></td>
                    </tr><tr>
                        <th>Wind <span class="text-blue-400">°T</span></th>
                        <td class="bg-gray-200"><Input class="w-[120px] p-1 m-0"v-model="form.wind_true" id="wind_true" required type="text" /></td>
                    </tr><tr>                        
                        <th>Wind <span class="text-blue-400">kt</span></th>
                        <td class="bg-gray-200"><Input class="w-[120px] p-1 m-0"v-model="form.wind_speed" id="wind_speed" required type="text" /></td>
                    </tr><tr>                        
                        <th>HDG <span class="text-blue-400">°T</span></th>
                        <td><Input class="w-[120px] p-1 m-0"v-model="form.heading_true" id="heading_true" required type="text" /></td>
                    </tr><tr>                        
                        <th>VAR</th>
                        <td><Input class="w-[120px] p-1 m-0"v-model="form.variation" id="variation" required type="text" /></td>
                    </tr><tr>                        
                        <th>HDG <span class="text-blue-400">°M</span></th>
                        <td><Input class="w-[120px] p-1 m-0"v-model="form.heading_magnetic" id="heading_magnetic" required type="text" /></td>
                    </tr><tr>                        
                        <th>DEV</th>
                        <td><Input class="w-[120px] p-1 m-0"v-model="form.deviation" id="deviation" required type="text" /></td>
                    </tr><tr>                        
                        <th>HDG <span class="text-blue-400">°C</span></th>
                        <td><Input class="w-[120px] p-1 m-0"v-model="form.heading_compass" id="heading_compass" required type="text" /></td>
                    </tr><tr>                        
                        <th>G/S <span class="text-blue-400">kt</span></th>
                        <td><Input class="w-[120px] p-1 m-0"v-model="form.ground_speed" id="ground_speed" required type="text" /></td>
                    </tr><tr>                        
                        <th>Dist <span class="text-blue-400">(nm)</span></th>
                        <td><Input class="w-[120px] p-1 m-0"v-model="form.distance" id="distance" required type="text" /></td>
                    </tr><tr>                        
                        <th>Time <span class="text-blue-400">(min)</span></th>
                        <td><Input class="w-[120px] p-1 m-0"v-model="form.time" id="time" required type="text" /></td>
                    </tr><tr>                        
                        <th>ETA</th>
                        <td style="font-family: 'Courier New', Courier, monospace;"><Input class="w-[120px] p-1 m-0"v-model="form.eta" id="eta" required type="text" /></td>
                    </tr><tr>                        
                        <th>Fuel Cons</th>
                        <td><Input class="w-[120px] p-1 m-0"v-model="form.fuel_consumption" id="fuel_consumption" required type="text" /></td>
                    </tr><tr>                        
                        <th>Zone Fuel</th>
                        <td><Input class="w-[120px] p-1 m-0"v-model="form.zone_fuel" id="zone_fuel" required type="text" /></td>
                    </tr>
                </table>

                <Button type="submit" class="my-5 bg-amber-500">
                    
                    <LoaderCircle v-if="form.processing" class="h-4 w-4 animate-spin" />
                    Add Route

                </Button>
                </form>
            </div>

        </div>
    </AppLayout>

</template>
