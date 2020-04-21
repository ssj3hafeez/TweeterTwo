<template>
<div>
    <div class="container">
        <div class="row">
            <div class="col-xl order-xl-12 align-self-center text-center">
                <h5 class="text-center"><strong>Tweek or Tweet ? </strong></h5>
                 <br>
                <h5 class="text-center"><i><span class="animated fadeIn delay-3s"> Spread your message globally. </span><span class="animated fadeIn delay-4s">  Aspire to Inspire.. before you Expire!</span>
                <span class="animated fadeIn delay-5s"> All day, everyday, 24/7!!</span><span class="animated fadeIn delay-7s"> WELCOME!</span></i></h5>
                <br>
                <br>
            <img src="/image/connect.jpg" alt="" class="rounded mx-auto d-block animated pulse infinite" width=80%>
            <br>
                <a href="/register" class="btn btn-danger text-center btn-large "><h4> Sign up</h4></a>
                <a href="/login" class="btn btn-success text-center btn-large "><h4> Login</h4></a>
            </div>
            <div class="col-xl order-xl-1">
            <br>
            <br>
            </div>
        </div>
    </div>
    <div id="change-background">
        <div class="container">
            <h3 class="text-title text-center" data-aos="zoom-out"> Why Tweeter?</h3>
            <br>
            <article class="text-tile"> The future of Social Media allows you to: </article>
            <br>
            <div class="row row-cols-xl-3">
               
                <div class="col-xl order-xl-4">
    
                    <ul class="fa-ul">
                    <li data-aos="zoom-in"><span class="fa-li" ><i class="fas fa-handshake color-icon" ></i></span><h5 class="text-left"> Network globally   </h5></li>
                    <br>
                    <li data-aos="zoom-in"><span class="fa-li"><i class="fas fa-arrows-alt color-icon"></i></span><h5 class="text-left">Remain informed on trends all over the world</h5></li>
                    <br>
                     <li data-aos="zoom-in"><span class="fa-li" ><i class="fas fa-globe color-icon"></i></span><h5 class="text-left">24/7 update of global news </h5></li>
                    <br>
                    <li data-aos="zoom-in"><span class="fa-li"><i class="far fa-comments color-icon"></i></span><h5 class="text-left">Create and Share content</h5></li>
                    <br>
                    <li data-aos="zoom-in"><span class="fa-li" ><i class="fab fa-connectdevelop color-icon"></i></span><h5 class="text-left"> Join or Create community </h5></li>
                    
                    </ul>
                </div>
            
            </div>
        </div>
    </div>
    <div>
        <div class="container">
            <h1 class="text-title text-center comments-section" data-aos="zoom-out"> What people are saying </h1>
            <div data-aos="fade-right">
                    <blockquote class="blockquote mb-0">
                        <h5 ><i class="fas fa-quote-left fa-pull-left color-icon fa-sm"></i>Tweeter is the new kid in the block. It is tremendous and believe me I know... <i class="fas fa-quote-right color-icon fa-sm"></i></h5>
                        <footer class="blockquote-footer">Donald Trump <cite title="Author">Presidente</cite></footer>
                    </blockquote>
            </div>
            <br>
            <div data-aos="fade-right">
                    <blockquote class="blockquote mb-0">
                        <h5><i class="fas fa-quote-left fa-pull-left color-icon fa-sm"></i>I can broadcast all my thoughts on here. I can tell everyone to get vaccinated and go from zero to hero!<i class="fas fa-quote-right color-icon fa-sm"></i></h5>
                        <footer class="blockquote-footer">Bill Oates<cite title="Author"> Confessions of a lonely Billionaire</cite></footer>
                </blockquote>
            </div>
            <br>
            <div data-aos="fade-right">
                    <blockquote class="blockquote mb-0">
                        <h5><i class="fas fa-quote-left fa-pull-left color-icon fa-sm"></i> Tweeter is what I use to send messages to gifted millennials <i class="fas fa-quote-right color-icon fa-sm"></i></h5>
                        <footer class="blockquote-footer">Professor X<cite title="Author"> Founder of X-men Academey</cite></footer>
                </blockquote>
            </div>
            <br>
            <div data-aos="fade-right">
                    <blockquote class="blockquote mb-0">
                        <h5><i class="fas fa-quote-left fa-pull-left color-icon fa-sm"></i> I am Thanos! This app is so good that I had to unsnap my fingers to bring it back <i class="fas fa-quote-right color-icon fa-sm"></i></h5>
                        <footer class="blockquote-footer">Thanos<cite title="Author"> I am Thanos</cite></footer>
                </blockquote>
            </div>

</div>
 </div>


      
</div>
</template>

<script>
export default {
    name:'Body'
}
</script>

<style scoped>
body{
  background-color: #01D1B2;
}
#change-background {
    background-color:	#AFEEEE;
    padding-bottom: 1vh;
    padding-top: 3vh;
}

.color-icon {
    color:#01D1B2;
}
.text-title {
    font-family: Nunito;
    color: #F14768;
    margin-top:2vh;
}
.mymargin {
    margin-top:12vh;
    margin-bottom:15vh;
}
.comments-section {
    margin-top: 5vh;
    margin-bottom: 5vh;
}

</style>