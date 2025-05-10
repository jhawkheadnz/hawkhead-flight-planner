<template>
    <div class="h-[400px] w-[100%]">
      <l-map ref="map" v-model:zoom="zoom" :center="center">
        <l-tile-layer
          url="https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png"
          layer-type="base"
          name="OpenStreetMap"
        ></l-tile-layer>

        <l-polyline
          :lat-lngs="[
            [-39.644500, 176.767004],
            [-39.994955, 176.539060],
          ]"
          color="green"
        />

      </l-map>
    </div>
  </template>
  
  <script>
  import "leaflet/dist/leaflet.css";
  import { LMap, LPolyline, LTileLayer } from "@vue-leaflet/vue-leaflet";
  
  var midpoint_lat = (-39.644500 + -39.994955) / 2;
  var midpoint_lng = (176.767004 + 176.539060) / 2;

  function distance(lat1, lon1, lat2, lon2) {
      const r = 6371; // km
      const p = Math.PI / 180;

      const a = 0.5 - Math.cos((lat2 - lat1) * p) / 2
                    + Math.cos(lat1 * p) * Math.cos(lat2 * p) *
                      (1 - Math.cos((lon2 - lon1) * p)) / 2;

      return 2 * r * Math.asin(Math.sqrt(a));
  }

  var dist = Math.round(distance(-39.644500, 176.767004, -39.994955, 176.539060) / 1.852);

  console.log(dist);

  export default {
    components: {
      LMap,
      LTileLayer,
      LPolyline
    },
    data() {
      return {
        zoom: 9,
        //center: [-39.644500, 176.767004],
        center: [midpoint_lat, midpoint_lng]
      };
    },
  };
  </script>
  
  <style></style>