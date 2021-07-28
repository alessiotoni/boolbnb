<template>
<div>
    <h1 :></h1>
<!-- <div class="sliderWrap d-flex" tabindex="-1" @keyup.left="changeImg(-1)" @keyup.right="changeImg(1)">
                <div class="chevronLeft color-white">
                    <i class="fas fa-chevron-left" @click="changeImg(-1)"></i>
                </div>

                <div class="sliderImages">
                    <img :src="imagesList[activeImg]" class="imgBackground" alt="">


                    <div class="dots-container">
                        <a href="#" 
                        class="dot" 
                        :class="{active: activeImg === index }" 
                        
                        v-for="(img, index) in imagesList" 
                        @click.prevent="onDotClick(index)">
                        </a>
                    </div>
                </div>

                <div class="chevronRight color-white">
                    <i class="fas fa-chevron-right" @click="changeImg(1)"></i>
                </div>
            </div>     -->
</div>    
</template>

<script>
export default {
    name: "SliderImages",
    props:  {

    }, 
    data(){
        return {
            images: [],
            activeImg: 0,
            index: '',
        }
    },
    methods: {
        getImages() {
            axios.get("http://127.0.0.1:8000/api/images/" + this.index) 
            .then(resp => {
                this.images = resp.data.results;
            })
        }
    }
       
}
</script>
