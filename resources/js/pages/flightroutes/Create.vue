<script setup lang="ts">
import Button from '@/components/ui/button/Button.vue';
import Input from '@/components/ui/input/Input.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { FlightPlan, FlightRoute, type BreadcrumbItem } from '@/types';
import { Head, useForm } from '@inertiajs/vue3';
import { ChevronsLeft, LoaderCircle } from 'lucide-vue-next';
import Table from '@/components/ui/table/Table.vue';
import TableRow from '@/components/ui/table/TableRow.vue';
import TableCell from '@/components/ui/table/TableCell.vue';

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
    variation: '22E',
    heading_magnetic: 0,
    deviation: '1W',
    heading_compass: 0,
    ground_speed: 0,
    distance: 0,
    time: '180',
    eta: '12:55',
    fuel_consumption: '25',
    zone_fuel: '11',
    order: 0
});

const submit = () => {

    form.post(route("flightroute.store"), {

    });

}

function backToFlightPlan(id : number){
   //window.location.href = './flightplans/routes/' + id.toString();
   window.location.href = (route("flightplan.routes", id));
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

<template>
    <Head title="Add Route to Flight Plan" />

    
    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            
            <div>
                                
                <form @submit.prevent="submit">
                    <Table class="w-[600px]">
                        <TableRow>
                            <TableCell :colspan="4" class="text-lg bg-blue-950 text-white rounded-tl-md rounded-tr-md">
                                Add Route to Flight Plan
                            </TableCell>
                        </TableRow>
                        <TableRow>
                            <TableCell>
                                From
                            </TableCell>
                            <TableCell>
                                <Input class="w-[120px] p-1 m-0" v-model="form.from" id="from" required type="text" />
                            </TableCell>
                            <TableCell>
                                To
                            </TableCell>
                            <TableCell>
                                <Input class="w-[120px] p-1 m-0" v-model="form.to" id="to" required type="text" />
                            </TableCell>
                        </TableRow>
                        <TableRow>
                            <TableCell>
                                Latitude<br/> 
                                <em class="text-xs text-green-500">Optional</em>
                            </TableCell>
                            <TableCell><Input class="w-[120px] p-1 m-0" type="text" /></TableCell>
                            <TableCell>
                                Longitude<br/>
                                <em class="text-xs text-green-500">Optional</em>
                            </TableCell>
                            <TableCell><Input class="w-[120px] p-1 m-0" type="text" /></TableCell>
                        </TableRow>
                        <TableRow>
                            <TableCell>
                                CAS kt
                            </TableCell>
                            <TableCell>
                                <Input class="w-[120px] p-1 m-0"v-model="form.airspeed_cas" id="airspeed_cas" required type="text" />
                            </TableCell>
                            <TableCell>
                                Temp °C
                            </TableCell>
                            <TableCell>
                                <Input class="w-[120px] p-1 m-0"v-model="form.temp_c" id="temp_c" required type="text" />
                            </TableCell>
                        </TableRow>
                        <TableRow>
                            <TableCell>
                                Altitude (ft)
                            </TableCell>
                            <TableCell>
                                <Input class="w-[120px] p-1 m-0"v-model="form.altitude" id="altitude" required type="text" />
                            </TableCell>
                            <TableCell>
                                TAS kt
                            </TableCell>
                            <TableCell>
                                <Input class="w-[120px] p-1 m-0"v-model="form.airspeed_tas" id="airspeed_tas" required type="text" />
                            </TableCell>
                        </TableRow>
                        <TableRow>
                            <TableCell>
                                Track °T
                            </TableCell>
                            <TableCell>
                                <Input class="w-[120px] p-1 m-0"v-model="form.track" id="track" required type="text" />
                            </TableCell>
                            <TableCell>
                                Wind Direction °T
                            </TableCell>
                            <TableCell>
                                <Input class="w-[120px] p-1 m-0"v-model="form.wind_true" id="wind_true" required type="text" />
                            </TableCell>
                        </TableRow>
                        <TableRow>
                            <TableCell>
                                Wind Speed kt
                            </TableCell>
                            <TableCell>
                                <Input class="w-[120px] p-1 m-0"v-model="form.wind_speed" id="wind_speed" required type="text" />
                            </TableCell>
                            <TableCell>
                                (True) Heading °T
                            </TableCell>
                            <TableCell>
                                <Input class="w-[120px] p-1 m-0"v-model="form.heading_true" id="heading_true" required type="text" />
                            </TableCell>
                        </TableRow>
                        <TableRow>
                            <TableCell>Variation</TableCell>
                            <TableCell>
                                <Input class="w-[120px] p-1 m-0"v-model="form.variation" id="variation" @input="updateVariation" required type="text" />
                            </TableCell>
                            <TableCell>
                                (Magnetic) Heading °M<br/>
                                <em class="text-xs">Automatic</em>
                            </TableCell>
                            <TableCell>
                                <Input class="bg-gray-200 w-[120px] p-1 m-0"v-model="form.heading_magnetic" id="heading_magnetic" required type="text" readonly />
                            </TableCell>
                        </TableRow>
                        <TableRow>
                            <TableCell>Deviation</TableCell>
                            <TableCell>
                                <Input class="w-[120px] p-1 m-0"v-model="form.deviation" id="deviation" @input="updateDeviation" required type="text" />
                            </TableCell>
                            <TableCell>
                                (Compass) Heading °C<br/>
                                <em class="text-xs">Automatic</em>
                            </TableCell>
                            <TableCell>
                                <Input class="bg-gray-200 w-[120px] p-1 m-0"v-model="form.heading_compass" id="heading_compass" required type="text" readonly />
                            </TableCell>
                        </TableRow>
                        <TableRow>
                            <TableCell>
                                Ground Speed (kt)
                            </TableCell>
                            <TableCell>
                                <Input class="w-[120px] p-1 m-0"v-model="form.ground_speed" id="ground_speed" required type="text" />
                            </TableCell>
                            <TableCell>
                                Distance (nm)
                            </TableCell>
                            <TableCell>
                                <Input class="w-[120px] p-1 m-0"v-model="form.distance" id="distance" required type="text" />
                            </TableCell>
                        </TableRow>
                        <TableRow>
                            <TableCell>Time (hh:mm)</TableCell>
                            <TableCell>
                                <Input class="w-[120px] p-1 m-0"v-model="form.time" id="time" required type="text" />
                            </TableCell>
                            <TableCell>ETA (Zulu)</TableCell>
                            <TableCell>
                                <Input class="w-[120px] p-1 m-0"v-model="form.eta" id="eta" required type="text" />
                            </TableCell>
                        </TableRow>
                        <TableRow>
                            <TableCell>
                                Fuel Consumption
                            </TableCell>
                            <TableCell>
                                <Input class="w-[120px] p-1 m-0"v-model="form.fuel_consumption" id="fuel_consumption" required type="text" />
                            </TableCell>
                            <TableCell>
                                Zone Fuel
                            </TableCell>
                            <TableCell>
                                <Input class="w-[120px] p-1 m-0"v-model="form.zone_fuel" id="zone_fuel" required type="text" />
                            </TableCell>
                        </TableRow>
                    </Table>

                    <div class="w-[600px] pt-4">
                        <Button type="submit" class="bg-amber-500">
                            <LoaderCircle v-if="form.processing" class="h-4 w-4 animate-spin" />
                            Add Route To Flight
                        </Button>
                        <Button type="button" class="float-right" @click="backToFlightPlan(flightplan.id)">
                            <ChevronsLeft class="h-4 w-4"/> 
                            Back to Flight Plan Route
                        </Button>
                    </div>
                </form>
            </div>

        </div>
    </AppLayout>

</template>
