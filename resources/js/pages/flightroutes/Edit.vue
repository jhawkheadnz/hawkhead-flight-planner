<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { Checklist, ChecklistGroup, FlightRoute, SharedData, type BreadcrumbItem } from '@/types';
import { Head, Link, useForm, usePage } from '@inertiajs/vue3';
import { Input } from '@/components/ui/input';
import Button from '@/components/ui/button/Button.vue';
import { ChevronsLeft, LoaderCircle, StepBack } from 'lucide-vue-next';

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
    flight_route: props.flightroute.id,
    flight_plan_id: props.flightroute.flight_plan_id,
    from: props.flightroute.from,
    to: props.flightroute.to,
    airspeed_cas: props.flightroute.airspeed_cas,
    temp_c: props.flightroute.temp_c,
    altitude: props.flightroute.altitude,
    airspeed_tas: props.flightroute.airspeed_tas,
    track: props.flightroute.track,
    wind_true: props.flightroute.wind_true,
    wind_speed: props.flightroute.wind_speed,
    heading_true: props.flightroute.heading_true,
    variation: props.flightroute.variation,
    heading_magnetic: props.flightroute.heading_magnetic,
    deviation: props.flightroute.deviation,
    heading_compass: props.flightroute.heading_compass,
    ground_speed: props.flightroute.ground_speed,
    distance: props.flightroute.distance,
    time: props.flightroute.time,
    eta: props.flightroute.eta,
    fuel_consumption: props.flightroute.fuel_consumption,
    zone_fuel: props.flightroute.zone_fuel
});

const submit = () => {

    //console.log(props.flightroute);

    form.put(route("flightroute.confirm"), {
        preserveScroll: true,
        onSuccess: () => {  },

    });
}

function updateVariation(e : Event){

const var_val = (e.target as HTMLInputElement).value;
const var_letter = var_val[var_val.length - 1];
const var_amount = var_val.replace(var_letter, "");
const var_amount_num = Number.parseInt(var_amount);
const heading_true = parseInt(form.heading_true.toString());
const variation = parseInt(var_amount_num.toString());

var variation_result = 0;

if(var_letter == "W"){ // west is best (add variation)
    variation_result = (heading_true + variation) % 360;
}

if(var_letter == "E"){ // east is least (subtract variation) 
    variation_result = (heading_true - variation) % 360;

    if(variation_result < 0)
        variation_result = variation_result + 360;
}

form.heading_magnetic = variation_result;

}

function updateDeviation(e : Event){

const var_val = (e.target as HTMLInputElement).value;
const var_letter = var_val[var_val.length - 1];
const var_amount = var_val.replace(var_letter, "");
const var_amount_num = Number.parseInt(var_amount);
const heading_magnetic = parseInt(form.heading_magnetic.toString());
const variation = parseInt(var_amount_num.toString());

var variation_result = 0;

if(var_letter == "W"){ // west is best (add variation)
    variation_result = (heading_magnetic + variation) % 360;
}

if(var_letter == "E"){ // east is least (subtract variation) 
    variation_result = (heading_magnetic - variation) % 360;

    if(variation_result < 0)
        variation_result = variation_result + 360;
}

form.heading_compass = variation_result;

}

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
                <table class="w-[600px]">
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
                        <td><Input class="w-[120px] p-1 m-0"v-model="form.variation" id="variation" @input="updateVariation" required type="text"  /></td>
                    </tr><tr>                        
                        <th>HDG <span class="text-blue-400">°M</span></th>
                        <td><Input class="w-[120px] p-1 m-0"v-model="form.heading_magnetic" id="heading_magnetic" required type="text" readonly/></td>
                    </tr><tr>                        
                        <th>DEV</th>
                        <td><Input class="w-[120px] p-1 m-0"v-model="form.deviation" id="deviation" @input="updateDeviation" required type="text"  /></td>
                    </tr><tr>                        
                        <th>HDG <span class="text-blue-400">°C</span></th>
                        <td><Input class="w-[120px] p-1 m-0"v-model="form.heading_compass" id="heading_compass" required type="text" readonly/></td>
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

                <div class="gap-x-5 w-[600px] pt-3.5">
                    <Button type="submit" class=" bg-amber-500">
                        <LoaderCircle v-if="form.processing" class="h-4 w-4 animate-spin" />
                        Update Route
                    </Button>
                    <Button type="button" class="float-right" @click="`/flightplans/routes/${props.flightroute.flight_plan_id}`">
                        <ChevronsLeft class="h-4 w-4"/> 
                        Back to Flight Plan Route
                    </Button>
                </div>
                </form>                
            </div>
        </div>
    </AppLayout>
</template>
