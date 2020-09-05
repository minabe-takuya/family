<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    {{test}}
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                test:'testです',
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
