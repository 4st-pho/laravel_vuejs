<template>
    <div  >
        <label>chon vi tri</label>
        <div class="row container">
            <select class="form-control col-4" name="province_id" id="" v-model="province_id" >
                <option v-for="province in provinces" :key="province.id" :value="province.id" >
                        {{province.name}}
                </option>
            </select>
            <select v-show="province_id != null" class="form-control col-4" name="district_id" id="" v-model="district_id" >
                <option v-for="district in districts" :key="district.id" :value="district.id" >
                        {{district.name}}
                </option>
            </select>
            <select v-show="district_id != null" class="form-control col-4" name="ward_id" id="" v-model="ward_id" >
                <option v-for="ward in wards" :key="ward.id" :value="ward.id" >
                        {{ward.name}}
                </option>
            </select>
        </div>
    </div>
</template>
<script>
import axios from 'axios';
export default {
    data (){
        return {
            province_id: null,
            provinces: [],
            district_id: null,
            districts: [],
            ward_id: null,
            wards: []

        }
    },
    methods :{
        getProvinces(){
            axios.get('http://localhost:8000/location/provinces')
            .then( response => {
                this.provinces = response.data;
            })
        },
        getDistricts(){
            axios.get('http://localhost:8000/location/province/' + this.province_id + '/districts')
            .then( response => {
                this.districts = response.data;
            })
        },
        getWards(){
            axios.get('http://localhost:8000/location/province/district/'+ this.district_id + '/wards')
            .then( response => {
                this.wards = response.data;
            })
        },

    },
    mounted (){
        this.getProvinces();
    },
    watch : {
        province_id (){
            this.getDistricts()
        },
        district_id (){
            this.getWards()
        }
    }
}
</script>
<style scoped>

</style>