<template>
    <div class="py-9">
        
        <div class="d-flex slider">

            <div v-show="images.length > 1" class="col-sm-1 chevronLeft color-white " @click="change(-1)">
                <i class="fas fa-chevron-left my_chev"></i>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-10 my_slider">
                <img :src="images[activeImg]" alt="slider">
            </div>

            <div v-show="images.length > 1" class="col-sm-1 chevronRight color-white" @click="change(1)">
                <i class="fas fa-chevron-right my_chev" ></i>
            </div>
        
        </div>
    </div>    
</template>

<script>
export default {
    name: "SliderImages",
    props:  {
        id: Number,
    }, 
    data(){
        return {
            images: [],
            activeImg: 0,
            id: this.id,
            filteredAccomodations: [],
        }
    },
    methods: {
        getImages() {
            axios.get("http://127.0.0.1:8000/api/images/" + this.id) 
            .then(resp => {
                this.images = resp.data.results;
            })
        },
        change(x) {
            if(x < 0) {
                this.activeImg--
                if(this.activeImg < 0) {
                    this.activeImg = (this.images.length - 1)
                }
            }
            if(x > 0) {
                this.activeImg++
                if(this.activeImg > this.images.length - 1) {
                    this.activeImg = 0
                }
            }

        }
    },
    mounted() {
        this.getImages()
    }
       
}
</script>

<style lang="scss" scoped>


</style>
