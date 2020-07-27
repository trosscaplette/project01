<template>
    <div>
            <button v-if="show" @click.prevent="unsave()" class="btn 
            btn-danger" style="width:100%;">Remove Saved Job</button> 
            
            <button v-else @click.prevent="save()" class="btn 
            btn-primary" style="width:100%;">Save Job</button> 
            
    </div>
</template>

<script>
    export default {
        props:['jobid','favourited'],

        data(){
            return{
                'show':true
            }
        },
        mounted(){
            this.show = this.jobFavourited ? true:false;
        },

        computed:{
            jobFavourited(){
                return this.favourited
            }
        },
        methods:{
            save(){
                axios.post('/save/'+this.jobid).then(response=>
                this.show=true).catch(error=>alert('This job cannot be saved'))
            },
            unsave(){
                axios.post('/unsave/'+this.jobid).then(response=>
                this.show=false).catch(error=>alert('error'))
            }
        }
    }
</script>
