<template>
<div class="sticky-top" id="header">
<div class="container">
    <div class="row center-content-end">
        
    </div>
    <div class="row">
        <div class="col-4 offset-1 px-5">
            <img src="image/logo_icon.png" alt="welcome" height="50%" width="40%">
        </div>
        <div class="col-5">
             <h1 class="text-title">Tweeter</h1>
          
        </div>
    </div>
    
</div>
</div>
</template>

<script>
export default {
    name: 'Header',
    
}
</script>

<style scoped>
.container {
    padding-top:2vh;
    background-color:white;
}
.text-title {
    font-family: Nunito;
    color: #F14768;
}
.divisor{
  border: 1px solid #01D1B2;
    margin-top: 2vh;
}
#header{
    background-color:#AFEEEE;;
     z-index: 1;
}
</style>