<template>
<div id="category-component">
    <label for="">danh muc</label>
    <div class="row container">
        <input v-for="item in categoriesSelected" :key="item.id" :value="item.id" type="hidden" name="category_ids[]">
        <h4 v-for="(item, index) in categoriesSelected" :key="item.id">{{item.name}} <span @click.prevent="categoriesSelected.splice(index, 1)">X</span> </h4>
        <input class="form-control " type="text" v-model="keyword"  v-on:input="debounceInput">
        <ul class="col-12">
            <a href="#" v-for="category in categories" :key="category.id" @click.prevent="categoriesSelector(category)">
                {{category.name}} 
            </a>
        </ul>
    </div>
</div>
</template>
<script>
import axios from 'axios'
export default {
    data (){
        return {
            keyword: '',
            categories: [],
            categoriesSelected: [],
        }
    },
    methods:{
        getCategories(){
            axios.get('http://localhost:8000/categories?keyword='+this.keyword)
            .then(response => {
                this.categories = response.data
            })
        },
        debounceInput: _.debounce(function () {
            this.getCategories()
        }, 500) ,
        categoriesSelector(category){
            if(!this.categoriesSelected.includes(category)){
                this.categoriesSelected.push(category)
                this.keywork=null
            }
        }
    },
    mounted(){
        this.getCategories()
        console.log(user)
    }
}
</script>
<style scoped>
#category-component h4 {
    display: inline-block;
    font-size: 14px;
    padding: 4px;
    border: 1px solid #ccc;
    margin-right: 6px;
    border-radius: 4px;
    background: #ccc;
}
#category-component h4 span{
    color: tomato;
    cursor: pointer;
}
</style>