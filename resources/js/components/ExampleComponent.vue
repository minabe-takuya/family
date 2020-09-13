<template>
    <div class="weather-posision">
        <p><b>登録した地域の現在の天気</b></p>
            <p class="weather_city">都市：{{ city }}</p>
            <p class="weather_temp">気温：{{ temp | roundUp }}&deg;C</p>
        <div class="weather_pic">
            <p v-if="condition.main == 'Rain'"><i class="fas fa-umbrella fa-3x"></i></p>
            <p v-else-if="condition.main == 'Clouds'"><i class="fas fa-cloud fa-3x"></i></p>
            <p v-else-if="condition.main == 'Clear'"><i class="fas fa-sun fa-3x"></i></p>
            <p v-else>該当しなかった<i class="fas fa-cloud-sun fa-3x"></i></p>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            city: null, //地域名
            temp: null, //気温
            condition: {
                main: null, //天候名
            }
        }
    },
    mounted: function () {
        axios.get('api/weather')
            .then(function (response) {
                this.city = response.data.name
                this.temp = response.data.main.temp
                this.condition = response.data.weather[0]
            }.bind(this))
            .catch(function (error) {
                console.log(error)
            })
    },
    filters: {
        roundUp(value) {
            return Math.ceil(value);
        }
    }//filters
}//export default
</script>

<style scoped>
.weather_pic{
    display:block;
    position:absolute;
    top:40px;
    left:180px;
}
p{
    margin:0;
}
.weather-posision{
    background: #95c5ed;
    border-radius: 8px;
    padding:20px 20px;
    marigin:20px;
}
</style>
